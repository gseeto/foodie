<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Recipe class.  It uses the code-generated
	 * RecipeMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Recipe columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both recipe_edit.php AND
	 * recipe_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class RecipeEditPanel extends QPanel {
		// Local instance of the RecipeMetaControl
		protected $mctRecipe;

		// Controls for Recipe's Data Fields
		public $lblId;
		public $txtName;
		public $txtDescription;
		public $txtInstructions;
		public $txtPreparationTime;
		public $txtServingSize;
		public $lstOwner;
		public $lstMealType;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstMenus;
		public $lstCategories;
		public $lstIngredients;

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'RecipeEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the RecipeMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctRecipe = RecipeMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on Recipe's data fields
			$this->lblId = $this->mctRecipe->lblId_Create();
			$this->txtName = $this->mctRecipe->txtName_Create();
			$this->txtDescription = $this->mctRecipe->txtDescription_Create();
			$this->txtInstructions = $this->mctRecipe->txtInstructions_Create();
			$this->txtPreparationTime = $this->mctRecipe->txtPreparationTime_Create();
			$this->txtServingSize = $this->mctRecipe->txtServingSize_Create();
			$this->lstOwner = $this->mctRecipe->lstOwner_Create();
			$this->lstMealType = $this->mctRecipe->lstMealType_Create();
			$this->lstMenus = $this->mctRecipe->lstMenus_Create();
			$this->lstCategories = $this->mctRecipe->lstCategories_Create();
			$this->lstIngredients = $this->mctRecipe->lstIngredients_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Recipe') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctRecipe->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the RecipeMetaControl
			$this->mctRecipe->SaveRecipe();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the RecipeMetaControl
			$this->mctRecipe->DeleteRecipe();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>
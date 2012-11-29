<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the IngredientSource class.  It uses the code-generated
	 * IngredientSourceMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a IngredientSource columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ingredient_source_edit.php AND
	 * ingredient_source_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class IngredientSourceEditPanel extends QPanel {
		// Local instance of the IngredientSourceMetaControl
		protected $mctIngredientSource;

		// Controls for IngredientSource's Data Fields
		public $lblId;
		public $lstIngredient;
		public $lstLocation;
		public $txtCost;
		public $lstQuality;
		public $txtComments;
		public $txtName;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

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
			$this->strTemplate = 'IngredientSourceEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the IngredientSourceMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctIngredientSource = IngredientSourceMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on IngredientSource's data fields
			$this->lblId = $this->mctIngredientSource->lblId_Create();
			$this->lstIngredient = $this->mctIngredientSource->lstIngredient_Create();
			$this->lstLocation = $this->mctIngredientSource->lstLocation_Create();
			$this->txtCost = $this->mctIngredientSource->txtCost_Create();
			$this->lstQuality = $this->mctIngredientSource->lstQuality_Create();
			$this->txtComments = $this->mctIngredientSource->txtComments_Create();
			$this->txtName = $this->mctIngredientSource->txtName_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('IngredientSource') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctIngredientSource->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the IngredientSourceMetaControl
			$this->mctIngredientSource->SaveIngredientSource();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the IngredientSourceMetaControl
			$this->mctIngredientSource->DeleteIngredientSource();
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
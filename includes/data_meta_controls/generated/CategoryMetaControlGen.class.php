<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Category class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Category object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CategoryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Category $Category the actual Category data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $GroupControl
	 * property-read QLabel $GroupLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $RecipeControl
	 * property-read QLabel $RecipeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CategoryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Category objCategory
		 * @access protected
		 */
		protected $objCategory;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of Category's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtGroup;
         * @access protected
         */
		protected $txtGroup;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of Category's individual data fields
        /**
         * @var QLabel lblGroup
         * @access protected
         */
		protected $lblGroup;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstRecipes;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblRecipes;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CategoryMetaControl to edit a single Category object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Category object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param Category $objCategory new or existing Category object
		 */
		 public function __construct($objParentObject, Category $objCategory) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CategoryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Category object
			$this->objCategory = $objCategory;

			// Figure out if we're Editing or Creating New
			if ($this->objCategory->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
 		 * @return CategoryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCategory = Category::Load($intId);

				// Category was found -- return it!
				if ($objCategory)
					return new CategoryMetaControl($objParentObject, $objCategory);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Category object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CategoryMetaControl($objParentObject, new Category());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
		 * @return CategoryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CategoryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Category object creation - defaults to CreateOrEdit
		 * @return CategoryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CategoryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objCategory->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtGroup
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGroup_Create($strControlId = null) {
			$this->txtGroup = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGroup->Name = QApplication::Translate('Group');
			$this->txtGroup->Text = $this->objCategory->Group;
			$this->txtGroup->MaxLength = Category::GroupMaxLength;
			return $this->txtGroup;
		}

		/**
		 * Create and setup QLabel lblGroup
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroup_Create($strControlId = null) {
			$this->lblGroup = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroup->Name = QApplication::Translate('Group');
			$this->lblGroup->Text = $this->objCategory->Group;
			return $this->lblGroup;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objCategory->Name;
			$this->txtName->MaxLength = Category::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objCategory->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstRecipes
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRecipes_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRecipes = new QListBox($this->objParentObject, $strControlId);
			$this->lstRecipes->Name = QApplication::Translate('Recipes');
			$this->lstRecipes->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objCategory->GetRecipeArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRecipeCursor = Recipe::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRecipe = Recipe::InstantiateCursor($objRecipeCursor)) {
				$objListItem = new QListItem($objRecipe->__toString(), $objRecipe->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objRecipe->Id)
						$objListItem->Selected = true;
				}
				$this->lstRecipes->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstRecipes;
		}

		/**
		 * Create and setup QLabel lblRecipes
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblRecipes_Create($strControlId = null, $strGlue = ', ') {
			$this->lblRecipes = new QLabel($this->objParentObject, $strControlId);
			$this->lstRecipes->Name = QApplication::Translate('Recipes');
			
			$objAssociatedArray = $this->objCategory->GetRecipeArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblRecipes->Text = implode($strGlue, $strItems);
			return $this->lblRecipes;
		}



		/**
		 * Refresh this MetaControl with Data from the local Category object.
		 * @param boolean $blnReload reload Category from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCategory->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCategory->Id;

			if ($this->txtGroup) $this->txtGroup->Text = $this->objCategory->Group;
			if ($this->lblGroup) $this->lblGroup->Text = $this->objCategory->Group;

			if ($this->txtName) $this->txtName->Text = $this->objCategory->Name;
			if ($this->lblName) $this->lblName->Text = $this->objCategory->Name;

			if ($this->lstRecipes) {
				$this->lstRecipes->RemoveAllItems();
				$objAssociatedArray = $this->objCategory->GetRecipeArray();
				$objRecipeArray = Recipe::LoadAll();
				if ($objRecipeArray) foreach ($objRecipeArray as $objRecipe) {
					$objListItem = new QListItem($objRecipe->__toString(), $objRecipe->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objRecipe->Id)
							$objListItem->Selected = true;
					}
					$this->lstRecipes->AddItem($objListItem);
				}
			}
			if ($this->lblRecipes) {
				$objAssociatedArray = $this->objCategory->GetRecipeArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblRecipes->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstRecipes_Update() {
			if ($this->lstRecipes) {
				$this->objCategory->UnassociateAllRecipes();
				$objSelectedListItems = $this->lstRecipes->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCategory->AssociateRecipe(Recipe::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC CATEGORY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Category instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCategory() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtGroup) $this->objCategory->Group = $this->txtGroup->Text;
				if ($this->txtName) $this->objCategory->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Category object
				$this->objCategory->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstRecipes_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Category instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCategory() {
			$this->objCategory->UnassociateAllRecipes();
			$this->objCategory->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'Category': return $this->objCategory;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Category fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'GroupControl':
					if (!$this->txtGroup) return $this->txtGroup_Create();
					return $this->txtGroup;
				case 'GroupLabel':
					if (!$this->lblGroup) return $this->lblGroup_Create();
					return $this->lblGroup;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'RecipeControl':
					if (!$this->lstRecipes) return $this->lstRecipes_Create();
					return $this->lstRecipes;
				case 'RecipeLabel':
					if (!$this->lblRecipes) return $this->lblRecipes_Create();
					return $this->lblRecipes;
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			try {
				switch ($strName) {
					// Controls that point to Category fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'GroupControl':
						return ($this->txtGroup = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'RecipeControl':
						return ($this->lstRecipes = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>
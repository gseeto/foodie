<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Menu class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Menu object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MenuMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Menu $Menu the actual Menu data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QListBox $OwnerIdControl
	 * property-read QLabel $OwnerIdLabel
	 * property QListBox $RecipeControl
	 * property-read QLabel $RecipeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MenuMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Menu objMenu
		 * @access protected
		 */
		protected $objMenu;

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

		// Controls that allow the editing of Menu's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QListBox lstOwner;
         * @access protected
         */
		protected $lstOwner;


		// Controls that allow the viewing of Menu's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblOwnerId
         * @access protected
         */
		protected $lblOwnerId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstRecipes;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblRecipes;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MenuMetaControl to edit a single Menu object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Menu object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MenuMetaControl
		 * @param Menu $objMenu new or existing Menu object
		 */
		 public function __construct($objParentObject, Menu $objMenu) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MenuMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Menu object
			$this->objMenu = $objMenu;

			// Figure out if we're Editing or Creating New
			if ($this->objMenu->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this MenuMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Menu object creation - defaults to CreateOrEdit
 		 * @return MenuMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objMenu = Menu::Load($intId);

				// Menu was found -- return it!
				if ($objMenu)
					return new MenuMetaControl($objParentObject, $objMenu);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Menu object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MenuMetaControl($objParentObject, new Menu());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MenuMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Menu object creation - defaults to CreateOrEdit
		 * @return MenuMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return MenuMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MenuMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Menu object creation - defaults to CreateOrEdit
		 * @return MenuMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return MenuMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objMenu->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objMenu->Name;
			$this->txtName->MaxLength = Menu::NameMaxLength;
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
			$this->lblName->Text = $this->objMenu->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objMenu->Description;
			$this->txtDescription->MaxLength = Menu::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objMenu->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QListBox lstOwner
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstOwner_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstOwner = new QListBox($this->objParentObject, $strControlId);
			$this->lstOwner->Name = QApplication::Translate('Owner');
			$this->lstOwner->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objOwnerCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objOwner = Login::InstantiateCursor($objOwnerCursor)) {
				$objListItem = new QListItem($objOwner->__toString(), $objOwner->Id);
				if (($this->objMenu->Owner) && ($this->objMenu->Owner->Id == $objOwner->Id))
					$objListItem->Selected = true;
				$this->lstOwner->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstOwner;
		}

		/**
		 * Create and setup QLabel lblOwnerId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOwnerId_Create($strControlId = null) {
			$this->lblOwnerId = new QLabel($this->objParentObject, $strControlId);
			$this->lblOwnerId->Name = QApplication::Translate('Owner');
			$this->lblOwnerId->Text = ($this->objMenu->Owner) ? $this->objMenu->Owner->__toString() : null;
			return $this->lblOwnerId;
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
			$objAssociatedArray = $this->objMenu->GetRecipeArray();

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
			
			$objAssociatedArray = $this->objMenu->GetRecipeArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblRecipes->Text = implode($strGlue, $strItems);
			return $this->lblRecipes;
		}



		/**
		 * Refresh this MetaControl with Data from the local Menu object.
		 * @param boolean $blnReload reload Menu from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMenu->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objMenu->Id;

			if ($this->txtName) $this->txtName->Text = $this->objMenu->Name;
			if ($this->lblName) $this->lblName->Text = $this->objMenu->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objMenu->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objMenu->Description;

			if ($this->lstOwner) {
					$this->lstOwner->RemoveAllItems();
				$this->lstOwner->AddItem(QApplication::Translate('- Select One -'), null);
				$objOwnerArray = Login::LoadAll();
				if ($objOwnerArray) foreach ($objOwnerArray as $objOwner) {
					$objListItem = new QListItem($objOwner->__toString(), $objOwner->Id);
					if (($this->objMenu->Owner) && ($this->objMenu->Owner->Id == $objOwner->Id))
						$objListItem->Selected = true;
					$this->lstOwner->AddItem($objListItem);
				}
			}
			if ($this->lblOwnerId) $this->lblOwnerId->Text = ($this->objMenu->Owner) ? $this->objMenu->Owner->__toString() : null;

			if ($this->lstRecipes) {
				$this->lstRecipes->RemoveAllItems();
				$objAssociatedArray = $this->objMenu->GetRecipeArray();
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
				$objAssociatedArray = $this->objMenu->GetRecipeArray();
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
				$this->objMenu->UnassociateAllRecipes();
				$objSelectedListItems = $this->lstRecipes->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objMenu->AssociateRecipe(Recipe::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC MENU OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Menu instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMenu() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objMenu->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objMenu->Description = $this->txtDescription->Text;
				if ($this->lstOwner) $this->objMenu->OwnerId = $this->lstOwner->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Menu object
				$this->objMenu->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstRecipes_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Menu instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMenu() {
			$this->objMenu->UnassociateAllRecipes();
			$this->objMenu->Delete();
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
				case 'Menu': return $this->objMenu;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Menu fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'OwnerIdControl':
					if (!$this->lstOwner) return $this->lstOwner_Create();
					return $this->lstOwner;
				case 'OwnerIdLabel':
					if (!$this->lblOwnerId) return $this->lblOwnerId_Create();
					return $this->lblOwnerId;
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
					// Controls that point to Menu fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'OwnerIdControl':
						return ($this->lstOwner = QType::Cast($mixValue, 'QControl'));
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
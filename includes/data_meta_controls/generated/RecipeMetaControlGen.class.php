<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Recipe class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Recipe object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RecipeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Recipe $Recipe the actual Recipe data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $InstructionsControl
	 * property-read QLabel $InstructionsLabel
	 * property QFloatTextBox $PreparationTimeControl
	 * property-read QLabel $PreparationTimeLabel
	 * property QIntegerTextBox $ServingSizeControl
	 * property-read QLabel $ServingSizeLabel
	 * property QListBox $OwnerIdControl
	 * property-read QLabel $OwnerIdLabel
	 * property QListBox $MealTypeIdControl
	 * property-read QLabel $MealTypeIdLabel
	 * property QListBox $MenuControl
	 * property-read QLabel $MenuLabel
	 * property QListBox $CategoryControl
	 * property-read QLabel $CategoryLabel
	 * property QListBox $IngredientControl
	 * property-read QLabel $IngredientLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RecipeMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Recipe objRecipe
		 * @access protected
		 */
		protected $objRecipe;

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

		// Controls that allow the editing of Recipe's individual data fields
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
         * @var QTextBox txtInstructions;
         * @access protected
         */
		protected $txtInstructions;

        /**
         * @var QFloatTextBox txtPreparationTime;
         * @access protected
         */
		protected $txtPreparationTime;

        /**
         * @var QIntegerTextBox txtServingSize;
         * @access protected
         */
		protected $txtServingSize;

        /**
         * @var QListBox lstOwner;
         * @access protected
         */
		protected $lstOwner;

        /**
         * @var QListBox lstMealType;
         * @access protected
         */
		protected $lstMealType;


		// Controls that allow the viewing of Recipe's individual data fields
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
         * @var QLabel lblInstructions
         * @access protected
         */
		protected $lblInstructions;

        /**
         * @var QLabel lblPreparationTime
         * @access protected
         */
		protected $lblPreparationTime;

        /**
         * @var QLabel lblServingSize
         * @access protected
         */
		protected $lblServingSize;

        /**
         * @var QLabel lblOwnerId
         * @access protected
         */
		protected $lblOwnerId;

        /**
         * @var QLabel lblMealTypeId
         * @access protected
         */
		protected $lblMealTypeId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstMenus;

		protected $lstCategories;

		protected $lstIngredients;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblMenus;

		protected $lblCategories;

		protected $lblIngredients;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RecipeMetaControl to edit a single Recipe object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Recipe object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecipeMetaControl
		 * @param Recipe $objRecipe new or existing Recipe object
		 */
		 public function __construct($objParentObject, Recipe $objRecipe) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RecipeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Recipe object
			$this->objRecipe = $objRecipe;

			// Figure out if we're Editing or Creating New
			if ($this->objRecipe->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecipeMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Recipe object creation - defaults to CreateOrEdit
 		 * @return RecipeMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objRecipe = Recipe::Load($intId);

				// Recipe was found -- return it!
				if ($objRecipe)
					return new RecipeMetaControl($objParentObject, $objRecipe);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Recipe object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RecipeMetaControl($objParentObject, new Recipe());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecipeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Recipe object creation - defaults to CreateOrEdit
		 * @return RecipeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return RecipeMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RecipeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Recipe object creation - defaults to CreateOrEdit
		 * @return RecipeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return RecipeMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objRecipe->Id;
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
			$this->txtName->Text = $this->objRecipe->Name;
			$this->txtName->MaxLength = Recipe::NameMaxLength;
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
			$this->lblName->Text = $this->objRecipe->Name;
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
			$this->txtDescription->Text = $this->objRecipe->Description;
			$this->txtDescription->MaxLength = Recipe::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objRecipe->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtInstructions
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtInstructions_Create($strControlId = null) {
			$this->txtInstructions = new QTextBox($this->objParentObject, $strControlId);
			$this->txtInstructions->Name = QApplication::Translate('Instructions');
			$this->txtInstructions->Text = $this->objRecipe->Instructions;
			$this->txtInstructions->MaxLength = Recipe::InstructionsMaxLength;
			return $this->txtInstructions;
		}

		/**
		 * Create and setup QLabel lblInstructions
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInstructions_Create($strControlId = null) {
			$this->lblInstructions = new QLabel($this->objParentObject, $strControlId);
			$this->lblInstructions->Name = QApplication::Translate('Instructions');
			$this->lblInstructions->Text = $this->objRecipe->Instructions;
			return $this->lblInstructions;
		}

		/**
		 * Create and setup QFloatTextBox txtPreparationTime
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtPreparationTime_Create($strControlId = null) {
			$this->txtPreparationTime = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtPreparationTime->Name = QApplication::Translate('Preparation Time');
			$this->txtPreparationTime->Text = $this->objRecipe->PreparationTime;
			return $this->txtPreparationTime;
		}

		/**
		 * Create and setup QLabel lblPreparationTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPreparationTime_Create($strControlId = null, $strFormat = null) {
			$this->lblPreparationTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblPreparationTime->Name = QApplication::Translate('Preparation Time');
			$this->lblPreparationTime->Text = $this->objRecipe->PreparationTime;
			$this->lblPreparationTime->Format = $strFormat;
			return $this->lblPreparationTime;
		}

		/**
		 * Create and setup QIntegerTextBox txtServingSize
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtServingSize_Create($strControlId = null) {
			$this->txtServingSize = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtServingSize->Name = QApplication::Translate('Serving Size');
			$this->txtServingSize->Text = $this->objRecipe->ServingSize;
			return $this->txtServingSize;
		}

		/**
		 * Create and setup QLabel lblServingSize
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblServingSize_Create($strControlId = null, $strFormat = null) {
			$this->lblServingSize = new QLabel($this->objParentObject, $strControlId);
			$this->lblServingSize->Name = QApplication::Translate('Serving Size');
			$this->lblServingSize->Text = $this->objRecipe->ServingSize;
			$this->lblServingSize->Format = $strFormat;
			return $this->lblServingSize;
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
				if (($this->objRecipe->Owner) && ($this->objRecipe->Owner->Id == $objOwner->Id))
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
			$this->lblOwnerId->Text = ($this->objRecipe->Owner) ? $this->objRecipe->Owner->__toString() : null;
			return $this->lblOwnerId;
		}

		/**
		 * Create and setup QListBox lstMealType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstMealType_Create($strControlId = null) {
			$this->lstMealType = new QListBox($this->objParentObject, $strControlId);
			$this->lstMealType->Name = QApplication::Translate('Meal Type');
			$this->lstMealType->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstMealType->AddItems(MealType::$NameArray, $this->objRecipe->MealTypeId);
			return $this->lstMealType;
		}

		/**
		 * Create and setup QLabel lblMealTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMealTypeId_Create($strControlId = null) {
			$this->lblMealTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblMealTypeId->Name = QApplication::Translate('Meal Type');
			$this->lblMealTypeId->Text = ($this->objRecipe->MealTypeId) ? MealType::$NameArray[$this->objRecipe->MealTypeId] : null;
			return $this->lblMealTypeId;
		}

		/**
		 * Create and setup QListBox lstMenus
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstMenus_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstMenus = new QListBox($this->objParentObject, $strControlId);
			$this->lstMenus->Name = QApplication::Translate('Menus');
			$this->lstMenus->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objRecipe->GetMenuArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objMenuCursor = Menu::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objMenu = Menu::InstantiateCursor($objMenuCursor)) {
				$objListItem = new QListItem($objMenu->__toString(), $objMenu->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objMenu->Id)
						$objListItem->Selected = true;
				}
				$this->lstMenus->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstMenus;
		}

		/**
		 * Create and setup QLabel lblMenus
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblMenus_Create($strControlId = null, $strGlue = ', ') {
			$this->lblMenus = new QLabel($this->objParentObject, $strControlId);
			$this->lstMenus->Name = QApplication::Translate('Menus');
			
			$objAssociatedArray = $this->objRecipe->GetMenuArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblMenus->Text = implode($strGlue, $strItems);
			return $this->lblMenus;
		}

		/**
		 * Create and setup QListBox lstCategories
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCategories_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCategories = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategories->Name = QApplication::Translate('Categories');
			$this->lstCategories->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objRecipe->GetCategoryArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCategoryCursor = Category::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCategory = Category::InstantiateCursor($objCategoryCursor)) {
				$objListItem = new QListItem($objCategory->__toString(), $objCategory->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCategory->Id)
						$objListItem->Selected = true;
				}
				$this->lstCategories->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCategories;
		}

		/**
		 * Create and setup QLabel lblCategories
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCategories_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCategories = new QLabel($this->objParentObject, $strControlId);
			$this->lstCategories->Name = QApplication::Translate('Categories');
			
			$objAssociatedArray = $this->objRecipe->GetCategoryArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCategories->Text = implode($strGlue, $strItems);
			return $this->lblCategories;
		}

		/**
		 * Create and setup QListBox lstIngredients
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIngredients_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIngredients = new QListBox($this->objParentObject, $strControlId);
			$this->lstIngredients->Name = QApplication::Translate('Ingredients');
			$this->lstIngredients->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objRecipe->GetIngredientArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIngredientCursor = Ingredient::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIngredient = Ingredient::InstantiateCursor($objIngredientCursor)) {
				$objListItem = new QListItem($objIngredient->__toString(), $objIngredient->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objIngredient->Id)
						$objListItem->Selected = true;
				}
				$this->lstIngredients->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstIngredients;
		}

		/**
		 * Create and setup QLabel lblIngredients
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblIngredients_Create($strControlId = null, $strGlue = ', ') {
			$this->lblIngredients = new QLabel($this->objParentObject, $strControlId);
			$this->lstIngredients->Name = QApplication::Translate('Ingredients');
			
			$objAssociatedArray = $this->objRecipe->GetIngredientArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblIngredients->Text = implode($strGlue, $strItems);
			return $this->lblIngredients;
		}



		/**
		 * Refresh this MetaControl with Data from the local Recipe object.
		 * @param boolean $blnReload reload Recipe from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRecipe->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objRecipe->Id;

			if ($this->txtName) $this->txtName->Text = $this->objRecipe->Name;
			if ($this->lblName) $this->lblName->Text = $this->objRecipe->Name;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objRecipe->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objRecipe->Description;

			if ($this->txtInstructions) $this->txtInstructions->Text = $this->objRecipe->Instructions;
			if ($this->lblInstructions) $this->lblInstructions->Text = $this->objRecipe->Instructions;

			if ($this->txtPreparationTime) $this->txtPreparationTime->Text = $this->objRecipe->PreparationTime;
			if ($this->lblPreparationTime) $this->lblPreparationTime->Text = $this->objRecipe->PreparationTime;

			if ($this->txtServingSize) $this->txtServingSize->Text = $this->objRecipe->ServingSize;
			if ($this->lblServingSize) $this->lblServingSize->Text = $this->objRecipe->ServingSize;

			if ($this->lstOwner) {
					$this->lstOwner->RemoveAllItems();
				$this->lstOwner->AddItem(QApplication::Translate('- Select One -'), null);
				$objOwnerArray = Login::LoadAll();
				if ($objOwnerArray) foreach ($objOwnerArray as $objOwner) {
					$objListItem = new QListItem($objOwner->__toString(), $objOwner->Id);
					if (($this->objRecipe->Owner) && ($this->objRecipe->Owner->Id == $objOwner->Id))
						$objListItem->Selected = true;
					$this->lstOwner->AddItem($objListItem);
				}
			}
			if ($this->lblOwnerId) $this->lblOwnerId->Text = ($this->objRecipe->Owner) ? $this->objRecipe->Owner->__toString() : null;

			if ($this->lstMealType) $this->lstMealType->SelectedValue = $this->objRecipe->MealTypeId;
			if ($this->lblMealTypeId) $this->lblMealTypeId->Text = ($this->objRecipe->MealTypeId) ? MealType::$NameArray[$this->objRecipe->MealTypeId] : null;

			if ($this->lstMenus) {
				$this->lstMenus->RemoveAllItems();
				$objAssociatedArray = $this->objRecipe->GetMenuArray();
				$objMenuArray = Menu::LoadAll();
				if ($objMenuArray) foreach ($objMenuArray as $objMenu) {
					$objListItem = new QListItem($objMenu->__toString(), $objMenu->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objMenu->Id)
							$objListItem->Selected = true;
					}
					$this->lstMenus->AddItem($objListItem);
				}
			}
			if ($this->lblMenus) {
				$objAssociatedArray = $this->objRecipe->GetMenuArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblMenus->Text = implode($strGlue, $strItems);
			}

			if ($this->lstCategories) {
				$this->lstCategories->RemoveAllItems();
				$objAssociatedArray = $this->objRecipe->GetCategoryArray();
				$objCategoryArray = Category::LoadAll();
				if ($objCategoryArray) foreach ($objCategoryArray as $objCategory) {
					$objListItem = new QListItem($objCategory->__toString(), $objCategory->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCategory->Id)
							$objListItem->Selected = true;
					}
					$this->lstCategories->AddItem($objListItem);
				}
			}
			if ($this->lblCategories) {
				$objAssociatedArray = $this->objRecipe->GetCategoryArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCategories->Text = implode($strGlue, $strItems);
			}

			if ($this->lstIngredients) {
				$this->lstIngredients->RemoveAllItems();
				$objAssociatedArray = $this->objRecipe->GetIngredientArray();
				$objIngredientArray = Ingredient::LoadAll();
				if ($objIngredientArray) foreach ($objIngredientArray as $objIngredient) {
					$objListItem = new QListItem($objIngredient->__toString(), $objIngredient->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objIngredient->Id)
							$objListItem->Selected = true;
					}
					$this->lstIngredients->AddItem($objListItem);
				}
			}
			if ($this->lblIngredients) {
				$objAssociatedArray = $this->objRecipe->GetIngredientArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblIngredients->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstMenus_Update() {
			if ($this->lstMenus) {
				$this->objRecipe->UnassociateAllMenus();
				$objSelectedListItems = $this->lstMenus->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objRecipe->AssociateMenu(Menu::Load($objListItem->Value));
				}
			}
		}

		protected function lstCategories_Update() {
			if ($this->lstCategories) {
				$this->objRecipe->UnassociateAllCategories();
				$objSelectedListItems = $this->lstCategories->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objRecipe->AssociateCategory(Category::Load($objListItem->Value));
				}
			}
		}

		protected function lstIngredients_Update() {
			if ($this->lstIngredients) {
				$this->objRecipe->UnassociateAllIngredients();
				$objSelectedListItems = $this->lstIngredients->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objRecipe->AssociateIngredient(Ingredient::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC RECIPE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Recipe instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRecipe() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objRecipe->Name = $this->txtName->Text;
				if ($this->txtDescription) $this->objRecipe->Description = $this->txtDescription->Text;
				if ($this->txtInstructions) $this->objRecipe->Instructions = $this->txtInstructions->Text;
				if ($this->txtPreparationTime) $this->objRecipe->PreparationTime = $this->txtPreparationTime->Text;
				if ($this->txtServingSize) $this->objRecipe->ServingSize = $this->txtServingSize->Text;
				if ($this->lstOwner) $this->objRecipe->OwnerId = $this->lstOwner->SelectedValue;
				if ($this->lstMealType) $this->objRecipe->MealTypeId = $this->lstMealType->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Recipe object
				$this->objRecipe->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstMenus_Update();
				$this->lstCategories_Update();
				$this->lstIngredients_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Recipe instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRecipe() {
			$this->objRecipe->UnassociateAllMenus();
			$this->objRecipe->UnassociateAllCategories();
			$this->objRecipe->UnassociateAllIngredients();
			$this->objRecipe->Delete();
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
				case 'Recipe': return $this->objRecipe;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Recipe fields -- will be created dynamically if not yet created
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
				case 'InstructionsControl':
					if (!$this->txtInstructions) return $this->txtInstructions_Create();
					return $this->txtInstructions;
				case 'InstructionsLabel':
					if (!$this->lblInstructions) return $this->lblInstructions_Create();
					return $this->lblInstructions;
				case 'PreparationTimeControl':
					if (!$this->txtPreparationTime) return $this->txtPreparationTime_Create();
					return $this->txtPreparationTime;
				case 'PreparationTimeLabel':
					if (!$this->lblPreparationTime) return $this->lblPreparationTime_Create();
					return $this->lblPreparationTime;
				case 'ServingSizeControl':
					if (!$this->txtServingSize) return $this->txtServingSize_Create();
					return $this->txtServingSize;
				case 'ServingSizeLabel':
					if (!$this->lblServingSize) return $this->lblServingSize_Create();
					return $this->lblServingSize;
				case 'OwnerIdControl':
					if (!$this->lstOwner) return $this->lstOwner_Create();
					return $this->lstOwner;
				case 'OwnerIdLabel':
					if (!$this->lblOwnerId) return $this->lblOwnerId_Create();
					return $this->lblOwnerId;
				case 'MealTypeIdControl':
					if (!$this->lstMealType) return $this->lstMealType_Create();
					return $this->lstMealType;
				case 'MealTypeIdLabel':
					if (!$this->lblMealTypeId) return $this->lblMealTypeId_Create();
					return $this->lblMealTypeId;
				case 'MenuControl':
					if (!$this->lstMenus) return $this->lstMenus_Create();
					return $this->lstMenus;
				case 'MenuLabel':
					if (!$this->lblMenus) return $this->lblMenus_Create();
					return $this->lblMenus;
				case 'CategoryControl':
					if (!$this->lstCategories) return $this->lstCategories_Create();
					return $this->lstCategories;
				case 'CategoryLabel':
					if (!$this->lblCategories) return $this->lblCategories_Create();
					return $this->lblCategories;
				case 'IngredientControl':
					if (!$this->lstIngredients) return $this->lstIngredients_Create();
					return $this->lstIngredients;
				case 'IngredientLabel':
					if (!$this->lblIngredients) return $this->lblIngredients_Create();
					return $this->lblIngredients;
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
					// Controls that point to Recipe fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'InstructionsControl':
						return ($this->txtInstructions = QType::Cast($mixValue, 'QControl'));
					case 'PreparationTimeControl':
						return ($this->txtPreparationTime = QType::Cast($mixValue, 'QControl'));
					case 'ServingSizeControl':
						return ($this->txtServingSize = QType::Cast($mixValue, 'QControl'));
					case 'OwnerIdControl':
						return ($this->lstOwner = QType::Cast($mixValue, 'QControl'));
					case 'MealTypeIdControl':
						return ($this->lstMealType = QType::Cast($mixValue, 'QControl'));
					case 'MenuControl':
						return ($this->lstMenus = QType::Cast($mixValue, 'QControl'));
					case 'CategoryControl':
						return ($this->lstCategories = QType::Cast($mixValue, 'QControl'));
					case 'IngredientControl':
						return ($this->lstIngredients = QType::Cast($mixValue, 'QControl'));
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
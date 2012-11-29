<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Ingredient class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Ingredient object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IngredientMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Ingredient $Ingredient the actual Ingredient data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $UnitOfMeasurementIdControl
	 * property-read QLabel $UnitOfMeasurementIdLabel
	 * property QFloatTextBox $InitialAmountControl
	 * property-read QLabel $InitialAmountLabel
	 * property QFloatTextBox $CostControl
	 * property-read QLabel $CostLabel
	 * property QListBox $CostUnitOfMeasurementControl
	 * property-read QLabel $CostUnitOfMeasurementLabel
	 * property QListBox $RecipeControl
	 * property-read QLabel $RecipeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IngredientMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Ingredient objIngredient
		 * @access protected
		 */
		protected $objIngredient;

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

		// Controls that allow the editing of Ingredient's individual data fields
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
         * @var QListBox lstUnitOfMeasurement;
         * @access protected
         */
		protected $lstUnitOfMeasurement;

        /**
         * @var QFloatTextBox txtInitialAmount;
         * @access protected
         */
		protected $txtInitialAmount;

        /**
         * @var QFloatTextBox txtCost;
         * @access protected
         */
		protected $txtCost;

        /**
         * @var QListBox lstCostUnitOfMeasurementObject;
         * @access protected
         */
		protected $lstCostUnitOfMeasurementObject;


		// Controls that allow the viewing of Ingredient's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblUnitOfMeasurementId
         * @access protected
         */
		protected $lblUnitOfMeasurementId;

        /**
         * @var QLabel lblInitialAmount
         * @access protected
         */
		protected $lblInitialAmount;

        /**
         * @var QLabel lblCost
         * @access protected
         */
		protected $lblCost;

        /**
         * @var QLabel lblCostUnitOfMeasurement
         * @access protected
         */
		protected $lblCostUnitOfMeasurement;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstRecipes;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblRecipes;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IngredientMetaControl to edit a single Ingredient object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Ingredient object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientMetaControl
		 * @param Ingredient $objIngredient new or existing Ingredient object
		 */
		 public function __construct($objParentObject, Ingredient $objIngredient) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IngredientMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Ingredient object
			$this->objIngredient = $objIngredient;

			// Figure out if we're Editing or Creating New
			if ($this->objIngredient->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Ingredient object creation - defaults to CreateOrEdit
 		 * @return IngredientMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIngredient = Ingredient::Load($intId);

				// Ingredient was found -- return it!
				if ($objIngredient)
					return new IngredientMetaControl($objParentObject, $objIngredient);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Ingredient object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IngredientMetaControl($objParentObject, new Ingredient());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Ingredient object creation - defaults to CreateOrEdit
		 * @return IngredientMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IngredientMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Ingredient object creation - defaults to CreateOrEdit
		 * @return IngredientMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IngredientMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIngredient->Id;
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
			$this->txtName->Text = $this->objIngredient->Name;
			$this->txtName->MaxLength = Ingredient::NameMaxLength;
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
			$this->lblName->Text = $this->objIngredient->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstUnitOfMeasurement
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstUnitOfMeasurement_Create($strControlId = null) {
			$this->lstUnitOfMeasurement = new QListBox($this->objParentObject, $strControlId);
			$this->lstUnitOfMeasurement->Name = QApplication::Translate('Unit Of Measurement');
			$this->lstUnitOfMeasurement->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstUnitOfMeasurement->AddItems(UnitOfMeasurementType::$NameArray, $this->objIngredient->UnitOfMeasurementId);
			return $this->lstUnitOfMeasurement;
		}

		/**
		 * Create and setup QLabel lblUnitOfMeasurementId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUnitOfMeasurementId_Create($strControlId = null) {
			$this->lblUnitOfMeasurementId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUnitOfMeasurementId->Name = QApplication::Translate('Unit Of Measurement');
			$this->lblUnitOfMeasurementId->Text = ($this->objIngredient->UnitOfMeasurementId) ? UnitOfMeasurementType::$NameArray[$this->objIngredient->UnitOfMeasurementId] : null;
			return $this->lblUnitOfMeasurementId;
		}

		/**
		 * Create and setup QFloatTextBox txtInitialAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtInitialAmount_Create($strControlId = null) {
			$this->txtInitialAmount = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtInitialAmount->Name = QApplication::Translate('Initial Amount');
			$this->txtInitialAmount->Text = $this->objIngredient->InitialAmount;
			return $this->txtInitialAmount;
		}

		/**
		 * Create and setup QLabel lblInitialAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblInitialAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblInitialAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblInitialAmount->Name = QApplication::Translate('Initial Amount');
			$this->lblInitialAmount->Text = $this->objIngredient->InitialAmount;
			$this->lblInitialAmount->Format = $strFormat;
			return $this->lblInitialAmount;
		}

		/**
		 * Create and setup QFloatTextBox txtCost
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtCost_Create($strControlId = null) {
			$this->txtCost = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtCost->Name = QApplication::Translate('Cost');
			$this->txtCost->Text = $this->objIngredient->Cost;
			return $this->txtCost;
		}

		/**
		 * Create and setup QLabel lblCost
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCost_Create($strControlId = null, $strFormat = null) {
			$this->lblCost = new QLabel($this->objParentObject, $strControlId);
			$this->lblCost->Name = QApplication::Translate('Cost');
			$this->lblCost->Text = $this->objIngredient->Cost;
			$this->lblCost->Format = $strFormat;
			return $this->lblCost;
		}

		/**
		 * Create and setup QListBox lstCostUnitOfMeasurementObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCostUnitOfMeasurementObject_Create($strControlId = null) {
			$this->lstCostUnitOfMeasurementObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstCostUnitOfMeasurementObject->Name = QApplication::Translate('Cost Unit Of Measurement Object');
			$this->lstCostUnitOfMeasurementObject->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstCostUnitOfMeasurementObject->AddItems(UnitOfMeasurementType::$NameArray, $this->objIngredient->CostUnitOfMeasurement);
			return $this->lstCostUnitOfMeasurementObject;
		}

		/**
		 * Create and setup QLabel lblCostUnitOfMeasurement
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCostUnitOfMeasurement_Create($strControlId = null) {
			$this->lblCostUnitOfMeasurement = new QLabel($this->objParentObject, $strControlId);
			$this->lblCostUnitOfMeasurement->Name = QApplication::Translate('Cost Unit Of Measurement Object');
			$this->lblCostUnitOfMeasurement->Text = ($this->objIngredient->CostUnitOfMeasurement) ? UnitOfMeasurementType::$NameArray[$this->objIngredient->CostUnitOfMeasurement] : null;
			return $this->lblCostUnitOfMeasurement;
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
			$objAssociatedArray = $this->objIngredient->GetRecipeArray();

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
			
			$objAssociatedArray = $this->objIngredient->GetRecipeArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblRecipes->Text = implode($strGlue, $strItems);
			return $this->lblRecipes;
		}



		/**
		 * Refresh this MetaControl with Data from the local Ingredient object.
		 * @param boolean $blnReload reload Ingredient from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIngredient->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIngredient->Id;

			if ($this->txtName) $this->txtName->Text = $this->objIngredient->Name;
			if ($this->lblName) $this->lblName->Text = $this->objIngredient->Name;

			if ($this->lstUnitOfMeasurement) $this->lstUnitOfMeasurement->SelectedValue = $this->objIngredient->UnitOfMeasurementId;
			if ($this->lblUnitOfMeasurementId) $this->lblUnitOfMeasurementId->Text = ($this->objIngredient->UnitOfMeasurementId) ? UnitOfMeasurementType::$NameArray[$this->objIngredient->UnitOfMeasurementId] : null;

			if ($this->txtInitialAmount) $this->txtInitialAmount->Text = $this->objIngredient->InitialAmount;
			if ($this->lblInitialAmount) $this->lblInitialAmount->Text = $this->objIngredient->InitialAmount;

			if ($this->txtCost) $this->txtCost->Text = $this->objIngredient->Cost;
			if ($this->lblCost) $this->lblCost->Text = $this->objIngredient->Cost;

			if ($this->lstCostUnitOfMeasurementObject) $this->lstCostUnitOfMeasurementObject->SelectedValue = $this->objIngredient->CostUnitOfMeasurement;
			if ($this->lblCostUnitOfMeasurement) $this->lblCostUnitOfMeasurement->Text = ($this->objIngredient->CostUnitOfMeasurement) ? UnitOfMeasurementType::$NameArray[$this->objIngredient->CostUnitOfMeasurement] : null;

			if ($this->lstRecipes) {
				$this->lstRecipes->RemoveAllItems();
				$objAssociatedArray = $this->objIngredient->GetRecipeArray();
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
				$objAssociatedArray = $this->objIngredient->GetRecipeArray();
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
				$this->objIngredient->UnassociateAllRecipes();
				$objSelectedListItems = $this->lstRecipes->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objIngredient->AssociateRecipe(Recipe::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC INGREDIENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Ingredient instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIngredient() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objIngredient->Name = $this->txtName->Text;
				if ($this->lstUnitOfMeasurement) $this->objIngredient->UnitOfMeasurementId = $this->lstUnitOfMeasurement->SelectedValue;
				if ($this->txtInitialAmount) $this->objIngredient->InitialAmount = $this->txtInitialAmount->Text;
				if ($this->txtCost) $this->objIngredient->Cost = $this->txtCost->Text;
				if ($this->lstCostUnitOfMeasurementObject) $this->objIngredient->CostUnitOfMeasurement = $this->lstCostUnitOfMeasurementObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Ingredient object
				$this->objIngredient->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstRecipes_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Ingredient instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIngredient() {
			$this->objIngredient->UnassociateAllRecipes();
			$this->objIngredient->Delete();
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
				case 'Ingredient': return $this->objIngredient;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Ingredient fields -- will be created dynamically if not yet created
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
				case 'UnitOfMeasurementIdControl':
					if (!$this->lstUnitOfMeasurement) return $this->lstUnitOfMeasurement_Create();
					return $this->lstUnitOfMeasurement;
				case 'UnitOfMeasurementIdLabel':
					if (!$this->lblUnitOfMeasurementId) return $this->lblUnitOfMeasurementId_Create();
					return $this->lblUnitOfMeasurementId;
				case 'InitialAmountControl':
					if (!$this->txtInitialAmount) return $this->txtInitialAmount_Create();
					return $this->txtInitialAmount;
				case 'InitialAmountLabel':
					if (!$this->lblInitialAmount) return $this->lblInitialAmount_Create();
					return $this->lblInitialAmount;
				case 'CostControl':
					if (!$this->txtCost) return $this->txtCost_Create();
					return $this->txtCost;
				case 'CostLabel':
					if (!$this->lblCost) return $this->lblCost_Create();
					return $this->lblCost;
				case 'CostUnitOfMeasurementControl':
					if (!$this->lstCostUnitOfMeasurementObject) return $this->lstCostUnitOfMeasurementObject_Create();
					return $this->lstCostUnitOfMeasurementObject;
				case 'CostUnitOfMeasurementLabel':
					if (!$this->lblCostUnitOfMeasurement) return $this->lblCostUnitOfMeasurement_Create();
					return $this->lblCostUnitOfMeasurement;
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
					// Controls that point to Ingredient fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'UnitOfMeasurementIdControl':
						return ($this->lstUnitOfMeasurement = QType::Cast($mixValue, 'QControl'));
					case 'InitialAmountControl':
						return ($this->txtInitialAmount = QType::Cast($mixValue, 'QControl'));
					case 'CostControl':
						return ($this->txtCost = QType::Cast($mixValue, 'QControl'));
					case 'CostUnitOfMeasurementControl':
						return ($this->lstCostUnitOfMeasurementObject = QType::Cast($mixValue, 'QControl'));
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
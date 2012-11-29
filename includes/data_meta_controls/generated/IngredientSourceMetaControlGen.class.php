<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the IngredientSource class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single IngredientSource object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IngredientSourceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read IngredientSource $IngredientSource the actual IngredientSource data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IngredientIdControl
	 * property-read QLabel $IngredientIdLabel
	 * property QListBox $LocationIdControl
	 * property-read QLabel $LocationIdLabel
	 * property QFloatTextBox $CostControl
	 * property-read QLabel $CostLabel
	 * property QListBox $QualityIdControl
	 * property-read QLabel $QualityIdLabel
	 * property QTextBox $CommentsControl
	 * property-read QLabel $CommentsLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IngredientSourceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var IngredientSource objIngredientSource
		 * @access protected
		 */
		protected $objIngredientSource;

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

		// Controls that allow the editing of IngredientSource's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstIngredient;
         * @access protected
         */
		protected $lstIngredient;

        /**
         * @var QListBox lstLocation;
         * @access protected
         */
		protected $lstLocation;

        /**
         * @var QFloatTextBox txtCost;
         * @access protected
         */
		protected $txtCost;

        /**
         * @var QListBox lstQuality;
         * @access protected
         */
		protected $lstQuality;

        /**
         * @var QTextBox txtComments;
         * @access protected
         */
		protected $txtComments;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of IngredientSource's individual data fields
        /**
         * @var QLabel lblIngredientId
         * @access protected
         */
		protected $lblIngredientId;

        /**
         * @var QLabel lblLocationId
         * @access protected
         */
		protected $lblLocationId;

        /**
         * @var QLabel lblCost
         * @access protected
         */
		protected $lblCost;

        /**
         * @var QLabel lblQualityId
         * @access protected
         */
		protected $lblQualityId;

        /**
         * @var QLabel lblComments
         * @access protected
         */
		protected $lblComments;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IngredientSourceMetaControl to edit a single IngredientSource object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single IngredientSource object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientSourceMetaControl
		 * @param IngredientSource $objIngredientSource new or existing IngredientSource object
		 */
		 public function __construct($objParentObject, IngredientSource $objIngredientSource) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IngredientSourceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked IngredientSource object
			$this->objIngredientSource = $objIngredientSource;

			// Figure out if we're Editing or Creating New
			if ($this->objIngredientSource->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientSourceMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing IngredientSource object creation - defaults to CreateOrEdit
 		 * @return IngredientSourceMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIngredientSource = IngredientSource::Load($intId);

				// IngredientSource was found -- return it!
				if ($objIngredientSource)
					return new IngredientSourceMetaControl($objParentObject, $objIngredientSource);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a IngredientSource object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IngredientSourceMetaControl($objParentObject, new IngredientSource());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientSourceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IngredientSource object creation - defaults to CreateOrEdit
		 * @return IngredientSourceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IngredientSourceMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IngredientSourceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing IngredientSource object creation - defaults to CreateOrEdit
		 * @return IngredientSourceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IngredientSourceMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIngredientSource->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIngredient
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIngredient_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIngredient = new QListBox($this->objParentObject, $strControlId);
			$this->lstIngredient->Name = QApplication::Translate('Ingredient');
			$this->lstIngredient->Required = true;
			if (!$this->blnEditMode)
				$this->lstIngredient->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIngredientCursor = Ingredient::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIngredient = Ingredient::InstantiateCursor($objIngredientCursor)) {
				$objListItem = new QListItem($objIngredient->__toString(), $objIngredient->Id);
				if (($this->objIngredientSource->Ingredient) && ($this->objIngredientSource->Ingredient->Id == $objIngredient->Id))
					$objListItem->Selected = true;
				$this->lstIngredient->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstIngredient;
		}

		/**
		 * Create and setup QLabel lblIngredientId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIngredientId_Create($strControlId = null) {
			$this->lblIngredientId = new QLabel($this->objParentObject, $strControlId);
			$this->lblIngredientId->Name = QApplication::Translate('Ingredient');
			$this->lblIngredientId->Text = ($this->objIngredientSource->Ingredient) ? $this->objIngredientSource->Ingredient->__toString() : null;
			$this->lblIngredientId->Required = true;
			return $this->lblIngredientId;
		}

		/**
		 * Create and setup QListBox lstLocation
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLocation_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLocation = new QListBox($this->objParentObject, $strControlId);
			$this->lstLocation->Name = QApplication::Translate('Location');
			$this->lstLocation->Required = true;
			if (!$this->blnEditMode)
				$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLocationCursor = Location::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLocation = Location::InstantiateCursor($objLocationCursor)) {
				$objListItem = new QListItem($objLocation->__toString(), $objLocation->Id);
				if (($this->objIngredientSource->Location) && ($this->objIngredientSource->Location->Id == $objLocation->Id))
					$objListItem->Selected = true;
				$this->lstLocation->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLocation;
		}

		/**
		 * Create and setup QLabel lblLocationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocationId_Create($strControlId = null) {
			$this->lblLocationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocationId->Name = QApplication::Translate('Location');
			$this->lblLocationId->Text = ($this->objIngredientSource->Location) ? $this->objIngredientSource->Location->__toString() : null;
			$this->lblLocationId->Required = true;
			return $this->lblLocationId;
		}

		/**
		 * Create and setup QFloatTextBox txtCost
		 * @param string $strControlId optional ControlId to use
		 * @return QFloatTextBox
		 */
		public function txtCost_Create($strControlId = null) {
			$this->txtCost = new QFloatTextBox($this->objParentObject, $strControlId);
			$this->txtCost->Name = QApplication::Translate('Cost');
			$this->txtCost->Text = $this->objIngredientSource->Cost;
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
			$this->lblCost->Text = $this->objIngredientSource->Cost;
			$this->lblCost->Format = $strFormat;
			return $this->lblCost;
		}

		/**
		 * Create and setup QListBox lstQuality
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstQuality_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstQuality = new QListBox($this->objParentObject, $strControlId);
			$this->lstQuality->Name = QApplication::Translate('Quality');
			$this->lstQuality->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objQualityCursor = Quality::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuality = Quality::InstantiateCursor($objQualityCursor)) {
				$objListItem = new QListItem($objQuality->__toString(), $objQuality->Id);
				if (($this->objIngredientSource->Quality) && ($this->objIngredientSource->Quality->Id == $objQuality->Id))
					$objListItem->Selected = true;
				$this->lstQuality->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstQuality;
		}

		/**
		 * Create and setup QLabel lblQualityId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQualityId_Create($strControlId = null) {
			$this->lblQualityId = new QLabel($this->objParentObject, $strControlId);
			$this->lblQualityId->Name = QApplication::Translate('Quality');
			$this->lblQualityId->Text = ($this->objIngredientSource->Quality) ? $this->objIngredientSource->Quality->__toString() : null;
			return $this->lblQualityId;
		}

		/**
		 * Create and setup QTextBox txtComments
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtComments_Create($strControlId = null) {
			$this->txtComments = new QTextBox($this->objParentObject, $strControlId);
			$this->txtComments->Name = QApplication::Translate('Comments');
			$this->txtComments->Text = $this->objIngredientSource->Comments;
			$this->txtComments->MaxLength = IngredientSource::CommentsMaxLength;
			return $this->txtComments;
		}

		/**
		 * Create and setup QLabel lblComments
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblComments_Create($strControlId = null) {
			$this->lblComments = new QLabel($this->objParentObject, $strControlId);
			$this->lblComments->Name = QApplication::Translate('Comments');
			$this->lblComments->Text = $this->objIngredientSource->Comments;
			return $this->lblComments;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objIngredientSource->Name;
			$this->txtName->MaxLength = IngredientSource::NameMaxLength;
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
			$this->lblName->Text = $this->objIngredientSource->Name;
			return $this->lblName;
		}



		/**
		 * Refresh this MetaControl with Data from the local IngredientSource object.
		 * @param boolean $blnReload reload IngredientSource from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIngredientSource->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIngredientSource->Id;

			if ($this->lstIngredient) {
					$this->lstIngredient->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIngredient->AddItem(QApplication::Translate('- Select One -'), null);
				$objIngredientArray = Ingredient::LoadAll();
				if ($objIngredientArray) foreach ($objIngredientArray as $objIngredient) {
					$objListItem = new QListItem($objIngredient->__toString(), $objIngredient->Id);
					if (($this->objIngredientSource->Ingredient) && ($this->objIngredientSource->Ingredient->Id == $objIngredient->Id))
						$objListItem->Selected = true;
					$this->lstIngredient->AddItem($objListItem);
				}
			}
			if ($this->lblIngredientId) $this->lblIngredientId->Text = ($this->objIngredientSource->Ingredient) ? $this->objIngredientSource->Ingredient->__toString() : null;

			if ($this->lstLocation) {
					$this->lstLocation->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstLocation->AddItem(QApplication::Translate('- Select One -'), null);
				$objLocationArray = Location::LoadAll();
				if ($objLocationArray) foreach ($objLocationArray as $objLocation) {
					$objListItem = new QListItem($objLocation->__toString(), $objLocation->Id);
					if (($this->objIngredientSource->Location) && ($this->objIngredientSource->Location->Id == $objLocation->Id))
						$objListItem->Selected = true;
					$this->lstLocation->AddItem($objListItem);
				}
			}
			if ($this->lblLocationId) $this->lblLocationId->Text = ($this->objIngredientSource->Location) ? $this->objIngredientSource->Location->__toString() : null;

			if ($this->txtCost) $this->txtCost->Text = $this->objIngredientSource->Cost;
			if ($this->lblCost) $this->lblCost->Text = $this->objIngredientSource->Cost;

			if ($this->lstQuality) {
					$this->lstQuality->RemoveAllItems();
				$this->lstQuality->AddItem(QApplication::Translate('- Select One -'), null);
				$objQualityArray = Quality::LoadAll();
				if ($objQualityArray) foreach ($objQualityArray as $objQuality) {
					$objListItem = new QListItem($objQuality->__toString(), $objQuality->Id);
					if (($this->objIngredientSource->Quality) && ($this->objIngredientSource->Quality->Id == $objQuality->Id))
						$objListItem->Selected = true;
					$this->lstQuality->AddItem($objListItem);
				}
			}
			if ($this->lblQualityId) $this->lblQualityId->Text = ($this->objIngredientSource->Quality) ? $this->objIngredientSource->Quality->__toString() : null;

			if ($this->txtComments) $this->txtComments->Text = $this->objIngredientSource->Comments;
			if ($this->lblComments) $this->lblComments->Text = $this->objIngredientSource->Comments;

			if ($this->txtName) $this->txtName->Text = $this->objIngredientSource->Name;
			if ($this->lblName) $this->lblName->Text = $this->objIngredientSource->Name;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC INGREDIENTSOURCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's IngredientSource instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIngredientSource() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIngredient) $this->objIngredientSource->IngredientId = $this->lstIngredient->SelectedValue;
				if ($this->lstLocation) $this->objIngredientSource->LocationId = $this->lstLocation->SelectedValue;
				if ($this->txtCost) $this->objIngredientSource->Cost = $this->txtCost->Text;
				if ($this->lstQuality) $this->objIngredientSource->QualityId = $this->lstQuality->SelectedValue;
				if ($this->txtComments) $this->objIngredientSource->Comments = $this->txtComments->Text;
				if ($this->txtName) $this->objIngredientSource->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the IngredientSource object
				$this->objIngredientSource->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's IngredientSource instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIngredientSource() {
			$this->objIngredientSource->Delete();
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
				case 'IngredientSource': return $this->objIngredientSource;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to IngredientSource fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IngredientIdControl':
					if (!$this->lstIngredient) return $this->lstIngredient_Create();
					return $this->lstIngredient;
				case 'IngredientIdLabel':
					if (!$this->lblIngredientId) return $this->lblIngredientId_Create();
					return $this->lblIngredientId;
				case 'LocationIdControl':
					if (!$this->lstLocation) return $this->lstLocation_Create();
					return $this->lstLocation;
				case 'LocationIdLabel':
					if (!$this->lblLocationId) return $this->lblLocationId_Create();
					return $this->lblLocationId;
				case 'CostControl':
					if (!$this->txtCost) return $this->txtCost_Create();
					return $this->txtCost;
				case 'CostLabel':
					if (!$this->lblCost) return $this->lblCost_Create();
					return $this->lblCost;
				case 'QualityIdControl':
					if (!$this->lstQuality) return $this->lstQuality_Create();
					return $this->lstQuality;
				case 'QualityIdLabel':
					if (!$this->lblQualityId) return $this->lblQualityId_Create();
					return $this->lblQualityId;
				case 'CommentsControl':
					if (!$this->txtComments) return $this->txtComments_Create();
					return $this->txtComments;
				case 'CommentsLabel':
					if (!$this->lblComments) return $this->lblComments_Create();
					return $this->lblComments;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
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
					// Controls that point to IngredientSource fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IngredientIdControl':
						return ($this->lstIngredient = QType::Cast($mixValue, 'QControl'));
					case 'LocationIdControl':
						return ($this->lstLocation = QType::Cast($mixValue, 'QControl'));
					case 'CostControl':
						return ($this->txtCost = QType::Cast($mixValue, 'QControl'));
					case 'QualityIdControl':
						return ($this->lstQuality = QType::Cast($mixValue, 'QControl'));
					case 'CommentsControl':
						return ($this->txtComments = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
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
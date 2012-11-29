<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Quality class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Quality object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QualityMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Quality $Quality the actual Quality data class being edited
	 * property QIntegerTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $RatingControl
	 * property-read QLabel $RatingLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QualityMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Quality objQuality
		 * @access protected
		 */
		protected $objQuality;

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

		// Controls that allow the editing of Quality's individual data fields
        /**
         * @var QIntegerTextBox txtId;
         * @access protected
         */
		protected $txtId;

        /**
         * @var QTextBox txtRating;
         * @access protected
         */
		protected $txtRating;


		// Controls that allow the viewing of Quality's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

        /**
         * @var QLabel lblRating
         * @access protected
         */
		protected $lblRating;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QualityMetaControl to edit a single Quality object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Quality object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualityMetaControl
		 * @param Quality $objQuality new or existing Quality object
		 */
		 public function __construct($objParentObject, Quality $objQuality) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QualityMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Quality object
			$this->objQuality = $objQuality;

			// Figure out if we're Editing or Creating New
			if ($this->objQuality->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualityMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Quality object creation - defaults to CreateOrEdit
 		 * @return QualityMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objQuality = Quality::Load($intId);

				// Quality was found -- return it!
				if ($objQuality)
					return new QualityMetaControl($objParentObject, $objQuality);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Quality object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QualityMetaControl($objParentObject, new Quality());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualityMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Quality object creation - defaults to CreateOrEdit
		 * @return QualityMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return QualityMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualityMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Quality object creation - defaults to CreateOrEdit
		 * @return QualityMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return QualityMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Text = $this->objQuality->Id;
			$this->txtId->Required = true;
			return $this->txtId;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null, $strFormat = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->Text = $this->objQuality->Id;
			$this->lblId->Required = true;
			$this->lblId->Format = $strFormat;
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtRating
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtRating_Create($strControlId = null) {
			$this->txtRating = new QTextBox($this->objParentObject, $strControlId);
			$this->txtRating->Name = QApplication::Translate('Rating');
			$this->txtRating->Text = $this->objQuality->Rating;
			$this->txtRating->MaxLength = Quality::RatingMaxLength;
			return $this->txtRating;
		}

		/**
		 * Create and setup QLabel lblRating
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRating_Create($strControlId = null) {
			$this->lblRating = new QLabel($this->objParentObject, $strControlId);
			$this->lblRating->Name = QApplication::Translate('Rating');
			$this->lblRating->Text = $this->objQuality->Rating;
			return $this->lblRating;
		}



		/**
		 * Refresh this MetaControl with Data from the local Quality object.
		 * @param boolean $blnReload reload Quality from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQuality->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objQuality->Id;
			if ($this->lblId) $this->lblId->Text = $this->objQuality->Id;

			if ($this->txtRating) $this->txtRating->Text = $this->objQuality->Rating;
			if ($this->lblRating) $this->lblRating->Text = $this->objQuality->Rating;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUALITY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Quality instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQuality() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objQuality->Id = $this->txtId->Text;
				if ($this->txtRating) $this->objQuality->Rating = $this->txtRating->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Quality object
				$this->objQuality->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Quality instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQuality() {
			$this->objQuality->Delete();
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
				case 'Quality': return $this->objQuality;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Quality fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'RatingControl':
					if (!$this->txtRating) return $this->txtRating_Create();
					return $this->txtRating;
				case 'RatingLabel':
					if (!$this->lblRating) return $this->lblRating_Create();
					return $this->lblRating;
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
					// Controls that point to Quality fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'RatingControl':
						return ($this->txtRating = QType::Cast($mixValue, 'QControl'));
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
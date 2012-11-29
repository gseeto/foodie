<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Location class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Location object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LocationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Location $Location the actual Location data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $AddressControl
	 * property-read QLabel $AddressLabel
	 * property QTextBox $WebsiteControl
	 * property-read QLabel $WebsiteLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LocationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Location objLocation
		 * @access protected
		 */
		protected $objLocation;

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

		// Controls that allow the editing of Location's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtAddress;
         * @access protected
         */
		protected $txtAddress;

        /**
         * @var QTextBox txtWebsite;
         * @access protected
         */
		protected $txtWebsite;


		// Controls that allow the viewing of Location's individual data fields
        /**
         * @var QLabel lblAddress
         * @access protected
         */
		protected $lblAddress;

        /**
         * @var QLabel lblWebsite
         * @access protected
         */
		protected $lblWebsite;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LocationMetaControl to edit a single Location object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Location object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param Location $objLocation new or existing Location object
		 */
		 public function __construct($objParentObject, Location $objLocation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LocationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Location object
			$this->objLocation = $objLocation;

			// Figure out if we're Editing or Creating New
			if ($this->objLocation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
 		 * @return LocationMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLocation = Location::Load($intId);

				// Location was found -- return it!
				if ($objLocation)
					return new LocationMetaControl($objParentObject, $objLocation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Location object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LocationMetaControl($objParentObject, new Location());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
		 * @return LocationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LocationMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LocationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Location object creation - defaults to CreateOrEdit
		 * @return LocationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LocationMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLocation->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress_Create($strControlId = null) {
			$this->txtAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress->Name = QApplication::Translate('Address');
			$this->txtAddress->Text = $this->objLocation->Address;
			$this->txtAddress->MaxLength = Location::AddressMaxLength;
			return $this->txtAddress;
		}

		/**
		 * Create and setup QLabel lblAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress_Create($strControlId = null) {
			$this->lblAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress->Name = QApplication::Translate('Address');
			$this->lblAddress->Text = $this->objLocation->Address;
			return $this->lblAddress;
		}

		/**
		 * Create and setup QTextBox txtWebsite
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtWebsite_Create($strControlId = null) {
			$this->txtWebsite = new QTextBox($this->objParentObject, $strControlId);
			$this->txtWebsite->Name = QApplication::Translate('Website');
			$this->txtWebsite->Text = $this->objLocation->Website;
			$this->txtWebsite->MaxLength = Location::WebsiteMaxLength;
			return $this->txtWebsite;
		}

		/**
		 * Create and setup QLabel lblWebsite
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWebsite_Create($strControlId = null) {
			$this->lblWebsite = new QLabel($this->objParentObject, $strControlId);
			$this->lblWebsite->Name = QApplication::Translate('Website');
			$this->lblWebsite->Text = $this->objLocation->Website;
			return $this->lblWebsite;
		}



		/**
		 * Refresh this MetaControl with Data from the local Location object.
		 * @param boolean $blnReload reload Location from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLocation->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLocation->Id;

			if ($this->txtAddress) $this->txtAddress->Text = $this->objLocation->Address;
			if ($this->lblAddress) $this->lblAddress->Text = $this->objLocation->Address;

			if ($this->txtWebsite) $this->txtWebsite->Text = $this->objLocation->Website;
			if ($this->lblWebsite) $this->lblWebsite->Text = $this->objLocation->Website;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LOCATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Location instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLocation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtAddress) $this->objLocation->Address = $this->txtAddress->Text;
				if ($this->txtWebsite) $this->objLocation->Website = $this->txtWebsite->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Location object
				$this->objLocation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Location instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLocation() {
			$this->objLocation->Delete();
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
				case 'Location': return $this->objLocation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Location fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'AddressControl':
					if (!$this->txtAddress) return $this->txtAddress_Create();
					return $this->txtAddress;
				case 'AddressLabel':
					if (!$this->lblAddress) return $this->lblAddress_Create();
					return $this->lblAddress;
				case 'WebsiteControl':
					if (!$this->txtWebsite) return $this->txtWebsite_Create();
					return $this->txtWebsite;
				case 'WebsiteLabel':
					if (!$this->lblWebsite) return $this->lblWebsite_Create();
					return $this->lblWebsite;
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
					// Controls that point to Location fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AddressControl':
						return ($this->txtAddress = QType::Cast($mixValue, 'QControl'));
					case 'WebsiteControl':
						return ($this->txtWebsite = QType::Cast($mixValue, 'QControl'));
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
<?php
    // The Logic here is a bit cheesy... we cheat a little because we don't take into
    // account overflow or divide-by-zero errors.  Instead, we cop out by just truncating
    // values or setting them to zero.
    //
    // Obviously, not completely accurate -- but this is really just an example dialog box, and hopefully
    // this example will give you enough to understand how QDialogBox works overall. =)
    class CalculatorWidget extends QDialogBox {
        public $btnUpdate;
        public $btnCancel;
        
        public $txtIngredientName;
	    public $txtIngredientAmount;
	    public $lstUnitOfMeasure;
    
        
        // Object Variables
        protected $strCloseCallback;
        protected $intIngredientId;
        
        // Default Overrides
        protected $blnMatteClickable = false;
        protected $strTemplate = 'AddIngredientWidget.tpl.php';
        protected $strCssClass = 'AddIngredient_widget';
        protected $BackColor = '#eeffdd';

        protected $fltInternalValue;
        protected $strCurrentOperation;
        protected $blnNextClears;

        public function __construct($strCloseCallback, $objParentObject, $strControlId = null) {
            parent::__construct($objParentObject, $strControlId);
            $this->strCloseCallback = $strCloseCallback;
                        
            $this->btnUpdate = new QButton($this);
            $this->btnUpdate->Text = 'Save/Update';
            $this->btnUpdate->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUpdate_Click'));
            
            $this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Cancel';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
            
            $this->txtIngredientName = new QTextBox($this);
		    $this->txtIngredientName->Name = 'Ingredient: ';
		            
		    $this->txtIngredientAmount = new QTextBox($this);
		    $this->txtIngredientAmount->Name = 'Amount: ';
		    $this->txtIngredientAmount->Width = 50;
		    
		    $this->lstUnitOfMeasure = new QListBox($this);
		    $this->lstUnitOfMeasure->Name = "Unit Of Measure";
		    $i = 0;
			foreach(UnitOfMeasurementType::$NameArray as $strMeasurementType) {
				$i++;
				$this->lstUnitOfMeasure->AddItem($strMeasurementType,$i);
			}
						
        }

        public function btnCancel_Click() {
            $this->HideDialogBox();
        }
        
        public function btnUpdate_Click() {
        	$objIngredient = new Ingredient();
        	$objIngredient->Name = $this->txtIngredientName->Text;
        	$objIngredient->InitialAmount = $this->txtIngredientAmount->Text;
        	$objIngredient->UnitOfMeasurementId = $this->lstUnitOfMeasure->SelectedValue;
        	$objIngredient->CostUnitOfMeasurement = 1; // initialize to anything
        	$objIngredient->Cost = 0;
            $this->intIngredientId = $objIngredient->Save();
            call_user_func(array($this->objForm, $this->strCloseCallback));
            $this->HideDialogBox();
        }

        public function ShowDialogBox() {
            parent::ShowDialogBox();
        }

        public function __get($strName) {
            switch ($strName) {
                case "Value": return $this->intIngredientId;

                default:
                    try {
                        return parent::__get($strName);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
            }
        }

        public function __set($strName, $mixValue) {
            $this->blnModified = true;

            switch ($strName) {
                case "Value":
                    // Depending on the format of $mixValue, set $this->intIngredientId appropriately
                    // It will try to cast to Integer if possible, otherwise Float, otherwise just 0
                    $this->intIngredientId = 0;
                    try {                    
                        $this->intIngredientId = QType::Cast($mixValue, QType::Float);
                        break;
                    } catch (QInvalidCastException $objExc) {}
                    try {
                        $this->intIngredientId = QType::Cast($mixValue, QType::Integer);
                        break;
                    } catch (QInvalidCastException $objExc) {}
                    break;

                default:
                    try {
                        parent::__set($strName, $mixValue);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                    break;
            }
        }
    }
?>
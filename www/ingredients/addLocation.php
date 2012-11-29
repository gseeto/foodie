<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class AddLocationForm extends FoodieForm {
	protected $btnUpdate;
    protected $btnCancel;       
    protected $txtLocationName;
    protected $txtAddress;
    protected $txtWebsite;
    protected $txtCost;
    protected $lstQuality;
    protected $txtComments;
	protected $objLocation;
	protected $intIngredientId;
	protected $intNavSectionId = FoodieForm::NavSectionIngredients;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		$this->intIngredientId = QApplication::PathInfo(0);
	
		$this->btnUpdate = new QButton($this);
            $this->btnUpdate->Text = 'Create Location';
            $this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));
            
            $this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Return To Ingredient Source';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
            
            $this->txtLocationName = new QTextBox($this);
		    $this->txtLocationName->Name = 'Location Name: ';

		    $this->txtAddress = new QTextBox($this);
		    $this->txtAddress->Name = 'Address';
		    $this->txtAddress->TextMode = 'MultiLine';
		    $this->txtAddress->Height = 50;
		    $this->txtAddress->Width = 400;
		    
		    $this->txtWebsite = new QTextBox($this);
		    $this->txtWebsite->Name = 'Website: ';
		    
		    $this->txtCost = new QTextBox($this);
		    $this->txtCost->Name = 'Cost: ';
		    
		    $this->txtComments = new QTextBox($this);
		    $this->txtComments->Name = 'Comments';
		    $this->txtComments->TextMode = 'MultiLine';
		    $this->txtComments->Height = 50;
		    $this->txtComments->Width = 400;
		    
		    $this->lstQuality = new QListBox($this);
		    $this->lstQuality->Name = "Level Of Quality";
		    $i = 0;
		    $objQualityArray = Quality::LoadAll();
			foreach( $objQualityArray as $key=>$objQuality) {
				$i++;			
				$this->lstQuality->AddItem($objQuality->Rating,$i);
			}
	}
	
	public function btnUpdate_Click() {
			$this->objLocation = new IngredientSource();
        	$this->objLocation->Name = $this->txtLocationName->Text;
        	$this->objLocation->Cost = $this->txtCost->Text;
        	$this->objLocation->QualityId = $this->lstQuality->SelectedValue;
        	$this->objLocation->Comments = $this->txtComments->Text;
        	$this->objLocation->IngredientId = $this->intIngredientId;
        	
        	$objAddress = new Location();
        	$objAddress->Address = $this->txtAddress->Text;
        	$objAddress->Website = $this->txtWebsite->Text;
        	$objAddress->Save();
        	$this->objLocation->Location = $objAddress;
        	$this->objLocation->Save();
        	QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1].'/ingredientLocation.php/'.$this->intIngredientId);
    }
    
	public function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1].'/ingredientLocation.php/'.$this->intIngredientId);
	}
}

AddLocationForm::Run('AddLocationForm');
?>
<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class ViewLocationForm extends FoodieForm {
	protected $btnUpdate;
    protected $btnCancel;       
    protected $txtLocationName;
    protected $txtAddress;
    protected $txtWebsite;
    protected $txtCost;
    protected $lstQuality;
    protected $txtComments;
	protected $intLocationId;
	protected $objLocation;
	protected $txtIngredientName;
	protected $intNavSectionId = FoodieForm::NavSectionIngredients;

	protected function Form_Create() {
		$this->intLocationId = QApplication::PathInfo(0);
		if($this->intLocationId) {
			$this->objLocation = IngredientSource::Load($this->intLocationId);
		} else {
			$this->objLocation = new IngredientSource();
		}
		
		
		$this->txtIngredientName = new QLabel($this);
		$this->txtIngredientName->Text = $this->objLocation->Ingredient->Name;
		
		$this->btnUpdate = new QButton($this);
            $this->btnUpdate->Text = 'Update Location';
            $this->btnUpdate->AddAction(new QClickEvent(), new QAjaxAction('btnUpdate_Click'));
            
            $this->btnCancel = new QButton($this);
            $this->btnCancel->Text = 'Return To Ingredient Source';
            $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnReturn_Click'));
            
            $this->txtLocationName = new QTextBox($this);
		    $this->txtLocationName->Name = 'Location Name: ';
		    $this->txtLocationName->Text = $this->objLocation->Name;
		    
		    $objLocationDetails = Location::Load($this->objLocation->LocationId);
		    $this->txtAddress = new QTextBox($this);
		    $this->txtAddress->Name = 'Address';
		    $this->txtAddress->TextMode = 'MultiLine';
		    $this->txtAddress->Height = 50;
		    $this->txtAddress->Width = 400;
		    $this->txtAddress->Text = $objLocationDetails->Address;
		    
		    $this->txtWebsite = new QTextBox($this);
		    $this->txtWebsite->Name = 'Website: ';
		    $this->txtWebsite->Text = $objLocationDetails->Website;
		    
		    $this->txtCost = new QTextBox($this);
		    $this->txtCost->Name = 'Cost: ';
		    $this->txtCost->Text = $this->objLocation->Cost;
		    
		    $this->txtComments = new QTextBox($this);
		    $this->txtComments->Name = 'Comments';
		    $this->txtComments->TextMode = 'MultiLine';
		    $this->txtComments->Height = 50;
		    $this->txtComments->Width = 400;
		    $this->txtComments->Text = $this->objLocation->Comments;
		    
		    $this->lstQuality = new QListBox($this);
		    $this->lstQuality->Name = "Level Of Quality";
		    $i = 0;
		    $objQualityArray = Quality::LoadAll();
			foreach( $objQualityArray as $key=>$objQuality) {
				$i++;
				if ($this->objLocation->QualityId == $objQuality->Id) {
					$this->lstQuality->AddItem($objQuality->Rating,$i,true);
				} else {
					$this->lstQuality->AddItem($objQuality->Rating,$i);
				} 
			}
	}
	
	public function btnUpdate_Click() {
        	$this->objLocation->Name = $this->txtLocationName->Text;
        	$this->objLocation->Cost = $this->txtCost->Text;
        	$this->objLocation->QualityId = $this->lstQuality->SelectedValue;
        	$this->objLocation->Comments = $this->txtComments->Text;
        	$objAddress = Location::Load($this->objLocation->LocationId);
        	$objAddress->Address = $this->txtAddress->Text;
        	$objAddress->Website = $this->txtWebsite->Text;
        	$objAddress->Save();
        	$this->objLocation->Save();
        	QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1].'/ingredientLocation.php/'.$this->objLocation->IngredientId);
    }
    
	public function btnReturn_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1].'/ingredientLocation.php/'.$this->objLocation->IngredientId);
	}
}

ViewLocationForm::Run('ViewLocationForm');
?>
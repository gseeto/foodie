<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class IngredientLocationForm extends FoodieForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Ingredient Location';
	protected $intNavSectionId = FoodieForm::NavSectionIngredients;
	protected $lblIngredient;
	protected $dtgLocations;
	protected $btnAdd;
	protected $intIngredientSourceId;
	protected $objIngredient;
	protected $btnReturn;
	protected $lblDebug;


	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		
		$this->dtgLocations = new IngredientSourceDataGrid($this);
		$this->dtgLocations->Paginator = new QPaginator($this->dtgLocations);
		
		$this->dtgLocations->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1]."viewLocation.php" ?>','<?=$_ITEM->Name?>','Location Name');
		$this->dtgLocations->AddColumn(new QDataGridColumn('Cost', '<?= $_FORM->RenderCost($_ITEM->Cost) ?>', 'Width=200px', 'HtmlEntities=false'));
		$this->dtgLocations->AddColumn(new QDataGridColumn('Quality', '<?= $_FORM->RenderQuality($_ITEM->QualityId)  ?>', 'Width=200px', 'HtmlEntities=false'));
		$this->dtgLocations->AddColumn(new QDataGridColumn('Comments', '<?= $_ITEM->Comments ?>', 'Width=200px', 'HtmlEntities=false'));
		$this->dtgLocations->CellPadding = 5;
		$this->dtgLocations->SetDataBinder('dtgLocations_Bind');
		$this->dtgLocations->NoDataHtml = 'No Locations Specified.';
		
		$this->dtgLocations->SortColumnIndex = 1;
		$this->dtgLocations->ItemsPerPage = 20;
		$this->dtgLocations->Width = 800;
	
        $objStyle = $this->dtgLocations->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgLocations->AlternateRowStyle;
        $objStyle->BackColor = '#CC66CC';

        $objStyle = $this->dtgLocations->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $objStyle = $this->dtgLocations->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $this->objIngredient = Ingredient::Load(QApplication::PathInfo(0));
        $this->lblIngredient = new QLabel($this);
        $this->lblIngredient->Text = $this->objIngredient->Name;
        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->Text = 'Add a Location';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAddLocation'));
        
        $this->btnReturn = new QButton($this);
        $this->btnReturn->Text = 'Return To Ingredient List';
        $this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturn'));
	}
	
	public function dtgLocations_Refresh() {
		$this->dtgLocations->PageNumber = 1;
		$this->dtgLocations->Refresh();
	}

	public function dtgLocations_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::IngredientSource()->IngredientId, $this->objIngredient->Id));
		$ingredientArray = IngredientSource::QueryArray($objConditions,$objClauses);
		$this->dtgLocations->DataSource = $ingredientArray; 	
	}

	public function RenderQuality($intIngredientQuality) {
		$objQuality = Quality::Load($intIngredientQuality);
		return $objQuality->Rating;
	}
	
	public function RenderCost($fltIngredientCost) {
		return QApplication::HtmlEntities(" $".$fltIngredientCost);
	}
    
	protected function btnAddLocation($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1]."addLocation.php/".$this->objIngredient->Id);
 	}

	public function btnReturn() {
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1]);
	}
	
}

IngredientLocationForm::Run('IngredientLocationForm');
?>
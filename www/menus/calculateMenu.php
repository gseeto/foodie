<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class CalculateMenuForm extends FoodieForm {
	protected $intNavSectionId = FoodieForm::NavSectionMenus;
	protected $strPageTitle = 'Calculate Recipe';
	protected $lblMenuName;
	protected $lblMenuDescription;
	protected $lblMenuOwner;
	protected $dtgAppetizer;
	protected $dtgMainMeal;
	protected $dtgDessert;
	protected $txtNewServingSize;
	protected $btnReturn;
	
	protected $btnCalculate;
	protected $lblTotalCost;
	protected $lblCostPerPlate;
	
	protected $objMenu = null;
	protected $btnSave;
	protected $btnCancel;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	protected function Form_Create() {
		if (!QApplication::$PathInfo) return;
		
		$this->objMenu = Menu::Load(QApplication::PathInfo(0));
		if(null == $this->objMenu)
			return;
			
		$this->lblCostPerPlate = new QLabel($this);
		$this->lblTotalCost = new QLabel($this);
		
		$this->lblMenuName = new QLabel($this);
		$this->lblMenuName->Name = 'Menu Name: ';
		$this->lblMenuName->Text = $this->objMenu->Name;
		
		$this->lblMenuDescription = new QLabel($this);
		$this->lblMenuDescription->Height = 50;
		$this->lblMenuDescription->Width = 500;		
		$this->lblMenuDescription->Name = 'Description';
		$this->lblMenuDescription->Text = $this->objMenu->Description;
		
		$this->lblMenuOwner = new QLabel($this);
		$this->lblMenuOwner->Name = 'Menu Owner: ';
		$objOwner = Login::Load($this->objMenu->OwnerId);
		if($objOwner) {
			$this->lblMenuOwner->Text = $objOwner->Username;
		} else {
			$this->lblMenuOwner->Text = 'None';
		}
		
		$this->dtgAppetizer = new RecipeDataGrid($this);
		$this->dtgAppetizer->AddColumn(new QDataGridColumn('Recipe', '<?= $_ITEM->Name; ?>', 'Width=300px'));		
		$this->dtgAppetizer->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."calculateRecipe.php" ?>','<?=$_FORM->RenderCost($_ITEM)?>','Cost Per Plate');
		$this->dtgAppetizer->NoDataHtml = 'No Appetizers';	
		$this->dtgAppetizer->UseAjax = true;
		$this->dtgAppetizer->SetDataBinder('dtgAppetizer_Bind');
		
		// Make the DataGrid look nice
        $objStyle = $this->dtgAppetizer->RowStyle;
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgAppetizer->AlternateRowStyle;
        $objStyle->BackColor = '#eaeaea';

        $objStyle = $this->dtgAppetizer->HeaderRowStyle;
        $objStyle->ForeColor = 'white';
        $objStyle->BackColor = '#000066';
        
        /*************************/
        $this->dtgMainMeal = new RecipeDataGrid($this);
		$this->dtgMainMeal->AddColumn(new QDataGridColumn('Recipe', '<?= $_ITEM->Name; ?>', 'Width=300px'));	
		$this->dtgMainMeal->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."calculateRecipe.php" ?>','<?=$_FORM->RenderCost($_ITEM)?>','Cost Per Plate');
		$this->dtgMainMeal->NoDataHtml = 'No Main Meals';	
		$this->dtgMainMeal->UseAjax = true;
		$this->dtgMainMeal->SetDataBinder('dtgMainMeal_Bind');
		
		// Make the DataGrid look nice
        $objStyle = $this->dtgMainMeal->RowStyle;
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgMainMeal->AlternateRowStyle;
        $objStyle->BackColor = '#eaeaea';

        $objStyle = $this->dtgMainMeal->HeaderRowStyle;
        $objStyle->ForeColor = 'white';
        $objStyle->BackColor = '#000066';
        /**************************************/
        $this->dtgDessert = new RecipeDataGrid($this);
		$this->dtgDessert->AddColumn(new QDataGridColumn('Recipe', '<?= $_ITEM->Name; ?>', 'Width=300px'));	
		$this->dtgDessert->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."calculateRecipe.php" ?>','<?=$_FORM->RenderCost($_ITEM)?>','Cost Per Plate');
		$this->dtgDessert->NoDataHtml = 'No Dessert';	
		$this->dtgDessert->UseAjax = true;
		$this->dtgDessert->SetDataBinder('dtgDessert_Bind');
		
		// Make the DataGrid look nice
        $objStyle = $this->dtgDessert->RowStyle;
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgDessert->AlternateRowStyle;
        $objStyle->BackColor = '#eaeaea';

        $objStyle = $this->dtgDessert->HeaderRowStyle;
        $objStyle->ForeColor = 'white';
        $objStyle->BackColor = '#000066';
		        	 				
	 	$this->txtNewServingSize = new QTextBox($this);
	 	$this->txtNewServingSize->Width = 40;
	 	$this->txtNewServingSize->CssClass = 'inputField';
	 	
	 	$this->btnCalculate = new QButton($this);
	 	$this->btnCalculate->Text = 'Calculate Amount Required And Total Cost';
	 	$this->btnCalculate->AddAction(new QClickEvent(), new QAjaxAction('btnCalculateAmount'));
	 	
	 	$this->btnReturn = new QButton($this);
	 	$this->btnReturn->Text = 'Return to Menu List';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturnMenu'));
	 	
	}
	
	public function btnReturnMenu() {
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1]);
	}
	
	public function btnCalculateAmount() {
		$fltTotalCost = 0;
		$objRecipeArray = Recipe::LoadArrayByMenu($this->objMenu->Id);
		foreach($objRecipeArray as $objRecipe) {
			$objIngredientArray = $objRecipe->GetIngredientArray();
			foreach($objIngredientArray as $objIngredient) {			
				$fltRequiredAmount = ((float)$objIngredient->InitialAmount/$objRecipe->ServingSize) * (float)$this->txtNewServingSize->Text;
				$fltCost  = ($fltRequiredAmount / UnitOfMeasurementType::ToConversionRatio($objIngredient->UnitOfMeasurementId))
				 			* ($objIngredient->Cost/UnitOfMeasurementType::ToConversionRatio($objIngredient->CostUnitOfMeasurement));
				$fltTotalCost += $fltCost;
			}
		}
		$this->lblTotalCost->Text = "$ " . round($fltTotalCost,2);
		$this->lblCostPerPlate->Text = "$ ". round((float)$fltTotalCost/(int)$this->txtNewServingSize->Text, 2);
	}

	public function RenderCost($objRecipe) {
		$objIngredientArray = $objRecipe->GetIngredientArray();
		$fltTotalCost = 0;
		foreach($objIngredientArray as $objIngredient) {
			$fltCost  = ($objIngredient->InitialAmount / UnitOfMeasurementType::ToConversionRatio($objIngredient->UnitOfMeasurementId))
			 			* ($objIngredient->Cost/UnitOfMeasurementType::ToConversionRatio($objIngredient->CostUnitOfMeasurement));
			$fltTotalCost += $fltCost;
		}
		return  "$ ". round((float)$fltTotalCost/$objRecipe->ServingSize, 2);
	}
	
	public function dtgAppetizer_Bind() {		
		if ($this->objMenu != null) {	
			$objRecipeAppetizerArray = array();
			$objRecipeArray = Recipe::LoadArrayByMenu($this->objMenu->Id);
			foreach($objRecipeArray as $objRecipe) {			
				if ($objRecipe->MealTypeId == MealType::Appetizer)
					$objRecipeAppetizerArray[] = $objRecipe;
			}
			$this->dtgAppetizer->DataSource = $objRecipeAppetizerArray;
		} else {
			return;
		}
	}
	
public function dtgMainMeal_Bind() {		
		if ($this->objMenu != null) {	
			$objRecipeMainMealArray = array();
			$objRecipeArray = Recipe::LoadArrayByMenu($this->objMenu->Id);
			foreach($objRecipeArray as $objRecipe) {			
				if ($objRecipe->MealTypeId == MealType::MainMeal)
					$objRecipeMainMealArray[] = $objRecipe;
			}
			$this->dtgMainMeal->DataSource = $objRecipeMainMealArray;
		} else {
			return;
		}
	}
	
	public function dtgDessert_Bind() {		
		if ($this->objMenu != null) {	
			$objRecipeDessertArray = array();
			$objRecipeArray = Recipe::LoadArrayByMenu($this->objMenu->Id);
			foreach($objRecipeArray as $objRecipe) {			
				if ($objRecipe->MealTypeId == MealType::Dessert)
					$objRecipeDessertArray[] = $objRecipe;
			}
			$this->dtgDessert->DataSource = $objRecipeDessertArray;
		} else {
			return;
		}
	}
		
}

CalculateMenuForm::Run('CalculateMenuForm');
?>

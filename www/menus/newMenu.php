<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
require('viewRecipesPanel.class.php');

class NewMenuForm extends FoodieForm {
	protected $intNavSectionId = FoodieForm::NavSectionMenus;
	protected $strPageTitle = 'Create New Menu';
	protected $txtMenuName;
	protected $txtMenuDescription;
	protected $dtgAppetizers;
	protected $btnAddAppetizer;	
	protected $pnlAddAppetizer;
	
	protected $dtgMainMeal;
	protected $btnAddMainMeal;	
	protected $pnlAddMainMeal;
	protected $dtgDessert;
	protected $btnAddDessert;	
	protected $pnlAddDessert;
	protected $btnSubmit;
	protected $objMenu = null;
	protected $intMenuId;

	protected function Form_Create() {
		$this->txtMenuName = new QTextBox($this);
		$this->txtMenuName->Name = 'Menu Name: ';
		
		$this->txtMenuDescription = new QTextBox($this);
		$this->txtMenuDescription->Height = 50;
		$this->txtMenuDescription->Width = 500;
		$this->txtMenuDescription->Columns = 500;
		$this->txtMenuDescription->Rows = 20;
		$this->txtMenuDescription->Name = 'Description';
		$this->txtMenuDescription->TextMode = 'MultiLine';
		
		$this->dtgAppetizers = new RecipeDataGrid($this);
		$this->dtgAppetizers->Paginator = new QPaginator($this->dtgAppetizers);
		$this->dtgAppetizers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."editRecipe.php" ?>','<?=$_ITEM->Name?>','Recipe');
		$this->dtgAppetizers->AddColumn(new QDataGridColumn('Cost Per Plate', '<?= $_FORM->RenderCost($_ITEM); ?>', 'Width=150px'));
		$this->dtgAppetizers->SetDataBinder('dtgAppetizers_Bind');
		$this->dtgAppetizers->NoDataHtml = 'No Appetizers Selected.';	
		$this->dtgAppetizers->SortColumnIndex = 1;
		$this->dtgAppetizers->ItemsPerPage = 20;
		$this->dtgAppetizers->UseAjax = true;
		          
	 	$this->btnAddAppetizer = new QButton($this);
	 	$this->btnAddAppetizer->Text = 'Add Appetizer';
	 	$this->btnAddAppetizer->AddAction(new QClickEvent(),new QAjaxAction('btnAddAppetizer_Click'));

	 	$this->pnlAddAppetizer = new QPanel($this);
        $this->pnlAddAppetizer->Position = QPosition::Relative;
        $this->pnlAddAppetizer->CssClass = 'panelDefault panelRight';
        $this->pnlAddAppetizer->AutoRenderChildren = true;
	 	
        $this->dtgMainMeal = new RecipeDataGrid($this);
		$this->dtgMainMeal->Paginator = new QPaginator($this->dtgMainMeal);
		$this->dtgMainMeal->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."editRecipe.php" ?>','<?=$_ITEM->Name?>','Recipe');
		$this->dtgMainMeal->AddColumn(new QDataGridColumn('Cost Per Plate', '<?= $_FORM->RenderCost($_ITEM); ?>', 'Width=150px'));
		$this->dtgMainMeal->SetDataBinder('dtgMainMeal_Bind');
		$this->dtgMainMeal->NoDataHtml = 'No Main Meals Selected.';	
		$this->dtgMainMeal->SortColumnIndex = 1;
		$this->dtgMainMeal->ItemsPerPage = 20;
		$this->dtgMainMeal->UseAjax = true;
		          
	 	$this->btnAddMainMeal = new QButton($this);
	 	$this->btnAddMainMeal->Text = 'Add Main Meal';
	 	$this->btnAddMainMeal->AddAction(new QClickEvent(),new QAjaxAction('btnAddMainMeal_Click'));

	 	$this->pnlAddMainMeal = new QPanel($this);
        $this->pnlAddMainMeal->Position = QPosition::Relative;
        $this->pnlAddMainMeal->CssClass = 'panelDefault panelRight';
        $this->pnlAddMainMeal->AutoRenderChildren = true;
        
        $this->dtgDessert = new RecipeDataGrid($this);
		$this->dtgDessert->Paginator = new QPaginator($this->dtgDessert);
		$this->dtgDessert->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."editRecipe.php" ?>','<?=$_ITEM->Name?>','Recipe');
		$this->dtgDessert->AddColumn(new QDataGridColumn('Cost Per Plate', '<?= $_FORM->RenderCost($_ITEM); ?>', 'Width=150px'));
		$this->dtgDessert->SetDataBinder('dtgDessert_Bind');
		$this->dtgDessert->NoDataHtml = 'No Desserts Selected.';	
		$this->dtgDessert->SortColumnIndex = 1;
		$this->dtgDessert->ItemsPerPage = 20;
		$this->dtgDessert->UseAjax = true;
		          
	 	$this->btnAddDessert = new QButton($this);
	 	$this->btnAddDessert->Text = 'Add Dessert';
	 	$this->btnAddDessert->AddAction(new QClickEvent(),new QAjaxAction('btnAddDessert_Click'));

	 	$this->pnlAddDessert = new QPanel($this);
        $this->pnlAddDessert->Position = QPosition::Relative;
        $this->pnlAddDessert->CssClass = 'panelDefault panelRight';
        $this->pnlAddDessert->AutoRenderChildren = true;
        
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Submit Menu';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitMenu'));      
	}

	public function btnSubmitMenu() {
		// Save the Recipe with updated values
		if (!$this->objMenu) {
			$this->objMenu = new Menu();
		}
		$this->objMenu->Name = $this->txtMenuName->Text;
		$this->objMenu->Description = $this->txtMenuDescription->Text;	
		$this->objMenu->Owner = QApplication::$Login;

		$this->intMenuId = $this->objMenu->Save();
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1]);
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
	
	public function dtgAppetizers_Bind() {		
		if ($this->objMenu != null) {	
			$objRecipeMainMealArray = array();
			$objRecipeArray = Recipe::LoadArrayByMenu($this->objMenu->Id);
			foreach($objRecipeArray as $objRecipe) {			
				if ($objRecipe->MealTypeId == MealType::Appetizer)
					$objRecipeAppetizerArray[] = $objRecipe;
			}
			$this->dtgAppetizers->DataSource = $objRecipeAppetizerArray;
		} else {
			return;
		}
	}
	
	 // Method Call back for any of the  panels 
    public function UpdateAppetizerList($blnUpdatesMade) {
    	$this->dtgAppetizers->PageNumber = 1;
		$this->dtgAppetizers->Refresh();
    }
        
 	protected function btnAddAppetizer_Click($strFormId, $strControlId, $strParameter) {
	 	if (!$this->objMenu) {
				$this->objMenu = new Menu();
				$this->intMenuId = $this->objMenu->Save();
		}
		
        // Open up a panel and allow user to select appetizers
        $this->pnlAddAppetizer->Visible = true;
        $this->pnlAddAppetizer->RemoveChildControls(true);
        $pnlAppetizerView = new ViewRecipesPanel($this->pnlAddAppetizer,Menu::Load($this->intMenuId),MealType::Appetizer,'UpdateAppetizerList');
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
	
	 // Method Call back for any of the  panels 
    public function UpdateMainMealList($blnUpdatesMade) {
    	$this->dtgMainMeal->PageNumber = 1;
		$this->dtgMainMeal->Refresh();
    }
        
 	protected function btnAddMainMeal_Click($strFormId, $strControlId, $strParameter) {
	 	if (!$this->objMenu) {
				$this->objMenu = new Menu();
				$this->intMenuId = $this->objMenu->Save();
		}
		
        // Open up a panel and allow user to select appetizers
        $this->pnlAddMainMeal->Visible = true;
        $this->pnlAddMainMeal->RemoveChildControls(true);
        $pnlMainMealView = new ViewRecipesPanel($this->pnlAddMainMeal,Menu::Load($this->intMenuId),MealType::MainMeal,'UpdateMainMealList');
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
	
	 // Method Call back for any of the  panels 
    public function UpdateDessertList($blnUpdatesMade) {
    	$this->dtgDessert->PageNumber = 1;
		$this->dtgDessert->Refresh();
    }
        
 	protected function btnAddDessert_Click($strFormId, $strControlId, $strParameter) {
	 	if (!$this->objMenu) {
				$this->objMenu = new Menu();
				$this->intMenuId = $this->objMenu->Save();
		}
		
        // Open up a panel and allow user to select appetizers
        $this->pnlAddDessert->Visible = true;
        $this->pnlAddDessert->RemoveChildControls(true);
        $pnlDessertView = new ViewRecipesPanel($this->pnlAddDessert,Menu::Load($this->intMenuId),MealType::Dessert,'UpdateDessertList');
 	}
}

NewMenuForm::Run('NewMenuForm');
?>
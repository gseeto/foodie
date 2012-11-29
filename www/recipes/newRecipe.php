<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');
//require(dirname(__FILE__) .'/addIngredientPanel.class.php');
require('AddIngredientWidget.class.php');

class NewRecipeForm extends FoodieForm {
	protected $intNavSectionId = FoodieForm::NavSectionRecipes;
	protected $strPageTitle = 'Create New Recipe';
	protected $txtRecipeName;
	protected $txtRecipeDescription;
	protected $dtgIngredients;
	protected $btnAddIngredient;
	protected $txtInstructions;
	protected $txtServingSize;
	protected $txtPreparationTime;
	protected $mealTypeArray;
	protected $cuisineTypeArray;
	protected $cookStyleTypeArray;
	
	protected $btnSubmit;
	
	protected $objRecipe = null;
	protected $intRecipeId;

	protected $intIngredientId;
	 
    protected $dlgAddIngredientWidget;

	protected function Form_Create() {
		$this->txtRecipeName = new QTextBox($this);
		$this->txtRecipeName->Name = 'Recipe Name: ';
		
		$this->txtRecipeDescription = new QTextBox($this);
		$this->txtRecipeDescription->Height = 50;
		$this->txtRecipeDescription->Width = 500;
		$this->txtRecipeDescription->Columns = 500;
		$this->txtRecipeDescription->Rows = 20;
		$this->txtRecipeDescription->Name = 'Description';
		$this->txtRecipeDescription->TextMode = 'MultiLine';
		
		$this->dtgIngredients = new QDataGrid($this);
		$this->dtgIngredients->Paginator = new QPaginator($this->dtgIngredients);
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Ingredient', '<?= $_ITEM->Name ?>', 'Width=150px'));
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Amount', '<?= $_ITEM->InitialAmount ?>', 'Width=150px'));	
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Unit Of Measure', '<?= UnitOfMeasurementType::ToString($_ITEM->UnitOfMeasurementId)  ?>', 'Width=150px'));	
		$this->dtgIngredients->SetDataBinder('dtgIngredients_Bind');
		$this->dtgIngredients->NoDataHtml = 'No Ingredient Found.';	
		$this->dtgIngredients->SortColumnIndex = 1;
		$this->dtgIngredients->ItemsPerPage = 20;
		$this->dtgIngredients->UseAjax = true;
		          
	 	$this->btnAddIngredient = new QButton($this);
	 	$this->btnAddIngredient->Text = 'Add Ingredient';
	 	$this->btnAddIngredient->AddAction(new QClickEvent(),new QAjaxAction('btnAddIngredient_Click'));
	 
	 	$this->txtInstructions = new QTextBox($this);
		$this->txtInstructions->Height = 300;
		$this->txtInstructions->Width = 700;
		$this->txtInstructions->Columns = 700;
		$this->txtInstructions->Rows = 100;
		$this->txtInstructions->TextMode = 'MultiLine';
		
	 	$this->txtServingSize = new QTextBox($this);
	 	$this->txtServingSize->Width = 40;
	 	$this->txtServingSize->CssClass = 'inputField';
	 		 
	 	$this->txtPreparationTime = new QTextBox($this);
	 	$this->txtPreparationTime->Width = 40;
	 	$this->txtPreparationTime->CssClass = 'inputField';
	 	
	 	$this->mealTypeArray = array();
	 	foreach(MealType::$NameArray as $key => $strMealType) {
	 		$btnMealType = new QCheckBox($this); 
	 		$btnMealType->Text = $strMealType;
	 		$btnMealType->Name = $key;
	 		$this->mealTypeArray[] = $btnMealType;
	 	}
	 
	 	$this->cuisineTypeArray = array();
	 	$this->cookStyleTypeArray = array();
	 	
	 	foreach(Category::LoadAll() as $objCategory) {
	 		$btnCategory = new QCheckBox($this); 
	 		$btnCategory->Text = $objCategory->Name;
	 		$btnCategory->Name = $objCategory->Id;
	 		
	 		if ($objCategory->Group == 'Cuisine') {
	 			$this->cuisineTypeArray[] = $btnCategory;
	 		}
	 		
	 		if ($objCategory->Group == 'Cooking Style') {
	 			$this->cookStyleTypeArray[] = $btnCategory;
	 		}
	 	}
	 	            
	 	$this->btnSubmit = new QButton($this);
	 	$this->btnSubmit->Text = 'Submit Recipe';
	 	$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmitRecipe'));
	 	
	 	// Define the CalculatorWidget example. passing in the Method Callback for whenever the Calculator is Closed
            $this->dlgAddIngredientWidget = new CalculatorWidget('btnAddIngredient_Close', $this);
            $this->dlgAddIngredientWidget->Visible = false;            
	}

	public function btnSubmitRecipe() {
		// Save the Recipe with updated values
		if (!$this->objRecipe) {
			$this->objRecipe = new Recipe();
		}
		$this->objRecipe->Name = $this->txtRecipeName->Text;
		$this->objRecipe->Description = $this->txtRecipeDescription->Text;
		$this->objRecipe->Instructions = $this->txtInstructions->Text;
		$this->objRecipe->PreparationTime = (float)$this->txtPreparationTime->Text;
		$this->objRecipe->ServingSize = (int)$this->txtServingSize->Text;
		$this->objRecipe->Owner = QApplication::$Login;
		$this->objRecipe->OwnerId = QApplication::$LoginId;
		foreach($this->mealTypeArray as $btnMealType){
			if ($btnMealType->Checked){
				$this->objRecipe->MealTypeId = $btnMealType->Name;
			}
		}

		foreach($this->cuisineTypeArray as $key => $btnCuisineType){
			if ($btnCuisineType->Checked){
				$this->objRecipe->AssociateCategory(Category::Load($btnCuisineType->Name));
			}
		}
		$this->intRecipeId = $this->objRecipe->Save();
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]);
	}
	
	public function dtgIngredients_Bind() {		
		if ($this->objRecipe != null) {	
			$this->dtgIngredients->DataSource = Ingredient::LoadArrayByRecipe($this->objRecipe->Id);
		} else {
			return;
		}
	}
	
 	protected function btnAddIngredient_Click($strFormId, $strControlId, $strParameter) {
	 	if (!$this->objRecipe) {
				$this->objRecipe = new Recipe();
				$this->intRecipeId = $this->objRecipe->Save();
		}
        $this->dlgAddIngredientWidget->ShowDialogBox();
 	}
        
        // Setup the "Callback" function for when the calculator closes
        // This needs to be a public method
        public function btnAddIngredient_Close() {
            // create association with ingredient
			$this->intIngredientId = $this->dlgAddIngredientWidget->Value;
			$this->objRecipe->AssociateIngredient(Ingredient::Load($this->intIngredientId));
			
			// Refresh the Ingredient datagrid
			$this->dtgIngredients->PageNumber = 1;
			$this->dtgIngredients->Refresh();
        }
}

NewRecipeForm::Run('NewRecipeForm');
?>
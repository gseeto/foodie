<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class CalculateRecipeForm extends FoodieForm {
	protected $intNavSectionId = FoodieForm::NavSectionRecipes;
	protected $strPageTitle = 'Calculate Recipe';
	protected $lblRecipeName;
	protected $lblRecipeDescription;
	protected $dtgIngredients;
	protected $txtInstructions;
	protected $txtNewServingSize;
	protected $lblServingSize;
	protected $lblPreparationTime;
	protected $btnReturn;

	protected $btnCalculate;
	protected $lblTotalCost;
	protected $lblCostPerPlate;
	
	protected $objRecipe = null;
	protected $intRecipeId;
	protected $intEditIngredientId = null;	
	protected $txtCost;
	protected $lstUnitOfMeasure;
	protected $pnlCost;
	protected $btnSave;
	protected $btnCancel;
	
	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		if (!QApplication::$PathInfo) return;
		
		$this->objRecipe = Recipe::Load(QApplication::PathInfo(0));
		if(null == $this->objRecipe)
			return;
			
		$this->lblCostPerPlate = new QLabel($this);
		$this->lblTotalCost = new QLabel($this);
		
		$this->lblRecipeName = new QLabel($this);
		$this->lblRecipeName->Name = 'Recipe Name: ';
		$this->lblRecipeName->Text = $this->objRecipe->Name;
		
		$this->lblRecipeDescription = new QLabel($this);
		$this->lblRecipeDescription->Height = 50;
		$this->lblRecipeDescription->Width = 500;		
		$this->lblRecipeDescription->Name = 'Description';
		$this->lblRecipeDescription->Text = $this->objRecipe->Description;
		
		$this->dtgIngredients = new QDataGrid($this);
		$this->dtgIngredients->Paginator = new QPaginator($this->dtgIngredients);
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Ingredient', '<?= $_ITEM->Name ?>', 'Width=150px'));
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Initial Amount', '<?= $_FORM->RenderInitialAmount($_ITEM) ?>', 'Width=150px'));	
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Amount Required', '<?= $_FORM->RenderAmountRequired($_ITEM) ?>', 'Width=150px')); 	
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Cost', '<?= $_FORM->RenderCost($_ITEM) ?>', 'Width=200px', 'HtmlEntities=false'));	
        $this->dtgIngredients->AddColumn(new QDataGridColumn('Edit', '<?= $_FORM->EditColumn_Render($_ITEM) ?>', 'Width=120', 'HtmlEntities=false'));
		$this->dtgIngredients->SetDataBinder('dtgIngredients_Bind');
		$this->dtgIngredients->NoDataHtml = 'No Ingredient Found.';	
		$this->dtgIngredients->SortColumnIndex = 1;
		$this->dtgIngredients->ItemsPerPage = 20;
		$this->dtgIngredients->UseAjax = true;
		
		// Make the DataGrid look nice
        $objStyle = $this->dtgIngredients->RowStyle;
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgIngredients->AlternateRowStyle;
        $objStyle->BackColor = '#eaeaea';

        $objStyle = $this->dtgIngredients->HeaderRowStyle;
        $objStyle->ForeColor = 'white';
        $objStyle->BackColor = '#000066';
		        	 		
		$this->txtInstructions = new QTextBox($this);
		$this->txtInstructions->Height = 300;
		$this->txtInstructions->Width = 700;
		$this->txtInstructions->Columns = 700;
		$this->txtInstructions->Rows = 100;
		$this->txtInstructions->TextMode = 'MultiLine';
		$this->txtInstructions->Enabled = false;
		$this->txtInstructions->Text = $this->objRecipe->Instructions;
		
	 	$this->txtNewServingSize = new QTextBox($this);
	 	$this->txtNewServingSize->Width = 40;
	 	$this->txtNewServingSize->CssClass = 'inputField';
	 	$this->txtNewServingSize->Text = $this->objRecipe->ServingSize; // Initialize with base serving size

	 	$this->lblServingSize  = new QLabel($this);
	 	$this->lblServingSize->Width = 40;
	 	$this->lblServingSize->CssClass = 'inputField';
	 	$this->lblServingSize->Text = $this->objRecipe->ServingSize;
	 	
	 	$this->lblPreparationTime = new QLabel($this);
	 	$this->lblPreparationTime->Width = 40;
	 	$this->lblPreparationTime->CssClass = 'inputField';
	 	$this->lblPreparationTime->Text = $this->objRecipe->PreparationTime;
	 	
	 	$this->btnCalculate = new QButton($this);
	 	$this->btnCalculate->Text = 'Calculate Amount Required And Total Cost';
	 	$this->btnCalculate->AddAction(new QClickEvent(), new QAjaxAction('btnCalculateAmount'));

	 	$this->pnlCost = new QPanel($this->dtgIngredients);
	 	$this->pnlCost->AutoRenderChildren = true;
	 	$this->pnlCost->Text = '';
	 	
	 	$this->txtCost = new QTextBox($this->pnlCost);
	 	$this->txtCost->Width = 50;
	 	$this->txtCost->AddAction(new QEscapeKeyEvent(), new QAjaxAction('btnCancel_Click'));
        $this->txtCost->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        
        $this->lstUnitOfMeasure = new QListBox($this->pnlCost);
		$this->lstUnitOfMeasure->Name = "Unit Of Measure";
		$this->lstUnitOfMeasure->Width = 100;
	    $i = 0;
		foreach(UnitOfMeasurementType::$NameArray as $strMeasurementType) {
			$i++;
			$this->lstUnitOfMeasure->AddItem($strMeasurementType,$i);
		}
        
		
        // We want the Save button to be Primary, so that the save will perform if the 
        // user hits the enter key in either of the textboxes.
        $this->btnSave = new QButton($this->dtgIngredients);
        $this->btnSave->Text = 'Save';
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;

        // Make sure we turn off validation on the Cancel button
        $this->btnCancel = new QButton($this->dtgIngredients);
        $this->btnCancel->Text = 'Cancel';
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));        
        $this->btnCancel->CausesValidation = false;
        
        $this->btnReturn = new QButton($this);
	 	$this->btnReturn->Text = 'Return to Recipe List';
	 	$this->btnReturn->AddAction(new QClickEvent(), new QAjaxAction('btnReturnMenu'));
	}

	// When we Render, we need to see if we are currently editing someone
    protected function Form_PreRender() {
            // We want to force the datagrid to refresh on EVERY button click
            // Normally, the datagrid won't re-render on the ajaxactions because nothing
            // in the datagrid, itself, is being modified.  But considering that every ajax action
            // on the page (e.g. every button click) makes changes to things that AFFECT the datagrid,
            // we need to explicitly force the datagrid to "refresh" on every event/action.  Therefore,
            // we make the call to Refresh() in Form_PreRender
        $this->dtgIngredients->Refresh();
    }

	public function btnReturnMenu() {
		QApplication::Redirect(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]);
	}
	
	public function EditColumn_Render (Ingredient $objIngredient) {
		if (($objIngredient->Id == $this->intEditIngredientId))
            return $this->btnSave->Render(false) . '&nbsp;' . $this->btnCancel->Render(false);
        else {
            // Get the Edit button for this row (we will create it if it doesn't yet exist)
            $strControlId = 'btnEdit' . $objIngredient->Id;
            $btnEdit = $this->GetControl($strControlId);
            if (!$btnEdit) {
                // Create the Edit button for this row in the DataGrid
                // Use ActionParameter to specify the ID of the person
                $btnEdit = new QButton($this->dtgIngredients, $strControlId);
                $btnEdit->Text = 'Edit Ingredient Cost';
                $btnEdit->ActionParameter = $objIngredient->Id;
                $btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
                $btnEdit->CausesValidation = false;
            }

            // If we are currently editing a ingredient, then set this Edit button to be disabled
            if ($this->intEditIngredientId)
                $btnEdit->Enabled = false;
            else
                $btnEdit->Enabled = true;

            // Return the rendered Edit button
            return $btnEdit->Render(false);
        }
    }
    
    // Handle the action for the Edit button being clicked.  We must
    // setup the FirstName and LastName textboxes to contain the name of the person
    // we are editing.
    protected function btnEdit_Click($strFormId, $strControlId, $strParameter) {
        $this->intEditIngredientId = $strParameter;
        $objIngredient = Ingredient::Load($strParameter);
        $this->txtCost->Text = $objIngredient->Cost;

        // Let's put the focus on the Cost Textbox
       // QApplication::ExecuteJavaScript(sprintf('qcodo.getControl("%s").focus()', $this->txtCost->ControlId));
    }

	// Handle the action for the Save button being clicked.
    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {      
        $objIngredient = Ingredient::Load($this->intEditIngredientId);
        $objIngredient->Cost = trim($this->txtCost->Text);   
        $objIngredient->CostUnitOfMeasurement = $this->lstUnitOfMeasure->SelectedValue;  
        $objIngredient->Save();
        $this->intEditIngredientId = null;
    }
        
	// Handle the action for the Cancel button being clicked.
    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->intEditIngredientId = null;
    }
        
	public function RenderAmountRequired(Ingredient $objIngredient) {
		$strRequiredAmount = ((float)$objIngredient->InitialAmount/$this->objRecipe->ServingSize) * (float)$this->txtNewServingSize->Text;
		return $strRequiredAmount . " ". UnitOfMeasurementType::ToString($objIngredient->UnitOfMeasurementId);
	}
	
	public function RenderInitialAmount(Ingredient $objIngredient) {
		return $objIngredient->InitialAmount . " ". UnitOfMeasurementType::ToString($objIngredient->UnitOfMeasurementId);
	}
	
	public function RenderCost(Ingredient $objIngredient) {
		if (($objIngredient->Id == $this->intEditIngredientId)) {
			return $this->pnlCost->RenderWithError(false);
               // return $this->txtCost->RenderWithError(false);
		} else
                // Because we are rendering with HtmlEntities set to false on this column
                // we need to make sure to escape the value
                return QApplication::HtmlEntities(" $".$objIngredient->Cost . " per ". UnitOfMeasurementType::ToString($objIngredient->CostUnitOfMeasurement));
	}

	public function btnCalculateAmount() {
		$this->dtgIngredients->Refresh();
		$fltTotalCost = 0;
		$objArrayIngredients = Ingredient::LoadArrayByRecipe($this->objRecipe->Id);
		foreach ($objArrayIngredients as $objIngredient) {
			$fltRequiredAmount = ((float)$objIngredient->InitialAmount/$this->objRecipe->ServingSize) * (float)$this->txtNewServingSize->Text;
			$fltCost  = ($fltRequiredAmount / UnitOfMeasurementType::ToConversionRatio($objIngredient->UnitOfMeasurementId))
			 			* ($objIngredient->Cost/UnitOfMeasurementType::ToConversionRatio($objIngredient->CostUnitOfMeasurement));
			$fltTotalCost += $fltCost;
		}
		$this->lblTotalCost->Text = "$ " . round($fltTotalCost,2);
		$this->lblCostPerPlate->Text = "$ ". round((float)$fltTotalCost/(int)$this->txtNewServingSize->Text, 2);
	}
	
	
	public function dtgIngredients_Bind() {		
		if ($this->objRecipe != null) {	
			$this->dtgIngredients->DataSource = Ingredient::LoadArrayByRecipe($this->objRecipe->Id);
		} else {
			return;
		}
	}
}

CalculateRecipeForm::Run('CalculateRecipeForm');
?>
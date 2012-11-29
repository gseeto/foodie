<?php
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

    class ViewRecipesPanel extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $strName;
		public $iPreparationTime;
		public $iServingSize;
		public $strOwner;
		public $btnSubmit;

		public $dtgRecipes;

        // The Menu object we're attempting to associate Recipes with
        protected $objMenu;
        protected $intMealType;
        protected $selectedRecipeArray;
        protected $strMethodCallBack;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'viewRecipesPanel.tpl.php';

        // Customize the Look/Feel
        protected $strPadding = '10px';
        protected $strBackColor = '#fefece';

        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $objMenu,$intMealType, $strMethodCallBack, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            
            // Set the local Menu object
            $this->objMenu = $objMenu;
            $this->intMealType = $intMealType;
            $this->strMethodCallBack = $strMethodCallBack;
            $this->selectedRecipeArray = array();
            
            // Let's set up some other local child control
            $this->dtgRecipes = new RecipeDataGrid($this);  //new QDataGrid($this);  
			$this->dtgRecipes->Paginator = new QPaginator($this->dtgRecipes);
			$this->dtgRecipes->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."editRecipe.php" ?>','<?=$_ITEM->Name?>','Name');
			$this->dtgRecipes->MetaAddColumn('Description','Html=<?=$_ITEM->Description; ?>', 'HtmlEntities=False', 'Width=480px');
			$this->dtgRecipes->MetaAddTypeColumn('MealTypeId', 'MealType');
			$this->dtgRecipes->MetaAddColumn('Owner', 'Html=<?=$_CONTROL->ParentControl->RenderOwner($_ITEM->OwnerId); ?>','Width=100px');
            $this->dtgRecipes->AddColumn(new QDataGridColumn('Select Recipe', '<?= $_CONTROL->ParentControl->chkSelected_Render($_ITEM) ?>', 'HtmlEntities=false' ));
            
			$this->dtgRecipes->CellPadding = 5;
			$this->dtgRecipes->SetDataBinder('dtgRecipes_Bind',$this);
			$this->dtgRecipes->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
			$this->dtgRecipes->UseAjax = true;
			
			$this->dtgRecipes->SortColumnIndex = 1;
			$this->dtgRecipes->ItemsPerPage = 20;
		
			$objStyle = $this->dtgRecipes->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgRecipes->AlternateRowStyle;
	        $objStyle->BackColor = '#CC66CC';
	
	        $objStyle = $this->dtgRecipes->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#663366'; 
	        
	        $objStyle = $this->dtgRecipes->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#663366'; 
	
			$this->strName = new QTextBox($this);
			$this->strName->Name = 'Recipe Name (including mispellings, etc.)';
			$this->strName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->strName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->strName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strName->Focus();
			
			$this->strOwner = new QTextBox($this);
			$this->strOwner->Name = 'Owner';
			$this->strOwner->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->strOwner->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->strOwner->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strOwner->Focus();
			
			$this->iPreparationTime = new QTextBox($this);
			$this->iPreparationTime->Name = 'Preparation Time';
			$this->iPreparationTime->Width = 50;
			$this->iPreparationTime->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->iPreparationTime->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->iPreparationTime->AddAction(new QEnterKeyEvent(), new QTerminateAction());
						
			$this->iServingSize = new QTextBox($this);
			$this->iServingSize->Name = 'Serving Size';
			$this->iServingSize->Width = 30;
			$this->iServingSize->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->iServingSize->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgRecipes_Refresh'));
			$this->iServingSize->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Recipes to Menu";
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
        }
        
    public function dtgRecipes_Refresh($strFormId, $strControlId, $strParameter) {
		$this->dtgRecipes->PageNumber = 1;
		$this->dtgRecipes->Refresh();
	}

     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		//Associate selected Recipes and hide panel
		foreach($this->selectedRecipeArray as $intRecipeId) {
			$this->objMenu->AssociateRecipe(Recipe::Load($intRecipeId));
		}
		$this->Visible = false;
		// And call the Form's Method CallBack, passing in "true" to state that we've made an update
        $strMethodCallBack = $this->strMethodCallBack;
        $this->objForm->$strMethodCallBack(true);
	}
	
    // This method (declared as public) will help with the checkbox column rendering
    public function chkSelected_Render(Recipe $objRecipe) {
     	$strControlId = 'chkSelected' . $objRecipe->Id;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->objForm->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgRecipes, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objRecipe->Id;
            $chkSelected->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkSelected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
		$intRecipeId = $strParameter;
		if ($this->objForm->GetControl($strControlId)->Checked) {
			if (!in_array ($intRecipeId, $this->selectedRecipeArray))
				$this->selectedRecipeArray[] = $intRecipeId;
		} else {
			$key = array_search($intRecipeId, $this->selectedRecipeArray);
			unset($this->selectedRecipeArray[$key]);
		}
    }
        
	public function dtgRecipes_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		if ($strName = trim($this->strName->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Recipe()->Name, $strName . '%')
			);
		}

		if ($strName = trim($this->iServingSize->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Recipe()->ServingSize, (int)$strName)
			);
		}
					

		if ($strName = trim($this->iPreparationTime->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Recipe()->PreparationTime, $strName . '%')
			);
		}
		
		if ($strName = trim($this->strOwner->Text)) {
			$objLoginArray = Login::LoadArrayByUsername($strName);
			if (null != $objLoginArray) {
				$objLogin = $objLoginArray[0]; // there should be only one.
				$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Recipe()->OwnerId, (int)$objLogin->Id)
			);
			} 
		}
		
		$recipeArray = Recipe::QueryArray($objConditions,$objClauses);
		$recipeSpecificArray = array();
		foreach($recipeArray as $objRecipe) {
			if ($objRecipe->MealTypeId == $this->intMealType)
				$recipeSpecificArray[] = $objRecipe;
		}
		$this->dtgRecipes->DataSource = $recipeSpecificArray; 
	}

	public function RenderOwner($intOwnerID) {
		$objOwner = Login::Load($intOwnerID);
		if($objOwner) {
			return $objOwner->Username;
		} else {
			return 'None';
		}
	}
 
    }
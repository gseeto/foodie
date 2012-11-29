<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class RecipeForm extends FoodieForm {
	protected $strPageTitle = 'Recipes';
	protected $intNavSectionId = FoodieForm::NavSectionRecipes;

	protected $strName;
	protected $iPreparationTime;
	protected $iServingSize;
	protected $strOwner;

	protected $dtgRecipes;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		$this->dtgRecipes = new RecipeDataGrid($this);
		$this->dtgRecipes->Paginator = new QPaginator($this->dtgRecipes);
		
		$this->dtgRecipes->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."editRecipe.php" ?>','<?=$_ITEM->Name?>','Name');
		$this->dtgRecipes->MetaAddColumn('Description','Html=<?=$_ITEM->Description; ?>', 'HtmlEntities=False', 'Width=480px');
		$this->dtgRecipes->MetaAddColumn('ServingSize', 'Html=<?=$_ITEM->ServingSize; ?>','Width=100px');
		$this->dtgRecipes->MetaAddColumn('PreparationTime', 'Html=<?=$_ITEM->PreparationTime . " mins" ?>','Width=100px');
		$this->dtgRecipes->MetaAddTypeColumn('MealTypeId', 'MealType');
		$this->dtgRecipes->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]."calculateRecipe.php" ?>','<?=$_ITEM->ServingSize?>','Calculate For');
		$this->dtgRecipes->MetaAddColumn('Owner', 'Html=<?=$_FORM->RenderOwner($_ITEM->OwnerId); ?>','Width=100px');
		
		$this->dtgRecipes->CellPadding = 5;
		$this->dtgRecipes->SetDataBinder('dtgRecipes_Bind');
		$this->dtgRecipes->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
		
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
		$this->strName->AddAction(new QChangeEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->strName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->strName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strName->Focus();
		
		$this->strOwner = new QTextBox($this);
		$this->strOwner->Name = 'Owner';
		$this->strOwner->AddAction(new QChangeEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->strOwner->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->strOwner->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strOwner->Focus();
		
		$this->iPreparationTime = new QTextBox($this);
		$this->iPreparationTime->Name = 'Preparation Time';
		$this->iPreparationTime->Width = 50;
		$this->iPreparationTime->AddAction(new QChangeEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->iPreparationTime->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->iPreparationTime->AddAction(new QEnterKeyEvent(), new QTerminateAction());
					
		$this->iServingSize = new QTextBox($this);
		$this->iServingSize->Name = 'Serving Size';
		$this->iServingSize->Width = 30;
		$this->iServingSize->AddAction(new QChangeEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->iServingSize->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgRecipes_Refresh'));
		$this->iServingSize->AddAction(new QEnterKeyEvent(), new QTerminateAction());
	}
	
	protected function dtgRecipes_Refresh() {
		$this->dtgRecipes->PageNumber = 1;
		$this->dtgRecipes->Refresh();
	}

	public function dtgRecipes_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		if ($strName = trim($this->strName->Text)) {
			//Recipe::PrepareQqForSearch($strName, $objConditions, $objClauses);
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
		$this->dtgRecipes->MetaDataBinder($objConditions, $objClauses);
	}
	
	public function RenderMealType($intMealType) {
		return MealType::ToString($intMealType);
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

RecipeForm::Run('RecipeForm');
?>
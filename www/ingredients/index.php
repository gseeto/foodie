<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class IngredientsForm extends FoodieForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Ingredients';
	protected $intNavSectionId = FoodieForm::NavSectionIngredients;
	protected $strIngredient;
	protected $dtgIngredients;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		
		$this->dtgIngredients = new IngredientDataGrid($this);
		$this->dtgIngredients->Paginator = new QPaginator($this->dtgIngredients);
		
		$this->dtgIngredients->AddColumn(new QDataGridColumn('Ingredient Name', '<?=$_ITEM->Name?>', 'Width=200px', 'HtmlEntities=false'));
		$this->dtgIngredients->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1]."ingredientLocation.php" ?>','Source','Where To Get',QMetaControlArgumentType::PathInfo); 	
		$this->dtgIngredients->CellPadding = 5;
		$this->dtgIngredients->SetDataBinder('dtgIngredients_Bind');
		$this->dtgIngredients->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
		
		$this->dtgIngredients->SortColumnIndex = 1;
		$this->dtgIngredients->ItemsPerPage = 20;
		$this->dtgIngredients->Width = 600;

        $objStyle = $this->dtgIngredients->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgIngredients->AlternateRowStyle;
        $objStyle->BackColor = '#CC66CC';

        $objStyle = $this->dtgIngredients->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $objStyle = $this->dtgIngredients->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $this->strIngredient = new QTextBox($this);
		$this->strIngredient->Name = 'Ingredient Name (including mispellings, etc.)';
		$this->strIngredient->AddAction(new QChangeEvent(), new QAjaxAction('dtgIngredients_Refresh'));
		$this->strIngredient->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgIngredients_Refresh'));
		$this->strIngredient->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strIngredient->Focus();
	}
	
	protected function dtgIngredients_Refresh() {
		$this->dtgIngredients->PageNumber = 1;
		$this->dtgIngredients->Refresh();
	}

	public function dtgIngredients_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		array_push($objClauses, QQ::OrderBy(QQN::Ingredient()->Name));
		array_push($objClauses, QQ::Distinct(QQN::Ingredient()->Name));
		if ($strIngredient = trim($this->strIngredient->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Ingredient()->Name, $strIngredient . '%')
			);
		}		
		$ingredientArray = Ingredient::QueryArray($objConditions,$objClauses);
		$ingredientNameArray = array();
		$objUniqueIngredientArray = array();
		foreach($ingredientArray as $objIngredient) {
			if (!in_array($objIngredient->Name,$ingredientNameArray)) {
				$ingredientNameArray[] = $objIngredient->Name;
				$objUniqueIngredientArray[] = $objIngredient;
			}
		}
		$this->dtgIngredients->DataSource = $objUniqueIngredientArray; 
	}

}

IngredientsForm::Run('IngredientsForm');
?>
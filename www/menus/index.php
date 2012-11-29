<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class MenuForm extends FoodieForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Menus';
	protected $intNavSectionId = FoodieForm::NavSectionMenus;
	protected $lblDebug;
	protected $strOwner;
	protected $strName;
	protected $dtgMenu;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		
		$this->dtgMenu = new MenuDataGrid($this);
		$this->dtgMenu->Paginator = new QPaginator($this->dtgMenu);
		
		$this->dtgMenu->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1]."editMenu.php" ?>','<?=$_ITEM->Name?>','Menu Name');
		$this->dtgMenu->AddColumn(new QDataGridColumn('Description', '<?=$_ITEM->Description?>', 'Width=200px', 'HtmlEntities=false'));
		$this->dtgMenu->MetaAddColumn('Owner', 'Html=<?=$_FORM->RenderOwner($_ITEM->OwnerId); ?>','Width=100px');
		$this->dtgMenu->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1]."calculateMenu.php" ?>','Servings','Calculate');
		$this->dtgMenu->CellPadding = 5;
		$this->dtgMenu->SetDataBinder('dtgMenu_Bind');
		$this->dtgMenu->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
		
		$this->dtgMenu->SortColumnIndex = 1;
		$this->dtgMenu->ItemsPerPage = 20;
		$this->dtgMenu->Width = 800;
	
        $objStyle = $this->dtgMenu->RowStyle;
        $objStyle->BackColor = '#ffffff';
        $objStyle->FontSize = 12;

        $objStyle = $this->dtgMenu->AlternateRowStyle;
        $objStyle->BackColor = '#CC66CC';

        $objStyle = $this->dtgMenu->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $objStyle = $this->dtgMenu->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#663366'; 
        
        $this->strName = new QTextBox($this);
		$this->strName->Name = 'Menu Name';
		$this->strName->AddAction(new QChangeEvent(), new QAjaxAction('dtgMenu_Refresh'));
		$this->strName->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgMenu_Refresh'));
		$this->strName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strName->Focus();
		
		$this->strOwner = new QTextBox($this);
		$this->strOwner->Name = 'Menu Name';
		$this->strOwner->AddAction(new QChangeEvent(), new QAjaxAction('dtgMenu_Refresh'));
		$this->strOwner->AddAction(new QEnterKeyEvent(), new QAjaxAction('dtgMenu_Refresh'));
		$this->strOwner->AddAction(new QEnterKeyEvent(), new QTerminateAction());
		$this->strOwner->Focus();
	}

	protected function dtgMenu_Refresh() {
		$this->dtgMenu->PageNumber = 1;
		$this->dtgMenu->Refresh();
	}

	public function dtgMenu_Bind() {
		$objConditions = QQ::All();
		$objClauses = array();

		array_push($objClauses, QQ::OrderBy(QQN::Menu()->Name));
		array_push($objClauses, QQ::Distinct(QQN::Menu()->Name));
		if ($strName = trim($this->strName->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::Menu()->Name, $strName . '%')
			);
		}
		if ($strName = trim($this->strOwner->Text)) {
			$objLoginArray = Login::LoadArrayByUsername($strName);
			if (null != $objLoginArray) {
				$objLogin = $objLoginArray[0]; // there should be only one.
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Equal( QQN::Menu()->OwnerId, (int)$objLogin->Id)
				);
			} 
		}				
		$menuArray = Menu::QueryArray($objConditions,$objClauses);
		$this->dtgMenu->DataSource = $menuArray; 
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

MenuForm::Run('MenuForm');
?>
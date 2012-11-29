<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class HomeForm extends FoodieForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = FoodieForm::NavSectionHome;
	protected $lblDebug;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/foodie/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		//$this->arrNavigation = array();
		//foreach(FoodieForm::NavSectionArray as $navSection) {
			//$btnNav = new QLinkButton($this);
			//$btnNav->Text = $navSection[1];
			//$btnNav->AddAction(new QClickEvent(), QApplication::Redirect(__SUBDIRECTORY__.$navSection[0]));
			//$this->arrNavigation[] = $btnNav;
			if (QApplication::$Login)
				$this->lblDebug->Text = "we got a login: ". QApplication::$Login->Username;
			else 
				$this->lblDebug->Text = "we did NOT get a login! Login ID = ".QApplication::$LoginId;
		//}  
		
	}

}

HomeForm::Run('HomeForm');
?>
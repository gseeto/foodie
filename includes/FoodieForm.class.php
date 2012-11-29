<?php
class FoodieForm extends QForm {
	protected $strPageTitle;
	protected $intNavSectionId;

	const NavSectionHome = 1;
	const NavSectionRecipes = 2;
	const NavSectionMenus = 3;
	const NavSectionIngredients = 4;
	const NavSectionAdministration = 5;

	public static $NavSectionArray = array(
	FoodieForm::NavSectionHome => array('Home', '/main/'),
	FoodieForm::NavSectionRecipes => array('Recipes', '/recipes/'),
	FoodieForm::NavSectionMenus => array('Menus', '/menus/'),
	FoodieForm::NavSectionIngredients => array('Ingredients', '/ingredients/'),
	/*FoodieForm::NavSectionAdministration => array('Admin', '/admin/')*/
	);
}
?>

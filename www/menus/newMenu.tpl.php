<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<div class="navSection">
	<a href='<? _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionHome][1])?>'> <?php _p(FoodieForm::$NavSectionArray[FoodieForm::NavSectionHome][0])?></a>
	<a href='<? _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1])?>'> <?php _p(FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][0])?></a>
	<a class='navSectionSelected' href='<? _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1])?>'> <?php _p(FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][0])?></a>
	<a href='<? _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1])?>'> <?php _p(FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][0])?></a>
</div>
<h1>Create Menu</h1>

<div class="section">
	<h3>Menu Details</h3>
	<p><?php $this->txtMenuName->RenderWithName(); ?> </p>
	<p><?php $this->txtMenuDescription->RenderWithName(); ?> </p>

	<h3>Appetizers</h3>
	<p>Select the Appetizers you wish to add to this Menu</p>
	<?php $this->dtgAppetizers->Render();?>
	<?php $this->btnAddAppetizer->Render();?>
	<?php $this->pnlAddAppetizer->Render(); ?>
	
	<h3>Main Meal</h3>
	<p>Select the Main Meals you wish to add to this Menu</p>
	<?php $this->dtgMainMeal->Render(); ?>
	<?php $this->btnAddMainMeal->Render(); ?>
	<?php $this->pnlAddMainMeal->Render(); ?>
	
	<h3>Dessert</h3>
	<p>Select the Desserts you wish to add to this Menu</p>
	<?php $this->dtgDessert->Render(); ?>
	<?php $this->btnAddDessert->Render(); ?>
	<?php $this->pnlAddDessert->Render(); ?>
	
</div>

<div class="buttonSection">
	<?php $this->btnSubmit->Render('CssClass=primary'); ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<h1>Edit Menu</h1>

<div class="section">
	<h3>Menu Details</h3>
	<p><?php $this->txtMenuName->RenderWithName(); ?> </p>
	<p><?php $this->txtMenuDescription->RenderWithName(); ?> </p>

	<h3>Appetizers</h3>
	<p>Select the Appetizers you wish to add to this Menu</p>
	<?php $this->dtgAppetizers->Render();?>
	<?php $this->btnAddAppetizer->Render('CssClass=primary');?>
	<?php $this->pnlAddAppetizer->Render(); ?>
	
	<h3>Main Meal</h3>
	<p>Select the Main Meals you wish to add to this Menu</p>
	<?php $this->dtgMainMeal->Render(); ?>
	<?php $this->btnAddMainMeal->Render('CssClass=primary'); ?>
	<?php $this->pnlAddMainMeal->Render(); ?>
	
	<h3>Dessert</h3>
	<p>Select the Desserts you wish to add to this Menu</p>
	<?php $this->dtgDessert->Render(); ?>
	<?php $this->btnAddDessert->Render('CssClass=primary'); ?>
	<?php $this->pnlAddDessert->Render(); ?>
	
</div>

<div class="buttonSection">
	<?php $this->btnSubmit->Render('CssClass=primary'); ?>
	<?php $this->btnReturn->Render('CssClass=primary'); ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
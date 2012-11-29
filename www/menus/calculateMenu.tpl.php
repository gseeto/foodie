<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Calculate Cost/Numbers for <?php $this->lblMenuName->Render(); ?></h1>

<div class="section">
	<h3><?php _p($this->lblMenuName->Text); ?> Menu Details</h3>
	<p>Description: <?php $this->lblMenuDescription->Render(); ?> </p>
	<p>Owner: <?php $this->lblMenuOwner->Render(); ?> </p>
	<br>	
	<div style="clear:both"></div>
</div>
<div class="section">
	<h3>Appetizer</h3>
 	<?php $this->dtgAppetizer->Render(); ?> 
</div>
<div class="section">
	<h3>Main Meal</h3>
 	<?php $this->dtgMainMeal->Render(); ?> 
</div>
<div class="section">
	<h3>Dessert</h3>
 	<?php $this->dtgDessert->Render(); ?> 
</div>
<div class="section">
<h3>Calculate</h3>
<p>Select the number of Servings you wish to make: <?php $this->txtNewServingSize->Render(); ?> people</p>
<?php $this->btnCalculate->Render('CssClass=primary'); ?>
<p>Total Cost Of Ingredients: <?php $this->lblTotalCost->Render();?> </p>
<p>Cost Per Plate: <?php $this->lblCostPerPlate->Render();?> </p>
</div>
<div class="buttonSection">
	<?php $this->btnReturn->Render('CssClass=primary'); ?>
</div>


<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

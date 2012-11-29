<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Calculate Cost/Numbers for <?php $this->lblRecipeName->Render(); ?></h1>

<div class="section">
	<h3>Recipe Details</h3>
	<p><?php $this->lblRecipeDescription->RenderWithName(); ?> </p>
	<br>
	<p>Initial Serving Size: <?php $this->lblServingSize->Render(); ?> people</p>
	<p>Initial Preparation Time: <?php $this->lblPreparationTime->Render(); ?> minutes</p>
	
	<div style="clear:both"></div>
</div>
<div class="section">
<p>Select the number of Servings you wish to make: <?php $this->txtNewServingSize->Render(); ?> people</p>
<?php $this->btnCalculate->Render('CssClass=primary'); ?>
<p>Total Cost Of Ingredients: <?php $this->lblTotalCost->Render();?> </p>
<p>Cost Per Plate: <?php $this->lblCostPerPlate->Render();?> </p>
</div>
<div class="section">
	<h3>Ingredients</h3>
 	<?php $this->dtgIngredients->Render(); ?> 
</div>

<div class="section">
	<h3>Instructions</h3>
	<?php $this->txtInstructions->Render(); ?>
</div>
<div class="buttonSection">
	<?php $this->btnReturn->Render('CssClass=primary'); ?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

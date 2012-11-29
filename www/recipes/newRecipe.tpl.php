<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Create Recipe</h1>

<?php $this->dlgAddIngredientWidget->Render(); ?>
<div class="section">
	<h3>Recipe Details</h3>
	<p><?php $this->txtRecipeName->RenderWithName(); ?> </p>
	<p><?php $this->txtRecipeDescription->RenderWithName(); ?> </p>
	<br>
	<p>This Recipe Serves: <?php $this->txtServingSize->Render(); ?> people</p>
	<p>Preparation Time: <?php $this->txtPreparationTime->Render(); ?> minutes</p>
	
	<h3>Categories</h3>
	<p>Select the Relevant Categories for this Recipe</p>
 
	<div class='subSection'><b>Meal Type</b><br><?php foreach($this->mealTypeArray as $btnMealType)$btnMealType->Render(); ?></div>
	<div class='subSection'><b>Cuisine</b><br><?php foreach($this->cuisineTypeArray as $btnCuisineType)$btnCuisineType->Render(); ?></div>
	<div class='subSection'><b>Cooking Style</b><br><?php foreach($this->cookStyleTypeArray as $btnCookStyleType)$btnCookStyleType->Render(); ?></div>
	
	<div style="clear:both"></div>
</div>
<div class="section">
	<h3>Ingredients</h3>
 	<?php $this->dtgIngredients->Render(); ?> 
	<?php $this->btnAddIngredient->Render('CssClass=primary'); ?>
</div>

<div class="section">
	<h3>Instructions</h3>
	<?php $this->txtInstructions->Render(); ?>
</div>

<div class="buttonSection">
	<?php $this->btnSubmit->Render('CssClass=primary'); ?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Recipes</h1>
	<div class="section">
		<h3>Filter Results</h3>
		<div class="filterBy filterByFirst">Recipe Name (including misspellings, etc.) <?php $this->strName->Render('Width=300px'); ?></div>
		<div class="filterBy">Preparation Time <?php $this->iPreparationTime->Render(); ?> Minutes</div>
		<div class="filterBy">Serving Size <?php $this->iServingSize->Render(); ?></div>
		<div class="filterBy">Owner <?php $this->strOwner->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section"><?php $this->dtgRecipes->Render(); ?>
		<br>
		<button type="primary" onclick="document.location='/foodie/recipes/newRecipe.php'; return false;" class="primary">Add Recipe</button>
	</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

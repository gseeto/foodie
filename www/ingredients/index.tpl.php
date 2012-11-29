<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Ingredients</h1>
<div class="section">
		<h3>Filter Results</h3>
		<div class="filterBy filterByFirst">Ingredient Name (including misspellings, etc.) <?php $this->strIngredient->Render('Width=300px'); ?></div>
		<div class="cleaner">&nbsp;</div>
	</div>

	<div class="section"><?php $this->dtgIngredients->Render(); ?>
	</div>
<div class="section">
<?php $this->lblDebug->Render(); ?> 
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

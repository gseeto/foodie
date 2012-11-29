		<h3>Search for Recipes by:</h3>
		<div class="filterBy filterByFirst">Recipe Name <?php $_CONTROL->strName->Render('Width=300px'); ?></div>
		<div class="filterBy">Preparation Time <?php $_CONTROL->iPreparationTime->Render(); ?> Minutes</div>
		<div class="filterBy">Serving Size <?php $_CONTROL->iServingSize->Render(); ?></div>
		<div class="filterBy">Owner <?php $_CONTROL->strOwner->Render(); ?></div>
		<div class="cleaner">&nbsp;</div>

<h3>Select Recipes To Be Added To Menu</h3>
<?php $_CONTROL->dtgRecipes->Render(); ?> 

<?php $_CONTROL->btnSubmit->Render(); ?>
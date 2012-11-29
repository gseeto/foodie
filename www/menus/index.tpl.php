<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Menus</h1>
<div class="section">
		<h3>Filter Results</h3>
		<div class="filterBy filterByFirst">Name <?php $this->strName->Render('Width=200px'); ?></div>
		<div class="filterBy">Owner<?php $this->strOwner->Render('Width=200px'); ?></div>
		<div class="cleaner">&nbsp;</div>
</div>

<div class="section">
	<?php $this->dtgMenu->Render(); ?>
	<br>
		<button type="primary" onclick="document.location='/foodie/menus/newMenu.php'; return false;" class="primary">Add Menu</button>
</div>
<br>
<div class="section">
<?php $this->lblDebug->Render(); ?> 
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php $this->lblIngredient->Render()?></h1>
	<div class="section"><?php $this->dtgLocations->Render(); ?>
	<?php $this->btnAdd->Render('CssClass=primary');?>
	<?php $this->btnReturn->Render('CssClass=primary');?>
	</div>
<div class="section">
<?php $this->lblDebug->Render(); ?> 
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

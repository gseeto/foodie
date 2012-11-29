<?php
	// This is the HTML template include file (.tpl.php) for the ingredient_source_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('IngredientSource') . ' - ' . $this->mctIngredientSource->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctIngredientSource->TitleVerb); ?></h2>
		<h1><?php _t('IngredientSource')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstIngredient->RenderWithName(); ?>

		<?php $this->lstLocation->RenderWithName(); ?>

		<?php $this->txtCost->RenderWithName(); ?>

		<?php $this->lstQuality->RenderWithName(); ?>

		<?php $this->txtComments->RenderWithName(); ?>

		<?php $this->txtName->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>
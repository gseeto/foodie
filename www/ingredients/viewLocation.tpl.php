<?php require(__INCLUDES__ . '/header.inc.php'); ?>
<h3>Ingredient: <?php $this->txtIngredientName->Render();?></h3>
<?php $this->txtLocationName->RenderWithName();?>
<?php $this->txtAddress->RenderWithName();?>
<?php $this->txtWebsite->RenderWithName();?>
<?php $this->txtCost->RenderWithName();?>
<?php $this->txtComments->RenderWithName();?>
<?php $this->lstQuality->RenderWithName();?>

<br/>
<?php $this->btnUpdate->Render('CssClass=primary'); ?> <?php $this->btnCancel->Render('CssClass=primary'); ?>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
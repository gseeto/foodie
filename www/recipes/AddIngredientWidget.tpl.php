<h3>Add Ingredient</h3>
<?php $_CONTROL->txtIngredientName->RenderWithName();?>
<?php $_CONTROL->txtIngredientAmount->RenderWithName();?>
<?php $_CONTROL->lstUnitOfMeasure->RenderWithName();?>

<br/>
<?php $_CONTROL->btnUpdate->Render('CssClass=calculator_top_button'); ?> <?php $_CONTROL->btnCancel->Render('CssClass=calculator_top_button'); ?>

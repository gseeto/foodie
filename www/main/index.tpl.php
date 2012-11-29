<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<a class="icon"  href="<?php _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionRecipes][1]); ?> "><img class="icon" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/recipe-icon.png"/></a>
<a class="icon" href="<?php _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionMenus][1]); ?> "><img class="icon" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/menu-icon.png"/></a>
<a class="icon" href="<?php _p(__SUBDIRECTORY__.FoodieForm::$NavSectionArray[FoodieForm::NavSectionIngredients][1]); ?> "><img class="icon" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/ingredients-icon.png"/></a>

<br>
<!--  
<div class="section">
<?php $this->lblDebug->Render(); ?> 
</div>
-->
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>

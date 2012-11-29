<?php
	// This example header.inc.php is intended to be modified for your application.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
	</head><body>
	<div class="container">
<?php $this->RenderBegin(); ?>
<?php if (QApplication::$Login) { ?>
	<img class="logo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/logo.png" width="1000px" />
	<div class="status">
		Welcome, <strong><?php _p(QApplication::$Login->__get('Username')); ?></strong>
		&nbsp;|&nbsp;
		<a href="/foodie/logout/" title="Log Out of Foodie">Logout</a>
		<br/>
	</div>
	<!-- Put the Navigation here -->
	<div class="navbar"><ul class="navbar">
	<?php
	$intWidth = floor(550 / count(FoodieForm::$NavSectionArray));
	foreach (FoodieForm::$NavSectionArray as $intNavSectionId => $strNavSectionArray) {
		$strClassInfo = ($intNavSectionId == $this->intNavSectionId) ? 'class="selected"' : null;
		printf('<li style="width: %spx;"><a href="%s%s" %s title="%s">%s</a></li>',
			$intWidth, __SUBDIRECTORY__,$strNavSectionArray[1], $strClassInfo, $strNavSectionArray[0], $strNavSectionArray[0]
		);
	}
	?>
	</ul></div>
<?php }  ?>

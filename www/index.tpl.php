<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<div class="loginContainer">
	<img class="loginLogo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/login_logo.png" width="500px"/>
	<div class="loginSection">
		<h3><?php $this->lblMessage->Render(); ?></h3>
		<?php $this->txtUsername->RenderWithName(); ?>
		<?php $this->txtPassword->RenderWithName(); ?>	
		<?php $this->chkRemember->RenderWithName(); ?>	
		
		<div class="buttonBar">
			<?php $this->btnLogin->Render('CssClass=primary'); ?>
		</div>
	</div>
</div>
<br>
<div class="section">
<?php $this->lblDebug->Render(); ?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>
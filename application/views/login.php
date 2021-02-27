
	<div class="login" style="background: url(<?php echo base_url();?>/asset/images/pattern-08.jpg);">
		<div class="container">
			<center><h3>Login</h3></center>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>
				<form method="post" action="<?=base_url()?>Login/index">
					<input type="email" name="email" value="<?=set_value('email')?>" placeholder="Your Email">
					<div class="error" style="color: red;"><?=form_error('email')?></div>

					<input type="password" name="password" value="<?=set_value('password')?>" placeholder="Password">
					<div class="error" style="color: red;"><?=form_error('password')?></div>

					<input type="submit" value="Login">
				</form>
			</div>

		</div>
	</div>

	<style>
		.login p {
			color: none;
		}
	</style>
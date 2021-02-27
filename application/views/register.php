

						
	<div class="register" style="background: url(<?php echo base_url();?>/asset/images/pattern-08.jpg);">
		<div class="container">
			<center><h3>Register Here</h3></center>

			<div class="login-form-grids">

<?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>

					<form action="<?=base_url()?>Register/index" method="post">

					<input name="username" type="text" placeholder="User Name" value="<?=set_value('username')?>" required=" " style="margin-bottom: 3%;" >
					<div class="error" style="color: red;"><?=form_error('username')?></div>

					<input name="email" type="email" placeholder="Email Address" value="<?=set_value('email')?>" required=" " >
					<div class="error" style="color: red;"><?=form_error('email')?></div>

					<input name="password" type="password" placeholder="Password" value="<?=set_value('password')?>" required=" " >
					<div class="error" style="color: red;"><?=form_error('password')?></div>
					<input type="submit" value="Register">

				</form>
			</div>
		</div>
	</div>
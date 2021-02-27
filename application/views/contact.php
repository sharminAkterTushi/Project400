<?php echo $this->session->flashdata('message');  ?>		
	<div class="about">
		<div class="w3_agileits_contact_grids">
	
			<div class="col-md-11 w3_agileits_contact_grid_right">
				<center><h4 class="w3_agile_header">Leave a<span> Message</span></h4></center>

				<center>
					<form action="<?php echo base_url();?>Contact" method="post">
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="name" value="<?=set_value('name')?>"  placeholder=" " required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Your Name</span>
						</label>
					</span>

					<div class="error"><?=form_error('name')?></div>


					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " value="<?=set_value('email')?>" required="" />
						<label class="input__label input__label--ichiro" for="input-26">
							<span class="input__label-content input__label-content--ichiro">Your Email</span>
						</label>
					</span>

					<div class="error"><?=form_error('email')?></div>

					<textarea name="message" placeholder="Your message here..." required=""><?=set_value('message')?></textarea>
					<div class="error"><?=form_error('message')?></div>
					<input type="submit" value="Submit">
				</form>
				</center>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
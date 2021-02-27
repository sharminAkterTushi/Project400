 <div class="content-wrapper">

 	<section class="content-header">
 		<center><h3>Edit product information</h3></center>
 	</section>

 	<!-- Main content -->
 	<section class="content">
 		<div class="row">

 			<div class="panel ">

 				<div class="panel-body">
 					<div class="col-md-6 col-md-offset-3">

 						<?php echo $this->session->flashdata('success');  ?>			

 						<form action="<?php echo base_url();?>Manage_products/edit_products/<?=$products[0]['id']?>"  method="post"  enctype="multipart/form-data" >


 							<div class="form-group"> 

 								<input type="text" class="form-control input-lg" placeholder="Product Name" name="title" value="<?=$products[0]['title']?>" />

 								<div class="error"><?=form_error('title')?></div>

 							</div>

 							<div class="form-group"> 
 								<select name="category_id"  id="selectmysone" class="form-control" >
 									<option>Select category</option>
 									<?php foreach($categories as $category){?>
 									<option <?php if ($category_name==$category['name']) {
 										echo "selected";
 									} ?>
 									value="<?php echo  $category['id'];?>"><?php echo $category['name']; ?></option>
 									<?php } ?>

 								</select> 
 								<div class="error"><?=form_error('category_id')?></div>

 							</div>


 							<div class="form-group"> 

 								<input type="text" class="form-control input-lg" placeholder="Product Price" name="price" value="<?=$products[0]['price']?>" />

 								<div class="error"><?=form_error('price')?></div>

 							</div>


 							<div class="form-group"> 

 								<textarea rows="5" name="description" placeholder="Product Description" class="form-control input-lg" ><?=$products[0]['description']?></textarea>
 								<div class="error"><?=form_error('description')?></div>

 							</div>

 							<div class="form-group"> 

 								<div class="input-group">
 									<span class="input-group-btn">
 										<span class="btn btn-success btn-file">
 											Browse… <input type="file" id="imgInp"   name="image" 
 											>
 										</span>
 									</span>
 									<input type="text" class="form-control" >
 								</div>
 								<br />

 								<div class="show-image"> 

 									<img id='img-upload' src="<?=base_url()?>img/<?=$products[0]['image']?>" style="width:100px;height:100px;"/>

 								</div>

 							</div>

 							<div class="form-group"> 

 								<input type="submit" class="btn btn-success" value="Update Product" />
 							</div>

 						</form>

 					</div>

 				</div>
 			</div>
 		</div>

 		<script src="<?= base_url()?>asset/admin/bower_components/jquery/dist/jquery.min.js"></script>
 		<script type="text/javascript"> 
 			$(document).ready( function() {
 				$(document).on('change', '.btn-file :file', function() {
 					var input = $(this),
 					label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
 					input.trigger('fileselect', [label]);
 				});

 				$('.btn-file :file').on('fileselect', function(event, label) {

 					var input = $(this).parents('.input-group').find(':text'),
 					log = label;

 					if( input.length ) {
 						input.val(log);
 					} else {
 						if( log ) alert(log);
 					}

 				});
 				function readURL(input) {
 					if (input.files && input.files[0]) {
 						var reader = new FileReader();

 						reader.onload = function (e) {
 							$('#img-upload').attr('src', e.target.result);
 						}

 						reader.readAsDataURL(input.files[0]);
 					}
 				}

 				$("#imgInp").change(function(){
 					readURL(this);
 				}); 	
 			});

 		</script>

 		<style type="text/css"> 

 		.btn-file {
 			position: relative;
 			overflow: hidden;
 		}
 		.btn-file input[type=file] {
 			position: absolute;
 			top: 0;
 			right: 0;
 			min-width: 100%;
 			min-height: 100%;
 			font-size: 100px;
 			text-align: right;
 			filter: alpha(opacity=0);
 			opacity: 0;
 			outline: none;
 			background: white;
 			cursor: inherit;
 			display: block;
 		}

 		#img-upload{
 			width: 100%;
 		}

 		.btn-success {
 			background-color: #96588A;
 			border-color: #77446d;
 		}
 		 		.error{
 			color: red;
 		}
 	</style>
 </div>

</section>
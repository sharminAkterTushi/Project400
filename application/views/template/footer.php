
 	<!-- //new -->
 	<!-- //footer -->
 	<div class="footer">
 		<div class="container">
 			<div class="w3_footer_grids">
 				<div class="col-md-3 w3_footer_grid">
 					<h3>Contact</h3>

 					<ul class="address">
 						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>405 RXR Plaza Uniondale  <span>NY 11556</span></li>
 						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@electronicsshop.com</a></li>
 						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1 (516) 806-8414</li>
 					</ul>
 				</div>
 				<div class="col-md-3 w3_footer_grid">
 					<h3>Information</h3>
 					<ul class="info"> 
 						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?=base_url()?>Contact">About Us</a></li>
 						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?=base_url()?>Contact">Contact Us</a></li>
 						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?=base_url().'Products/shop'?>">Shop</a></li>
 						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="<?=base_url()?>Products/top_product">Top Products</a></li>
 					</ul>
 				</div>
 				<div class="col-md-3 w3_footer_grid">
 					<h3>Category</h3>
 					<ul class="info"> 
             
 					</ul>
 				</div>
 				<div class="col-md-3 w3_footer_grid">
 					<h3>Profile</h3>
 					<ul class="info"> 

<?php if (empty($this->session->userdata('userid'))) { ?>
              <li><a href="<?=base_url()?>register"> Create Account </a></li>
              <li><a href="<?=base_url()?>Login">Login</a></li>
              <?php } else{ ?>
              <li><a href="<?=base_url()?>Order/my_account">My Account</a></li>
              <li><a href="<?=base_url()?>Logout">Logout</a></li>
              <?php } ?>
              
 					</ul>
 				</div>
 				<div class="clearfix"> </div>
 			</div>
 		</div>


 	</div>	
 	
 	<!-- //footer -->	
 	<!-- Bootstrap Core JavaScript -->
 	<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>

<!-- main slider-banner -->
<script src="<?=base_url()?>asset/js/skdslider.min.js"></script>
<link href="<?=base_url()?>asset/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

		jQuery('#responsive').change(function(){
			$('#responsive_wrapper').width(jQuery(this).val());
		});

	});
</script>	

<script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("myHeader");
	var sticky = header.offsetTop;

	function myFunction() {
		if (window.pageYOffset > sticky) {
			header.classList.add("sticky");
		} else {
			header.classList.remove("sticky");
		}
	}
</script>
<!-- //main slider-banner --> 
<style>
.sticky {
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 9999;
	background-color: white;
}
</style>
</body>
</html>
          <?php  
          
          
  if($this->session->flashdata('order')){  ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#order_modal').modal('show');
    });
</script>
<?php } ?>


<script>
$(document).ready(function(){
 
 
 $('.add_cart').click(function(){

  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var quantity = $('#' + product_id).val();
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     //alert("Product Added into Cart");
     $('#cart_details').html(data);
     var cart_to_rows = $('#cart_to_rows').val();
      $('#cart_itemsss').text(cart_to_rows);
      $('.w3view-cart').css('padding','10px');

      setTimeout(
  function() 
  {
    $('.w3view-cart').css('padding','0px');
  }, 300);

      


    }
     });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     //alert("Product removed from Cart");
     $('#cart_details').html(data);
     var cart_to_rows = $('#cart_itemsss').text();
	var item_decrease = parseInt(cart_to_rows)-1;
	$('#cart_itemsss').text(item_decrease);
       var paying_amount = $('#total_pay').text();
     $('#paying_amount').text('('+paying_amount+')');

    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/clear",
    success:function(data)
    {
     //alert("Your cart has been clear...");
     $('#cart_details').html(data);
      $('#cart_itemsss').text('0');
      $('#paying_amount').text('($0)');
      $('#price_to_submit').val(0);

    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>


<script>

 $(document).on('click', '.increase', function(){
  var row_id = $(this).attr("id");
  var qnty = $(this).closest('td').find('span').text();
    
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/increase",
    method:"POST",
    data:{row_id:row_id,qnty:qnty},
    success:function(data)
    {
     $('#cart_details').html(data);
     var paying_amount = $('#total_pay').text();
     $('#paying_amount').text('('+paying_amount+')');
     $('#price_to_submit').val(paying_amount);
    }
     });
 });

 $(document).on('click', '.decrease', function(){
  var row_id = $(this).attr("id");
  var qnty = $(this).closest('td').find('span').text();
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/decrease",
    method:"POST",
    data:{row_id:row_id,qnty:qnty},
    success:function(data)
    {
     $('#cart_details').html(data);
        var cart_to_rows = $('#cart_to_rows').val();
      $('#cart_itemsss').text(cart_to_rows);
     var paying_amount = $('#total_pay').text();
     $('#paying_amount').text('('+paying_amount+')');
     $('#price_to_submit').val(paying_amount);
    }
     });
 });

</script>
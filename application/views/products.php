
<div class="products">
	<div class="container">
		<div class="col-md-3 products-left">
			<div class="categories">
				<h2>Categories</h2>
				<ul class="cate">
					<?php foreach ($categories as $category) { ?>

					<li><a href="<?=base_url().'Products/index/'.$category['id']?>/list/"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $category['name']; ?></a></li>

					<?php } ?>

				</ul>	 
			</div>																																												
		</div>
		<h1><?php //echo $catid; ?></h1>
		<div class="col-md-9 products-right">
			<?php  
			if(!empty($search)){ echo "<center>".$search."</center>"; } ?>
			<div class="agile_top_brands_grids">
				<?php foreach ($products as $product) { ?>
				<div class="col-md-4 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="<?=base_url()?>Products/details/<?php echo $product['id']; ?>"><img title=" " alt=" " src="<?=base_url()?>img/<?=$product['image']?>"></a>		
											<p><?php echo $product['title']; ?></p>
											<h4>$<?php echo $product['price']; ?></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													
													<input type="hidden" name="quantity" value="1" class="form-control quantity" id="<?php echo $product['id']; ?>" />

													<input type="button" name="add_cart" class="button add_cart" data-productname="<?php echo $product['title']; ?>" data-price="<?php echo $product['price']; ?>" data-productid="<?php echo $product['id']; ?>" value="Add to cart" /></input>
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
							
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>

			<nav class="">
				<ul class="" style="list-style: none;margin-top: 2rem;">
					<center><li><?php echo $this->pagination->create_links(); ?></li></center>
				</ul>
			</nav>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>

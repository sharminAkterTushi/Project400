
<div class="products">
	<div class="container">
		<div class="agileinfo_single">
  <?php  $msg=$this->session->flashdata('message');
  if(!empty($msg)){ 
    echo  "<br>".$msg;  } ?> 
			<div class="col-md-4 agileinfo_single_left">
				<img id="example" src="<?=base_url()?>img/<?=$products[0]['image']?>" alt=" " class="img-responsive" style="width: 600px;height: auto;">
			</div>
			<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $products[0]['title']; ?></h2>
				<div class="rating1">
					<span class="starRating">
                                <?php $pr =$products[0]['avg_rating']; 
                                for($i=0; $i<5; $i++){ 
                                  if ($i<$pr) { ?> 
                                  <i class="fa fa-star" style="color: orange;"></i>
                                  <?php  }
                                  else{ ?>
                                  <i class="fa fa-star-o" style="color: gray;"></i>
                                  <?php  }
                                } ?>
					</span>
				</div>
				<div class="w3agile_description">
					<h4>Description :</h4>
					<p><?php echo $products[0]['description']; ?></p>
				</div>
				<div class="snipcart-item block">
					<div class="snipcart-thumb agileinfo_single_right_snipcart">
						<h4 class="m-sing">$<?php echo $products[0]['price']; ?></h4>
					</div>
					<div class="snipcart-details agileinfo_single_right_details">
						<form action="#" method="post">
							<fieldset>

								<input type="hidden" name="quantity" value="1" class="form-control quantity" id="<?php echo $products[0]['id']; ?>" />

								<input type="button" name="add_cart" class="button add_cart" data-productname="<?php echo $products[0]['title']; ?>" data-price="<?php echo $products[0]['price']; ?>" data-productid="<?php echo $products[0]['id']; ?>" value="Add to cart" /></input>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>



			<div class="container">
				<div class="row" style="margin-top:40px;">
					<div class="col-md-8 col-md-offset-2">
						<div class="well well-sm">

							<div class="row" id="post-review-box">
								<div class="col-md-12">
									<form accept-charset="UTF-8" action="<?=base_url()?>Reviews/add_reviews/<?php echo $products[0]['id']; ?>"" method="post">
										<input id="ratings-hidden" name="rating" type="hidden"> 
										<textarea class="form-control animated" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>


										<div class="col-md-6 rate">
											<input style="display: none;" type="radio" id="star1" name="rate" value="5" />
											<label for="star1" title="1 star">1 star</label>
											<input style="display: none;" type="radio" id="star2" name="rate" value="4" />
											<label for="star2" title="2 stars">2 stars</label>
											<input style="display: none;" type="radio" id="star3" name="rate" value="3" />
											<label for="star3" title="3 star3">3 stars</label>
											<input style="display: none;" type="radio" id="star4" name="rate" value="2" />
											<label for="star4" title="4 stars">4 stars</label>
											<input style="display: none;" type="radio" id="star5" name="rate" value="1" />
											<label for="star5" title="5 stars">5 stars</label>

										</div>

										<div class="text-right">
											<div class="stars starrr" data-rating="0"></div>
											<button class="btn btn-success btn-lg" type="submit">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div> 

					</div>
				</div>
			</div>

					<div class="container">

                  <div class="col-md-12 jumbotron">
                    <div class="col-md-8">
                    	<?php if (empty($reviews)) { ?>
                    	<hr>
                    		<h2>No Review on this product!</h2>
                    		<hr>
                    	<?php	} else{ ?>
                    	<hr>
                      <h2>Customer Reviews</h2>
                      <hr>
                      <?php } ?>
                     <?php foreach ($reviews as $review) { ?>
                      <div class="col-md-8">
                      	<br>
                        </a> <i>Review by </i><?=$review['username']?></p>
                        <table>
                          <tbody><tr>
                            
                            <td>
                              <div class="rating">
                                <?php $pr =$review['rating']; 
                                for($i=0; $i<5; $i++){ 
                                  if ($i<$pr) { ?> 
                                  <i class="fa fa-star" style="color: orange;"></i>
                                  <?php  }
                                  else{ ?>
                                  <i class="fa fa-star-o" style="color: gray;"></i>
                                  <?php  }
                                } ?>
                              </div>
                              <p><?=$review['review']?></p>
                            </td>
                          </tr>

                        </tbody></table>
                        
                      </div>
                      <?php } ?>
                  </div>
                </div>
	
</div>

		</div>

	</div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>


.rate {
	float: left;
	height: 46px;
	padding: 0 10px;
}

.rate:not(:checked) > input {
	//position: absolute;
	top: -9999px;
}

.rate:not(:checked) > label {
	float: right;
	width: 1em;
	overflow: hidden;
	white-space: nowrap;
	cursor: pointer;
	font-size: 30px;
	color: #ccc;
}

.rate:not(:checked) > label:before { content: '★ '; }

.rate > input:checked ~ label { color: #ffc700; }

.rate:not(:checked) > label:hover, .rate:not(:checked) > label:hover ~ label { color: #deb217; }

.rate > input:checked + label:hover, .rate > input:checked + label:hover ~ label, .rate > input:checked ~ label:hover, .rate > input:checked ~ label:hover ~ label, .rate > label:hover ~ input:checked ~ label { color: #c59b08; }
</style>

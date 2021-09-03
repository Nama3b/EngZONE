<div class="container pt-5">
	<div class="row ">
		<div class="col-12 checkout-detail">
			<h2>Shopping cart detail</h2>
                <ul class="menu">
                	<li class="col-1 col-xs-1 col-sm-1 col-md-1	col-lg-1 "></li>
                    <li class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5 ">Product</li>
                    <li class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 ">Price</li>
                    <li class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">Quantity</li>
                    <li class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">Total</li>
                </ul>
				<?php 
					$book_qty = 0;
					$total = 0;
					$subtotal = 0;
					if(isset($_SESSION["cart"])){
						$cart = $_SESSION["cart"];
						foreach($cart as $key => $value){
				 ?>
				<ul class="your_cart" align="">
                    <li class="trash-cart text-center col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <div class="trash"><a href="" onclick="delCart(<?php echo $key ?>)"><i class="fas fa-trash-alt"></i></a></div>
                    </li>
                    <li class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <div class="media">
              		        <div class="d-flex">
                                <img src="<?php echo $value["book_img"] ?>" width="111px" alt="">
                            </div>
                            <div class="media-body">
                                <a href="book.php?module=book-detail&book_id=<?php echo $key; ?>" style="text-decoration: none;"><b><?php echo $value["book_name"] ?></b></a>
                            </div>
                        </div>
                    </li>
                    <li class="price col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <h5><b>$ <?php echo number_format($value["book_price"],0,",","."); ?></b></h5>
                    </li>
                    <li class="qty col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <div class="product-count">
							<input type="text" id="book_qty_<?php echo $key ?>" name="book_qty" class="book_qty" value="<?php echo $value["book_qty"] ?>"  >
							<div class="quantity-ic">
								<a href="">
									<i class="fas fa-chevron-up" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $key ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;updateCart(<?php echo $key?>)"></i>
								</a>
								<a href="">
									<i class="fas fa-chevron-down" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $key ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;updateCart(<?php echo $key?>)"></i>
								</a>	
							</div>
							<a class="ml-3 mt-1" onclick="updateCart(<?php echo $key?>)"><i class="fas fa-cart-plus"></i></a>
                        </div>
                    </li>
                    <li class="total col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <h5>$
                        	<?php 
                                $total = $value["book_qty"]*$value["book_price"]; 
                                $subtotal += $total;
                                echo number_format($total,0,",",".");
                            ?>
                        </h5>
                    </li>
                </ul>
				<?php } } ?>
			</div>
			<hr class="light">
			<div class="total-price">
				<div class="transport-ship">
					<p>Transport ship: 2$</p>
				</div>
				<?php
					$book_qty=0;
					$total=0;  
					if(isset($_SESSION["cart"])){
						$cart = $_SESSION["cart"];
						foreach ($cart as $value) {
							$book_qty += (int)$value["book_qty"];
							$total += (int)$value["book_qty"]*(int)$value["book_price"];	
						}
					}
				?>
				<div class="price">
					<p>Total: <span class="text-right"><label id="total"><?php echo number_format($total,0,",","."); ?></label> $</span></p>
				</div>
			</div>	
			<div class="col-12">
				<a href="book.php">
					<button class="btn btn-md btn-outline-light">Keep buying</button>
				</a>
				<a href="book.php?module=checkout">
					<button class="btn btn-md btn-outline-success">Checkout</button>
				</a>
			</div>
		</div>
	</div>
</div>
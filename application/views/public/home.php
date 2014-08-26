<?php $this->load->view('public/layout/header'); ?>
<!---- phan than --->	
<!--- slide--->	
			<div id="tmnivoslider">
			<div id="slider" class="nivoSlider" style="position: relative; background-image: url(http://livedemo00.template-help.com/prestashop_38171/modules/tmnivoslider/slides/slide_02.jpg); background-position: initial initial; background-repeat: no-repeat no-repeat;">
				<a href="#" class="nivo-imageLink" style="display: block;"><img src="<?php echo base_url(); ?>public/img/slide_00.jpg" alt="" title="#htmlcaption1" style="display: none;"></a>
				<a href="#" class="nivo-imageLink" style="display: none;"><img src="<?php echo base_url(); ?>public/img/slide_01.jpg" alt="" title="#htmlcaption2" style="display: none;"></a>
				<a href="#" class="nivo-imageLink" style="display: none;"><img src="<?php echo base_url(); ?>public/img/slide_02.jpg" alt="" title="#htmlcaption3" style="display: none;"></a>
			</div> 
			
			</div> 
		</div>
	</div>

<!-- end slide -->
	<div id="columns">
<?php $this->load->view('public/layout/left'); ?>
<!-- Center -->
		<div id="center_column" class="center_column">
<!-- MODULE Home Featured Products -->
<div id="featured_products">
	<h4>Sản phẩm hiện có</h4>
	<div class="block_content">
		<ul>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Lorem ipsum dolor sit amet conse"><img src="<?php echo base_url(); ?>public/images/1-1-home.jpg" alt="Lorem ipsum dolor sit amet conse"></a>
				<div>
					<h5><a class="product_link" href="<?php echo base_url(); ?>items/detail" title="Lorem ipsum dolor sit amet conse">Guitar dáng dreadnough</a></h5>
					<span class="price">$494.10</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_1" href="<?php echo base_url(); ?>items/detail" title="View detail">View detail</a>
				</div>
			</li>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Dolore eu fugiat nulla pariatur. Excepteur sint"><img src="<?php echo base_url(); ?>public/images/2-4-home.jpg" alt="Dolore eu fugiat nulla pariatur. Excepteur sint"></a>
				<div>
					<h5><a class="product_link" href="#" title="Dolore eu fugiat nulla...">Dolore eu fugiat nulla pariatur....</a></h5>
					<span class="price">$215.00</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_2" href="#" title="View detail">View detail</a>
				</div>
			</li>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Lorem ipsum dolor sit amet llum dolore eu sint"><img src="<?php echo base_url(); ?>public/images/3-7-home.jpg" alt="Lorem ipsum dolor sit amet llum dolore eu sint"></a>
				<div>
					<h5><a class="product_link" href="#" title="Lorem ipsum dolor sit amet...">Lorem ipsum dolor sit amet llum...</a></h5>
					<span class="price">$49.00</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_3" href="#" title="View detail">View detail</a>
				</div>
			</li>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Lorem ipsum dolor sit amet conse"><img src="<?php echo base_url(); ?>public/images/4-10-home.jpg" alt="Lorem ipsum dolor sit amet conse"></a>
				<div>
					<h5><a class="product_link" href="#" title="Lorem ipsum dolor sit amet conse">Lorem ipsum dolor sit amet conse</a></h5>
					<span class="price">$315.00</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_4" href="#" title="View detail">View detail</a>
				</div>
			</li>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Dolore eu fugiat nulla pariatur. Excepteur sint"><img src="<?php echo base_url(); ?>public/images/5-13-home.jpg" alt="Dolore eu fugiat nulla pariatur. Excepteur sint"></a>
				<div>
					<h5><a class="product_link" href="#" title="Dolore eu fugiat nulla...">Dolore eu fugiat nulla pariatur....</a></h5>
					<span class="price">$270.00</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_5" href="#" title="View detail">View detail</a>
				</div>
			</li>
			<li class="ajax_block_product">
				<a class="product_image" href="#" title="Lorem ipsum dolor sit amet llum dolore eu sint"><img src="<?php echo base_url(); ?>public/images/6-16-home.jpg" alt="Lorem ipsum dolor sit amet llum dolore eu sint"></a>
				<div>
					<h5><a class="product_link" href="#" title="Lorem ipsum dolor sit amet...">Lorem ipsum dolor sit amet llum...</a></h5>
					<span class="price">$620.00</span>
					<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_6" href="#" title="View detail">View detail</a>
				</div>
			</li>
		</ul>
	</div>
</div>

		</div><!-- /MODULE Home Featured Products -->	
	
<?php $this->load->view('public/layout/right'); ?>

	</div>
</div>
<?php $this->load->view('public/layout/footer'); ?>
<?php $this->load->view('public/layout/header_product'); ?>
<div id="columns"> 
<?php $this->load->view('public/layout/left'); ?>
<div id="center_column" class="center_column">

<div class="breadcrumb">
<div class="breadcrumb_inner">
<a href="<?php echo base_url(); ?>" title="return to Home">Home</a><span class="navigation-pipe">&gt;</span><span class="navigation_end">Guitar dáng dreadnough</span></div>
</div>
 <div id="primary_block" class="clearfix">
<div id="pb-right-column">
<div id="image-block" class="bordercolor">
<img src="./Lorem ipsum dolor sit amet conse - AudioGear_files/1-109-large.jpg" title="Lorem ipsum dolor sit amet conse" alt="Lorem ipsum dolor sit amet conse" id="bigpic" width="304" height="304" style="">
</div>

</div>

<div id="pb-left-column">
<h1>Guitar dáng dreadnough</h1>
<form id="buy_block" class="bordercolor" action="#" method="post">
<div class="other_options bordercolor">
<div id="other_prices">
<p id="new_price">
<span id="old_price_display">$549.00</span>
tax excl. </p>
<p class="online_only">Chỉ bán tại cửa hàng</p> <p id="pQuantityAvailable">
<span id="quantityAvailable">Số lượng hiện có : 2</span>
</p>
<p id="last_quantities" style="display:none;">Warning: Last items in stock!</p>
<p id="product_reference" style="display:none;"><label for="product_reference">Reference: </label><span class="editable"></span></p>
<p id="availability_statut" style="display:none;">
<span id="availability_label">Availability:</span>
<span id="availability_value">
</span>
</p>
</div>
<div id="attributes">
<span class="on_sale">On sale!</span> <div class="clearblock"></div>
</div>
<div class="clearblock"></div>
</div>
<div id="short_description_block" class="bordercolor">
<div id="short_description_content" class="rte align_justify"> 
	<p>Vivamus pellentesque pretium dolor, et pretium elit sagittis in. D
	uis at enim et magna ultricies viverra. Sed euismod urna non tortor 
	aliquam non tincidunt purus sagittis. Integer lectus orci, placerat 
	ut ultrices vestibulum, porta ut augue. Maecenas eu consectetur diam. 
	Curabitur faucibus congue luctus. Mauris purus metus, faucibus non 
	placerat at, posuere vel ante.</p>
	<p>
		Thông số:
	</p>
	<ul style="margin-left:50px;">
	<li><span>Width</span> 10"</li>
	<li><span>Height</span> 15"</li>
	<li><span>Depth</span> 10"</li>
	<li><span>Weight</span> 0.5 kg</li>
	<li><span>Size</span> L</li>
	</ul>
</div>
</div>
<div class="clearblock"></div>
</form>
</div>
</div>
<!---------------------------------->
<script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=slide_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
	
		});
</script>
<ul id="more_info_tabs" class="idTabs idTabsShort">
	<li><a id="more_info_tab_more_info" href="#" class="selected">Album ảnh</a></li> 
</ul>
<p>
		<a rel="slide_group" href="<?php echo base_url(); ?>images/9_b.jpg" title="Lorem ipsum dolor sit amet"><img alt="" src="<?php echo base_url(); ?>images/9_s.jpg" /></a>

		<a rel="slide_group" href="<?php echo base_url(); ?>images/10_b.jpg" title=""><img alt="" src="<?php echo base_url(); ?>images/10_s.jpg" /></a>

		<a rel="slide_group" href="<?php echo base_url(); ?>images/11_b.jpg" title=""><img alt="" src="<?php echo base_url(); ?>images/11_s.jpg" /></a>
		
		<a rel="slide_group" href="<?php echo base_url(); ?>images/12_b.jpg" title=""><img class="last" alt="" src="<?php echo base_url(); ?>images/12_s.jpg" /></a>
</p>
<div style="margin-top:20px;">
<iframe width="560" height="315" src="//www.youtube.com/embed/pk7SH_jYZ2c" frameborder="0" allowfullscreen></iframe>
</div>
<!---------------------------------->
<div id="more_info_block" class="clear">
<ul id="more_info_tabs" class="idTabs idTabsShort">
	<li><a id="more_info_tab_more_info" href="#" class="selected">Thông tin xem thêm</a></li> 
</ul>
<div id="more_info_sheets" class="bgcolor bordercolor">
<div id="idTab1" class="">
<div>
	<p>Etiam leo felis, porttitor a ultricies nec, iaculis ac quam. Aliquam in lectus 
	et nibh laoreet congue. Curabitur eget est orci. Ut nisl lacus, elementum et congue 
	eu, luctus a quam. Vestibulum et quam vitae turpis dignissim dictum. Cras rhoncus libero 
	ut turpis pretium tincidunt. Vestibulum at imperdiet quam. Cum sociis natoque penatibus
	et magnis dis parturient montes, nascetur ridiculus mus.</p>
</div>
</div>
</div>
</div>
</div>
 
</div>
</div>
<?php $this->load->view('public/layout/footer'); ?>

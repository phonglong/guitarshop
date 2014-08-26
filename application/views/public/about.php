<?php $this->load->view('public/layout/header_product'); ?>
<div id="columns"> 
<?php $this->load->view('public/layout/left'); ?>
<div id="center_column" class="center_column">

<div class="breadcrumb">
<div class="breadcrumb_inner">
<a href="<?php echo base_url(); ?>" title="return to Home">Home</a><span class="navigation-pipe">&gt;</span><span class="navigation_end">About Us</span></div>
</div>
<div class="rte">
<h1>About us</h1>
<?php echo $about->content; ?>
</div>


 
</div>
</div>
<?php $this->load->view('public/layout/footer'); ?>
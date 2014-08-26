<?php $this->load->view('public/layout/header_product'); ?>
<div id="columns"> 
<?php $this->load->view('public/layout/left'); ?>
<div id="center_column" class="center_column">

<div class="breadcrumb">
<div class="breadcrumb_inner">
<a href="<?php echo base_url(); ?>" title="return to Home">Home</a><span class="navigation-pipe">&gt;</span><span class="navigation_end">Contact Us</span></div>
</div>
<?php
echo form_open('contacts/save',array('id'=>'contact_form','class'=>'std'));
?>
<fieldset>
<h3>Send a message</h3>
<p class="text">
<label for="email">Địa chỉ email</label>
<input type="text" id="email" name="email" value="" required ="required" />
</p>
<p>
<label for="phone" style="margin-left:101px;">Điện thoại</label>
<input type="text" id="phone" name="phone" value="" required ="required" />
</p>
<p class="text">
<label for="title">Tiêu đề</label>
<input type="text" name="title" id="id_order" value="">
</p>

<p class="textarea">
<label for="message">Nội dung</label>
<textarea id="message" name="message" rows="15" cols="20"></textarea>
</p>
<p class="submit">
<input type="submit" name="submitMessage" id="submitMessage" value="Send" class="button_large">
</p>
</fieldset>
</form>
</div>
</div>
<?php $this->load->view('public/layout/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submitMessage').click(function(){
			count_unread_mail();
			return false;
		})
	})
	
</script>
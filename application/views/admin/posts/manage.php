<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/left'); ?>
<div class="span9">
	<?php// echo $controller_name; ?>
	<section>
	<script type="text/javascript" src="<?php echo base_url();?>admin/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>

		<?php
		echo form_open('admin_posts/save/1',array('id'=>'item_form'));
		?>
			<fieldset>
				<legend>Bài giới thiệu cửa hàng cũng như công ty</legend>
				<div>
					<span class="right"><textarea id="txt_content" name="txt_content"  style="width:100%; height:200px;">
						<?php echo $intro->content ; ?>
					</textarea></span>
                 
				</div>
				<div style="margin-top:20px;"><input class="btn " type="submit" id="save" value="Save changes" /></div>
			</fieldset>
		</form>
	</section>
</div>
<div id="feedback_bar"></div>
<?php $this->load->view('admin/layout/footer'); ?>
<script type="text/javascript">
	$(function() {				    				    
		if(CKEDITOR.instances['txt_content']) {						
			CKEDITOR.remove(CKEDITOR.instances['txt_content']);
		}
		CKEDITOR.config.width = 600;
	    CKEDITOR.config.height = 150;
		CKEDITOR.replace('txt_content',{});
	})
</script>
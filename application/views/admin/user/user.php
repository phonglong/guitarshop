<?php $this->load->view('admin/layout/header'); ?>
<script type="text/javascript">
$(document).ready(function()
{ 	var table_columns = ["","id",'name','category','cost_price','unit_price','','quantity',''];
	enable_sorting("<?php echo site_url("$controller_name/sorting"); ?>",table_columns, <?php echo $per_page; ?>);
	init_table_sorting(); <!-- sap xep bang -->
	<!-- xoa --><!-- trong js manage table -->
	enable_search('<?php echo site_url("$controller_name/suggest");?>',<?php echo json_encode(lang("common_confirm_search"));?>);
	enable_select_all();
    enable_checkboxes();
    enable_row_selection();
	enable_delete('Bạn có chắc xóa ko','Bạn phải chọn 1 trường đã he');
	<!-- end xoa -->
	
	
});
function post_user_form_submit(response)
{ 
	if(!response.success)
	{
		set_feedback(response.message,'error_message',true);
	}
	else
	{ 
		//This is an update, just update one row
		if(jQuery.inArray(response.id,get_visible_checkbox_ids()) != -1)
		{
			update_row(response.id,'<?php echo site_url("$controller_name/get_row")?>');
			set_feedback(response.message,'success_message',false);

		}
		else //refresh entire table
		{ 
			do_search(true,function()
			{
				//highlight new row
				highlight_row(response.id);
				set_feedback(response.message,'success_message',false);
			});
		}

	} 
} 
<!-- cai nay de sap xep bang -->
function init_table_sorting()
    {
        //Only init if there is more than one row
        if($('.tablesorter tbody tr').length >1)
        {
            $("#sortable_table").tablesorter(
            {
                sortList: [[1,0]],

                headers:
                    {
                    0: { sorter: false},
                    6: { sorter: false}, 
                }

            });
        }
    }
<!-- end sap xep bang -->

</script>

<?php $this->load->view('admin/layout/left'); ?>
<div class="span9">
	<?php// echo $controller_name; ?>
	<section>	
					<div class="alert alert-success" id="feedback_bar" style="margin-top:20px;">
						
					</div>
					<div class="btn-group-top" style="margin-top:20px;">
						<a href="<?php echo base_url(); ?>admin_users/view" class="btn btn-success pull-right thickbox none new"><i class="icon-plus icon-white"></i> Add new user</a>
					</div>

					<form action="admin_users/search" method="get" class="well form-search" id="search_form">
						<input type="text" class="span4" name="q" value="" placeholder="Find text...">
						<button type="submit" class="btn"><i class="icon-search icon-black"></i> Search</button>
					</form>	

					<p>Total items: 5</p>
					<div id="item_table" >
							<div id="table_holder">
								<?php echo $manage_table ; ?>
							</div>
					</div>		
					<div id="pagination" class="pagination">
						<?php  echo $pagination; ?>
					</div>
					
					<div class="buttons left">
							For selected: 
							<button class="btn btn-primary"><i class="icon-random icon-white"></i> New password</button>
							<button class="btn btn-primary"><i class="icon-lock icon-white"></i> (Un)Active</button>
							<a id="delete" href="<?php echo base_url().$controller_name; ?>/delete"><button class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</button></a>
					</div>
			
	</section>
</div>
<div id="feedback_bar"></div>
<?php $this->load->view('admin/layout/footer'); ?>
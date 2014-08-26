<?php
function get_css_files()
{
	//if(!defined("ENVIRONMENT") or ENVIRONMENT == 'development')
	//{
		return array(
			array('path' =>'admin/css/bootstrap.css'),
			array('path' =>'admin/css/bootstrap-responsive.css'),
			array('path' =>'admin/css/admin.css'),
		);
	//}
	
}
function get_js_files()
{
	//if(!defined("ENVIRONMENT") or ENVIRONMENT == 'development')
	//{
		return array(
			array('path' =>'admin/js/jquery-1.10.1.min.js'),
			array('path' =>'admin/js/jquery-ui-1.8.14.custom.min.js'),
			array('path' =>'admin/js/bootstrap.min.js'),
			array('path' =>'admin/js/core.js'),
			array('path' =>'admin/js/jquery.form.js'),
			array('path' =>'admin/js/all.js'),
			array('path' =>'admin/js/jquery.tablesorter.min.js'),
			array('path' =>'admin/js/manage_tables.js'),
		);
	//}
}
?> 
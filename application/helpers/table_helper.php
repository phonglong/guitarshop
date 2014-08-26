<?php
/* get employee */
function get_employees_manage_table($employees,$controller)
{
	$CI =& get_instance();
	$table='<table class="tablesorter table table-bordered table-striped" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	'login',
	'full name',
	'email',
	'active',
	'action',
	'&nbsp');
	$table.='<thead><tr>';

	$count = 0;
	foreach($headers as $header)
	{
		$count++;
		
		if ($count == 1)
		{
			$table.="<th class='leftmost'>$header</th>";
		}
		elseif ($count == count($headers))
		{
			$table.="<th class='rightmost'>$header</th>";
		}
		else
		{
			$table.="<th>$header</th>";		
		}
	}
	$table.='</tr></thead><tbody>';
	$table.= get_employees_manage_table_data_rows($employees,$controller);
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the employee.
*/
function get_employees_manage_table_data_rows($employees,$controller)
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($employees->result() as $person)
	{
		$table_data_rows.=get_emp_data_row($person,$controller);
	}
	
	if($employees->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='7'><div class='warning_message' style='padding:7px;'>No data to display</div></tr></tr>";
	}
	
	return $table_data_rows;
}

function get_emp_data_row($person,$controller)
{
	$CI =& get_instance();
	// $controller_name=strtolower(get_class($CI));
	// $width = $controller->get_form_width();	
	 $link = site_url();
	$table_data_row='<tr>';	
	$table_data_row.="<td width='5%'><input type='checkbox' id='person_$person->id' value='".$person->id."'/></td>";
	$table_data_row.='<td width="15%"><a href="'.$link.'" class="underline">'.$person->name.'</a></td>';
	$table_data_row.='<td width="15%"></td>';
	$table_data_row.='<td width="30%"></td>';
	$table_data_row.='<td width="15%"></td>';	
	$table_data_row.='<td width="15%"></td>';	
	$table_data_row.='<td width="5%" class="rightmost"></td>';
	$table_data_row.='</tr>';
	
	return $table_data_row;
}
/*
Gets the html table to manage items.
*/
function get_items_manage_table($items,$controller)
{
	$CI =& get_instance();
	// $has_cost_price_permission = $CI->Employee->has_module_action_permission('items','see_cost_price', $CI->Employee->get_logged_in_employee_info()->person_id);
	$table='<table class="tablesorter table table-bordered table-striped" id="sortable_table">';
	
	$headers = array('<input type="checkbox" id="select_all" />', 
	$CI->lang->line('items_item_number'),
	$CI->lang->line('items_name'),
	$CI->lang->line('items_category'),
	);
	
	// if($has_cost_price_permission)
	// {
		// $headers = array_merge($headers, array($CI->lang->line('items_cost_price')));
	// }
	
	$headers = array_merge($headers, array(
	$CI->lang->line('items_unit_price'),
	// $CI->lang->line('items_tax_percents'),
	$CI->lang->line('items_quantity'),
	'&nbsp;'
	));
	
	$table.='<thead><tr>';
	$count = 0;
	foreach($headers as $header)
	{
		$count++;
		
		if ($count == 1)
		{
			$table.="<th class='leftmost'>$header</th>";
		}
		elseif ($count == count($headers))
		{
			$table.="<th class='rightmost'>$header</th>";
		}
		else
		{
			$table.="<th>$header</th>";		
		}
	}
	$table.='</tr></thead><tbody>';
	$table.=get_items_manage_table_data_rows($items,$controller);
	$table.='</tbody></table>';
	return $table;
}

/*
Gets the html data rows for the items.
*/
function get_items_manage_table_data_rows($items,$controller)
{
	$CI =& get_instance();
	$table_data_rows='';
	
	foreach($items->result() as $item)
	{
		$table_data_rows.=get_item_data_row($item,$controller);
	}
	
	if($items->num_rows()==0)
	{
		$table_data_rows.="<tr><td colspan='11'><div class='warning_message' style='padding:7px;'>".lang('items_no_items_to_display')."</div></tr></tr>";
	}
	
	return $table_data_rows;
}

function get_item_data_row($item,$controller)
{
	$CI =& get_instance();
	// $has_cost_price_permission = $CI->Employee->has_module_action_permission('items','see_cost_price', $CI->Employee->get_logged_in_employee_info()->person_id);
	// $item_tax_info=$CI->Item_taxes->get_info($item->id);
	// $tax_percents = '';
	// foreach($item_tax_info as $tax_info)
	// {
		// $tax_percents.=$tax_info['percent']. '%, ';
	// }
	// $tax_percents=substr($tax_percents, 0, -2);
	$controller_name=strtolower(get_class($CI));
	$width = $controller->get_form_width();
	// $cat_name = $CI->Category->get_info($item->category);
	$table_data_row='<tr>';
	$table_data_row.="<td width='3%'><input type='checkbox' id='item_$item->id' value='".$item->id."'/></td>";
	$table_data_row.='<td width="10%">'.$item->item_number.'</td>';
	$table_data_row.='<td width="15%">'.$item->name.'</td>';
	$table_data_row.='<td width="11%">'.$item->name.'</td>';
	// if ($has_cost_price_permission)
	// {
		// $table_data_row.='<td width="11%" align="right">'.to_currency($item->cost_price).'</td>';
	// }
	$table_data_row.='<td width="11%" align="right">'.to_currency($item->price).'</td>';
	// $table_data_row.='<td width="11%">'.$tax_percents.'</td>';	
	$table_data_row.='<td width="11%">'.$item->quantity.'</td>';
	$table_data_row.='<td width="4%" class="rightmost">'.anchor($controller_name."/view/$item->id/width~$width", lang('common_edit'),array('class'=>'thickbox','title'=>lang($controller_name.'_update'))).'</td>';		
	
	$table_data_row.='</tr>';
	return $table_data_row;
}


?>
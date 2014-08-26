<?php
function is_sale_integrated_cc_processing()
{
	$CI =& get_instance();
	$payments = $CI->sale_lib->get_payments();
	return $CI->config->item('enable_credit_card_processing') && isset($payments[lang('sales_credit')]);
}
?>
<?php
function to_currency($number)
{
	$CI =& get_instance();
	$currency_symbol = $CI->config->item('currency_symbol') ? $CI->config->item('currency_symbol') : '$';
        $currency_symbol_pos = $CI->config->item('currency_symbol_possition');
        if(!$currency_symbol_pos){
            if($number >= 0)
            {
                    return $currency_symbol.' '.number_format($number, 0, '.', ',');
            }
            else
            {
                return '-'.$currency_symbol.' '.number_format(abs($number), 0, '.', ',');
            }
        }
        else{
            if($number >= 0)
            {
                    return number_format($number, 0, '.', ',').'<sup>'.$currency_symbol.'</sup>';
            }
            else
            {
                return '-'.number_format(abs($number), 0, '.', ',').'<sup>'.$currency_symbol.'</sup>';
            }
        }
	
}

function to_currency_unVND($number)
{
	$CI =& get_instance();
	$currency_symbol = $CI->config->item('currency_symbol') ? $CI->config->item('currency_symbol') : '$';
	if($number >= 0)
	{
		return number_format($number, 0, '.', ',').'.00';
    }
    else
    {
    	return '-'.number_format(abs($number), 0, '.', ',').'.00';
    }
}

function to_currency_unsup($number)
{
	$CI =& get_instance();
	$currency_symbol = $CI->config->item('currency_symbol') ? $CI->config->item('currency_symbol') : '$';
	if($number >= 0)
	{
		return number_format($number, 0, '.', ',').$currency_symbol;
    }
    else
    {
    	return '-'.number_format(abs($number), 0, '.', ',').$currency_symbol;
    }
}


function to_currency_no_money($number)
{
	return number_format($number, 2, '.', '');
}
?>
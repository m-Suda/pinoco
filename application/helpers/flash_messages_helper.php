<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * flash messages Helper
 * use bootstrap alert
 */

if ( ! function_exists('flash_messages'))
{
    function flash_messages()
    {
        $CI =& get_instance();
        
        $messages = '';
        if ($CI->session->flashdata('alert_success')) {
            $messages .=  '<div class="alert alert-success mt10" role="alert">'
                    .$CI->session->flashdata('alert_success')
                .'</div>'.PHP_EOL;
        }

        if ($CI->session->flashdata('alert_info')) {
            $messages .=  '<div class="alert alert-info mt10" role="alert">'
                    .$CI->session->flashdata('alert_info')
                .'</div>'.PHP_EOL;
        }

        if ($CI->session->flashdata('alert_warning')) {
            $messages .=  '<div class="alert alert-warning mt10" role="alert">'
                    .$CI->session->flashdata('alert_warning')
                .'</div>'.PHP_EOL;
        }

        if ($CI->session->flashdata('alert_danger')) {
            $messages .=  '<div class="alert alert-danger mt10" role="alert">'
                    .$CI->session->flashdata('alert_danger')
                .'</div>'.PHP_EOL;
        }

        return $messages;
    }
}
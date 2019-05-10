<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('admin_co'))
{
	function admin_co($nom)
	{
		if (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name, TRUE) &&
        get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password, TRUE))
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
	}
}

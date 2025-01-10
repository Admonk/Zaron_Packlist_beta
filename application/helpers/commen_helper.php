<?php
 $CI =& get_instance();
 $CI->load->database();
 $CI->load->model('Admin/Site_settings');
 $CI->load->model('Main_model');
 $result = $CI->Site_settings->site_information();
 define('SITE_NAME',$result[0]->site_name);
 define('SITE_EMAIL',$result[0]->email);
 define('SITE_PHONE',$result[0]->phone);
 define('LOGO',$result[0]->logo);
 define('FIXED_KM',$result[0]->fixed_km);
 define('FIXED_AMOUNT',$result[0]->amount);
 define('FAV_ICON',$result[0]->fav_icon);
 
 
 
 
 
 
 //define('city_tours',serialize($CI->Main_model->view_order_by('tr_city_tour','sort_order','ASC')));









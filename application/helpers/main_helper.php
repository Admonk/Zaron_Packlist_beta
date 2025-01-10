<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('do_upload'))
{
						 function do_upload($file,$filename)
						 {

						                                             $CI =& get_instance();
						        		                             $config['upload_path']   = './public/uploads/'; 
															         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
															         // $config['max_size']      = 1000; 
															         // $config['max_width']     = 1024; 
															         // $config['max_height']    = 768; 
											
															         $config['file_name'] = $file;
															         $CI->load->library('upload', $config);
															         if (!$CI->upload->do_upload($filename)) {
															          return  $CI->upload->display_errors(); 
															         }
															         else
															         { 
															                $uploadedImage = $CI->upload->data();
															                resizeImage($uploadedImage['file_name']);
															                return 1;  
															         } 

						}
}


if ( ! function_exists('profile'))
{
						 function profile($email)
						 {

						                                              $CI =& get_instance();
						                                              $CI->load->database();
																	  $CI->load->model('Admin/Auth');
																	  $result = $CI->Auth->read_user_information($email);


																	     define('USER_NAME',$result[0]->name);
																		 define('USER_EMAIL',$result[0]->email);
																		 define('USER_PHONE',$result[0]->phone);
																		 define('USER_ADDRESS',$result[0]->address);
																		 define('USER_ACCESS',$result[0]->access);
																		 define('USER_PROFILE',$result[0]->profile);
																		


						        		                            

						}
}

if (!function_exists('resizeImage'))
{


               function resizeImage($filename)
               {
                   
                   
                    
                                      $CI =& get_instance();
                                      $source_path = './public/uploads/' . $filename;
                                      $target_path = './public/uploads/';
                                      $config_manip = array(
                                          'image_library' => 'gd2',
                                          'source_image' => $source_path,
                                          'new_image' => $target_path,
                                          'maintain_ratio' => TRUE,
                                          'create_thumb' => TRUE,
                                          'thumb_marker' => '_resize',
                                          'width' => 150,
                                          'height' => 150
                                      );
                                
                                
                                      $CI->load->library('image_lib', $config_manip);
                                      if (!$CI->image_lib->resize()) {
                                          echo $CI->image_lib->display_errors();
                                      }
                                
                                
                                      $CI->image_lib->clear();
               }

}
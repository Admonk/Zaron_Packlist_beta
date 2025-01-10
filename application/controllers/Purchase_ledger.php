<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('memory_limit', '4400M');
class Purchase_ledger extends CI_Controller
{
    function __construct()
    {
        error_reporting(0);
        parent::__construct();
        $this->load->model('Admin/Users_model');
        if (isset($this->session->userdata['logged_in'])) {
            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $sales_id = $sess_array['sales_id'];
            $define_saleshd_id = $sess_array['define_saleshd_id'];
            $define_salesteam_id = $sess_array['define_salesteam_id'];
            $define_driver_id = $sess_array['define_driver_id'];
            $customer_id = $sess_array['customer_id'];
            $username = $sess_array['username'];
            $this->userid = $userid;
            $this->username = $username;
            $this->user_mail = $email;
            $this->sales_id = $sales_id;
            $this->define_saleshd_id = $define_saleshd_id;
            $this->define_salesteam_id = $define_salesteam_id;
            $this->define_driver_id = $define_driver_id;
            $this->customer_id = $customer_id;
            profile($this->user_mail);
        }
    }

    public function index()
    {

         $poList = $this->db->query("SELECT id, convert_status, roundoff, invoice_no, invoice_date, user_id
                                    FROM purchase_invoice
                                    WHERE deleteid = 0 
                                    AND invoice_date > '2024-05-31' 
                                    AND roundoff > 0 
                                    
                                    ")->result();

         // echo count($poList);
         // exit;


// $this->Main_model;
       
        foreach ($poList as $entry) {



                if ($entry->convert_status == 1) {
                    $credits = $entry->roundoff;
                    $debits = 0;
                } else {
                    $credits = 0;
                    $debits = $entry->roundoff;
                }

                $notes = 'Round off - Purchase Invoice '.$entry->invoice_no;
                $order_no = $entry->invoice_no;
                $user_id = $entry->user_id;
                $deletemod = 'ROUND-'.$order_no;


                  $purchaseEntry = $this->db->query("UPDATE `all_ledgers` SET user_id = '$user_id', deleteid = '0' WHERE customer_id = 372 AND order_no = '$order_no' AND deletemod = '$deletemod' AND notes = '$notes' ");





       //          $purchaseEntry = $this->db->query("SELECT payment_date,payment_time FROM all_ledgers WHERE order_no = '$order_no' AND order_id > 0")->row();

       // //            echo '<pre>';
       // // print_r($purchaseEntry);
       // // exit;
       //          $data_roundoff['order_id'] = 0;
       //          $data_roundoff['customer_id'] =372;
       //          $data_roundoff['user_id'] = $entry->userid;
       //          $data_roundoff['notes'] = $notes;
       //          $data_roundoff['deletemod'] = $deletemod;
       //          $data_roundoff['credits'] =  $credits;
       //          $data_roundoff['debits'] =  $debits;
       //          $data_roundoff['order_no'] = $order_no;
       //          $data_roundoff['reference_no'] = $order_no;
       //          $data_roundoff['party_type'] = 5;
       //          $data_roundoff['account_head_id'] = 372;
       //          $data_roundoff['account_heads_id_2'] = 372;
       //          $data_roundoff['payment_date'] = $purchaseEntry->payment_date;
       //          $data_roundoff['payment_time'] = $purchaseEntry->payment_time;
       //          $data_roundoff['bank_id'] = 0;
       //          $data_roundoff['deleteid'] = 999;



       //           $this->Main_model->insert_commen($data_roundoff , 'all_ledgers');
        }
    }




     public function loading_charge()
    {

         $poList = $this->db->query("SELECT id,  loading_charges, invoice_no, invoice_date, user_id, vendor_base_id
                                    FROM purchase_invoice
                                    WHERE deleteid = 0 
                                    AND invoice_date > '2024-05-31' 
                                    AND loading_charges > 0
                                    
                                    ")->result();
        


// $this->Main_model;
       
        foreach ($poList as $entry) {



                // if ($entry->convert_status == 1) {
                    $debits = $entry->loading_charges;
                //     $debits = 0;
                // } else {
                //     $credits = 0;
                //     $debits = $entry->roundoff;
                // }
// 
                $notes = 'Loading Charge - Purchase Invoice '.$entry->invoice_no;
                $order_no = $entry->invoice_no;
                $vendor_base_id = $entry->vendor_base_id;
                $user_id = $entry->user_id;
                $deletemod = 'LOADING-'.$order_no;
                $vendorName = $this->db->query("SELECT name FROM `vendor` WHERE `id` = '$vendor_base_id' ")->row();
                $vendorName = $vendorName->name;

                  $purchaseEntry = $this->db->query("UPDATE `all_ledgers` SET account_head_id = '177',account_heads_id_2 = '177', deleteid = '0', dummy_customer_name = '$vendorName',user_id = '$user_id' WHERE customer_id = 605 AND order_no = '$order_no' AND deletemod = '$deletemod' AND notes = '$notes' ");





                // $purchaseEntry = $this->db->query("SELECT payment_date,payment_time FROM all_ledgers WHERE order_no = '$order_no' AND order_id > 0")->row();

       // //            echo '<pre>';
       // // print_r($purchaseEntry);
       // // exit;
                // $data_roundoff['order_id'] = 0;
                // $data_roundoff['customer_id'] =605;
                // $data_roundoff['user_id'] = $entry->userid;
                // $data_roundoff['notes'] = $notes;
                // $data_roundoff['deletemod'] = $deletemod;
                // $data_roundoff['credits'] =  0;
                // $data_roundoff['debits'] =  $debits;
                // $data_roundoff['order_no'] = $order_no;
                // $data_roundoff['reference_no'] = $order_no;
                // $data_roundoff['party_type'] = 5;
                // $data_roundoff['account_head_id'] = 605;
                // $data_roundoff['account_heads_id_2'] = 605;
                // $data_roundoff['payment_date'] = $purchaseEntry->payment_date;
                // $data_roundoff['payment_time'] = $purchaseEntry->payment_time;
                // $data_roundoff['bank_id'] = 0;
                // $data_roundoff['deleteid'] = 22222;
                // $data_roundoff['process_by'] = 22222;



                 // $this->Main_model->insert_commen($data_roundoff , 'all_ledgers');
        }
    }
}

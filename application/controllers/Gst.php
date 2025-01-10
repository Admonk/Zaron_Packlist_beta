<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('memory_limit', '4400M');
class Gst extends CI_Controller
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

        $poList = $this->db->query("SELECT id FROM purchase_invoice WHERE deleteid = 0  ")->result();
        // print_r($poList);
        // exit;
        foreach ($poList as $entry) {
            $id = $entry->id;
            $result = $this->Main_model->where_names('purchase_invoice_products', 'c_id', $id);
            $totalamount = 0;
            $totalextra = 0;
            foreach ($result as  $value) {
                $totalamount += $value->qty * $value->price;

                if ($value->extra != '') {
                    $totalextra += $value->qty * $value->extra;
                }
            }

            $loading_charges = 0;
            $vendor_id = 0;
            $resultg = $this->Main_model->where_names('purchase_invoice', 'id', $id);
            $schedule_date = '';
            // print_r($resultg);
            // exit;
            foreach ($resultg as  $values) {
                $invoice_no = $values->invoice_no;
                $invoice_date = $values->invoice_date;
                $invoiceDateRaw = $invoice_date;


                $vendor_id = $values->vendor_base_id;

                $attachment = $values->attachment;
                $order_base = $values->order_base;

                if ($order_base == 0) {
                    $payment_status = 'PENDING';
                }

                if ($order_base == 1) {
                    $payment_status = 'PAID';
                }

                if ($order_base == 2) {
                    $payment_status = 'RE-SCHEDULE';
                    $schedule_date = date('d-m-Y', strtotime($values->schedule_date));
                }
                if ($order_base == 4) {
                    $payment_status = 'PARTIAL PAYOUT';
                }

                $payout_amount = $values->payout_amount;
                $invoice_amount = $values->invoice_amount;


                $roundoff = $values->roundoff;
                $convert = $values->convert_status;


                if ($values->loading_charges > 0) {
                    $loading_charges = $values->loading_charges;
                } else {
                    $loading_charges = 0;
                }


                $invoice_amountdata = $invoice_amount - $payout_amount;
            }

            $array['invoice_totalextra'] = $totalextra;
            $array['payment_status'] = $payment_status;
            $array['schedule_date'] = $schedule_date;
            $array['loading_charges'] = $loading_charges;
            $array['attachment'] = $attachment;
            $totalamount = $totalamount;

            $array['invoice_no'] = $invoice_no;
            $array['invoice_date'] = date('d-m-Y', strtotime($invoice_date));
            $array['invoice_totalamount'] = round($totalamount);
            $array['invoice_gstamount'] = round($totalamount * 18 / 100);
            $gstamount = round($totalamount * 18 / 100);
            $totalamountWOGST = $totalamount + $loading_charges;
            $totalamountWithGST = $totalamount + $loading_charges + $gstamount;

            $totalamount = $totalamount + $loading_charges + $gstamount;


            if ($roundoff > 0) {

                if ($convert == 1) {
                    $totalamount = $totalamount + $roundoff;
                    $roundoffVal =  $roundoff;
                    // $totalamountWOGST = $totalamountWOGST  + $roundoff;
                    $convert_status = '(+)';
                } else {
                    $totalamount = $totalamount - $roundoff;
                    $roundoffVal = (-1) * $roundoff;
                    // $totalamountWithGST =  $totalamountWithGST - $roundoff;
                    $convert_status = '(-)';
                }
            }else{
                $roundoffVal = 0;
            }




            $tcs_status = 0;
            $customers_data = $this->Main_model->where_names('vendor', 'id', $vendor_id);
            foreach ($customers_data as $csvalv) {
                $tcs_status = $csvalv->tcs_status;
            }

            if ($tcs_status == 1) {

                $tcsamount = round($totalamount * 0.1 / 100);
            } else {


                $tcsamount = 0;
            }



            $totalamount = $totalamount + $tcsamount;

            $array['invoice_fulltotal'] = round($totalamount);
            $array['tcsamount'] = round($tcsamount);

            $array['roundoffset'] = $roundoff;
            $array['convert_status'] = $convert_status;

            $invoice_amountdata = $invoice_amountdata + $loading_charges;
            $array['invoice_amount'] = round($invoice_amountdata);




$totalamountWOGST = $totalamountWOGST + $roundoffVal;
$totalamountWithGST = $totalamountWithGST + $roundoffVal;

            if ($invoiceDateRaw > '2024-05-31') {
                $this->db->query("UPDATE all_ledgers SET credits='" . $totalamountWOGST . "' WHERE order_id='" . $id . "' AND order_no='" . $invoice_no . "' AND deletemod = 'PC" . $id . "' ");
                echo $id . '  New<br/>';
            } else {
                $this->db->query("UPDATE all_ledgers SET credits='" . $totalamountWithGST . "' WHERE order_id='" . $id . "' AND order_no='" . $invoice_no . "' AND deletemod = 'PC" . $id . "' ");
                echo $id .  '  Old<br/>';
            }
        }
    }
}

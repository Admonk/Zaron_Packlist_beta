<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set('memory_limit', '4400M');
class Roundoff extends CI_Controller
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


        $results = $this->db->query("SELECT 
    op.order_no, 
    op.user_id,
    al.payment_date,
    al.payment_time,
    ROUND(SUM(CASE WHEN al.customer_id = 585 THEN al.credits ELSE 0 END), 3) AS sgst, 
    ROUND(SUM(CASE WHEN al.customer_id = 586 THEN al.credits ELSE 0 END), 3) AS cgst, 
    ROUND(SUM(CASE WHEN al.customer_id = 372 THEN al.credits ELSE 0 END), 3) AS credRound, 
    ROUND(SUM(CASE WHEN al.customer_id = 372 THEN al.debits ELSE 0 END), 3) AS debtRound, 
    ROUND(SUM(CASE WHEN al.customer_id = 372 THEN al.credits ELSE 0 END) - SUM(CASE WHEN al.customer_id = 372 THEN al.debits ELSE 0 END), 3) AS balance, 
    oplp.prdTotals, 
    (CASE WHEN op.tcs_status = 1 THEN op.tcsamount ELSE 0 END) AS tcs_amount,
    (CASE WHEN op.discount > 0 THEN op.discount ELSE 0 END) AS discount_amount,
    op.bill_total AS orderTotals,
    ROUND(oplp.prdTotals + (SUM(CASE WHEN al.customer_id = 372 THEN al.credits ELSE 0 END) - SUM(CASE WHEN al.customer_id = 372 THEN al.debits ELSE 0 END)) + (CASE WHEN op.tcs_status = 1 THEN op.tcsamount ELSE 0 END) + (CASE WHEN op.discount > 0 THEN op.discount ELSE 0 END), 3) AS CalculatedValue
FROM 
    orders_process op 
LEFT JOIN (
    SELECT 
        order_id, 
        ROUND(SUM(amount * 1.18), 3) AS prdTotals 
    FROM 
        order_product_list_process 
    GROUP BY 
        order_id
) oplp ON oplp.order_id = op.id 
LEFT JOIN 
    all_ledgers al ON al.order_no = op.order_no 
WHERE 
    op.create_date > '2024-05-31' AND al.payment_date > '2024-05-31' 
GROUP BY 
    op.order_no, op.bill_total, oplp.prdTotals, op.tcs_status, op.tcsamount, op.discount
HAVING 
    ROUND(oplp.prdTotals + (SUM(CASE WHEN al.customer_id = 372 THEN al.credits ELSE 0 END) - SUM(CASE WHEN al.customer_id = 372 THEN al.debits ELSE 0 END)) + (CASE WHEN op.tcs_status = 1 THEN op.tcsamount ELSE 0 END) + (CASE WHEN op.discount > 0 THEN op.discount ELSE 0 END), 3) != op.bill_total 
    AND balance = 0
ORDER BY 
    op.order_no DESC;
")->result();
        // print_r($results);
        // exit;


        foreach ($results as $entry) {

            $autoRoundStat = '';
            $fullVal = round($entry->prdTotals);
            $diff = $fullVal - $entry->prdTotals;

            if ($diff > 0) {
                $autoRoundStat = 'plus';
            }

            $autoRound = round(abs($diff), 2);

            $data_auto_roundoff['order_id'] = 0;
            $data_auto_roundoff['customer_id'] = 372;
            $data_auto_roundoff['user_id'] = $entry->user_id;
            $data_auto_roundoff['notes'] = 'Auto Round off - Order Process ' . $entry->order_no;
            if ($autoRoundStat == 'plus') {
                $data_auto_roundoff['credits'] = $autoRound;
                $data_auto_roundoff['debits'] = 0;
            } else {
                $data_auto_roundoff['debits'] = $autoRound;
                $data_auto_roundoff['credits'] = 0;

            }
            $data_auto_roundoff['deletemod'] = 'AUTOROUND-' . $entry->order_no;
            $data_auto_roundoff['order_no'] = $entry->order_no;
            $data_auto_roundoff['reference_no'] = $entry->order_no;
            $data_auto_roundoff['party_type'] = 5;
            $data_auto_roundoff['account_head_id'] = 372;
            $data_auto_roundoff['account_heads_id_2'] = 372;
            $data_auto_roundoff['payment_date'] = $entry->payment_date;
            $data_auto_roundoff['payment_time'] = $entry->payment_time;
            $data_auto_roundoff['dummy_customer_name'] = 'temp_entry';
            // if ($payment_mode == 'Cash') {
            //     $data_auto_roundoff['bank_id'] = 25;
            // }

        $this->Main_model->insert_commen($data_auto_roundoff , 'all_ledgers');


          echo '<pre>';
                  print_r($data_auto_roundoff);


                  echo '<br>==========================================<br>';

        }
        
        // exit;


    }
}

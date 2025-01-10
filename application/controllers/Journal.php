<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Journal extends CI_Controller
{
    function __construct()
    {
        error_reporting(0);
        parent::__construct();
        $this->load->model('Admin/Auth');
        $this->load->model('Main_model');
        if (isset($this->session->userdata['logged_in'])) {
            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $this->userid = $userid;
            $this->user_mail = $email;
        }
    }
    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title'] = 'Journals';
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title']    = 'Voucher Entry';

            $data['partytype'] = $this->Main_model->where_names_order_by('partytype', 'deleteid', '0', 'id', 'ASC');

            $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount', 'deleteid', '0', 'id', 'ASC');


            $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads_sub_group', 'deleteid', '0', 'id', 'ASC');


            $data['grouping'] = $this->Main_model->where_names_order_by('grouping', 'deleteid', '0', 'id', 'ASC');
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '4', 'deleteid', '0', 'id', 'ASC');

            $data['top_nav'] = $this->load->view('./commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('./commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('./commen/footer_copy_rights.php', $data, TRUE);
            $this->load->view('./journal/index', $data);
        } else {
            redirect('index.php/adminmain');
        }
    }


    public function edit()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title'] = 'Journals';
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title']    = 'Voucher Entry Edit';

            $data['partytype'] = $this->Main_model->where_names_order_by('partytype', 'deleteid', '0', 'id', 'ASC');

            $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount', 'deleteid', '0', 'id', 'ASC');


            $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads_sub_group', 'deleteid', '0', 'id', 'ASC');


            $data['grouping'] = $this->Main_model->where_names_order_by('grouping', 'deleteid', '0', 'id', 'ASC');
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '4', 'deleteid', '0', 'id', 'ASC');

            $data['top_nav'] = $this->load->view('./commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('./commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('./commen/footer_copy_rights.php', $data, TRUE);
            $this->load->view('./journal/edit', $data);
        } else {
            redirect('index.php/adminmain');
        }
    }

    public function get_names()
    {
        // $vendorNames = $this->Main_model->getVendorNames();
        // $driverNames = $this->Main_model->getDriverNames();
        // $customerNames = $this->Main_model->getCustomerNames();
        // $otherNames =  $this->Main_model->getOtherNames();
        // $data = array(
        //     'vendorNames'    => $vendorNames,
        //     'driverNames'    => $driverNames,
        //     'customerNames'  => $customerNames,
        //     'otherNames'     => $otherNames
        // );
        $data['bankaccount'] = $this->db->query("SELECT * FROM bankaccount where deleteid =0 AND id !=25 order by id ASC")->result();
        $data['cash'] = $this->db->query("SELECT * FROM bankaccount where deleteid =0 AND id=25 order by id ASC")->result();
        // $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function get_voucher_sequence()
    {

        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);
        $voucher_base = $form_data->voucher_base;
        

        $data = $this->db->query("SELECT * FROM voucher_sequence WHERE voucher_base = '".$voucher_base."' order by id DESC LIMIT 1")->result();
        
        echo json_encode($data);
    }

    public function get_edit_voucher_data()
    {

        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);
        $id = $form_data->id;
        $deletemod = $form_data->deletemod;
        $voucher_type = $form_data->voucher_type;
        // var_dump($voucher_type);
        $array = array();
        if($voucher_type == 'contra'){ 
            $data = $this->db->query("SELECT id,credit as credits,debit as debits,bank_account_id as customer_id,party_type,voucher_base,voucher_no,ex_code as reference_no,create_date as payment_date,create_time as payment_time,notes FROM bankaccount_manage WHERE deletemod = '".$deletemod."' AND deleteid=0
            ORDER BY id ASC")->result();
        }else{
            $data = $this->db->query("SELECT * FROM all_ledgers WHERE deletemod = '".$deletemod."' AND deleteid=0
            ORDER BY id ASC")->result();
        }
        

        //     $data_bank = $this->db->query("SELECT * FROM  bankaccount_manage WHERE deletemod = '".$deletemod."'
        //       AND deleteid = 0 ORDER BY id ASC")->result();

        //     foreach($data_bank as $key => $bank_value){

        //         if($bank_value->party_type==4)
        //         {
        //             $table='bankaccount';
        //             $traget='driver';
        //             $traget2='customer_id';
        //             $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY bank_name ASC");

        //         }

        //         $party_name="";
        //         if(!empty($query)){
        //        $res=$query->result();
        //        foreach($res as $partys)
        //        {
        //                                   $party_name=$partys->name;
        //                                   $customer_id=$partys->id;
        //        }

        //         $array[] = [
        //             'no' => $key+1,
        //             'id' => $bank_value->id,
        //             'customer_id' => $bank_value->bank_account_id,
        //             'party_name' =>  $party_name,
        //             'payment_date' => $bank_value->payment_date,
        //             'voucher_base' => $bank_value->voucher_base,
        //             'voucher_no'  => $bank_value->voucher_no,
        //             'party_type'  => $bank_value->party_type,
        //             'credits'  => $bank_value->credit,
        //             'debits'   => $bank_value->debit,


        //          ];
        //     }
        // }
                // var_dump( $data_bank);
            foreach($data as $key => $value){
                if($value->party_type==1)
                {
                    $table='customers';
                    $traget='customer';
                    $traget2='customer_id';
                    $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                }
                if($value->party_type==2)
                {
                    $table='driver';
                    $traget='driver';
                    $traget2='customer_id';
                    $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                }
                if($value->party_type==4)
                {
                    $table='bankaccount';
                    $traget='driver';
                    $traget2='customer_id';
                    $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY bank_name ASC");

                }

                 if($value->party_type==3)
                {
                    $table='vendor';
                    $traget='vendor';
                    $traget2='customer_id';
                    $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                }

                if($value->party_type==5)
                {
                            $table='accountheads';
                            $traget='accountheads';
                            $traget2='customer_id';
                            $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                }

                if($value->party_type==6)
                {
                            $table='accountheads_sub_group';
                            $traget='accountheads_sub_group';
                            $traget2='customer_id';
                            $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                }
                 if($value->party_type==7)
                {
                            $table='accountheads';
                            $traget='accountheads';
                            $traget2='customer_id';

                             $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                }

                if($value->party_type==8)
                {
                            $table='admin_users';
                            $traget='admin_users';
                            $traget2='customer_id';

                             $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                }

                  $party_name="";
                  if(!empty($query)){
                 $res=$query->result();
                 foreach($res as $partys)
                 {
                                            $party_name=$partys->name;
                                            $customer_id=$partys->id;
                 }
                }

                if($value->cnn_status==1)
                {
                    $value->party_type=10;
                }

                 $array[] = [
                    'no' => $key+1,
                    'id' => $value->id,
                    'customer_id' => $value->customer_id,
                    'dummy_customer_id' =>  $value->dummy_customer_id,
                    'dummy_customer_name' =>  $value->dummy_customer_name,
                    'dummy_party_type' =>  $value->dummy_party_type,
                    'party_name' =>  $party_name,
                    'payment_date' => $value->payment_date,
                    'voucher_base' => $value->voucher_base,
                    'voucher_no'  => $value->voucher_no,
                    'party_type'  => $value->party_type,
                    'reference_no' => $value->reference_no,
                    'payment_time' => $value->payment_time,
                    'notes'      => $value->notes,
                    'credits'  => $value->credits,
                    'debits'   => $value->debits,


                 ];

                //  var_dump($party_name);
                //  $data['party_name'] =  $party_name;
            }

        
        echo json_encode($array);
    }

    public function save_data_cantra()
    {
        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);
        $date = date('Y-m-d');
        $time= date('h:i:s A');
        $debit = 0;
        $credit = 0;
        $tableRows = $form_data->tableRows;
        $notes = $form_data->narration;
        $voucher_no = $form_data->voucherNumber;
        $upi_no = $form_data->upiNumber;
        $voucher_base = $form_data->voucher_base;

        $data_voucher['voucher_base']=$voucher_base;
        $data_voucher['voucher_no']= $voucher_no;
        $insert_voucher= $this->Main_model->insert_commen($data_voucher, 'voucher_sequence');


        foreach ($tableRows as $key => $value) {
            $selected_option = $value->selectedOption;
            
            if ($selected_option == 'dr') {
                $debit   = $value->debit;
                $credit   = 0;
                $bank_id = $value->selectedbankType;
                $data_bank['bank_account_from'] = $bank_id;
            } else {
                $debit   = 0;
                $credit   = $value->credit;
                $bank_id = $value->selectedbankType;
                $data_bank['bank_account_from'] = $bank_id;
            }

        $data_bank['bank_account_id'] = $bank_id;


        $data_bank['ex_code']=$upi_no;
        $data_bank['debit'] = $debit;
        $data_bank['credit'] = $credit;
        $data_bank['user_id'] = $this->userid;
        $data_bank['voucher_base'] = $voucher_base;
        $data_bank['voucher_no'] = $voucher_no;


        $data_bank['name'] = 'Deposit & Withdrawal';

        $create_date = date('Y-m-d', strtotime($form_data->selectedDate));

        if ($create_date == '1970-01-01') {
            $data_bank['create_date'] = date('Y-m-d');
        } else {
            $data_bank['create_date'] = $create_date;
        }
        $data_bank['create_time'] = $time;
        $data_bank['notes'] = $notes;

        // $data_bank['account_head_id']=107;
        // $data_bank['account_heads_id_2']=107;
        $data_bank['account_head_id']= ($bank_id == '25' ? 105 : 107);
        $data_bank['account_heads_id_2']=($bank_id == '25' ? 105 : 107);
        $data_bank['party_type'] = 4;

        //$data_bank['name']=$form_data->notes;
        $data_bank['deletemod'] = 'JEV' . time();
        $data_bank['single_deposite'] = 0;
        $data_bank['status_by'] = 'Voucher ' . $form_data->notes;

        try {

            $this->Main_model->insert_commen($data_bank, 'bankaccount_manage');

            $response = array(
                'status' => 'success',
                'message' => 'Data inserted successfully.',
                // 'data'   => $insert
            );
        } catch (Exception $e) {
            // Handle the exception
            $response = array(
                'status' => 'error',
                'message' => 'Failed to insert data.'
            );
        }
       
    }
        echo json_encode($response);

    }

    public function update_data_cantra()
    {
        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);
        // var_dump($form_data->payment_time);
        // exit;
        $date = date('Y-m-d');
        $time= $form_data->payment_time;
        $debit = 0;
        $credit = 0;
        $tableRows = $form_data->tableRows;
        $notes = $form_data->narration;
        $voucher_no = $form_data->voucherNumber;
        $upi_no = $form_data->upiNumber;
        $voucher_base = $form_data->voucher_base;
        $deletemod = $_GET['deletemod'];
        $data_voucher['voucher_base']=$voucher_base;
        $data_voucher['voucher_no']= $voucher_no;
        // $insert_voucher= $this->Main_model->insert_commen($data_voucher, 'voucher_sequence');
        // var_dump($deletemod);
        $update_bank_rec = $this->db->query("UPDATE bankaccount_manage SET deleteid='-22' WHERE deletemod = '".$deletemod."'
        AND deleteid = 0");

        foreach ($tableRows as $key => $value) {
            $selected_option = $value->selectedOption;
            
            if ($selected_option == 'dr') {
                $debit   = $value->debit;
                $credit   = 0;
                $bank_id = $value->selectedbankType;
                $data_bank['bank_account_from'] = $bank_id;
            } else {
                $debit   = 0;
                $credit   = $value->credit;
                $bank_id = $value->selectedbankType;
                $data_bank['bank_account_from'] = $bank_id;
            }

        $data_bank['bank_account_id'] = $bank_id;


        $data_bank['ex_code']=$upi_no;
        $data_bank['debit'] = $debit;
        $data_bank['credit'] = $credit;
        $data_bank['user_id'] = $this->userid;
        $data_bank['voucher_base'] = $voucher_base;
        $data_bank['voucher_no'] = $voucher_no;


        $data_bank['name'] = 'Deposit & Withdrawal';

        $create_date = date('Y-m-d', strtotime($form_data->selectedDate));

        if ($create_date == '1970-01-01') {
            $data_bank['create_date'] = date('Y-m-d');
        } else {
            $data_bank['create_date'] = $create_date;
        }
        $data_bank['create_time'] = $time;
        $data_bank['notes'] = $notes;

        // $data_bank['account_head_id']=107;
        // $data_bank['account_heads_id_2']=107;
        $data_bank['account_head_id']= ($bank_id == '25' ? 105 : 107);
        $data_bank['account_heads_id_2']=($bank_id == '25' ? 105 : 107);
        $data_bank['party_type'] = 4;

        //$data_bank['name']=$form_data->notes;
        $data_bank['deletemod'] = $deletemod;
        $data_bank['single_deposite'] = 0;
        $data_bank['status_by'] = 'Voucher ' . $form_data->notes;

        try {
            // var_dump($data_bank);
            $this->Main_model->insert_commen($data_bank, 'bankaccount_manage');

            $response = array(
                'status' => 'success',
                'message' => 'Data inserted successfully.',
                // 'data'   => $insert
            );
        } catch (Exception $e) {
            // Handle the exception
            $response = array(
                'status' => 'error',
                'message' => 'Failed to insert data.'
            );
        }
       
    }
        echo json_encode($response);

    }

    public function save_data()
    {
        //  $form_data = json_decode(file_get_contents("php://input"));
        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);

        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d', strtotime($form_data->selectedDate));
        $time = date('h:i A');
        $tablename = 'all_ledgers';

        $debit = 0;
        $credit = 0;
        $tableRows = $form_data->tableRows;
        $notes = $form_data->narration;
        $cr_type = $_GET['cr_type'];
        $cr_party = $_GET['cr_party'];

        if ($cr_type == 1) {
            $cr_type_name = 'Customer ';
        }
        elseif ($cr_type == 2) {
            $cr_type_name = 'Driver';
        }
        elseif($cr_type == 22) {
            $cr_type_name = 'Driver';
        }

        elseif ($cr_type == 3) {
            $cr_type_name = 'Vendor ';
        }
        elseif ($cr_type == 5) {
            $cr_type_name = 'Other ';
        }

        if($cr_type ==22){
            $cr_type = 2;
        }

        // var_dump($cr_type);
        // exit;
        $cpp = explode('-', $cr_party);
        $cr_party_id= $cpp[0];
        $cr_party_name = $cpp[1];
        $voucher_no = $form_data->voucherNumber;
        $upi_no = $form_data->upiNumber;
        $voucher_base = $form_data->voucher_base;

        $data_voucher['voucher_base']=$voucher_base;
        $data_voucher['voucher_no']= $voucher_no;
        $insert_voucher= $this->Main_model->insert_commen($data_voucher, 'voucher_sequence');

        foreach ($tableRows as $key => $value) {
            $selected_option = $value->selectedOption;
          
            if ($selected_option == 'dr') {
                $selectedTypes_dr=0;
                if($value->selectedType == 2){
                    $selectedTypes_dr = 2;
                    $driver_status = 1;
                   }else if($value->selectedType == 22){
                    $driver_status = 0;
                    $selectedTypes_dr = 2;
                   }else{
                    $selectedTypes_dr=$value->selectedType;
                   }
           
                $payer_type =  $selectedTypes_dr;
                $party_type = $payer_type;
                $payer_party  = $value->party;
                $party = $payer_party;
                $debit   = $value->debit;
                $credit   = 0;
                $pp = explode('-', $party);
                $payer_party_id= $pp[0];
                $party_id = $payer_party_id;
                $bank_id = $party_id;
                $payer_party_name = $pp[1];
                $party_name = $payer_party_name;

                $payment_mode = "To - ";
               if($payer_type == 4 || $payer_type==9){
                    $data_bank['name'] = $payer_party_name;
                    $bank_id = $party_id;
                    $bank_party_type = $payer_type;
                    $party_type = 4;
                }
                switch ($payer_type) {
                    case 1:
                        $setval = 'Customer ';
                        break;
                    case 2:
                        $setval = 'Driver ';
                        break;
                    case 22:
                        $setval = 'Driver ';
                        break;
                    case 3:
                        $setval = 'Vendor ';
                        break;
                    case 5:
                        $setval = 'Other ';
                        break;
                    default:
                        $setval = '';
                        break;
                }

            } else {
                $selectedTypes_cr=0;
                if($value->selectedType == 2){
                    $selectedTypes_cr = 2;
                    $driver_status = 1;
                   }else if($value->selectedType == 22){
                    $selectedTypes_cr = 2;
                    $driver_status = 0;
                   }else{
                    $selectedTypes_cr=$value->selectedType;
                   }
                $payee_type =  $selectedTypes_cr;
                $party_type = $payee_type;
                $payee_party  = $value->party;
                $party = $payee_party;
                $debit   = 0;
                $credit   = $value->credit;
                $pp1 = explode('-', $party);
                $party_id = $pp1[0];
                $bank_id = $party_id;
                $payee_party_name = $pp1[1];
                $party_name = $payee_party_name;
                $payment_mode = "From - ";
                if($payee_type == 4 || $payee_type==9){
                            $data_bank['name'] = $payee_party_name;
                            $bank_id = $party_id;
                            $bank_party_type = $payee_type;
                            $party_type = 4;
                        }
            }

            $account_heads_id = "";
            $account_heads_id_2="";
            $cnn_status=0;
            if($party_type=='1'){
                $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$party_id."' ORDER BY company_name ASC");
                $tableleg="all_ledgers";

            }
            elseif($party_type=='10')
            {


                $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$party_id."' ORDER BY company_name ASC");
                $tableleg="all_ledgers";
                $party_type=1;
                $cnn_status=1;

            }
            elseif($party_type=='2'){
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0'  AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='3'){
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='4'){
                $query = $this->db->query("SELECT id,bank_name,account_heads_id,account_heads_id_2 as name FROM bankaccount  WHERE deleteid='0' AND id='".$party_id."' ORDER BY bank_name ASC");
            }
            elseif($party_type=='5'){
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='6'){
                 // $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=5;
            }
            elseif($party_type=='7'){
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=5;
            }
            elseif($party_type=='8'){
                 $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=8;   
            }
            else
            {
               // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                //$tableleg="party_ledger";
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$party_id."' ORDER BY name ASC");
                $party_type=8;
            }

                        if(!empty($query)){
                            $res=$query->result();

                            foreach($res as $val)
                            {
                                   //  $company_name= $val->name;
                                    $account_heads_id= $val->account_heads_id;
                                    $account_heads_id_2= $val->account_heads_id;
                            }
                        }

                        if($party_type==1)
                        {
                            $account_heads_id_2= 123; 
                            $account_heads_id=68;
                        
                        }
                        
                         

            $from_mode =  ($selected_option == 'dr' ? $cr_party_name : $payer_party_name);

            $deletemod = $this->userid . $party_id . $date;
            $data_driver['payment_mode'] = $bank_id == '25' ? 'Cash' : 'Bank Transfer';
            $data_driver['customer_id'] = $party_id;

            $data_driver['dummy_customer_id'] =  $selected_option == 'dr' ? $cr_party_id : $payer_party_id;
            $data_driver['dummy_customer_name'] = $selected_option == 'dr' ? $cr_party_name : $payer_party_name;
            $data_driver['dummy_party_type'] = $selected_option == 'dr' ? $cr_type : $payer_type;
            $data_driver['voucher_base'] = $voucher_base;
            $data_driver['voucher_no'] = $voucher_no;
            $data_driver['driver_collection_status'] = $driver_status;


                             if($party_type==2)
                            {   
                                    if($driver_status==1)
                                    {
                                        if($data_driver['dummy_customer_id']==346)
                                        {
                                            $data_driver['order_trancation_status'] = 0;
                                        }
                                    }
                            }

            if($driver_status==1)
            {
                            if($party_type==2)
                            {
                                $data_driver['auto_expence_bank_status']=1;
                            }
                            
            }
            
            $data_driver['party_to_party'] = $party_id;
            // $data_driver['reference_no'] = $payment_mode . ($selected_option == 'dr' ? $cr_type_name : $payer_party_name);
            $data_driver['reference_no'] =$upi_no;
            $data_driver['order_no'] = $payment_mode . ($selected_option == 'dr' ? $cr_type_name : $payer_party_name);
            $data_driver['party_type'] = $party_type;
            $data_driver['cnn_status'] = $cnn_status;
            $data_driver['bank_id'] =  $selected_option == 'dr' ? $cr_party_id : $payer_party_id;
            $data_driver['order_id'] = 'TR';
            $data_driver['user_id'] = $this->userid;             
            $data_driver['payment_mode_payoff'] = $bank_id == '25' ? 'Cash' : 'Bank Transfer';
            $data_driver['account_head_id'] =  $party_type ==4 ? 0 : $account_heads_id;
            $data_driver['account_heads_id_2'] = $party_type ==4 ? 0 : $account_heads_id_2;
            $data_driver['process_by'] = 'Voucher';
            $data_driver['cash_trasfer_status'] = 0;
            $data_driver['amount'] = 0;
            $data_driver['notes'] = $notes;
            $data_driver['credits'] = $credit;
            $data_driver['debits'] = $debit;
            $data_driver['paid_status'] = '1';
            $data_driver['deletemod'] = 'JEV' . time();
            // $data_driver['account_head_id'] = 68;
            // $data_driver['account_heads_id_2'] = 123;
            $data_driver['payment_date'] = $date;
            $data_driver['payment_time'] = $time;



            // 'trip_end_date' => date('Y-m-d', strtotime($value->trip_end_date))
            $data_bank['bank_account_id'] = $bank_id;
             $data_bank['ex_code']=$upi_no;
            $data_bank['credit'] = $debit;
            $data_bank['debit'] = $credit;
            $data_bank['user_id'] = $this->userid;

            $create_date = date('Y-m-d', strtotime($form_data->selectedDate));

            if ($create_date == '1970-01-01') {
                $data_bank['create_date'] = date('Y-m-d');
            } else {
                $data_bank['create_date'] = $create_date;
            }
            $data_bank['create_time'] = $time;

            $data_bank['account_head_id']= ($bank_id == '25' ? 105 : 107);
            $data_bank['account_heads_id_2']=($bank_id == '25' ? 105 : 107);
            $data_bank['party_type'] = $party_type;
            $data_bank['name']=$from_mode;
            $data_bank['deletemod'] = 'JEV' . time();
            $data_bank['single_deposite'] = 0;
            $data_bank['status_by'] = 'Voucher';
            $data_bank['notes']  =  $form_data->narration;
            $data_bank['voucher_base'] = $voucher_base;
            $data_bank['voucher_no'] = $voucher_no;

            try {
                    // var_dump($data_driver);
                    $insert = $this->Main_model->insert_commen($data_driver, $tablename);
                    // var_dump($data_bank);
                    $insert_bank = $this->Main_model->insert_commen($data_bank, 'bankaccount_manage');
                
                $response = array(
                    'status' => 'success',
                    'message' => 'Data inserted successfully.',
                    // 'data'   => $insert
                );
            } catch (Exception $e) {
                // Handle the exception
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to insert data.'
                );
            }
        }

        echo json_encode($response);
    }


    public function update_data()
    {
        $postData = file_get_contents("php://input");
        $form_data = json_decode($postData);
        // var_dump($form_data);
        // exit;
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d', strtotime($form_data->selectedDate));
        
        $time = $form_data->payment_time;
        $tablename = 'all_ledgers';

        $debit = 0;
        $credit = 0;
        $tableRows = $form_data->tableRows;
        $notes = $form_data->narration;
        $bank_dr_status = 0;
        $bank_cr_status = 0;
        $cr_type = $_GET['cr_type'];
        $cr_party = $_GET['cr_party'];
        $deletemod = $_GET['deletemod'];

        if ($cr_type == 1) {
            $cr_type_name = 'Customer ';
        }
        elseif ($cr_type == 2) {
            $cr_type_name = 'Driver';
        }
        elseif($cr_type == 22) {
            $cr_type_name = 'Driver';
        }

        elseif ($cr_type == 3) {
            $cr_type_name = 'Vendor ';
        }
        elseif ($cr_type == 5) {
            $cr_type_name = 'Other ';
        }

        if($cr_type ==22){
            $cr_type = 2;
        }

        $cpp = explode('-', $cr_party);
        $cr_party_id= $cpp[0];
        $cr_party_name = $cpp[1];
        $voucher_no = $form_data->voucherNumber;
        $upi_no = $form_data->upiNumber;
        $voucher_base = $form_data->voucher_base;
       
        $update_bank_rec = $this->db->query("UPDATE bankaccount_manage SET deleteid='-22' WHERE deletemod = '".$deletemod."'
        AND deleteid = 0");

        $update_rec = $this->db->query("UPDATE all_ledgers  SET deleteid='-22' WHERE deletemod= '".$deletemod."'AND deleteid = 0");

        $data_voucher['voucher_base']=$voucher_base;
        $data_voucher['voucher_no']= $voucher_no;

        $query_seq = $this->db->query("SELECT id FROM voucher_sequence where voucher_base='".$voucher_base."' AND voucher_no='".$voucher_no."'")->num_rows();
        
        if($query_seq > 0){
            // var_dump($query_seq);
            // exit;
        }else{
        $insert_voucher= $this->Main_model->insert_commen($data_voucher, 'voucher_sequence');
        }

        foreach ($tableRows as $key => $value) {
            $selected_option = $value->selectedOption;
            
            if ($selected_option == 'dr') {
                $selectedTypes_dr=0;
                if($value->selectedType == 2){
                    $selectedTypes_dr = 2;
                    $driver_status = 1;
                   }else if($value->selectedType == 22){
                    $driver_status = 0;
                    $selectedTypes_dr = 2;
                   }else{
                    $selectedTypes_dr=$value->selectedType;
                   }
           
                $payer_type =  $selectedTypes_dr;
                $party_type = $payer_type;
                $payer_party  = $value->party;
                $party = $payer_party;
                $debit   = $value->debit;
                $credit   = 0;
                $pp = explode('-', $party);
                $payer_party_id= $pp[0];
                $party_id = $payer_party_id;
                $bank_id = $party_id;
                $payer_party_name = $pp[1];
                $party_name = $payer_party_name;

                $payment_mode = "To - ";
               if($payer_type == 4 || $payer_type==9){
                    $data_bank['name'] = $payer_party_name;
                    $bank_id = $party_id;
                    $bank_party_type = $payer_type;
                    $party_type = 4;
                }
                switch ($payer_type) {
                    case 1:
                        $setval = 'Customer ';
                        break;
                    case 2:
                        $setval = 'Driver ';
                        break;
                    case 22:
                        $setval = 'Driver ';
                        break;
                    case 3:
                        $setval = 'Vendor ';
                        break;
                    case 5:
                        $setval = 'Other ';
                        break;
                    default:
                        $setval = '';
                        break;
                }

            } else {
                $selectedTypes_cr=0;
                if($value->selectedType == 2){
                    $selectedTypes_cr = 2;
                    $driver_status = 1;
                   }else if($value->selectedType == 22){
                    $selectedTypes_cr = 2;
                    $driver_status = 0;
                   }else{
                    $selectedTypes_cr=$value->selectedType;
                   }
                $payee_type =  $selectedTypes_cr;
                $party_type = $payee_type;
                $payee_party  = $value->party;
                $party = $payee_party;
                $debit   = 0;
                $credit   = $value->credit;
                $pp1 = explode('-', $party);
                $party_id = $pp1[0];
                $bank_id = $party_id;
                $payee_party_name = $pp1[1];
                $party_name = $payee_party_name;
                $payment_mode = "From - ";
                if($payee_type == 4 || $payee_type==9){
                            $data_bank['name'] = $payee_party_name;
                            $bank_id = $party_id;
                            $bank_party_type = $payee_type;
                            $party_type = 4;
                        }
            }
            
            $account_heads_id = "";
            $account_heads_id_2="";
            $cnn_status=0;
            if($party_type=='1'){
                $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$party_id."' ORDER BY company_name ASC");
                $tableleg="all_ledgers";
            }
            elseif($party_type=='10')
            {


                $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$party_id."' ORDER BY company_name ASC");
                $tableleg="all_ledgers";
                $party_type=1;
                $cnn_status=1;

            }
            elseif($party_type=='2'){
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0'  AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='3'){
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='4'){
                $query = $this->db->query("SELECT id,bank_name,account_heads_id,account_heads_id_2 as name FROM bankaccount  WHERE deleteid='0' AND id='".$party_id."' ORDER BY bank_name ASC");
            }
            elseif($party_type=='5'){
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
            }
            elseif($party_type=='6'){
                 // $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=5;
            }
            elseif($party_type=='7'){
                 $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=5;
            }
            elseif($party_type=='8'){
                 $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$party_id."' ORDER BY name ASC");
                 $party_type=8;   
            }
            else
            {
               // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                //$tableleg="party_ledger";
                $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$party_id."' ORDER BY name ASC");
                $party_type=8;
            }

                        if(!empty($query)){
                            $res=$query->result();

                            foreach($res as $val)
                            {
                                   //  $company_name= $val->name;
                                    $account_heads_id= $val->account_heads_id;
                                    $account_heads_id_2= $val->account_heads_id;
                            }
                        }

                        if($party_type==1)
                        {
                            $account_heads_id_2= 123; 
                            $account_heads_id=68;
                        
                        }


                        $from_mode =  ($selected_option == 'dr' ? $cr_party_name : $payer_party_name);

                        // $deletemod = $this->userid . $party_id . $date;
                        $data_driver['payment_mode'] =  $bank_id == '25' ? 'Cash' : 'Bank Transfer';
                        $data_driver['customer_id'] = $party_id;
            
                        $data_driver['dummy_customer_id'] =  $selected_option == 'dr' ? $cr_party_id : $payer_party_id;
                        $data_driver['dummy_customer_name'] = $selected_option == 'dr' ? $cr_party_name : $payer_party_name;
                        $data_driver['dummy_party_type'] = $selected_option == 'dr' ? $cr_type : $payer_type;
                        $data_driver['voucher_base'] = $voucher_base;
                        $data_driver['voucher_no'] = $voucher_no;
                        $data_driver['driver_collection_status'] = $driver_status;



                           if($party_type==2)
                            {   
                                    if($driver_status==1)
                                    {   
                                        if($data_driver['dummy_customer_id']==346)
                                        {
                                            $data_driver['order_trancation_status'] = 0;
                                        }
                                        
                                    }
                            }

                         if($driver_status==1)
                        {
                                        if($party_type==2)
                                        {
                                            $data_driver['auto_expence_bank_status']=1;
                                        }
                                        
                        }
                        
                        $data_driver['party_to_party'] = $party_id;
                        // $data_driver['reference_no'] = $payment_mode . ($selected_option == 'dr' ? $cr_type_name : $payer_party_name);
                        $data_driver['reference_no'] = $upi_no;
                        $data_driver['order_no'] = $payment_mode . ($selected_option == 'dr' ? $cr_type_name : $payer_party_name);
                        $data_driver['party_type'] = $party_type;
                        $data_driver['cnn_status'] = $cnn_status;


                        $data_driver['bank_id'] =  $selected_option == 'dr' ? $cr_party_id : $payer_party_id;
                        $data_driver['order_id'] = 'TR';
                        $data_driver['user_id'] = $this->userid;             
                        $data_driver['payment_mode_payoff'] = $bank_id == '25' ? 'Cash' : 'Bank Transfer';
                        $data_driver['account_head_id'] = $account_heads_id;
                        $data_driver['account_heads_id_2'] = $account_heads_id_2;
                        $data_driver['process_by'] = 'Voucher';
                        $data_driver['cash_trasfer_status'] = 0;
                        $data_driver['amount'] = 0;
                        $data_driver['notes'] = $notes;
                        $data_driver['credits'] = $credit;
                        $data_driver['debits'] = $debit;
                        $data_driver['paid_status'] = '1';
                        $data_driver['deletemod'] = $deletemod;
                        $data_driver['deleteid'] = 0;
                        
                        // $data_driver['account_head_id'] = 68;
                        // $data_driver['account_heads_id_2'] = 123;
                        $data_driver['payment_date'] = $date;
                        $data_driver['payment_time'] = $time;
            
            
            
                        // 'trip_end_date' => date('Y-m-d', strtotime($value->trip_end_date))
                        $data_bank['bank_account_id'] = $bank_id;
                         $data_bank['ex_code']=$upi_no;
                        $data_bank['deleteid'] = 0;
                        $data_bank['credit'] = $debit;
                        $data_bank['debit'] = $credit;
                        $data_bank['user_id'] = $this->userid;
            
                        $create_date = date('Y-m-d', strtotime($form_data->selectedDate));
            
                        if ($create_date == '1970-01-01') {
                            $data_bank['create_date'] = date('Y-m-d');
                        } else {
                            $data_bank['create_date'] = $create_date;
                        }
                        $data_bank['create_time'] = $time;
            
                        $data_bank['account_head_id']= ($bank_id == '25' ? 105 : 107);
                        $data_bank['account_heads_id_2']=($bank_id == '25' ? 105 : 107);
                        $data_bank['party_type'] = $party_type;
                        $data_bank['name']=$from_mode;
                        $data_bank['deletemod'] = $deletemod;
                        $data_bank['single_deposite'] = 0;
                        $data_bank['notes'] = $notes;
                        $data_bank['status_by'] = 'Voucher';
                        $data_bank['notes']  =  $form_data->narration;
                        $data_bank['voucher_base'] = $voucher_base;
                        $data_bank['voucher_no'] = $voucher_no;

            try {
                   // var_dump($data_driver);
                   $insert = $this->Main_model->insert_commen($data_driver, $tablename);
                   // var_dump($data_bank);
                   $insert_bank = $this->Main_model->insert_commen($data_bank, 'bankaccount_manage');
                
                $response = array(
                    'status' => 'success',
                    'message' => 'Data insert successfully.',
                    // 'data'   => $insert
                );
            } catch (Exception $e) {
                // Handle the exception
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to insert data.'
                );
            }
        }
        echo json_encode($response);
    }
}

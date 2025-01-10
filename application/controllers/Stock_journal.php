<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_journal extends CI_Controller
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
            $data['title']    = 'Stock Journal';
            $data['uom'] = $this->Main_model->where_names_order_by('uom', 'deleteid', '0', 'id', 'ASC');
            $data['Categories'] = $this->Main_model->where_names_order_by('categories', 'deleteid', '0', 'categories', 'ASC');
            $data['Sub_Categories'] = $this->Main_model->where_names_order_by('sub_categories', 'deleteid', '0', 'sub_categories', 'ASC');

            $data['top_nav'] = $this->load->view('./commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('./commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('./commen/footer_copy_rights.php', $data, TRUE);
            $this->load->view('./stock_journal/index', $data);
        } else {
            redirect('index.php/adminmain');
        }
    }

  

    public function fetchproduct_full_purchase_name()
    {
        $form_data = json_decode(file_get_contents("php://input"));
        $cateid = $form_data->cateid;
        $subcateid = $form_data->subcateid;
        $type = $form_data->type;
        $array = array();

        if($type == '1'){
            $result = $this->db->query("SELECT * FROM product_list WHERE categories_id = $cateid AND deleteid = 0 ORDER BY id ASC")->result();
        }

        if($type == '2'){
            $result = $this->db->query("SELECT * FROM product_list WHERE sub_categories_id = $subcateid AND deleteid = 0 ORDER BY id ASC")->result();
        }

        //to get products list
        foreach ($result as $value) {

            if ($value->purchase_name != '') {
                $value->product_name = $value->purchase_name;
            }
            $array[] = trim($value->id . '-' . $value->product_name);
        }
        echo json_encode($array);
    }


    public function stock_insert()
    {
        $form_data = json_decode(file_get_contents("php://input"));
        $sess_array = $this->session->userdata['logged_in'];
        $userid = $sess_array['userid'];

        // echo $form_data->action;exit;

        if ($form_data->action == 'debit') {
            //if entry is debit
            $sql = "INSERT INTO stock_journal (user_id,category_id,product_id,uom,quantity,rate,coil_no,debit,date,journal_no,narration,type,sub_category_id) 
                                        VALUES ($userid, '$form_data->catId', '$form_data->prodId','Ton', '$form_data->qty','$form_data->rate','$form_data->coil_no','$form_data->value','$form_data->date','$form_data->journal_no','$form_data->narration','$form_data->type','$form_data->subcatId')";
            $this->db->query($sql);
            //also updating stock
            // $this->db->query("UPDATE product_list SET stock = stock - $form_data->qty WHERE id = $form_data->prodId");
        } else {
              //if entry is credit
            $sql = "INSERT INTO stock_journal (user_id,category_id,product_id,uom,quantity,rate,coil_no,credit,date,journal_no,narration,type,sub_category_id) 
                                        VALUES ($userid, '$form_data->catId', '$form_data->prodId','Ton', '$form_data->qty','$form_data->rate','$form_data->coil_no','$form_data->value','$form_data->date','$form_data->journal_no','$form_data->narration','$form_data->type','$form_data->subcatId')";
            $this->db->query($sql);
            //also updating stock
            // $this->db->query("UPDATE product_list SET stock = stock + $form_data->qty WHERE id = $form_data->prodId");
        }
    }


    public function getLatestStockNo()
    {
        $num = $this->db->query("SELECT journal_no FROM stock_journal ORDER BY journal_no DESC LIMIT 1")->row();
        //return last journal No. or 1
        if (count($num) == 1) {
            echo $num->journal_no + 1;
        } else {
            echo 1;
        }
    }

    public function history()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $product_id = $_GET['product_id'];

            if ($product_id > 0 ){
                $data['product_id'] = $product_id;
            }
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title'] = 'Journals History';
            $data['title']    = 'Stock Journal History';
            $data['uom'] = $this->Main_model->where_names_order_by('uom', 'deleteid', '0', 'id', 'ASC');
            $data['Categories'] = $this->Main_model->where_names_order_by('categories', 'deleteid', '0', 'categories', 'ASC');
            $data['Sub_Categories'] = $this->Main_model->where_names_order_by('sub_categories', 'deleteid', '0', 'sub_categories', 'ASC');

            $data['top_nav'] = $this->load->view('./commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('./commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('./commen/footer_copy_rights.php', $data, TRUE);
            $this->load->view('./stock_journal/edit', $data);
        } else {
            redirect('index.php/adminmain');
        }
    }

    public function fetch_data()
    {

        $form_data = json_decode(file_get_contents("php://input"));
            
            $product_id = $form_data->product_id;
            $journal_no = '';
            $array_left = array();
           $array_rgt = array();
           
            $result = $this->db->query("SELECT journal_no FROM stock_journal WHERE product_id = $product_id AND deleteid = 0 ORDER BY id DESC LIMIT 1")->result();
            foreach ($result as  $value) {
                $journal_no = $value->journal_no;
            }

            // echo "SELECT journal_no FROM stock_journal WHERE product_id = $product_id AND deleteid = 0 ORDER BY date DESC LIMIT 1";exit;

            // $journal_no = $result[0]->journal_no;

            // echo $journal_no;
            $array_data['journal_no'] = $journal_no;


            if($journal_no != 0){

            // echo "come in";exit;
            $result1 = $this->db->query("SELECT * FROM stock_journal WHERE  journal_no = $journal_no AND debit > 0 ORDER BY id DESC LIMIT 1")->result();

            $result2 = $this->db->query("SELECT * FROM stock_journal WHERE  journal_no = $journal_no AND credit > 0 ORDER BY id DESC LIMIT 1")->result();

            foreach ($result1 as  $value1) {

                $prod_name = $this->db->query("SELECT product_name FROM product_list WHERE id = $value1->product_id AND deleteid = 0")
                ->result();
                foreach ($prod_name as  $value_p) {
                    $product_name = $value_p->product_name;
                }

                // $array_left[] = array(
                $array_data['id_l'] = $value1->id;
                $array_data['category_id_l'] = $value1->category_id;  
                $array_data['product_id_l'] = $value1->product_id;  
                $array_data['product_name_l'] = $product_name;  
                $array_data['sub_category_l'] = $value1->sub_category;
                $array_data['type_l'] =$value1->type;
                $array_data['rate_l'] =round($value1->debit/$value1->quantity,2);
                $array_data['uom_l'] = $value1->uom; 
                $array_data['quantity_l'] = $value1->quantity; 
                $array_data['coil_no_l'] = $value1->coil_no; 
                $array_data['debit_l'] = $value1->debit; 
                $array_data['date_l']= $value1->date; 
                $array_data['journal_no_l'] = $value1->journal_no;
                $array_data['narration_l'] = $value1->narration;
                // );
        
            }
        foreach ($result2 as  $value2) {

            $product = $this->db->query("SELECT product_name FROM product_list WHERE id = $value2->product_id AND deleteid = 0")
                ->result();
                foreach ($product as  $value_pd) {
                    $product_name = $value_pd->product_name;
                }
        
        // $array_rgt[] = array(
            $array_data['id_r'] = $value2->id;
            $array_data['category_id_r'] = $value2->category_id; 
            $array_data['product_id_r'] = $value2->product_id; 
            $array_data['product_name_r'] = $product_name; 
            $array_data['sub_category_r'] = $value2->sub_category;
            $array_data['type_r'] =$value2->type;
            $array_data['rate_r'] =round($value2->credit/$value2->quantity,2);
            $array_data['uom_r'] = $value2->uom; 
            $array_data['quantity_r'] = $value2->quantity; 
            $array_data['coil_no_r'] = $value2->coil_no; 
            $array_data['credit_r'] = $value2->credit; 
            $array_data['date_r'] = $value2->date; 
            $array_data['journal_no_r'] = $value2->journal_no;
            $array_data['narration_r'] = $value2->narration;
        // );
        
        }
    }
   
    
    echo json_encode($array_data);
        

           
    }

    public function stock_update()
    {
        $form_data = json_decode(file_get_contents("php://input"));
        $sess_array = $this->session->userdata['logged_in'];
        $userid = $sess_array['userid'];

        if ($form_data->action == 'debit') {
            // if entry is debit
            $sql = "UPDATE stock_journal 
                    SET category_id = '$form_data->catId',
                        product_id = '$form_data->prodId',
                        type = '$form_data->type',
                        sub_category_id = '$form_data->subcatId',
                        uom = 'Ton',
                        quantity = '$form_data->qty',
                        coil_no = '$form_data->coil_no',
                        debit = '$form_data->value',
                        date = '$form_data->date',
                        narration = '$form_data->narration'
                    WHERE journal_no = '$form_data->journal_no' AND id = '$form_data->id' ";
        } else {
            // if entry is credit
            $sql = "UPDATE stock_journal 
                    SET category_id = '$form_data->catId',
                        product_id = '$form_data->prodId',
                        type = '$form_data->type',
                        sub_category_id = '$form_data->subcatId',
                        uom = 'Ton',
                        quantity = '$form_data->qty',
                        coil_no = '$form_data->coil_no',
                        credit = '$form_data->value',
                        date = '$form_data->date',
                        narration = '$form_data->narration'
                    WHERE journal_no = '$form_data->journal_no' AND id = '$form_data->id'";
        }
        
        $this->db->query($sql);
        
        
        
    }

}

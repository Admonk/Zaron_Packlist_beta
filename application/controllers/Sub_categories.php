<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_categories extends CI_Controller
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

            $data['Categories'] = $this->Main_model->where_names_order_by('categories', 'deleteid', '0', 'categories', 'ASC');
            $dataproducts = $this->Main_model->where_names_order_by('product_list', 'deleteid', '0', 'product_name', 'ASC');
            $productArray = []; // Initialize an array to store products

            foreach ($dataproducts as $value) {
                if ($value->type != '-1' && $value->product_name != '') {
                    $product = new stdClass(); // Creating a new stdClass object to store product details
                    $product->productid = $value->id;
                    $product->productname = $value->product_name;
                    // Add the product object to the productArray
                    $productArray[] = $product;
                }
            }
            $data['products'] = $productArray;
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title']    = 'Categories';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('sub_categories/index.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }

    public function insertandupdate()
    {
        $form_data = json_decode(file_get_contents("php://input"));
        // Convert array to comma-separated string
        $productsString = implode(',', $form_data->products);

        if ($form_data->action == 'Add') {
            if ($form_data->sub_categories != '') {
                // Check if any of the selected products are already associated with the specified subcategory by calling get_ExistingProduct()
                $check_existingProducts = $this->Main_model->get_ExistingProduct('add','',$form_data->sub_categories, $form_data->products);
                if ($check_existingProducts > 0) {
                    $array = array('error' => '1', 'message' => 'One or more products are already mapped with the specified subcategory.');
                    echo json_encode($array);
                    return;
                }

                $result = $this->db->query("SELECT id FROM sub_categories where sub_categories='$name'");
                $check_existingsubcate = count($result->result());
                if ($check_existingsubcate > 0) {
                    $array = array('error' => '1', 'message' => 'This Sub Category Name already generated!');
                    echo json_encode($array);
                    return;
                }
                $tablename = $form_data->tablename;
                $data['sub_categories'] = $form_data->sub_categories;
                $data['categories'] = $form_data->categories;
                $data['product'] = $productsString;

                $res_id = $this->Main_model->insert_commen($data, $tablename);

                $this->db->query(
                    "UPDATE product_list
                    SET sub_categories = ?, sub_categories_id = ?
                    WHERE id IN (" . implode(',', $form_data->products) . ")",
                    array($form_data->sub_categories, $res_id)
                );
            } else {
                $array = array('error' => '1', 'message' => 'Subcategory name cannot be empty.');
                echo json_encode($array);
            }
        }

        if ($form_data->action == "Update") {
            if ($form_data->sub_categories != '') {
                // Check if any of the selected products are already associated with the specified subcategory by calling get_ExistingProduct()
                $check_existingProducts = $this->Main_model->get_ExistingProduct('update',$form_data->id,$form_data->sub_categories, $form_data->products);
                if ($check_existingProducts > 0) {
                    $array = array('error' => '1', 'message' => 'One or more products are already mapped with the specified subcategory.');
                    echo json_encode($array);
                    return;
                }
                $tablename = $form_data->tablename;
                $data['get_id'] = $form_data->id;
                $data['sub_categories'] = $form_data->sub_categories;
                $data['categories'] = $form_data->categories;
                $data['product'] = $productsString;
                $this->Main_model->update_commen($data, $tablename);

                $this->db->query(
                    "UPDATE product_list
                    SET sub_categories = ?, sub_categories_id = ?
                    WHERE id IN (" . implode(',', $form_data->products) . ")",
                    array($form_data->sub_categories, $form_data->id)
                );
            } else {
                $array = array('error' => '1');
                echo json_encode($array);
            }
        }

        if ($form_data->action == 'Delete') {
           $tablename = $form_data->tablename;
            $data['get_id'] = $form_data->id;
            $data['deleteid'] = 1;
            $this->Main_model->update_commen($data, $tablename);
        }
        
        $array = array('error' => '2', 'message' => 'Success.');
        echo json_encode($array);
    }

    public function fetch_data()
    {

        $result = $this->Main_model->where_names('sub_categories', 'deleteid', '0');
        $data = array();
        $i = 1;
        foreach ($result as  $value) {

            $result = $this->Main_model->where_names('categories', 'id', $value->categories);
            foreach ($result as  $value1) {
                $categories = $value1->categories;
            }

            $productIds = explode(',', $value->product); // Convert comma-separated string to an array of IDs


            $productNames = []; // Initialize an array to store product names
            $purchaseNames = []; // Initialize an array to store product names

            // Fetch product names based on product IDs
            $result = $this->Main_model->where_in_names('product_list', 'id', $productIds);

            foreach ($result as $value1) {
                $productNames[] = $value1->product_name; // Store each product name in the array
                // $purchaseNames[] = $value1->purchase_name; // Store each product name in the array
                if (!empty($value1->purchase_name)) {
                    $purchaseNames[] = $value1->purchase_name; // Store each purchase name in the array
                } else {
                    $purchaseNames[] = $value1->product_name; // Use source_name if purchase_name is not available
                }
            }


            $productsNameString = implode('  , ', $productNames);
            $purchaseNameString = implode('  , ', $purchaseNames);

            // Use $productsNameString containing all the product names separated by commas

            $data[] = array(
                'no' => $i,
                'id' => $value->id,
                'name' => $value->sub_categories,
                'purchasename' => $purchaseNameString,
                'categories' => $categories,
                'products' => $productsNameString,
            );

            $i++;
        }

        $dataproducts = $this->Main_model->where_names_order_by('product_list', 'deleteid', '0', 'product_name', 'ASC');
        $productArray = []; // Initialize an array to store products

        foreach ($dataproducts as $value) {
            if ($value->type != '-1' && $value->product_name != '') {
                $product = new stdClass(); // Creating a new stdClass object to store product details
                $product->productid = $value->id;
                $product->productname = $value->product_name;
                // Add the product object to the productArray
                $productArray[] = $product;
            }
        }

        $productlist = $productArray;
        $response = array(
            'status' => 'success',
            'productlist'   => $productlist,
            'data'   => $data,

        );
        echo json_encode($response);
    }

    public function fetch_single_data()
    {

        $form_data = json_decode(file_get_contents("php://input"));
        $tablename = $form_data->tablename;
        $id = $form_data->id;
        $result = $this->Main_model->where_names($tablename, 'id', $id);
        foreach ($result as  $value) {
            $output['sub_categories'] = $value->sub_categories;
            $output['categories'] = $value->categories;
            $productsArray = explode(',', $value->product);
            $output['products'] = explode(',', $value->product);
        }
        // Assign the products array to the output
        $output['productss'] = $productsArray;
        echo json_encode($output);
    }
}

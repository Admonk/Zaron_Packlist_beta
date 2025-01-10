<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profit_Loss extends CI_Controller
{

    function __construct()
    {
        error_reporting(0);
        parent::__construct();
        $this->load->model('Admin/Auth');
        $this->load->model('Main_model');
        $this->load->database();
        if (isset($this->session->userdata['logged_in'])) {
            $Totaltranspotval = $closeing;
            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $from_date = $sess_array['from_date'];
            $to_date = $sess_array['to_date'];
            $this->from_date = $from_date;
            $this->to_date = $to_date;
            $this->userid = $userid;
            $this->user_mail = $email;
        }
    }



    public function profitAndLossView()
        {
            if (isset($this->session->userdata['logged_in']) && ( $this->session->userdata['logged_in']['userid']=='1' || $this->session->userdata['logged_in']['userid']=='1777' || $this->session->userdata['logged_in']['userid']=='1798')) {
                // $sql = $this->db->query("SELECT    ")->result();
                // foreach ($sql as $key => &$value) {
                //   if($value->name == null){
                //     $value->name = ' No Name';
                //     $value->id = 'NULL';
                //   }
                // }
                $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
                $data['customers'] =  $sql;
                $data['categories'] = [
                                [
                                    'title' => 'Aluminium Sheet',
                                    'shortword' => 'aluminium_sheet'
                                ],
                                [
                                    'title' => 'Bed Bolt',
                                    'shortword' => 'bed_bolt'
                                ],
                                [
                                    'title' => 'Decking Sheet',
                                    'shortword' => 'decking_sheet'
                                ],
                                [
                                    'title' => 'GI Sheet',
                                    'shortword' => 'gi_sheet'
                                ],
                                [
                                    'title' => 'Glass Wool',
                                    'shortword' => 'glass_wool'
                                ],
                                [
                                    'title' => 'Iron and Corrugated Sheet, Linersheet, Roll Sheet, Tilesheet',
                                    'shortword' => 'iron_sheet'
                                ],
                                [
                                    'title' => 'Laser Cutting',
                                    'shortword' => 'laser_cutting'
                                ],
                                [
                                    'title' => 'Mangalore Tile',
                                    'shortword' => 'mangalore_tile'
                                ],
                                [
                                    'title' => 'Multiwood',
                                    'shortword' => 'multiwood'
                                ],
                                [
                                    'title' => 'Multiwall',
                                    'shortword' => 'multiwall'
                                ],
                                [
                                    'title' => 'PVC Gold',
                                    'shortword' => 'pvc_gold'
                                ],
                                [
                                    'title' => 'PVC Normal',
                                    'shortword' => 'pvc_normal'
                                ],
                                [
                                    'title' => 'Puff Panel Normal and JSW Make',
                                    'shortword' => 'puff_panel'
                                ],
                                [
                                    'title' => 'Purlin',
                                    'shortword' => 'purlin'
                                ],
                                [
                                    'title' => 'Purlin Accessories',
                                    'shortword' => 'purlin_accessories'
                                ],
                                [
                                    'title' => 'Polycarbonate',
                                    'shortword' => 'polycarbonate'
                                ],
                                [
                                    'title' => 'Polynum',
                                    'shortword' => 'polynum'
                                ],
                                [
                                    'title' => 'Screw',
                                    'shortword' => 'screw'
                                ],
                                [
                                    'title' => 'Screw Accessories',
                                    'shortword' => 'screw_accessories'
                                ],
                                [
                                    'title' => 'Spout',
                                    'shortword' => 'spout'
                                ],
                                [
                                    'title' => 'Spanish Ridge',
                                    'shortword' => 'spanish_ridge'
                                ],
                                [
                                    'title' => 'Thoomanam',
                                    'shortword' => 'thoomanam'
                                ],
                                [
                                    'title' => 'UPVC Accessories',
                                    'shortword' => 'upvc_accessories'
                                ],
                                [
                                    'title' => 'UPVC Item',
                                    'shortword' => 'upvc'
                                ],
                                [
                                    'title' => 'Wall Panel (Normal and JSW Make)',
                                    'shortword' => 'wall_panel'
                                ],
                                [
                                    'title' => 'Wall Sheet',
                                    'shortword' => 'wall_sheet'
                                ],
                                [
                                    'title' => 'Wrinkle Tile',
                                    'shortword' => 'wrinkle_tile'
                                ]
                            ];



                $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
                $data['active_base'] = 'customer_1';
                $data['title']    = 'Profit And Loss Rate View';
                $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                $this->load->view('profit_and_loss/profit_and_loss_view', $data);
            } else {
                $this->load->view('admin/index');
            }
        }


}
      
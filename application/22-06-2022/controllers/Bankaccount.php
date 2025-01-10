<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankaccount extends CI_Controller {

    function __construct() {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');
               $this->load->model('Main_model');

             if(isset($this->session->userdata['logged_in']))
             {


	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;

			   
			}
          
    }
   

    public function index()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Details';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/index.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    public function statement()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                                $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               
                                             $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/bankaccountstatement',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              

                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->bank_name!='' || $form_data->account_no!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['type']=$form_data->type;
                     $data['bank_name']=$form_data->bank_name;
                     $data['account_no']=$form_data->account_no;
                     $data['ifsc_code']=$form_data->ifsc_code;
                     $data['current_amount']=$form_data->current_amount;
                      $data['opening_date']=$form_data->op_date;
                     $data['payment_status']=$form_data->payment_status;
                    
                 	 
                     
                      $insertid=$this->Main_model->insert_commen($data,$tablename);
                     
                                                        $account_no="";
                                                       $bank_name="";
                                                       $bid="";
                                                       if($form_data->current_amount!='0' || $form_data->current_amount!='')
                                                       {
                                                          
                                                                 $resbankaccount = $this->Main_model->where_names('bankaccount','id',$insertid);
                                                     
                                                                 foreach($resbankaccount as $valb)
                                                                 {
                                                                     $bid=$valb->id;
                                                                     $bank_name=$valb->bank_name;
                                                                     $account_no=$valb->account_no;
                                                                     $account_heads_id_by_bank=$valb->account_heads_id;
                                                                 }
                                                                 
                                                                 
                                                                 $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bid,'deleteid','0','id','ASC');
                                                                 $balancetotal=0;
                                                                 $debitsamount=0;
                                                                 $creditsamount=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                     $payid=$val->id;
                                                                     $debitsamount+=$val->debit;
                                                                     $creditsamount+=$val->credit;
                                                                     $balancetotal=$val->balance;
                                                                 }
                                                                $balancetotal=$creditsamount-$debitsamount;
                                                           
                                                                                  
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']='OP-'.$bid;
                                                                
                                                                
                                                                if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']=$form_data->current_amount; 
                                                                    
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']=$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal+$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    
                                                                    
                                                                    
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=$form_data->current_amount; 
                                                                    
                                                                    
                                                                     if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']='-'.$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal-$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                    
                                                                }
                                                        
                                                                
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=$form_data->op_date;
                                                                $data_bank['status_by']='Opening Balance';
                                                                $data_bank['account_head_id']= $account_heads_id_by_bank; 
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                   
                                                                   
                                                             
                                                                
                                                                
                                                                  
                                                      }
                     
                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                   	 if($form_data->bank_name!='' || $form_data->account_no!='')
                     {
                         
                         $tablename=$form_data->tablename;
                         $data['type']=$form_data->type;
                         $data['bank_name']=$form_data->bank_name;
                         $data['account_no']=$form_data->account_no;
                         $data['ifsc_code']=$form_data->ifsc_code;
                         $data['current_amount']=$form_data->current_amount;
                          $data['opening_date']=$form_data->op_date;
                         $data['payment_status']=$form_data->payment_status;
                         $data['get_id']=$form_data->id;
                         $this->Main_model->update_commen($data,$tablename);
                         
                         
                         
                                                       $account_no="";
                                                       $bank_name="";
                                                       $bid="";
                                                       if($form_data->current_amount!='0' || $form_data->current_amount!='')
                                                       {
                                                          
                                                                 $resbankaccount = $this->Main_model->where_names('bankaccount','id',$form_data->id);
                                                     
                                                                 foreach($resbankaccount as $valb)
                                                                 {
                                                                     $bid=$valb->id;
                                                                     $bank_name=$valb->bank_name;
                                                                     $account_no=$valb->account_no;
                                                                      $account_heads_id_by_bank=$valb->account_heads_id;
                                                                 }
                                                                 
                                                                 $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bid,'deleteid','0','id','ASC');  
                                                                
                                                                 $balancetotal=0;
                                                                 $debitsamount=0;
                                                                 $creditsamount=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                     $payid=$val->id;
                                                                     $debitsamount+=$val->debit;
                                                                     $creditsamount+=$val->credit;
                                                                     $balancetotal=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 $balancetotal=$creditsamount-$debitsamount;
                                                                        
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']='OP-'.$bid;
                                                                
                                                                
                                                                if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']=$form_data->current_amount; 
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']=$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal+$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=$form_data->current_amount; 
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']='-'.$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal-$form_data->current_amount;
                                                                      }
                                                                      
                                                                      
                                                                }
                                                        
                                                                
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=$form_data->op_date;
                                                                $data_bank['status_by']='Opening Balance';
                                                                $data_bank['account_head_id']= $account_heads_id_by_bank; 
                                                                
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                
                                                                  
                                                      }
                         
                         
                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                
                


	}
	public function fetch_data()
	{


                 	 $result= $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      $res = $this->Main_model->where_names('bankaccount_manage','bank_account_id',$value->id);
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          if($val->deleteid==0)
                                                                          {
                                                                              
                                                                          
                                                                          $debitsamount+=$val->debit;
                                                                          $creditsamount+=$val->credit;
                                                                          
                                                                          }
                                                                          
                                                                          
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                 	     
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		    'bank_name' => $value->bank_name, 
                 	 			'type' => $value->type,
                 	 			'account_no' => $value->account_no,
                 	 			'ifsc_code' => $value->ifsc_code,
                 	 			'current_amount' => $balancetotal,
                 	 			'payment_status' => $value->payment_status,
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
	
		public function fetch_data_details()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $todate=$_GET['fromto'];
                     $data=array();
                     
                     
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date("Y-m-d");
                         $todate=date("Y-m-d");
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.create_date ASC");
                 	
                     }
                     else
                     {
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND bank_account_id='".$account_id."'  AND a.deleteid=0  ORDER BY a.create_date ASC");
                 	
                     }
                     
                     
                        $resultcount=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE   bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.create_date ASC");
                    	$resultset=$resultcount->result();
                    	$total=0;
                    	$totald=0;
                    	$totalc=0;
                    	foreach($resultset as $set)
                    	{
                    	   $total+=$set->credit-$set->debit;
                    	   
                    	   
                    	   $totald+=$set->debit;
                    	   $totalc+=$set->credit;
                    	}
                     
                     
                     
                 	  $result=$result->result();
                 
                 	 $i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	        if($value->debit=='')
                 	        {
                 	            $value->debit=0;
                 	        }
                 	        
                 	        if($value->credit=='')
                 	        {
                 	            $value->credit=0;
                 	        }
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => $value->debit,
                 	 		'credit' => $value->credit,
                 	 		'balance' => $value->balance,
                 	 		'status_by' => $value->status_by,
                 	 		'totalbalance' => round($total,2),
                 	 		'totalbalancec' => round($totalc,2),
                 	 		'totalbalanced' => round($totald,2),
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetch_data_details_by_opeing_balance()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $todate=$_GET['fromto'];
                     $data=array();
                     
                     
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date("Y-m-d");
                         $todate=date("Y-m-d");
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date < '".$formdate."'  AND bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date < '".$formdate."'  AND bank_account_id='".$account_id."'  AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     
                     
                     
                 	  $result=$result->result();
                 
                 	 $i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	        if($value->debit=='')
                 	        {
                 	            $value->debit=0;
                 	        }
                 	        
                 	        if($value->credit=='')
                 	        {
                 	            $value->credit=0;
                 	        }
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => $value->debit,
                 	 		'credit' => $value->credit,
                 	 		'balance' => $value->balance,
                 	 		'status_by' => $value->status_by,
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
    
    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $output=array();
                     
    	             $result= $this->Main_model->where_names('bankaccount','id',$id);
                 	 foreach ($result as  $value) {
                 	 	$output['bank_name'] = $value->bank_name;
                 	 	$output['type'] = $value->type;
                 	 	$output['account_no'] = $value->account_no;
                 	 	$output['ifsc_code'] = $value->ifsc_code;
                 	 	
                 	 	
                 	 	                                              $res = $this->Main_model->where_names('bankaccount_manage','bank_account_id',$id);
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          if($val->deleteid==0)
                                                                          {
                                                                              
                                                                          
                                                                          $debitsamount+=$val->debit;
                                                                          $creditsamount+=$val->credit;
                                                                          
                                                                          }
                                                                          
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                 	 	
                 	 	
                 	 	$output['current_amount'] = $balancetotal;
                 	 	$output['op_date'] = $value->opening_date;
                 	 	$output['payment_status'] = $value->payment_status;
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
     
    public function fetch_single_data_by()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {
                 	 	$output['id'] = $value->id;
                 	 	$output['name'] = $value->name;
                 	 	$output['debit'] = $value->debit;
                 	 	$output['credit'] = $value->credit;
                 	 	$output['create_date'] = $value->create_date;
                 	 	
                 	 	
                 	 	                                              $res = $this->Main_model->where_names('bankaccount','id',$value->bank_account_id);
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          $output['bank_name']=$val->bank_name;
                                                                          
                                                                          
                                                                      }
                                                                      
                 	 	
                 	 	
                 	    $output['status_by'] = $value->status_by;
                 	    $output['ex_code'] = $value->ex_code;
                 	 	$output['bank_account_id'] = $value->bank_account_id;
                 	 	$output['account_head_id'] = $value->account_head_id;
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
	
	

	
      	public function export_bank_statement()
	{



                    
                    
                     $account_id=$_GET['account_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                     
                     
                    
                      if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date("Y-m-d", strtotime('monday this week'));
                         $todate=date("Y-m-d", strtotime('sunday this week'));
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.id ASC");
                 	
                     }
                     else
                     {
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND bank_account_id='".$account_id."'  AND a.deleteid=0  ORDER BY a.id ASC");
                 	
                     }
                 	
                 	$result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='Bank_Statement_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                                                 $resultsub=$this->db->query("SELECT * FROM bankaccount  WHERE id='".$account_id."' AND deleteid=0  ORDER BY id ASC");
                 	                             $resultsub=$resultsub->result();
                                                 $bankname='';
                                                 foreach($resultsub as $val)
                                                 { 
                                                     $bankname=$val->bank_name;   
                                                 }   
                                 	     
                                 
                         
                         
                         
                         
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="6">Bank Statement <?php echo $formdate; ?> To <?php echo $todate; ?> <?php echo $bankname; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>Date</th>
                          <th>Particulars</th>
                          <th>Chq/Ref.No</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                         
                          
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                     $totdebit=0;
                                     $credittot=0;
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	           $totdebit+=$value->debit;
                                 	            $credittot+=$value->credit;
                            
                                 	    ?>
                                 	      <tr >
                                           <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php 
                                          
                                          if($value->name!="")
                                          {
                                              echo $value->name; 
                                          }
                                          
                                          
                                            if($value->status_by!="")
                                          {
                                              echo $value->status_by; 
                                          }
                                          
                                          
                                          ?> </td>
                                          
                                          <td><?php
                                            if($value->status_by=="Opening Balance")
                                          {
                                              echo "O00001"; 
                                          }
                                          else
                                          {
                                               echo $value->ex_code;
                                          }
                                         
                                          
                                          
                                          ?></td>
                                          <td><?php echo $value->debit; ?></td>
                                          <td><?php echo $value->credit; ?></td>
                                          <td><?php echo $value->balance; ?></td>
                                         
                                          
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $totdebit; ?></td>
                                <td><?php echo $credittot; ?></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                      
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	

}	

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('user_logged'))
		{
			$this->load->view('suppliers');
		}
		else
		{
			redirect(base_url());
		}
	}

	function details()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			/*if($data_action == "Delete")
			{
				$this->common->deleteRow('id',$this->input->post('details_id'),'site');
				//$this->common->deleteRow('categoryId',$this->input->post('details_id'),'item_details');
				$array = array(
					'success'	=>	true
				);
				echo json_encode($array);
			}*/

			if($data_action == "Edit")
			{
				$row = $this->supplier->getSingleSupplierDetails($this->input->post('id'));
				
				if($this->input->post('supplier_name') != $row->supplier_name) {
				   $is_unique =  '|is_unique[supplier.supplier_name]';
				} else {
				   $is_unique =  '';
				}

				$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required'.$is_unique);
				if($this->form_validation->run())
				{	
					
					
					$data = array(
						'supplier_name'	=>	$this->input->post('supplier_name'),
						'supplier_email'	=>	$this->input->post('supplier_email'),
						'supplier_contact'	=>	$this->input->post('supplier_contact'),
						'trade_lic_name'	=>	$this->input->post('trade_lic_name1'),
						'trade_lic_exp_date'	=>	($this->input->post("trade_lic_exp_date1"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date1"))):NULL, 
						'insurance_exp_date'	=>	($this->input->post("insurance_exp_date1"))?date('Y-m-d',strtotime($this->input->post("insurance_exp_date1"))):NULL, 
						'status'	=>	$this->input->post('status'),
					); 

					$this->common->updateAll('id',$this->input->post('id'),$data,'supplier');

					$this->supplier->deleteSupplier($this->input->post('id'));

					$no = $this->input->post('tid');

					for ($i=1; $i <=$no ; $i++)
					{
						$data2 = array(
						'supplier_id'	=>	$this->input->post('id'),
						'trade_lic_name'	=>	$this->input->post('trade_lic_name'.$i),
						'trade_lic_exp_date'	=>	($this->input->post("trade_lic_exp_date".$i))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date".$i))):NULL, 
						'insurance_exp_date'	=>	($this->input->post("insurance_exp_date".$i))?date('Y-m-d',strtotime($this->input->post("insurance_exp_date".$i))):NULL, 
					);
					
					$id = $this->common->addAll('supplier2',$data2);
					}

					$array = array(
						'success'		=>	true,
					);
					
				}
				else
				{
					$array = array(
						'error'					=>	true,
						'name_error'	=>	form_error('supplier_name'),
					);
				}
				echo json_encode($array);
			}

			if($data_action == "fetch_single")
			{
				$count = "";
				if($this->input->post('details_id'))
				{
					if ($this->common->isExists('supplier_id',$this->input->post('details_id'),'supplier2'))
                 	{
                	$data = array();
			         $count = $this->supplier->getSupplierCount('supplier_id',$this->input->post('details_id'),'supplier2');
			         /*if($count==1)
			         {
                       $row['suppliers'] = $this->supplier->getSupplierAllDetails($this->input->post('details_id'));
                      // $row->count = $count;
                       echo json_encode($row);
			         }
			         else
			         {*/
			         	$return_arr = array();
			         	$result = $this->supplier->getSupplierAllDetails($this->input->post('details_id'));
			         	foreach ($result as  $value) {
    $supplier_name = $value->supplier_name;
    $supplier_id = $value->supplier_id;
    $supplier_email = $value->supplier_email;
    $supplier_contact = $value->supplier_contact; 
    $trade_lic_name = $value->trade_lic_name;
    $trade_lic_exp_date = ($value->trade_lic_exp_date)?date('d-M-Y',strtotime($value->trade_lic_exp_date)):NULL;
    $insurance_exp_date = ($value->insurance_exp_date)?date('d-M-Y',strtotime($value->insurance_exp_date)):NULL;



    
    $status = $value->status;
    $count = $count;
   
   

    $return_arr[] = array("supplier_id" => $supplier_id,"supplier_name"=> $supplier_name,"supplier_email"=> $supplier_email,"supplier_contact"=>$supplier_contact, "trade_lic_name" => $trade_lic_name,"trade_lic_exp_date"=>$trade_lic_exp_date,"insurance_exp_date"=>$insurance_exp_date,"status"=>$status ,"count"=>$count);
}
echo json_encode($return_arr);

			         	
			        // }

			        }
                	else
                	{
                		$return_arr = array();
                		$result = $this->supplier->getSingleSupplier($this->input->post('details_id'));
           			foreach ($result as  $value) {
    $supplier_name = $value->supplier_name;
    $supplier_id = $value->id;
    $supplier_email = $value->supplier_email;
    $supplier_contact = $value->supplier_contact;
    $trade_lic_name = $value->trade_lic_name;
    $trade_lic_exp_date = ($value->trade_lic_exp_date)?date('d-M-Y',strtotime($value->trade_lic_exp_date)):NULL;
    $insurance_exp_date = ($value->insurance_exp_date)?date('d-M-Y',strtotime($value->insurance_exp_date)):NULL;
    $status = $value->status;
    $count = 1 ;
   
    $return_arr[] = array("supplier_id" => $supplier_id,"supplier_name"=> $supplier_name,"supplier_email"=> $supplier_email,"supplier_contact"=>$supplier_contact, "trade_lic_name" => $trade_lic_name,"trade_lic_exp_date"=>$trade_lic_exp_date,"insurance_exp_date"=>$insurance_exp_date,"status"=>$status ,"count"=>$count);
   

}
     
echo json_encode($return_arr);
                	}
					
				}
				
			}

			if($data_action == "Insert")
			{
				$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|is_unique[supplier.supplier_name]');
				if($this->form_validation->run())
				{	
					$id="";
					$no = $this->input->post('tid');
					
						$data = array(
						'supplier_name'	=>	$this->input->post('supplier_name'),
						'supplier_email'	=>	$this->input->post('supplier_email'),
						'supplier_contact'	=>	$this->input->post('supplier_contact'),
						'trade_lic_name'	=>	$this->input->post('trade_lic_name1'),
						'trade_lic_exp_date'	=>	($this->input->post("trade_lic_exp_date1"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date1"))):NULL, 
						'insurance_exp_date'	=>	($this->input->post("insurance_exp_date1"))?date('Y-m-d',strtotime($this->input->post("insurance_exp_date1"))):NULL, 
						'status'	=>	$this->input->post('status'),
						'created_by'=>	$this->session->userdata('userid'),
					);
					
					$lastid = $this->common->addAll('supplier',$data);	
					for ($i=1; $i <=$no ; $i++)
					{
						$data2 = array(
						'supplier_id'	=>	$lastid,
						'trade_lic_name'	=>	$this->input->post('trade_lic_name'.$i),
						'trade_lic_exp_date'	=>	($this->input->post("trade_lic_exp_date".$i))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date".$i))):NULL, 
						'insurance_exp_date'	=>	($this->input->post("insurance_exp_date".$i))?date('Y-m-d',strtotime($this->input->post("insurance_exp_date".$i))):NULL, 
					);
					
					$id = $this->common->addAll('supplier2',$data2);
					}
					

					$array = array(
						'success'		=>	true,
						'id'	=>	$id,
					);
				}
				else
				{
					$array = array(
						'error'					=>	true,
						'name_error'	=>	form_error('supplier_name'),
					);
				}
				echo json_encode($array);


			}

			if($data_action == "fetch_all")
			{
				$result = $this->supplier->getAllSuppliers();

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '<tr><td style="font-size:13px">'
						.$row->supplier_name.'</td><td style="font-size:14px">'.$row->supplier_email.'</td><td style="font-size:14px">'.
							$row->supplier_contact.'</td><td style="font-size:14px">';
							if($this->common->isExists('supplier_id',$row->id,'supplier2'))
         {
         	$result2 = $this->supplier->getAllSuppliers2($row->id);
         	foreach($result2 as $row2)
					{
						$output .= $row2->trade_lic_name .'<br/>';
					}
         }
         else
         {
         	$output .= $row->trade_lic_name ;
         }
         
         '</td>';
						if($row->status==1)
						{
							$output .= '<td><a class="btn btn-success btn-sm">Enabled</a></td>';
						}
						else
						{
							$output .= '<td><a class="btn btn-warning btn-sm">Disabled</a></td>';
						}
						$output .= '
							<td>
							<a href="'.base_url().'employee-list/'.$row->id.'" class="btn btn-success btn-sm trn">Employees</a>
							<button type="button" name="edit" class="btn btn-warning btn-sm edit" id="'.$row->id.'"><i class="fa fa-pencil"></i></button>&nbsp;
							
							</td>
						</tr>

						';
						// <button type="button" name="delete" class="btn btn-danger btn-sm delete" id="'.$row->id.'"><i class="fa fa-trash"></i></button>
					}
				}
				echo $output;
			}
		}
	}

	function getSingleSupplierDetails()
	{
		$supplier_id = $this->input->post('id');
		$supplier = $this->supplier->getSingleSupplierDetails($supplier_id);
		$data = array();
		$data['trade_lic_name'] = $supplier->trade_lic_name;
		$data['trade_lic_exp_date'] = ($supplier->trade_lic_exp_date)?date('d-M-Y',strtotime($supplier->trade_lic_exp_date)):'';
		$data['insurance_exp_date'] = ($supplier->insurance_exp_date)?date('d-M-Y',strtotime($supplier->insurance_exp_date)):'';

		echo json_encode($data);
	}
	function getSingleSupplierDetails2()
	{
		$supplier_id = $this->input->post('id');
		$supplierModel = new Supplier_model();
		if ($this->common->isExists('supplier_id',$supplier_id,'supplier2'))
         {
               $supplierdata = $this->db->where("supplier_id",$supplier_id)->get("supplier2")->result();
         }
         else
         {
			$supplierdata = $this->db->where("id",$supplier_id)->get("supplier")->result();
         }
		
        echo json_encode($supplierdata);
		/*$output = $this->supplier->getSupplierDetails($supplier_id);

		$result = $this->db->where("supplier_id",$supplier_id)->get("supplier2")->result();
       echo json_encode($result);*/
		/*$data = array();
		foreach ($output as  $value) {
			$data[] = $value["trade_lic_name"];echo json_encode($output);
		}*/
		
	}
	public function getSupplierMultipleLic_name()
	{
		$supplier_id = $this->input->post('id');
		$lic_name = $this->input->post('lic_name');
		if ($this->common->isExists('supplier_id',$supplier_id,'supplier2'))
        {
             $supplier = $this->supplier->getSingleSupplierLicNameDetails($supplier_id,$lic_name,'supplier_id','supplier2');  	
        }
        else
        {
        	$supplier = $this->supplier->getSingleSupplierLicNameDetails($supplier_id,$lic_name,'id','supplier');
        }
		
		$data = array();
		$data['trade_lic_name'] = $supplier->trade_lic_name;
		$data['trade_lic_exp_date'] = ($supplier->trade_lic_exp_date)?date('d-M-Y',strtotime($supplier->trade_lic_exp_date)):'';
		$data['insurance_exp_date'] = ($supplier->insurance_exp_date)?date('d-M-Y',strtotime($supplier->insurance_exp_date)):'';

		echo json_encode($data);

	}
	public function demo()
	{
		$return_arr = array();
			         	$result = $this->supplier->getSingleSupplier(102);
			         	foreach ($result as  $value) {
    $supplier_name = $value->supplier_name;
    $supplier_id = $value->id;
    $supplier_email = $value->supplier_email;
    $supplier_contact = $value->supplier_contact;
    $trade_lic_name = $value->trade_lic_name;
    $trade_lic_exp_date = $value->trade_lic_exp_date;
    $insurance_exp_date = $value->insurance_exp_date;
    $status = $value->status;

   
   

    $return_arr[] = array("supplier_id" => $supplier_id,"supplier_name"=> $supplier_name,"supplier_email"=> $supplier_email,"supplier_contact"=>$supplier_contact, "trade_lic_name" => $trade_lic_name,"trade_lic_exp_date"=>$trade_lic_exp_date,"insurance_exp_date"=>$insurance_exp_date,"status"=>$status );
}
echo json_encode($return_arr);
	}
		
	


}

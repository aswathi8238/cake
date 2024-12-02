<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['employees'] = $this->employee->getAllEmployees();
			$this->load->view('employee_list', $data);
		}
		else
		{
			redirect(base_url());
		}
	}

	public function add_own()
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['suppliers'] = $this->supplier->getSuppliersDropdown();
			$this->form_validation->set_rules("emp_code", "", "trim|required|is_unique[employee.emp_code]");
			$this->form_validation->set_rules("emp_name", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$basic_data = array(
	            		'emp_type' => "1", 
	            		'emp_code' => $this->input->post("emp_code"), 
	            		'emp_name' => $this->input->post("emp_name"),
	            		'created_by'=>	$this->session->userdata('userid'), 
	            		'emp_status' => "New Employee",
	            		'status' => $this->input->post("status"), 
	            	);

      			$emp_id = $this->common->addAll('employee',$basic_data);


      				$details_data = array(
	            		'emp_id' => $emp_id, 
	            		'supplier_id' => ($this->input->post("supplier_id")!="NULL")?$this->input->post("supplier_id"):NULL,
	            		'trade_lic_name' => $this->input->post("trade_lic_name"), 
	            		'trade_lic_exp_date' => ($this->input->post("trade_lic_exp_date"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date"))):NULL, 
	            		'immigrtion_card_exp_date' => ($this->input->post("immigrtion_card_exp_date"))?date('Y-m-d',strtotime($this->input->post("immigrtion_card_exp_date"))):NULL, 
	            		'office_tenancy_exp_date' => ($this->input->post("office_tenancy_exp_date"))?date('Y-m-d',strtotime($this->input->post("office_tenancy_exp_date"))):NULL, 
	            		'passport_no' => $this->input->post("passport_no"), 
	            		'passport_exp_date' => ($this->input->post("passport_exp_date"))?date('Y-m-d',strtotime($this->input->post("passport_exp_date"))):NULL, 
	            		'nationality' => $this->input->post("nationality"), 
	            		'eid' => $this->input->post("eid"), 
	            		'eid_exp_date' => ($this->input->post("eid_exp_date"))?date('Y-m-d',strtotime($this->input->post("eid_exp_date"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL,
	            		'labour_card_no' => $this->input->post("labour_card_no"),
	            		'labour_card_exp_date' => ($this->input->post("labour_card_exp_date"))?date('Y-m-d',strtotime($this->input->post("labour_card_exp_date"))):NULL, 
	            		'uid' => $this->input->post("uid"),
	            		'visa_job_desc' => $this->input->post("visa_job_desc"),
	            		'basic_salary' => $this->input->post("basic_salary"),
	            		'labour_contract_type' => $this->input->post("labour_contract_type"),
	            		'emp_join_date' => ($this->input->post("emp_join_date"))?date('Y-m-d',strtotime($this->input->post("emp_join_date"))):NULL, 
	            		'dob' => ($this->input->post("dob"))?date('Y-m-d',strtotime($this->input->post("dob"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL, 
	            		'group_insurance_add_status' => $this->input->post("group_insurance_add_status"),
	            		'staff_status' => "New Employee",
	            	);
      			
			    $this->common->addAll('employee_details',$details_data);
      			$this->session->set_flashdata('success',"Added new employee successfully...!");
            	redirect(base_url().'employee-list');
      		}
      		else
      		{
      			$this->load->view('employee_add_own', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function edit_own($id)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['suppliers'] = $this->supplier->getSuppliersDropdown();

			$data['employee'] = $this->employee->getSingleEmployee($id);
			$supplier_id = "";

			if(!empty($data['employee']) && $data['employee']->emp_type == 1)
			{
				$data['employee_details'] = $this->employee->getSingleEmployeeDetails($id);
				$supplier_id = $data['employee_details']->supplier_id;
				$data['lic_names'] = $this->supplier->getLICnames($id,$supplier_id);	
				
			}
			else
			{
				redirect(base_url());
			}


			if($this->input->post('emp_code') != $data['employee']->emp_code) {
				   $is_unique =  '|is_unique[employee.emp_code]';
				} else {
				   $is_unique =  '';
				}

			$this->form_validation->set_rules("emp_code", "", "trim|required".$is_unique);
			$this->form_validation->set_rules("emp_name", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$basic_data = array(
	            		'emp_type' => "1", 
	            		'emp_code' => $this->input->post("emp_code"), 
	            		'emp_name' => $this->input->post("emp_name"),
	            		'status' => $this->input->post("status"), 
	            	);

      			$this->common->updateAll('id',$id,$basic_data,'employee');
      			
      				$details_data = array(
	            		'trade_lic_name' => $this->input->post("trade_lic_name"), 
	            		'trade_lic_exp_date' => ($this->input->post("trade_lic_exp_date"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date"))):NULL, 
	            		'immigrtion_card_exp_date' => ($this->input->post("immigrtion_card_exp_date"))?date('Y-m-d',strtotime($this->input->post("immigrtion_card_exp_date"))):NULL, 
	            		'office_tenancy_exp_date' => ($this->input->post("office_tenancy_exp_date"))?date('Y-m-d',strtotime($this->input->post("office_tenancy_exp_date"))):NULL, 
	            		'passport_no' => $this->input->post("passport_no"), 
	            		'passport_exp_date' => ($this->input->post("passport_exp_date"))?date('Y-m-d',strtotime($this->input->post("passport_exp_date"))):NULL, 
	            		'nationality' => $this->input->post("nationality"), 
	            		'eid' => $this->input->post("eid"), 
	            		'eid_exp_date' => ($this->input->post("eid_exp_date"))?date('Y-m-d',strtotime($this->input->post("eid_exp_date"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL,
	            		'supplier_id' => ($this->input->post("supplier_id")!="NULL")?$this->input->post("supplier_id"):NULL,
	            		'labour_card_no' => $this->input->post("labour_card_no"),
	            		'labour_card_exp_date' => ($this->input->post("labour_card_exp_date"))?date('Y-m-d',strtotime($this->input->post("labour_card_exp_date"))):NULL, 
	            		'uid' => $this->input->post("uid"),
	            		'visa_job_desc' => $this->input->post("visa_job_desc"),
	            		'basic_salary' => $this->input->post("basic_salary"),
	            		'labour_contract_type' => $this->input->post("labour_contract_type"),
	            		'emp_join_date' => ($this->input->post("emp_join_date"))?date('Y-m-d',strtotime($this->input->post("emp_join_date"))):NULL, 
	            		'dob' => ($this->input->post("dob"))?date('Y-m-d',strtotime($this->input->post("dob"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL, 
	            		'group_insurance_add_status' => $this->input->post("group_insurance_add_status"),

	            	);
      			
			    $this->common->updateAll('emp_id',$id,$details_data,'employee_details');
      			$this->session->set_flashdata('success',"Employee details updated successfully...!");
            	redirect(base_url().'employee-list');
      		}
      		else
      		{
      			$this->load->view('employee_edit_own', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function add_outsourced()
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['suppliers'] = $this->supplier->getSuppliersDropdown();
			$this->form_validation->set_rules("emp_code", "", "trim|required|is_unique[employee.emp_code]");
			$this->form_validation->set_rules("emp_name", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$basic_data = array(
	            		'emp_type' => "2", 
	            		'emp_code' => $this->input->post("emp_code"), 
	            		'emp_name' => $this->input->post("emp_name"),
	            		'created_by'=>	$this->session->userdata('userid'), 
	            		'emp_status' => "New Employee",
	            		'status' => $this->input->post("status"), 
	            	);

      			$emp_id = $this->common->addAll('employee',$basic_data);

      				$details_data = array(
	            		'emp_id' => $emp_id, 
	            		'supplier_id' => ($this->input->post("supplier_id")!="NULL")?$this->input->post("supplier_id"):NULL,
	            		'trade_lic_name' => $this->input->post("trade_lic_name"), 
	            		'trade_lic_exp_date' => ($this->input->post("trade_lic_exp_date"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date"))):NULL,
	            		'supplier_id' => $this->input->post("supplier_id")?$this->input->post("supplier_id"):NULL,
	            		'passport_no' => $this->input->post("passport_no"), 
	            		'passport_exp_date' => ($this->input->post("passport_exp_date"))?date('Y-m-d',strtotime($this->input->post("passport_exp_date"))):NULL, 
	            		'nationality' => $this->input->post("nationality"), 
	            		'eid' => $this->input->post("eid"), 
	            		'eid_exp_date' => ($this->input->post("eid_exp_date"))?date('Y-m-d',strtotime($this->input->post("eid_exp_date"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL, 
	            		'staff_status' => "New Employee", 
	            	);
      			
			    $this->common->addAll('employee_details',$details_data);
      			$this->session->set_flashdata('success',"Added new employee successfully...!");
            	redirect(base_url().'employee-list');
      		}
      		else
      		{
      			$this->load->view('employee_add_outsourced', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function edit_outsourced($id)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['suppliers'] = $this->supplier->getSuppliersDropdown();

			$data['employee'] = $this->employee->getSingleEmployee($id);

			if(!empty($data['employee']) && $data['employee']->emp_type == 2)
			{
				$data['employee_details'] = $this->employee->getSingleEmployeeDetails($id);
				$supplier_id = $data['employee_details']->supplier_id;
				$data['lic_names'] = $this->supplier->getLICnames($id,$supplier_id);
			}

			else
			{
				redirect(base_url());
			}


			if($this->input->post('emp_code') != $data['employee']->emp_code) {
				   $is_unique =  '|is_unique[employee.emp_code]';
				} else {
				   $is_unique =  '';
				}

			$this->form_validation->set_rules("emp_code", "", "trim|required".$is_unique);
			$this->form_validation->set_rules("emp_name", "", "trim|required");


			if ($this->form_validation->run() == TRUE)
      		{
      			$basic_data = array(
	            		'emp_type' => "2", 
	            		'emp_code' => $this->input->post("emp_code"), 
	            		'emp_name' => $this->input->post("emp_name"),
	            		'status' => $this->input->post("status"), 
	            	);

      			$this->common->updateAll('id',$id,$basic_data,'employee');
      			
      				$details_data = array(
      					'supplier_id' => ($this->input->post("supplier_id")!="NULL")?$this->input->post("supplier_id"):NULL,
	            		'trade_lic_name' => $this->input->post("trade_lic_name"), 
	            		'trade_lic_exp_date' => ($this->input->post("trade_lic_exp_date"))?date('Y-m-d',strtotime($this->input->post("trade_lic_exp_date"))):NULL, 
	            		'immigrtion_card_exp_date' => ($this->input->post("immigrtion_card_exp_date"))?date('Y-m-d',strtotime($this->input->post("immigrtion_card_exp_date"))):NULL, 
	            		'office_tenancy_exp_date' => ($this->input->post("office_tenancy_exp_date"))?date('Y-m-d',strtotime($this->input->post("office_tenancy_exp_date"))):NULL, 
	            		'passport_no' => $this->input->post("passport_no"), 
	            		'passport_exp_date' => ($this->input->post("passport_exp_date"))?date('Y-m-d',strtotime($this->input->post("passport_exp_date"))):NULL, 
	            		'nationality' => $this->input->post("nationality"), 
	            		'eid' => $this->input->post("eid"), 
	            		'eid_exp_date' => ($this->input->post("eid_exp_date"))?date('Y-m-d',strtotime($this->input->post("eid_exp_date"))):NULL, 
	            		'group_insurace_exp_date' => ($this->input->post("group_insurace_exp_date"))?date('Y-m-d',strtotime($this->input->post("group_insurace_exp_date"))):NULL, 
	            	);
      			
			    $this->common->updateAll('emp_id',$id,$details_data,'employee_details');
      			$this->session->set_flashdata('success',"Employee details updated successfully...!");
            	redirect(base_url().'employee-list');
      		}
      		else
      		{
      		
      			$this->load->view('employee_edit_outsourced', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function mobilize($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			$data['sites'] = $this->site->getSitesDropdown();
			$data['clients'] = $this->client->getClientsDropdown();
			$data['camps'] = $this->camp->getCampsDropdown();
			
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);

				if(empty($data['employee']))
				{
					redirect(base_url());
				}
				$data['emp_id'] = $emp_id;
			}


			$this->form_validation->set_rules("emp_id", "", "trim|required");
			$this->form_validation->set_rules("site_id", "", "trim|required");
			$this->form_validation->set_rules("client_id", "", "trim|required");
			$this->form_validation->set_rules("camp_id", "", "trim|required");
			$this->form_validation->set_rules("date_from", "", "trim|required");
			$this->form_validation->set_rules("date_safety", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$mobilization_details = $this->employee->getMobilizationDetails($this->input->post("emp_id"));
      			if(!empty($mobilization_details) && $mobilization_details->date_demobilzed == NULL)
      			{
      				//$this->common->setValue('id',$this->input->post("emp_id"),'date_demobilized',date('Y-m-d'),'employee');
      				$demobilization_log_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'site_id' => $mobilization_details->site_id,
	            		'client_id' => $mobilization_details->client_id,
	            		'camp_id' => $mobilization_details->camp_id,
	            		'project_name' => $mobilization_details->project_name,
	            		'modified_by' => $this->session->userdata('userid'),
	            		'date_demobilized' => date('Y-m-d')
	            	);
	            	$this->common->addAll('employee_mobilization_log',$demobilization_log_data);
	            	$this->employee->dropMobilizationDetails($this->input->post("emp_id"));
      				
      			}
      			elseif (!empty($mobilization_details) && $mobilization_details->date_demobilzed != NULL) {
      				$this->employee->dropMobilizationDetails($this->input->post("emp_id"));
      			}
      			$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'site_id' => $this->input->post("site_id"),
	            		'client_id' => $this->input->post("client_id"),
	            		'camp_id' => $this->input->post("camp_id"),
	            		'project_name' => $this->input->post("project_name"),
	            		'date_mobilized' => date('Y-m-d'),
	            		'date_work_start ' => ($this->input->post("date_from"))?date('Y-m-d',strtotime($this->input->post("date_from"))):NULL, 
	            		'date_safety_inducted' => ($this->input->post("date_safety"))?date('Y-m-d',strtotime($this->input->post("date_safety"))):NULL,  
	            	);

      			$this->common->addAll('employee_mobilization',$insert_data);

      			$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_mobilization_log',$log_data);

      			$this->common->setValue('id',$this->input->post("emp_id"),'emp_status','mobilized','employee');

      			
      			$this->session->set_flashdata('success',"Employee mobilized successfully...!");
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));
      			
            	
      		}
      		else
      		{
      			$this->load->view('employee_mobilize', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function vacation($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);
				if(empty($data['employee']))
				{
					redirect(base_url());
				}

				$data['emp_id'] = $emp_id;
			}


			$this->form_validation->set_rules("emp_id", "", "trim|required");
			$this->form_validation->set_rules("vacation_start_date", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"),  
	            		'vacation_start_date ' => ($this->input->post("vacation_start_date"))?date('Y-m-d',strtotime($this->input->post("vacation_start_date"))):NULL, 
	            		'salary_pending' => $this->input->post("salary_pending"),
	            		'flight_ticket_date_outbound' => ($this->input->post("flight_ticket_date_outbound"))?date('Y-m-d',strtotime($this->input->post("flight_ticket_date_outbound"))):NULL,  
	            		'flight_ticket_date_inbound' => ($this->input->post("flight_ticket_date_inbound"))?date('Y-m-d',strtotime($this->input->post("flight_ticket_date_inbound"))):NULL,  
	            	);

      			$this->common->addAll('employee_vacation',$insert_data);

      			$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_vacation_log',$log_data);

      			$this->common->setValue('id',$this->input->post("emp_id"),'emp_status','vacated','employee');

      			
      			$this->session->set_flashdata('success',"Employee vacated successfully...!");
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));
      			
            	
      		}
      		else
      		{
      			$this->load->view('employee_vacation', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function abscond($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);
				if(empty($data['employee']))
				{
					redirect(base_url());
				}

				$data['emp_id'] = $emp_id;
			}

			$this->form_validation->set_rules("emp_id", "", "trim|required");
			$this->form_validation->set_rules("emp_abscond_status", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'emp_abscond_status' => $this->input->post("emp_abscond_status"),  
	            	);

      			$this->common->addAll('employee_abscond',$insert_data);

      			$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_abscond_log',$log_data);

      			$this->common->setValue('id',$this->input->post("emp_id"),'emp_status','absconded','employee');

      			
      			$this->session->set_flashdata('success',"Employee absconded successfully...!");
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));
      			
            	
      		}
      		else
      		{
      			$this->load->view('employee_abscond', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function cancel($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);
				if(empty($data['employee']))
				{
					redirect(base_url());
				}

				$data['emp_id'] = $emp_id;
			}

			$this->form_validation->set_rules("emp_id", "", "trim|required");
			$this->form_validation->set_rules("emp_cancelled_status", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'emp_cancelled_status' => $this->input->post("emp_cancelled_status"),  
	            	);

      			$this->common->addAll('employee_cancelled',$insert_data);

      			$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_cancelled_log',$log_data);

      			$this->common->setValue('id',$this->input->post("emp_id"),'emp_status','cancelled','employee');
      			$this->common->setValue('id',$this->input->post("emp_id"),'status',2,'employee');

      			
      			$this->session->set_flashdata('success',"Employee cancelled successfully...!");
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));
      			
            	
      		}
      		else
      		{
      			$this->load->view('employee_cancel', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function documents($emp_id)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['documents'] = $this->employee->getDocumentsDropdown();
			$data['employees'] = $this->employee->getEmployeesDropdown();
			$data['emp_id'] = $emp_id;

			$data['employee'] = $this->employee->getSingleEmployee($emp_id);
			if(empty($data['employee']))
			{
				redirect(base_url());
			}
			else
			{
				$data['employee_details'] = $this->employee->getSingleEmployeeDetails($emp_id);
				$data['employee_documents'] = $this->employee->getSingleEmployeeDocuments($emp_id);
			}

			$this->form_validation->set_rules("document_id", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			if (!file_exists('documents/'.$emp_id)) {
				    mkdir('documents/'.$emp_id, 0777);
				    if (!file_exists('documents/'.$emp_id.'/index.php')) {
				    	touch('documents/'.$emp_id.'/index.php');
					}
				}
      			$config['upload_path']          = 'documents/'.$emp_id;
                $config['allowed_types']        = '*';

                $this->upload->initialize($config);

                //$input = $this->input->post();
                //unset($input['files']);

			    //$insert_id = $this->common->addAll('calls',$this->input->post());
			    if(!empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['file_name'] = "documents/".$emp_id."/".$fileData['file_name'];
		                    $uploadData[$i]['emp_id'] = $emp_id;
		                    $uploadData[$i]['document_id'] = $this->input->post('document_id');
		                    //$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                else
		                {
		                	$data['error'] = array('error' => $this->upload->display_errors());
                        	//$data = array_merge($this->input->post(),$error);
                        	$this->load->view('employee_documents', $data);
		                }
		            }
		            
		            if(!empty($uploadData)){
		                // Insert files data into the database
		                $insert = $this->common->insertDocuments($uploadData);
		                $this->session->set_flashdata('success',"Employee documents uploaded successfully...!");
      					redirect(base_url().'employee-documents/'.$emp_id);
		            }
		        }
      			/*$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'emp_cancelled_status' => $this->input->post("emp_cancelled_status"),  
	            	);

      			$this->common->addAll('employee_cancelled',$insert_data);

      			$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_cancelled_log',$log_data);

      			$this->common->setValue('id',$this->input->post("emp_id"),'emp_status','cancelled','employee');

      			
      			$this->session->set_flashdata('success',"Employee cancelled successfully...!");
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));*/

            	
      		}
      		else
      		{
      			$this->load->view('employee_documents', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function view($emp_id)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();
			$data['employee'] = $this->employee->getSingleEmployee($emp_id);

			if(!empty($data['employee']))
			{
				$data['employee_details'] = $this->employee->getSingleEmployeeDetails($data['employee']->id);
				$data['supplier_details'] = array();
				if($data['employee']->emp_type == 2 && $data['employee_details']->supplier_id != NULL){
					$data['supplier_details'] = $this->supplier->getSingleSupplierDetails($data['employee_details']->supplier_id);
				}
				$data['employee_mobilization_details'] = $this->employee->getEmployeeMobilizationDetails($data['employee']->id);
				$data['employee_abscond_details'] = $this->employee->getEmployeeAbscondDetails($data['employee']->id);
				$data['employee_vacation_details'] = $this->employee->getEmployeeVacationDetails($data['employee']->id);
				$data['employee_cancel_details'] = $this->employee->getEmployeeCancelDetails($data['employee']->id);
				$data['employee_vaccination_details'] = $this->employee->getEmployeeVaccinationDetails($data['employee']->id);
				


			}
			else
			{
				redirect(base_url());
			}
			$this->load->view('employee_view', $data);
		}
		else
		{
			redirect(base_url());
		}
	}

	public function history($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);
				if(empty($data['employee']))
				{
					redirect(base_url());
				}
				else
				{
					$data['emp_id'] = $emp_id;
					$data['employee_details'] = $this->employee->getSingleEmployeeDetails($data['employee']->id);
					$data['supplier_details'] = array();
					if($data['employee']->emp_type == 2 && $data['employee_details']->supplier_id != NULL){
						$data['supplier_details'] = $this->supplier->getSingleSupplierDetails($data['employee_details']->supplier_id);
					}
					$data['employee_mobilization_details'] = $this->employee->getEmployeeMobilizationLog($data['employee']->id);
					$data['employee_abscond_details'] = $this->employee->getEmployeeAbscondLog($data['employee']->id);
					$data['employee_vacation_details'] = $this->employee->getEmployeeVacationLog($data['employee']->id);
					$data['employee_cancel_details'] = $this->employee->getEmployeeCancelLog($data['employee']->id);
					$this->load->view('employee_history', $data);
				}

				
			}
			else
			{
				$this->form_validation->set_rules("emp_id", "", "trim|required");

				if ($this->form_validation->run() == TRUE)
	      		{
	      			redirect(base_url().'employee-history/'.$this->input->post("emp_id"));
	      		}
	      		else
	      		{
	      			$this->load->view('employee_history_form', $data);
	      		}
				
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function supplier_employee_list($supplier_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['suppliers'] = $this->supplier->getSuppliersDropdown();
			$data['supplier_id'] = NULL;
			if($supplier_id)
			{
				$data['supplier'] = $this->supplier->getSingleSupplierDetails($supplier_id);
				if(empty($data['supplier']))
				{
					redirect(base_url());
				}
				else
				{
					$data['supplier_id'] = $supplier_id;
					$data['employees'] = $this->employee->getSupplierEmployee($data['supplier']->id);
					$this->load->view('employee_list', $data);
				}

				
			}
			else
			{
				$this->form_validation->set_rules("supplier_id", "", "trim|required");

				if ($this->form_validation->run() == TRUE)
	      		{
	      			redirect(base_url().'employee-list-for-supplier/'.$this->input->post("supplier_id"));
	      		}
	      		else
	      		{
	      			$this->load->view('supplier_employee_list_form', $data);
	      		}
				
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function passport_expiry_employee_list($passport_exp_date = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['passport_exp_date'] = NULL;
			if($passport_exp_date)
			{
				$data['passport_exp_date'] = $passport_exp_date;
				$data['employee_list'] = $this->employee->getPassportExpiryEmployee($passport_exp_date);
				$this->load->view('passport_expiry_employee_list', $data);

				
			}
			else
			{
				$this->form_validation->set_rules("passport_exp_date", "", "trim|required");

				if ($this->form_validation->run() == TRUE)
	      		{
	      			redirect(base_url().'employee-list-on-passport-expiry/'.date('Y-m-d',strtotime($this->input->post("passport_exp_date"))));
	      		}
	      		else
	      		{
	      			$this->load->view('passport_expiry_employee_list_form', $data);
	      		}
				
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function crew_list($site_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['sites'] = $this->site->getSitesDropdown();
			$data['site_id'] = NULL;
			if($site_id)
			{
				$data['site'] = $this->site->getSingleActiveSiteDetails($site_id);
				if(empty($data['site']))
				{
					redirect(base_url());
				}
				else
				{
					$data['site_id'] = $site_id;
					$data['crew_list'] = $this->employee->getCrewList($data['site']->id);
					$this->load->view('crew_list', $data);
				}

				
			}
			else
			{
				$this->form_validation->set_rules("site_id", "", "trim|required");

				if ($this->form_validation->run() == TRUE)
	      		{
	      			redirect(base_url().'crew-list/'.$this->input->post("site_id"));
	      		}
	      		else
	      		{
	      			$this->load->view('crew_list_form', $data);
	      		}
				
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	public function vaccination($emp_id = NULL)
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['employees'] = $this->employee->getEmployeesDropdown();
			
			
			
			
			
			 
			$data['emp_id'] = NULL;
			if($emp_id)
			{
				$data['employee'] = $this->employee->getSingleEmployee($emp_id);
				$data['employee_vaccination_details'] = $this->employee->getEmployeeVaccinationDetails($emp_id);
				if(empty($data['employee']))
				{
					redirect(base_url());
				}
				$data['emp_id'] = $emp_id;
			}


			$this->form_validation->set_rules("emp_id", "", "trim|required");
			$this->form_validation->set_rules("vacc_name", "", "trim|required");
			$this->form_validation->set_rules("vacc_country", "", "trim|required");
			//$this->form_validation->set_rules("2nd_dose", "", "trim|required");

			if ($this->form_validation->run() == TRUE)
      		{
      			
      			$insert_data = array(
	            		'emp_id' => $this->input->post("emp_id"), 
	            		'vaccine_name' => $this->input->post('vacc_name'),
	            		'vaccinated_country' => $this->input->post('vacc_country'), 
	            		'first_dose' => ($this->input->post("first_dose"))?date('Y-m-d',strtotime($this->input->post("first_dose"))):NULL, 
	            		'second_dose' => ($this->input->post("second_dose"))?date('Y-m-d',strtotime($this->input->post("second_dose"))):NULL, 
	            		
	            	);
                if ($this->common->isExists('emp_id',$this->input->post("emp_id"),'employee_vaccination'))
                 {
                	if ($this->common->setValue('emp_id',$this->input->post("emp_id") ,'second_dose', date('Y-m-d',strtotime($this->input->post("second_dose"))),'employee_vaccination'))
                	{
                	 	 $this->session->set_flashdata('success',"Employee vaccination details updated successfully...!");  
                		
                	}
                	else
                	{
                        $this->session->set_flashdata('fail',"Employee vaccination details not added...");  
                	}
                }
                else
                {

                	$this->common->addAll('employee_vaccination',$insert_data);

                    $this->session->set_flashdata('success',"Employee vaccination details added successfully...!");  
                    
                }
      			

      			/*$log_data = $insert_data;
      			$log_data['modified_by'] = $this->session->userdata('userid');
      			$this->common->addAll('employee_mobilization_log',$log_data);     */ 			
      			
      			redirect(base_url().'employee-view/'.$this->input->post("emp_id"));
      			
            	
      		}
      		else
      		{
      			$this->load->view('employee_vaccination', $data);
      		}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function settings()
	{
		if($this->session->userdata('user_logged'))
		{
			$data['days'] = $this->employee->getDays($this->session->userdata('userid'));
			if (isset( $data['days']->expiry_days)) 
             {
                 $days =  $data['days']->expiry_days;
                 if($days!=0)
                 {
                 		$this->session->set_flashdata('noDays',$days." Days");
                 }
                 else
                 {
                 	$this->session->set_flashdata('noDays',"0 Days");
                 }
                 

             }
              
             
			
				$this->form_validation->set_rules("exp_days", "", "trim|required");

				if ($this->form_validation->run() == TRUE)
	      		{
	      			//redirect(base_url().'employee-settings');
	      			
	      			$data = array(
						'userid'	=>	$this->session->userdata('userid'),
						'expiry_days'	=>	$this->input->post('exp_days'),
						
					);
					 if ($this->common->isExists('userid',$this->session->userdata('userid'),'passport_expiry_days')) 
					{
						if ($this->common->setValue('userid',$this->session->userdata('userid'),'expiry_days',$this->input->post('exp_days'),'passport_expiry_days'))
                	{
                	 	 $this->session->set_flashdata('success',"Days added successfully...!"); 
                	 	 redirect(base_url().'employee-settings'); 
                		
                	}
                	else
                	{
                        $this->session->set_flashdata('fail',"Days not added ..!");
                        redirect(base_url().'employee-settings');
                	}
					}
					else
					{
						$id = $this->common->addAll('passport_expiry_days',$data);
					}
					

					
					if ($id)
					{
						$this->session->set_flashdata('success',"Days added successfully...!");
      			           redirect(base_url().'employee-settings');
					}
					else
					{
						$this->session->set_flashdata('success',"Days not added successfully...!");
      			           redirect(base_url().'employee-settings');
					}
	      		}
	      		else
	      		{
	      			$this->load->view('employee_settings');
	      		}
				
			}
		
		else
		{
			redirect(base_url());
		}


	}
public function passport_expiry_employee_lists()
	{
		if($this->session->userdata('user_logged'))
		{
			$data = array();

			$data['passport_exp_date'] = NULL;
			$data['employee'] = $this->employee->getDays($this->session->userdata('userid'));
			$days = 0;
      if (isset( $data['employee']->expiry_days)) {
          $days =  $data['employee']->expiry_days;
      }
      else
      {
        $days = 10;
      }
				//$data['passport_exp_date'] = $passport_exp_date;
		    $data['employee_list'] = $this->employee->getPassportExpiryEmployees($days);
			$this->load->view('passport_expiry_employee_list', $data);
	
		}
		else
		{
			redirect(base_url());
		}
	}
	public function group_insurance_not_initiated_employees()
	{
		if($this->session->userdata('user_logged'))
		{
			$data['not_initiated'] = $this->employee->getInsuranceNotInitiatedEmployees();
			$this->load->view('employee_group_insurance_status', $data);	
		}
		else
		{
			redirect(base_url());
		}
	}
	public function group_insurance_pending_employees()
	{
		if($this->session->userdata('user_logged'))
		{
			$data['pending'] = $this->employee->getInsurancePendingEmployees();
			$this->load->view('employee_group_insurance_status', $data);	
		}
		else
		{
			redirect(base_url());
		}
	}
	function getSingleEmployeeVaccinationDetails2()
	{
		$emp_id = $this->input->post('id');
		$details = $this->employee->getEmployeeVaccinationDetails2($emp_id);
		$data = array();
		$data['site_name'] = $details->site_name;
		$data['site_id'] = $details->site_id;
		$data['vaccine_name'] = $details->vaccine_name;
		$data['first_dose'] = ($details->first_dose)?date('d-m-Y',strtotime($details->first_dose)):'';
		$data['second_dose'] = ($details->second_dose)?date('d-m-Y',strtotime($details->second_dose)):'';
		
		
		echo json_encode($data);
	}


}

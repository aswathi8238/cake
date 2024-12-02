<?php $this->load->view('header') ?>

<div>
	<div class="container">
		<div class="page-header">
			<h4 class="page-title">Edit Own Employee</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>employee-list">Employees</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Own Employee</li>
			</ol>
		</div>

		

		<div class="row row-deck">
			<div class="col-md-12 col-lg-12">
				<form method="post" class="card" action="<?= base_url() ?>own-employee-edit/<?= $employee->id ?>" enctype='multipart/form-data'>
					<div class="card-header">
						<h3 class="card-title">Enter Details</h3>
					</div>
					<div class="card-body">
						<?php if(isset($error)) {?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Code *</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('emp_code')){?>is-invalid<?php } ?>" type="text" name="emp_code" value=<?= set_value('emp_code', $employee->emp_code) ?>>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label class="form-label">Name *</label>
									<div class="input-group">
										<input class="form-control <?php if(form_error('emp_name')){?>is-invalid<?php } ?>" type="text" name="emp_name" value="<?= set_value('emp_name', $employee->emp_name) ?>">
									</div>
								</div>

								<div class="invoice-descs">
								<div class="form-group" id="supplier">
									<label class="form-label">Supplier</label>
									<select class="form-control select2-show-search" data-placeholder="Select Supplier" name="supplier_id" id="supplier_id">
										<option value="NULL" selected>No Supplier</option>
										<?php foreach ($suppliers as $key => $value) { ?>
											<option value="<?= $key ?>" <?php if(set_value('supplier_id', $employee_details->supplier_id)==$key){ ?>selected <?php } ?>><?= $value ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Trade License Name</label>
										<!-- <div class="input-group">
											<input readonly class="form-control <?php if(form_error('trade_lic_name')){?>is-invalid<?php } ?>" type="text" name="trade_lic_name" id="trade_lic_name" value=<?= set_value('trade_lic_name', $employee_details->trade_lic_name) ?>>
										</div> -->
										<select class="form-control select2-show-search" data-placeholder="Select Trade License" name="trade_lic_name" id="trade_lic_name">
									 		<option value="NULL" >No Trade License Name</option>
									 		<!-- <option value="<?=  $employee_details->trade_lic_name ?>" selected><?= $employee_details->trade_lic_name ?></option> -->
										<?php foreach ($lic_names as $key => $value) { ?>
											<option value="<?= $value ?>" <?php if(set_value('trade_lic_name',trim($employee_details->trade_lic_name))==trim($value)){ ?>selected <?php } ?>><?= $value ?></option>
										<?php } ?>
									 	 </select>
									 	
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Trade License Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input readonly class="form-control <?php if(form_error('trade_lic_exp_date')){?>is-invalid<?php } ?>" type="text" name="trade_lic_exp_date" id="trade_lic_exp_date" value=<?= set_value('trade_lic_exp_date',($employee_details->trade_lic_exp_date)?date('d-M-Y',strtotime($employee_details->trade_lic_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Group Insurance Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input readonly class="form-control  <?php if(form_error('group_insurace_exp_date')){?>is-invalid<?php } ?>" type="text" name="group_insurace_exp_date" id="group_insurace_exp_date" value=<?= set_value('group_insurace_exp_date',($employee_details->group_insurace_exp_date)?date('d-M-Y',strtotime($employee_details->group_insurace_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Immigration Card Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('immigrtion_card_exp_date')){?>is-invalid<?php } ?>" type="text" name="immigrtion_card_exp_date" value=<?= set_value('immigrtion_card_exp_date',($employee_details->immigrtion_card_exp_date)?date('d-M-Y',strtotime($employee_details->immigrtion_card_exp_date)):'') ?>>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Office Tenancy License Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('office_tenancy_exp_date')){?>is-invalid<?php } ?>" type="text" name="office_tenancy_exp_date" value=<?= set_value('office_tenancy_exp_date',($employee_details->office_tenancy_exp_date)?date('d-M-Y',strtotime($employee_details->office_tenancy_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								</div>
								

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Passport Number</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('passport_no')){?>is-invalid<?php } ?>" type="text" name="passport_no" value=<?= set_value('passport_no', $employee_details->passport_no) ?>>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Passport Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('passport_exp_date')){?>is-invalid<?php } ?>" type="text" name="passport_exp_date" value=<?= set_value('passport_exp_date',($employee_details->passport_exp_date)?date('d-M-Y',strtotime($employee_details->passport_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								</div>

								<div class="form-group">
									<label class="form-label">Nationality</label>
									<div class="input-group">
										<input class="form-control <?php if(form_error('nationality')){?>is-invalid<?php } ?>" type="text" name="nationality" value=<?= set_value('nationality', $employee_details->nationality) ?>>
									</div>
								</div>

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Emirates ID Number</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('eid')){?>is-invalid<?php } ?>" type="text" name="eid" value=<?= set_value('eid', $employee_details->eid) ?>>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Emirates ID Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('eid_exp_date')){?>is-invalid<?php } ?>"  type="text" name="eid_exp_date" value=<?= set_value('eid_exp_date',($employee_details->eid_exp_date)?date('d-M-Y',strtotime($employee_details->eid_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								</div>
									
						
								
							</div>
							<div class="col-md-6">

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Labour Card Number</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('labour_card_no')){?>is-invalid<?php } ?>" type="text" name="labour_card_no" id="labour_card_no" value=<?= set_value('labour_card_no', $employee_details->labour_card_no) ?>>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Labour Card Expiry Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('labour_card_exp_date')){?>is-invalid<?php } ?>" type="text" name="labour_card_exp_date" id="labour_card_exp_date" value=<?= set_value('labour_card_exp_date',($employee_details->labour_card_exp_date)?date('d-M-Y',strtotime($employee_details->labour_card_exp_date)):'') ?>>
										</div>
									</div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">UID Number</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('uid')){?>is-invalid<?php } ?>" type="text" name="uid" id="uid" value=<?= set_value('uid', $employee_details->uid) ?>>
										</div>
									</div>
								</div>
								</div>

								<div class="form-group">
									<label class="form-label">Visa Job Description</label>
									<textarea class="form-control" name="visa_job_desc" id="visa_job_desc" placeholder="Visa Job Description"><?= set_value('visa_job_desc', $employee_details->visa_job_desc) ?></textarea>
								</div>

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Basic Salary</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('basic_salary')){?>is-invalid<?php } ?>" type="text" name="basic_salary" id="basic_salary" value=<?= set_value('basic_salary', $employee_details->basic_salary) ?>>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Labour Contract Type</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('labour_contract_type')){?>is-invalid<?php } ?>" type="text" name="labour_contract_type" id="labour_contract_type" value=<?= set_value('labour_contract_type', $employee_details->labour_contract_type) ?>>
										</div>
									</div>
								</div>
								</div>

								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Employee Join Date</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('emp_join_date')){?>is-invalid<?php } ?>" type="text" name="emp_join_date" id="emp_join_date" value=<?= set_value('emp_join_date',($employee_details->emp_join_date)?date('d-M-Y',strtotime($employee_details->emp_join_date)):'') ?>>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">DOB</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
											</div><input class="form-control fc-datepicker <?php if(form_error('dob')){?>is-invalid<?php } ?>" type="text" name="dob" id="dob" value=<?= set_value('dob',($employee_details->dob)?date('d-M-Y',strtotime($employee_details->dob)):'') ?>>
										</div>
									</div>
								</div>
								</div>

								<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-label">Group Insurance Add Status</label>
										<div class="input-group">
											<input class="form-control <?php if(form_error('group_insurance_add_status')){?>is-invalid<?php } ?>" type="text" name="group_insurance_add_status" id="group_insurance_add_status" value=<?= set_value('group_insurance_add_status', $employee_details->group_insurance_add_status) ?>>
										</div>
									</div>
								</div>

								</div>

								

								<div class="form-group">
									<label class="form-label">Status</label>
									<select class="form-control select2-show-search" data-placeholder="Status" name="status">

											<option value="1" <?php if(set_value('status', $employee->status)=="1"){ ?>selected <?php } ?>>Enabled</option>

											<option value="0" <?php if(set_value('status', $employee->status)=="0"){ ?>selected <?php } ?>>Disabled</option>

									</select>
								</div>

								

								
							</div>
						</div>
						
								
						
								
						
					</div>
					<div class="card-footer text-right">
						<div class="d-flex">
							<button type="submit" class="btn btn-primary ml-auto">Update</button>
						</div>
					</div>
				</form>
				
			</div>
			
		</div>
		
		
	</div>
</div>
</div>

<?php $this->load->view('footer') ?>

<script type="text/javascript"> 
   function replacer(val) {
     if ( val === null ) 
     { 
        return "No Trade License Present"; 
     } else {
        return val; 
     }
    }     
$(document).ready(function(){
		$("#supplier_id").on("change",function(){			

    var id = $(this).val();
    if(id != "NULL"){
    $.ajax({
		url:'<?=base_url()?>Supplier/getSingleSupplierDetails2',
		method: 'post',
		data: {id:id},
		dataType: 'json',
		success:function(data) {
			var html = '<option value="">Select State</option>';


                    for(var count = 0; count < data.length; count++)
                    {

                        html += '<option value="'+data[count].trade_lic_name+'">'+replacer(data[count].trade_lic_name);+'</option>';
                     


                    }

                    $('#trade_lic_name').html(html);
                    $("#trade_lic_exp_date").val("");
		            $("#group_insurace_exp_date").val("");
                    }
		/*success: function(response){
			
			$.each(response,function(index,data){
				
             $('#trade_lic_name').append('<option value="'+data.trade_lic_name+'">'+data.trade_lic_name+'</option>');
          });
			//$("#trade_lic_name").val(response.trade_lic_name).change();
			$.each(response.d, function (){
                        $("#trade_lic_name").append($("<option></option>").val(response.trade_lic_name).text(response.trade_lic_name));
                    });
			$("#trade_lic_exp_date").val(response.trade_lic_exp_date); 
			$("#group_insurace_exp_date").val(response.insurance_exp_date);  
		}*/
		});
	}
	else
	{
		$("#trade_lic_name").val("").change();    
		$("#trade_lic_exp_date").val("");
		$("#group_insurace_exp_date").val("");
	}
    })


    $("#trade_lic_name").on("change",function(){			
    var sid = $("#supplier_id").val();
    var lic_name = 	$("#trade_lic_name").val();
    if(sid != "NULL"){
    $.ajax({
		url:'<?=base_url()?>Supplier/getSupplierMultipleLic_name',
		method: 'post',
		data: {id:sid,lic_name:lic_name},
		dataType: 'json',
		success: function(response){
			
			
			$("#trade_lic_exp_date").val(response.trade_lic_exp_date);
			$("#group_insurace_exp_date").val(response.insurance_exp_date);  
			
		}
		});
	}
	else
	{
			$("#trade_lic_exp_date").val("");
			$("#group_insurace_exp_date").val("");  
	}
    })
} );
</script>
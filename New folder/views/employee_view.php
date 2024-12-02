<?php $this->load->view('header') ?>

<div>
	<div class="container">
		<div class="page-header">
			<h4 class="page-title">Employee Details - <?= $employee->emp_name ?></h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>employee-list">Employees</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?= $employee->emp_name ?>(<?= $employee->emp_code ?>)</li>
			</ol>
		</div>


		<div class="row row-deck">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
			    <div class="card clearfix">
					<div class="card-header clearfix">
						<div class="card-title float-left">Employee Details</div>
						<a href="<?= base_url('employee-cancel/').$employee->id ?>" class="btn btn-pill btn-danger float-right btn-sm" style="margin-right:10px">Cancel</a>
						<a href="<?= base_url('employee-abscond/').$employee->id ?>" class="btn btn-pill btn-warning float-right btn-sm" style="margin-right:10px">Abscond</a>
						<a href="<?= base_url('employee-vacation/').$employee->id ?>" class="btn btn-pill btn-info float-right btn-sm" style="margin-right:10px">Vacation</a>
						<a href="<?= base_url('employee-mobilize/').$employee->id ?>" class="btn btn-pill btn-success float-right btn-sm" style="margin-right:10px">Mobilize</a>
						<a href="<?= base_url('employee-vaccination/').$employee->id ?>" class="btn btn-pill btn-primary float-right btn-sm" style="margin-right:10px">Vaccination</a>
					</div>
					<div class="card-body">
						<?php if($this->session->flashdata('success')){ ?>
						<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?= $this->session->flashdata('success') ?></div>
						<?php } ?>

						<?php if($this->session->flashdata('fail')){ ?>
						<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?= $this->session->flashdata('fail') ?></div>
						<?php } ?>
						<div class="row profile-user-info">
							<div class="col-lg-12">
								<div class="table-responsive border ">
									<table class="table row table-borderless w-100 m-0 ">
										<tbody class="col-lg-6 p-0">
											<tr>
												<td><strong>Code :</strong> <?= $employee->emp_code ?></td>
											</tr>
											<tr>
												<td><strong>Name :</strong> <?= $employee->emp_name ?></td>
											</tr>
											<tr>
												<td><strong>Current Status :</strong> <?= $employee->emp_status ?></td>
											</tr>
											<tr>
												<td><strong>Status :</strong>
													<?= ($employee->status)==1?"<a class='btn btn-success btn-sm'>Enabled</a>":"<a class='btn btn-warning btn-sm'>Disabled</a>" ?>
												</td>
											</tr>
										</tbody>
										<tbody class="col-lg-6 p-0">
											<tr>
												<td><strong>Type :</strong>
													<?= ($employee->emp_type)==1?"Own Employee":"Outsourced Employee" ?>
												</td>
											</tr>
											<?php if(!empty($supplier_details)){ ?>
											<tr>
												<td><strong>Supplier :</strong> <?= $supplier_details->supplier_name ?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<?php if(true){ ?>
						<div class="panel panel-primary">
							<div class=" tab-menu-heading">
								<div class="tabs-menu2 ">
									<ul class="nav panel-tabs">
											<li><a href="#tab-mobilize" data-toggle="tab" class="active">Mobilization Details</a></li>
											<li><a href="#tab-vacation" data-toggle="tab">Vacation Details</a></li>
											<li><a href="#tab-abscond" data-toggle="tab">Abscond Details</a></li>
											<li><a href="#tab-vaccination" data-toggle="tab">Vaccination Details</a></li>
											<li><a href="#tab-cancel" data-toggle="tab">Cancellation Details</a></li>
											<a href="<?= base_url('employee-documents/').$employee->id ?>" class="btn btn-pill btn-info float-right btn-sm">Documents</a>
									</ul>
								</div>
							</div>
							<div class="card-body pb-0 tabs-menu-body">
								<div class="tab-content">
								<div class="tab-pane active" id="tab-mobilize">
										<div class="table-responsive">
											<table class="table table-bordered align-items-center mb-0 text-center">
												<thead>
													<tr>
														<th>#No</th>
														<th>Site Name</th>
														<th>Work Start Date</th>
														<th>Safety Inducted Date</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($employee_mobilization_details)){ ?>
													<?php foreach ($employee_mobilization_details as $key => $value) { ?>
													<tr>
														<td><?= $key+1 ?></td>
														<td>
															<p class="mb-0"><?= $value['site_name'] ?>
															</p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['date_work_start'])?date('d-M-Y',strtotime($value['date_work_start'])):'' ?></p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['date_safety_inducted'])?date('d-M-Y',strtotime($value['date_safety_inducted'])):'' ?></p>
														</td>
													</tr>
													<?php } ?>
													<?php }else{ ?>
														<tr><td colspan="4" class="text-center">No details found...</td></tr>
													<?php } ?>

												</tbody>
											</table>
										</div>
									</div>

									<div class="tab-pane" id="tab-abscond">
										<div class="table-responsive">
											<table class="table table-bordered align-items-center mb-0 text-center">
												<thead>
													<tr>
														<th>Status</th>
														<th>Date Absconded</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($employee_abscond_details)){ ?>
													<?php foreach ($employee_abscond_details as $key => $value) { ?>
													<tr>
														<td>
															<p class="mb-0"><?= ($value['emp_abscond_status'] == 1)?"True":"False" ?>
															</p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['date_absconded'])?date('d-M-Y',strtotime($value['date_absconded'])):'' ?></p>
														</td>
													</tr>
													<?php } ?>
													<?php }else{ ?>
														<tr><td colspan="2" class="text-center">No details found...</td></tr>
													<?php } ?>

												</tbody>
											</table>
										</div>
									</div>
									<div class="tab-pane" id="tab-vaccination">
										<div class="table-responsive">
											<table class="table table-bordered align-items-center mb-0 text-center">
												<thead>
													<tr>
														<!-- <th>Company</th> -->
														<th>Vaccine Name</th>
														<th>vaccinated country</th>
														<th>1st Dose</th>
														<th>2nd Dose</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($employee_vaccination_details)){ ?>
													<?php foreach ($employee_vaccination_details as $key => $value) { ?>
													<tr>
														
														
														<td>
															<p class="mb-0"><?= $value['vaccine_name'] ?></p>
															
														</td>
														<td>
															<p class="mb-0"><?= $value['vaccinated_country'] ?></p>
														</td> 
														<td>
															
															<p class="mb-0"><?= date('d-M-Y', strtotime($value['first_dose'])); ?></p>
														</td>
														<td>

<p><?php if($value['second_dose'] === NULL) { echo null ;}else{ echo date('d-M-Y', strtotime($value['second_dose']));}?></p>
															
														</td>
													</tr>
													<?php } ?>
													<?php }else{ ?>
														<tr><td colspan="2" class="text-center">No details found...</td></tr>
													<?php } ?>

												</tbody>
											</table>
										</div>
									</div>

									<div class="tab-pane" id="tab-vacation">
										<div class="table-responsive">
											<table class="table table-bordered align-items-center mb-0 text-center">
												<thead>
													<tr>
														<th>Vacation Start Date</th>
														<th>Vacation End Date</th>
														<th>Salary Pending</th>
														<th>Flight Ticket Date Outbound</th>
														<th>Flight Ticket Date Inbound</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($employee_vacation_details)){ ?>
													<?php foreach ($employee_vacation_details as $key => $value) { ?>
													<tr>
														<td>
															<p class="mb-0"><?= ($value['vacation_start_date'])?date('d-M-Y',strtotime($value['vacation_start_date'])):'' ?>
															</p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['vacation_end_date'])?date('d-M-Y',strtotime($value['vacation_end_date'])):'' ?></p>
														</td>
														<td>
															<p class="mb-0"><?= $value['salary_pending'] ?></p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['flight_ticket_date_outbound'])?date('d-M-Y',strtotime($value['flight_ticket_date_outbound'])):'' ?></p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['flight_ticket_date_inbound'])?date('d-M-Y',strtotime($value['flight_ticket_date_inbound'])):'' ?></p>
														</td>
													</tr>
													<?php } ?>
													<?php }else{ ?>
														<tr><td colspan="5" class="text-center">No details found...</td></tr>
													<?php } ?>

												</tbody>
											</table>
										</div>
									</div>

									<div class="tab-pane" id="tab-cancel">
										<div class="table-responsive">
											<table class="table table-bordered align-items-center mb-0 text-center">
												<thead>
													<tr>
														<th>Status</th>
														<th>Date Cancelled</th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($employee_cancel_details)){ ?>
													<?php foreach ($employee_cancel_details as $key => $value) { ?>
													<tr>
														<td>
															<p class="mb-0"><?= ($value['emp_cancelled_status'] == 1)?"True":"False" ?>
															</p>
														</td>
														<td>
															<p class="mb-0"><?= ($value['date_cancelled'])?date('d-M-Y',strtotime($value['date_cancelled'])):'' ?></p>
														</td>
													</tr>
													<?php } ?>
													<?php }else{ ?>
														<tr><td colspan="2" class="text-center">No details found...</td></tr>
													<?php } ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>


					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
</div>


<?php $this->load->view('footer') ?>
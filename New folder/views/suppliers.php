<?php $this->load->view('header') ?>

<div>
	<div class="container">
		<div class="page-header">
			<h4 class="page-title">Suppliers</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Suppliers</li>
			</ol>
		</div>


		<div class="row row-deck">
			<div class="col-lg-12">	
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Supplier Details</h3>
						<button id="add_details" class="btn btn-pill btn-success float-right btn-sm"><i class="fa fa-plus"></i></button>
					</div>
					<div class="card-body">
						<div id="success_message"></div>
						<div class="table-responsive">
							<table id="details_table" class="table table-bordered border-top-0 border-bottom-0 text-center" style="width:100%;">
								<thead>
									<tr class="border-bottom-0">
										<th>Supplier Name</th>
										<th>Email</th>
										<th>Contact</th>
										<th style="font-size:12px">Trade License Names</th>
										<th>Status</th>
										<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr class="border-top-0">
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		
		
	</div>
	</div>
	</div>

<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="example-Modal2"></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<form method="post" id="details_form" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Supplier Name</label>
						<input class="form-control" type="text" name="supplier_name" id="supplier_name">
						<div id="name_error" class="text-danger"></div>
					</div>
					
				</div>
				

				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Email</label>
						<input class="form-control" type="text" name="supplier_email" id="supplier_email">
					</div>
					
				</div>
				
			</div>	

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="form-label">Contact </label>
						<input class="form-control" type="text" name="supplier_contact" id="supplier_contact">
					</div>
					
				</div>
				
			</div>	

			<div class="row" id="one1">
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Name</label>
						<div class="input-group">
							<input class="form-control" type="text" name="trade_lic_name1" id="trade_lic_name1">
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker" type="text" name="trade_lic_exp_date1" id="trade_lic_exp_date1">
						</div> 
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Insurance Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker"  type="text" name="insurance_exp_date1" id="insurance_exp_date1">
						</div>
					</div>
				</div>
			</div>
<i id="add_next" class="btn btn-pill btn-success float-right btn-sm" style="margin-left:10px"><i class="fa fa-plus"></i></i>
<i id="remove_previous" class="btn btn-pill btn-danger float-right btn-sm"><i class="fa fa-minus"></i></i>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="form-label">Status</label>
						<select class="form-control select2-show-search" name="status" id="status">
							<option value="1">Enabled</option>
							<option value="0">Disabled</option>
						</select>
					</div>
					
				</div>
				
			</div>	

		</div>
		<div class="modal-footer">
			<input type="hidden" name="id" id="id" />
			<input type="hidden" name="tid" id="tid" value="1"/>
            <input type="hidden" name="data_action" id="data_action" value="Insert" />
            <input type="submit" name="action" id="action" class="btn btn-secondary" value="Add" />
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>
</div>
</div>
<?php $this->load->view('footer') ?>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var i= 1;
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>Supplier/details",
            method:"POST",
            data:{
            	data_action:'fetch_all',
            },
            success:function(data)
            {
                $('tbody').html(data);
                /*if ( $.fn.DataTable.isDataTable('#details_table') ) 
                {
			  		$('#details_table').DataTable().destroy();
				}*/
                $('#details_table').DataTable();
            }
        });
    }

    fetch_data();

    $('#add_details').click(function(){
        $('#details_form')[0].reset();

        $('#name_error').html('');
        $('.modal-title').text("Add Supplier");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#details').modal('show');
    });

    $(document).on('submit', '#details_form', function(event){
    	
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'supplier/details' ?>",
            method:"POST",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#details_form')[0].reset();
                    $('#details').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Supplier added successfully...!</div>');
                    }
                    else if($('#data_action').val() == "Edit")
                    {
                        $('#success_message').html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Supplier details updated successfully...!</div>');
                    }
                }

                if(data.error)
                {
        			$('#name_error').html(data.name_error);
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var details_id = $(this).attr('id');
        $('#details_form')[0].reset();
        $('#name_error').html('');
        $.ajax({
            url:"<?php echo base_url() . 'supplier/details' ?>",
            method:"POST",
            data:{details_id:details_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
            		
 				$('#details').modal('show');
 				
                $('#supplier_name').val(data[0].supplier_name);
                $('#supplier_email').val(data[0].supplier_email);
                $('#supplier_contact').val(data[0].supplier_contact);
				$('#trade_lic_name1').val(data[0].trade_lic_name);
				/*$('#trade_lic_exp_date1').val((data[0].trade_lic_exp_date).split("-").reverse().join("-"));
				$('#insurance_exp_date1').val((data[0].insurance_exp_date).split("-").reverse().join("-"));*/
				$('#trade_lic_exp_date1').val(data[0].trade_lic_exp_date);
				$('#insurance_exp_date1').val(data[0].insurance_exp_date);
                
                $("#status").val(data[0].status);
                $("#status").trigger("change");
                $('.modal-title').text('Update Details');
                $('#id').val(details_id);
                $('#action').val('Update');
                $('#data_action').val('Edit');

                
 				 var len = data.length;
 				
 				 var tr_str = "";
 		    i = data[0].count;
            for(var j=1; j<len; j++)
            {
            	
            	/*$('#supplier_name').val(data[0].supplier_name);
                $('#supplier_email').val(data[0].supplier_email);
                $('#supplier_contact').val(data[0].supplier_contact);
				$('#trade_lic_name1').val(data[0].trade_lic_name);
				$('#trade_lic_exp_date1').val(data[0].trade_lic_exp_date);
				$('#insurance_exp_date1').val(data[0].insurance_exp_date);
                
                $("#status").val(data[0].status);
                $("#status").trigger("change");
                $('.modal-title').text('Update Details');
                $('#id').val(details_id);
                $('#action').val('Update');
                $('#data_action').val('Edit');
*/

              
                    tr_str += `
			<div class="removeme row" id="one`+(j+1)+`">
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Name</label>
						<div class="input-group">
							<input class="form-control" type="text" name="trade_lic_name`+(j+1)+`" id="trade_lic_name`+(j+1)+`" value="`+ data[j].trade_lic_name +`">
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker" type="text" name="trade_lic_exp_date`+(j+1)+`" id="trade_lic_exp_date`+(j+1)+`" value="`+ (data[j].trade_lic_exp_date)+`">
						</div>
					</div>
				</div>

				<div class="col-md-4" id="one">
					<div class="form-group">
						<label class="form-label">Insurance Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker"  type="text" name="insurance_exp_date`+(j+1)+`" id="insurance_exp_date`+(j+1)+`" value="`+ (data[j].insurance_exp_date) +`">
						</div>
					</div>
				</div>
			</div>`;
            }

                $("#one1").after(tr_str);
               /* $('#supplier_name').val(data.supplier_name);
                $('#supplier_email').val(data.supplier_email);
                $('#supplier_contact').val(data.supplier_contact);
				$('#trade_lic_name1').val(data.trade_lic_name);
				$('#trade_lic_exp_date1').val(data.trade_lic_exp_date);
				$('#insurance_exp_date1').val(data.insurance_exp_date);
                
                $("#status").val(data.status);
                $("#status").trigger("change");
                $('.modal-title').text('Update Details');
                $('#id').val(details_id);
                $('#action').val('Update');
                $('#data_action').val('Edit');*/





              
            }
        })
    });

  
   // var i= 1;
$("#add_next").on("click", function() {  
	
	//alert(`id `+(i+1)+` created`);
	$("#tid").val((i+1));
	//alert("#one"+i);
	var append_me = `
			<div class="removeme row" id="one`+(i+1)+`">
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Name</label>
						<div class="input-group">
							<input class="form-control" type="text" name="trade_lic_name`+(i+1)+`" id="trade_lic_name`+(i+1)+`">
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label">Trade License Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker" type="text" name="trade_lic_exp_date`+(i+1)+`" id="trade_lic_exp_date`+(i+1)+`">
						</div>
					</div>
				</div>

				<div class="col-md-4" id="one">
					<div class="form-group">
						<label class="form-label">Insurance Expiry Date</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
								</div>
							</div><input class="form-control fc-datepicker"  type="text" name="insurance_exp_date`+(i+1)+`" id="insurance_exp_date`+(i+1)+`">
						</div>
					</div>
				</div>
			</div>`;
                $("#one"+(i)).after(append_me); 
                i++; 
            }); 
            
$('body').on('focus',".fc-datepicker", function(){
    $(this).datepicker();
});
$('#remove_previous').on('click', function(){
  if (i>1) 
  {
  $('#one'+(i)).remove();
   i--;
   $("#tid").val(i);
  }
  
});
  
 $('#details').on('hidden.bs.modal', function (e) {
 $("[class^=removeme]").remove();
 i =1;
 $("#tid").val(1);
})
    
});
</script>
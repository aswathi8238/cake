<?php $this->load->view('header') ?>
		
<?php 
$vname = "";
$_1st_dose = "";
$_2nd_dose = "";
$vacc_country = "";
if (!empty($employee_vaccination_details))
 {
	
	foreach ($employee_vaccination_details as  $value)
	{
		
		
		$vname = 	$value['vaccine_name'];
		$_1st_dose = date('d-M-Y',strtotime($value['first_dose']));
		$_2nd_dose = date('d-M-Y',strtotime($value['second_dose']));
		$vacc_country = $value['vaccinated_country'];
		


 	}
 }
  ?>

<div>
	<div class="container">
		<div class="page-header">
			<h4 class="page-title">Employee Vaccination</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url() ?>employee-list">Employees</a></li>
				<li class="breadcrumb-item active" aria-current="page">Employee Vaccination</li>
			</ol>
		</div>


		<div class="row row-deck">
			<div class="col-md-12 col-lg-12">
				<form method="post" class="card" action="<?= base_url() ?>employee-vaccination/<?= $emp_id ?>" enctype='multipart/form-data'>
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
								<div class="form-group">
									<label class="form-label">Employee</label>
									<select class="form-control select2-show-search <?php if(form_error('emp_id')){?>is-invalid<?php } ?>" data-placeholder="Select Employee" name="emp_id" id="emp_id">
										<option selected disabled>Select Employee</option>
										<?php foreach ($employees as $key => $value) { ?>
											<option value="<?= $key ?>" <?php if(set_value('emp_id',$emp_id)==$key){ ?>selected <?php } ?>><?= $value ?></option>
										<?php } ?>
									</select>
									<?php if(form_error('emp_id')){?>
									<div class="invalid-feedback">Please select an employee</div>
									<?php } ?>
								</div>
							</div>
							
							<div class="col-md-6">

							<div class="form-group">
									<label class="form-label">vaccine name</label>

<select class="form-control select2-show-search <?php if(form_error('vacc_name')){?>is-invalid<?php } ?>" data-placeholder="Select Vaccine" name="vacc_name" id="vacc_name">
										
	<option selected disabled>Select Vaccine</option>
									
	<option <?php if($vname=='Sinopharm'){ ?>selected <?php } ?> value="Sinopharm">Sinopharm </option>			
	<option <?php if($vname=='Oxford/AstraZeneca (Covishield)'){ ?>selected <?php } ?> value="Oxford/AstraZeneca (Covishield)">Oxford/AstraZeneca (Covishield)
	</option>				
	<option <?php if($vname=='Pfizer/BioNTech'){ ?>selected <?php } ?> value="Pfizer/BioNTech">Pfizer/BioNTech</option>		
	<option <?php if($vname=='Sputnik V'){ ?>selected <?php } ?> value="Sputnik V">Sputnik V</option>
     <option <?php if($vname=='Moderna'){ ?>selected <?php } ?> value="Moderna">Moderna</option>			
</select>
									<?php if(form_error('vacc_name')){?>
									<div class="invalid-feedback">Please select a vaccine</div>
									<?php } ?>
								</div>	
							</div>
							</div>		
								<div class="row">
									<div class="col-md-6">

							<div class="form-group">
									<label class="form-label">vaccinated country</label>

<select class="form-control select2-show-search <?php if(form_error('vacc_country')){?>is-invalid<?php } ?>" data-placeholder="Select Country" name="vacc_country" id="vacc_country">
										
	<option selected disabled>Select Country</option>
									

<option <?php if($vacc_country=='Afganistan'){ ?>selected <?php } ?> value="Afganistan">Afganistan</option>
<option <?php if($vacc_country=='Albania'){ ?>selected <?php } ?> value="Albania">Albania</option>
<option <?php if($vacc_country=='Algeria'){ ?>selected <?php } ?> value="Algeria">Algeria</option>
<option <?php if($vacc_country=='American Samoa'){ ?>selected <?php } ?> value="American Samoa">American Samoa</option>
<option <?php if($vacc_country=='Andorra'){ ?>selected <?php } ?> value="Andorra">Andorra</option>
<option <?php if($vacc_country=='Angola'){ ?>selected <?php } ?> value="Angola">Angola</option>
<option <?php if($vacc_country=='Anguilla'){ ?>selected <?php } ?> value="Anguilla">Anguilla</option>
<option <?php if($vacc_country=='Antigua & Barbuda'){ ?>selected <?php } ?> value="Antigua & Barbuda">Antigua & Barbuda</option>
<option <?php if($vacc_country=='Armenia'){ ?>selected <?php } ?> value="Armenia">Armenia</option>
<option <?php if($vacc_country=='Aruba'){ ?>selected <?php } ?> value="Aruba">Aruba</option>
<option <?php if($vacc_country=='Australia'){ ?>selected <?php } ?> value="Australia">Australia</option>
<option <?php if($vacc_country=='Austria'){ ?>selected <?php } ?> value="Austria">Austria</option>
<option <?php if($vacc_country=='Azerbaijan'){ ?>selected <?php } ?> value="Azerbaijan">Azerbaijan</option>
<option <?php if($vacc_country=='Bahamas'){ ?>selected <?php } ?> value="Bahamas">Bahamas</option>
<option <?php if($vacc_country=='Bahrain'){ ?>selected <?php } ?> value="Bahrain">Bahrain</option>
<option <?php if($vacc_country=='Bangladesh'){ ?>selected <?php } ?> value="Bangladesh">Bangladesh</option>
<option <?php if($vacc_country=='Barbados'){ ?>selected <?php } ?> value="Barbados">Barbados</option>
<option <?php if($vacc_country=='Belarus'){ ?>selected <?php } ?> value="Belarus">Belarus</option>
<option <?php if($vacc_country=='Belgium'){ ?>selected <?php } ?> value="Belgium">Belgium</option>
<option <?php if($vacc_country=='Belize'){ ?>selected <?php } ?> value="Belize">Belize</option>
<option <?php if($vacc_country=='Benin'){ ?>selected <?php } ?> value="Benin">Benin</option>
<option <?php if($vacc_country=='Bermuda'){ ?>selected <?php } ?> value="Bermuda">Bermuda</option>
<option <?php if($vacc_country=='Bhutan'){ ?>selected <?php } ?> value="Bhutan">Bhutan</option>
<option <?php if($vacc_country=='Bolivia'){ ?>selected <?php } ?> value="Bolivia">Bolivia</option>
<option <?php if($vacc_country=='Bonaire'){ ?>selected <?php } ?> value="Bonaire">Bonaire</option>
<option <?php if($vacc_country=='Bosnia & Herzegovina'){ ?>selected <?php } ?> value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
<option <?php if($vacc_country=='Botswana'){ ?>selected <?php } ?> value="Botswana">Botswana</option>
<option <?php if($vacc_country=='Brazil'){ ?>selected <?php } ?> value="Brazil">Brazil</option>
<option <?php if($vacc_country=='British Indian Ocean Ter'){ ?>selected <?php } ?> value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option <?php if($vacc_country=='Brunei'){ ?>selected <?php } ?> value="Brunei">Brunei</option>
<option <?php if($vacc_country=='Bulgaria'){ ?>selected <?php } ?> value="Bulgaria">Bulgaria</option>
<option <?php if($vacc_country=='Burkina Faso'){ ?>selected <?php } ?> value="Burkina Faso">Burkina Faso</option>
<option <?php if($vacc_country=='Burundi'){ ?>selected <?php } ?> value="Burundi">Burundi</option>
<option <?php if($vacc_country=='Cambodia'){ ?>selected <?php } ?> value="Cambodia">Cambodia</option>
<option <?php if($vacc_country=='Cameroon'){ ?>selected <?php } ?> value="Cameroon">Cameroon</option>
<option <?php if($vacc_country=='Canada'){ ?>selected <?php } ?> value="Canada">Canada</option>
<option <?php if($vacc_country=='Canary Islands'){ ?>selected <?php } ?> value="Canary Islands">Canary Islands</option>
<option <?php if($vacc_country=='Cape Verde'){ ?>selected <?php } ?> value="Cape Verde">Cape Verde</option>
<option <?php if($vacc_country=='Cayman Islands'){ ?>selected <?php } ?> value="Cayman Islands">Cayman Islands</option>
<option <?php if($vacc_country=='Central African Republic'){ ?>selected <?php } ?> value="Central African Republic">Central African Republic</option>
<option <?php if($vacc_country=='Chad'){ ?>selected <?php } ?> value="Chad">Chad</option>
<option <?php if($vacc_country=='Channel Islands'){ ?>selected <?php } ?> value="Channel Islands">Channel Islands</option>
<option <?php if($vacc_country=='Chile'){ ?>selected <?php } ?> value="Chile">Chile</option>
<option <?php if($vacc_country=='China'){ ?>selected <?php } ?> value="China">China</option>
<option <?php if($vacc_country=='Christmas Island'){ ?>selected <?php } ?> value="Christmas Island">Christmas Island</option>
<option <?php if($vacc_country=='Cocos Island'){ ?>selected <?php } ?> value="Cocos Island">Cocos Island</option>
<option <?php if($vacc_country=='Colombia'){ ?>selected <?php } ?> value="Colombia">Colombia</option>
<option <?php if($vacc_country=='Comoros'){ ?>selected <?php } ?> value="Comoros">Comoros</option>
<option <?php if($vacc_country=='Congo'){ ?>selected <?php } ?> value="Congo">Congo</option>
<option <?php if($vacc_country=='Cook Islands'){ ?>selected <?php } ?> value="Cook Islands">Cook Islands</option>
<option <?php if($vacc_country=='Costa Rica'){ ?>selected <?php } ?> value="Costa Rica">Costa Rica</option>
<option <?php if($vacc_country=='Cote DIvoire'){ ?>selected <?php } ?> value="Cote DIvoire">Cote DIvoire</option>
<option <?php if($vacc_country=='Croatia'){ ?>selected <?php } ?> value="Croatia">Croatia</option>
<option <?php if($vacc_country=='Cuba'){ ?>selected <?php } ?> value="Cuba">Cuba</option>
<option <?php if($vacc_country=='Curaco'){ ?>selected <?php } ?> value="Curaco">Curaco</option>
<option <?php if($vacc_country=='Cyprus'){ ?>selected <?php } ?> value="Cyprus">Cyprus</option>
<option <?php if($vacc_country=='Czech Republic'){ ?>selected <?php } ?> value="Czech Republic">Czech Republic</option>
<option <?php if($vacc_country=='Denmark'){ ?>selected <?php } ?> value="Denmark">Denmark</option>
<option <?php if($vacc_country=='Djibouti'){ ?>selected <?php } ?> value="Djibouti">Djibouti</option>
<option <?php if($vacc_country=='Dominica'){ ?>selected <?php } ?> value="Dominica">Dominica</option>
<option <?php if($vacc_country=='Dominican Republic'){ ?>selected <?php } ?> value="Dominican Republic">Dominican Republic</option>
<option <?php if($vacc_country=='East Timor'){ ?>selected <?php } ?> value="East Timor">East Timor</option>
<option <?php if($vacc_country=='Ecuador'){ ?>selected <?php } ?> value="Ecuador">Ecuador</option>
<option <?php if($vacc_country=='Egypt'){ ?>selected <?php } ?> value="Egypt">Egypt</option>
<option <?php if($vacc_country=='El Salvador'){ ?>selected <?php } ?> value="El Salvador">El Salvador</option>
<option <?php if($vacc_country=='Equatorial Guinea'){ ?>selected <?php } ?> value="Equatorial Guinea">Equatorial Guinea</option>
<option <?php if($vacc_country=='Eritrea'){ ?>selected <?php } ?> value="Eritrea">Eritrea</option>
<option <?php if($vacc_country=='Estonia'){ ?>selected <?php } ?> value="Estonia">Estonia</option>
<option <?php if($vacc_country=='Ethiopia'){ ?>selected <?php } ?> value="Ethiopia">Ethiopia</option>
<option <?php if($vacc_country=='Falkland Islands'){ ?>selected <?php } ?> value="Falkland Islands">Falkland Islands</option>
<option <?php if($vacc_country=='Faroe Islands'){ ?>selected <?php } ?> value="Faroe Islands">Faroe Islands</option>
<option <?php if($vacc_country=='Fiji'){ ?>selected <?php } ?> value="Fiji">Fiji</option>
<option <?php if($vacc_country=='Finland'){ ?>selected <?php } ?> value="Finland">Finland</option>
<option <?php if($vacc_country=='France'){ ?>selected <?php } ?> value="France">France</option>
<option <?php if($vacc_country=='French Guiana'){ ?>selected <?php } ?> value="French Guiana">French Guiana</option>
<option <?php if($vacc_country=='French Polynesia'){ ?>selected <?php } ?> value="French Polynesia">French Polynesia</option>
<option <?php if($vacc_country=='French Southern Ter'){ ?>selected <?php } ?> value="French Southern Ter">French Southern Ter</option>
<option <?php if($vacc_country=='Gabon'){ ?>selected <?php } ?> value="Gabon">Gabon</option>
<option <?php if($vacc_country=='Gambia'){ ?>selected <?php } ?> value="Gambia">Gambia</option>
<option <?php if($vacc_country=='Georgia'){ ?>selected <?php } ?> value="Georgia">Georgia</option>
<option <?php if($vacc_country=='Germany'){ ?>selected <?php } ?> value="Germany">Germany</option>
<option <?php if($vacc_country=='Ghana'){ ?>selected <?php } ?> value="Ghana">Ghana</option>
<option <?php if($vacc_country=='Gibraltar'){ ?>selected <?php } ?> value="Gibraltar">Gibraltar</option>
<option <?php if($vacc_country=='Great Britain'){ ?>selected <?php } ?> value="Great Britain">Great Britain</option>
<option <?php if($vacc_country=='Greece'){ ?>selected <?php } ?> value="Greece">Greece</option>
<option <?php if($vacc_country=='Greenland'){ ?>selected <?php } ?> value="Greenland">Greenland</option>
<option <?php if($vacc_country=='Grenada'){ ?>selected <?php } ?> value="Grenada">Grenada</option>
<option <?php if($vacc_country=='Guadeloupe'){ ?>selected <?php } ?> value="Guadeloupe">Guadeloupe</option>
<option <?php if($vacc_country=='Guam'){ ?>selected <?php } ?> value="Guam">Guam</option>
<option <?php if($vacc_country=='Guatemala'){ ?>selected <?php } ?> value="Guatemala">Guatemala</option>
<option <?php if($vacc_country=='Guinea'){ ?>selected <?php } ?> value="Guinea">Guinea</option>
<option <?php if($vacc_country=='Guyana'){ ?>selected <?php } ?> value="Guyana">Guyana</option>
<option <?php if($vacc_country=='Haiti'){ ?>selected <?php } ?> value="Haiti">Haiti</option>
<option <?php if($vacc_country=='Hawaii'){ ?>selected <?php } ?> value="Hawaii">Hawaii</option>
<option <?php if($vacc_country=='Honduras'){ ?>selected <?php } ?> value="Honduras">Honduras</option>
<option <?php if($vacc_country=='Hong Kong'){ ?>selected <?php } ?> value="Hong Kong">Hong Kong</option>
<option <?php if($vacc_country=='Hungary'){ ?>selected <?php } ?> value="Hungary">Hungary</option>
<option <?php if($vacc_country=='Iceland'){ ?>selected <?php } ?> value="Iceland">Iceland</option>
<option <?php if($vacc_country=='Indonesia'){ ?>selected <?php } ?> value="Indonesia">Indonesia</option>
<option <?php if($vacc_country=='India'){ ?>selected <?php } ?> value="India">India</option>
<option <?php if($vacc_country=='Iran'){ ?>selected <?php } ?> value="Iran">Iran</option>
<option <?php if($vacc_country=='Iraq'){ ?>selected <?php } ?> value="Iraq">Iraq</option>
<option <?php if($vacc_country=='Ireland'){ ?>selected <?php } ?> value="Ireland">Ireland</option>
<option <?php if($vacc_country=='Isle of Man'){ ?>selected <?php } ?> value="Isle of Man">Isle of Man</option>
<option <?php if($vacc_country=='Israel'){ ?>selected <?php } ?> value="Israel">Israel</option>
<option <?php if($vacc_country=='Italy'){ ?>selected <?php } ?> value="Italy">Italy</option>
<option <?php if($vacc_country=='Jamaica'){ ?>selected <?php } ?> value="Jamaica">Jamaica</option>
<option <?php if($vacc_country=='Japan'){ ?>selected <?php } ?> value="Japan">Japan</option>
<option <?php if($vacc_country=='Jordan'){ ?>selected <?php } ?> value="Jordan">Jordan</option>
<option <?php if($vacc_country=='Kazakhstan'){ ?>selected <?php } ?> value="Kazakhstan">Kazakhstan</option>
<option <?php if($vacc_country=='Kenya'){ ?>selected <?php } ?> value="Kenya">Kenya</option>
<option <?php if($vacc_country=='Kiribati'){ ?>selected <?php } ?> value="Kiribati">Kiribati</option>
<option <?php if($vacc_country=='Korea North'){ ?>selected <?php } ?> value="Korea North">Korea North</option>
<option <?php if($vacc_country=='Korea South'){ ?>selected <?php } ?> value="Korea South">Korea South</option>
<option <?php if($vacc_country=='Kuwait'){ ?>selected <?php } ?> value="Kuwait">Kuwait</option>
<option <?php if($vacc_country=='Kyrgyzstan'){ ?>selected <?php } ?> value="Kyrgyzstan">Kyrgyzstan</option>
<option <?php if($vacc_country=='Laos'){ ?>selected <?php } ?> value="Laos">Laos</option>
<option <?php if($vacc_country=='Latvia'){ ?>selected <?php } ?> value="Latvia">Latvia</option>
<option <?php if($vacc_country=='Lebanon'){ ?>selected <?php } ?> value="Lebanon">Lebanon</option>
<option <?php if($vacc_country=='Lesotho'){ ?>selected <?php } ?> value="Lesotho">Lesotho</option>
<option <?php if($vacc_country=='Liberia'){ ?>selected <?php } ?> value="Liberia">Liberia</option>
<option <?php if($vacc_country=='Libya'){ ?>selected <?php } ?> value="Libya">Libya</option>
<option <?php if($vacc_country=='Liechtenstein'){ ?>selected <?php } ?> value="Liechtenstein">Liechtenstein</option>
<option <?php if($vacc_country=='Lithuania'){ ?>selected <?php } ?> value="Lithuania">Lithuania</option>
<option <?php if($vacc_country=='Luxembourg'){ ?>selected <?php } ?> value="Luxembourg">Luxembourg</option>
<option <?php if($vacc_country=='Macau'){ ?>selected <?php } ?> value="Macau">Macau</option>
<option <?php if($vacc_country=='Macedonia'){ ?>selected <?php } ?> value="Macedonia">Macedonia</option>
<option <?php if($vacc_country=='Madagascar'){ ?>selected <?php } ?> value="Madagascar">Madagascar</option>
<option <?php if($vacc_country=='Malaysia'){ ?>selected <?php } ?> value="Malaysia">Malaysia</option>
<option <?php if($vacc_country=='Malawi'){ ?>selected <?php } ?> value="Malawi">Malawi</option>
<option <?php if($vacc_country=='Maldives'){ ?>selected <?php } ?> value="Maldives">Maldives</option>
<option <?php if($vacc_country=='Mali'){ ?>selected <?php } ?> value="Mali">Mali</option>
<option <?php if($vacc_country=='Malta'){ ?>selected <?php } ?> value="Malta">Malta</option>
<option <?php if($vacc_country=='Marshall Islands'){ ?>selected <?php } ?> value="Marshall Islands">Marshall Islands</option>
<option <?php if($vacc_country=='Martinique'){ ?>selected <?php } ?> value="Martinique">Martinique</option>
<option <?php if($vacc_country=='Mauritania'){ ?>selected <?php } ?> value="Mauritania">Mauritania</option>
<option <?php if($vacc_country=='Mauritius'){ ?>selected <?php } ?> value="Mauritius">Mauritius</option>
<option <?php if($vacc_country=='Mayotte'){ ?>selected <?php } ?> value="Mayotte">Mayotte</option>
<option <?php if($vacc_country=='Mexico'){ ?>selected <?php } ?> value="Mexico">Mexico</option>
<option <?php if($vacc_country=='Midway Islands'){ ?>selected <?php } ?> value="Midway Islands">Midway Islands</option>
<option <?php if($vacc_country=='Moldova'){ ?>selected <?php } ?> value="Moldova">Moldova</option>
<option <?php if($vacc_country=='Monaco'){ ?>selected <?php } ?> value="Monaco">Monaco</option>
<option <?php if($vacc_country=='Mongolia'){ ?>selected <?php } ?> value="Mongolia">Mongolia</option>
<option <?php if($vacc_country=='Montserrat'){ ?>selected <?php } ?> value="Montserrat">Montserrat</option>
<option <?php if($vacc_country=='Morocco'){ ?>selected <?php } ?> value="Morocco">Morocco</option>
<option <?php if($vacc_country=='Mozambique'){ ?>selected <?php } ?> value="Mozambique">Mozambique</option>
<option <?php if($vacc_country=='Myanmar'){ ?>selected <?php } ?> value="Myanmar">Myanmar</option>
<option <?php if($vacc_country=='Namibia'){ ?>selected <?php } ?> value="Namibia">Namibia</option>
<option <?php if($vacc_country=='Nauru'){ ?>selected <?php } ?> value="Nauru">Nauru</option>
<option <?php if($vacc_country=='Nepal'){ ?>selected <?php } ?> value="Nepal">Nepal</option>
<option <?php if($vacc_country=='Netherland Antilles'){ ?>selected <?php } ?> value="Netherland Antilles">Netherland Antilles</option>
<option <?php if($vacc_country=='Netherlands'){ ?>selected <?php } ?> value="Netherlands">Netherlands</option>
<option <?php if($vacc_country=='Nevis'){ ?>selected <?php } ?> value="Nevis">Nevis</option>
<option <?php if($vacc_country=='New Caledonia'){ ?>selected <?php } ?> value="New Caledonia">New Caledonia</option>
<option <?php if($vacc_country=='New Zealand'){ ?>selected <?php } ?> value="New Zealand">New Zealand</option>
<option <?php if($vacc_country=='Nicaragua'){ ?>selected <?php } ?> value="Nicaragua">Nicaragua</option>
<option <?php if($vacc_country=='Niger'){ ?>selected <?php } ?> value="Niger">Niger</option>
<option <?php if($vacc_country=='Nigeria'){ ?>selected <?php } ?> value="Nigeria">Nigeria</option>
<option <?php if($vacc_country=='Niue'){ ?>selected <?php } ?> value="Niue">Niue</option>
<option <?php if($vacc_country=='Norfolk Island'){ ?>selected <?php } ?> value="Norfolk Island">Norfolk Island</option>
<option <?php if($vacc_country=='Norway'){ ?>selected <?php } ?> value="Norway">Norway</option>
<option <?php if($vacc_country=='Oman'){ ?>selected <?php } ?> value="Oman">Oman</option>
<option <?php if($vacc_country=='Pakistan'){ ?>selected <?php } ?> value="Pakistan">Pakistan</option>
<option <?php if($vacc_country=='Palau Island'){ ?>selected <?php } ?> value="Palau Island">Palau Island</option>
<option <?php if($vacc_country=='Palestine'){ ?>selected <?php } ?> value="Palestine">Palestine</option>
<option <?php if($vacc_country=='Panama'){ ?>selected <?php } ?> value="Panama">Panama</option>
<option <?php if($vacc_country=='Papua New Guinea'){ ?>selected <?php } ?> value="Papua New Guinea">Papua New Guinea</option>
<option <?php if($vacc_country=='Paraguay'){ ?>selected <?php } ?> value="Paraguay">Paraguay</option>
<option <?php if($vacc_country=='Peru'){ ?>selected <?php } ?> value="Peru">Peru</option>
<option <?php if($vacc_country=='Phillipines'){ ?>selected <?php } ?> value="Phillipines">Phillipines</option>
<option <?php if($vacc_country=='Pitcairn Island'){ ?>selected <?php } ?> value="Pitcairn Island">Pitcairn Island</option>
<option <?php if($vacc_country=='Poland'){ ?>selected <?php } ?> value="Poland">Poland</option>
<option <?php if($vacc_country=='Portugal'){ ?>selected <?php } ?> value="Portugal">Portugal</option>
<option <?php if($vacc_country=='Puerto Rico'){ ?>selected <?php } ?> value="Puerto Rico">Puerto Rico</option>
<option <?php if($vacc_country=='Qatar'){ ?>selected <?php } ?> value="Qatar">Qatar</option>
<option <?php if($vacc_country=='Republic of Montenegro'){ ?>selected <?php } ?> value="Republic of Montenegro">Republic of Montenegro</option>
<option <?php if($vacc_country=='Republic of Serbia'){ ?>selected <?php } ?> value="Republic of Serbia">Republic of Serbia</option>
<option <?php if($vacc_country=='Reunion'){ ?>selected <?php } ?> value="Reunion">Reunion</option>
<option <?php if($vacc_country=='Romania'){ ?>selected <?php } ?> value="Romania">Romania</option>
<option <?php if($vacc_country=='Russia'){ ?>selected <?php } ?> value="Russia">Russia</option>
<option <?php if($vacc_country=='Rwanda'){ ?>selected <?php } ?> value="Rwanda">Rwanda</option>
<option <?php if($vacc_country=='St Barthelemy'){ ?>selected <?php } ?> value="St Barthelemy">St Barthelemy</option>
<option <?php if($vacc_country=='St Eustatius'){ ?>selected <?php } ?> value="St Eustatius">St Eustatius</option>
<option <?php if($vacc_country=='St Helena'){ ?>selected <?php } ?> value="St Helena">St Helena</option>
<option <?php if($vacc_country=='St Kitts-Nevis'){ ?>selected <?php } ?> value="St Kitts-Nevis">St Kitts-Nevis</option>
<option <?php if($vacc_country=='St Lucia'){ ?>selected <?php } ?> value="St Lucia">St Lucia</option>
<option <?php if($vacc_country=='St Maarten'){ ?>selected <?php } ?> value="St Maarten">St Maarten</option>
<option <?php if($vacc_country=='St Pierre & Miquelon'){ ?>selected <?php } ?> value="St Pierre & Miquelon">St Pierre & Miquelon</option>
<option <?php if($vacc_country=='St Vincent & Grenadines'){ ?>selected <?php } ?> value="St Vincent & Grenadines">St Vincent & Grenadines</option>
<option <?php if($vacc_country=='Saipan'){ ?>selected <?php } ?> value="Saipan">Saipan</option>
<option <?php if($vacc_country=='Samoa'){ ?>selected <?php } ?> value="Samoa">Samoa</option>
<option <?php if($vacc_country=='Samoa American'){ ?>selected <?php } ?> value="Samoa American">Samoa American</option>
<option <?php if($vacc_country=='San Marino'){ ?>selected <?php } ?> value="San Marino">San Marino</option>
<option <?php if($vacc_country=='Sao Tome & Principe'){ ?>selected <?php } ?> value="Sao Tome & Principe">Sao Tome & Principe</option>
<option <?php if($vacc_country=='Saudi Arabia'){ ?>selected <?php } ?> value="Saudi Arabia">Saudi Arabia</option>
<option <?php if($vacc_country=='Senegal'){ ?>selected <?php } ?> value="Senegal">Senegal</option>
<option <?php if($vacc_country=='Seychelles'){ ?>selected <?php } ?> value="Seychelles">Seychelles</option>
<option <?php if($vacc_country=='Sierra Leone'){ ?>selected <?php } ?> value="Sierra Leone">Sierra Leone</option>
<option <?php if($vacc_country=='Singapore'){ ?>selected <?php } ?> value="Singapore">Singapore</option>
<option <?php if($vacc_country=='Slovakia'){ ?>selected <?php } ?> value="Slovakia">Slovakia</option>
<option <?php if($vacc_country=='Slovenia'){ ?>selected <?php } ?> value="Slovenia">Slovenia</option>
<option <?php if($vacc_country=='Solomon Islands'){ ?>selected <?php } ?> value="Solomon Islands">Solomon Islands</option>
<option <?php if($vacc_country=='Somalia'){ ?>selected <?php } ?> value="Somalia">Somalia</option>
<option <?php if($vacc_country=='Somalia'){ ?>selected <?php } ?> value="Somalia">Somalia</option>
<option <?php if($vacc_country=='South Africa'){ ?>selected <?php } ?> value="South Africa">South Africa</option>
<option <?php if($vacc_country=='Spain'){ ?>selected <?php } ?> value="Spain">Spain</option>
<option <?php if($vacc_country=='Sri Lanka'){ ?>selected <?php } ?> value="Sri Lanka">Sri Lanka</option>
<option <?php if($vacc_country=='Sudan'){ ?>selected <?php } ?> value="Sudan">Sudan</option>
<option <?php if($vacc_country=='Suriname'){ ?>selected <?php } ?> value="Suriname">Suriname</option>
<option <?php if($vacc_country=='Swaziland'){ ?>selected <?php } ?> value="Swaziland">Swaziland</option>
<option <?php if($vacc_country=='Sweden'){ ?>selected <?php } ?> value="Sweden">Sweden</option>
<option <?php if($vacc_country=='Switzerland'){ ?>selected <?php } ?> value="Switzerland">Switzerland</option>
<option <?php if($vacc_country=='Syria'){ ?>selected <?php } ?> value="Syria">Syria</option>
<option <?php if($vacc_country=='Tahiti'){ ?>selected <?php } ?> value="Tahiti">Tahiti</option>
<option <?php if($vacc_country=='Taiwan'){ ?>selected <?php } ?> value="Taiwan">Taiwan</option>
<option <?php if($vacc_country=='Tajikistan'){ ?>selected <?php } ?> value="Tajikistan">Tajikistan</option>
<option <?php if($vacc_country=='Tanzania'){ ?>selected <?php } ?> value="Tanzania">Tanzania</option>
<option <?php if($vacc_country=='Thailand'){ ?>selected <?php } ?> value="Thailand">Thailand</option>
<option <?php if($vacc_country=='Togo'){ ?>selected <?php } ?> value="Togo">Togo</option>
<option <?php if($vacc_country=='Tokelau '){ ?>selected <?php } ?> value="Tokelau ">Tokelau </option>
<option <?php if($vacc_country=='Tonga'){ ?>selected <?php } ?> value="Tonga ">Tonga </option>
<option <?php if($vacc_country=='Trinidad & Tobago'){ ?>selected <?php } ?> value="Trinidad & Tobago">Trinidad & Tobago</option>
<option <?php if($vacc_country=='Tunisia '){ ?>selected <?php } ?> value="Tunisia ">Tunisia </option>
<option <?php if($vacc_country=='Turkey'){ ?>selected <?php } ?> value="Turkey ">Turkey </option>
<option <?php if($vacc_country=='Turkmenistan'){ ?>selected <?php } ?> value="Turkmenistan">Turkmenistan</option>
<option <?php if($vacc_country=='Turks & Caicos Is'){ ?>selected <?php } ?> value="Turks & Caicos Is">Turks & Caicos Is</option>
<option <?php if($vacc_country=='Tuvalu'){ ?>selected <?php } ?> value="Tuvalu">Tuvalu</option>
<option <?php if($vacc_country=='Uganda'){ ?>selected <?php } ?> value="Uganda">Uganda</option>
<option <?php if($vacc_country=='United Kingdom'){ ?>selected <?php } ?> value="United Kingdom">United Kingdom</option>
<option <?php if($vacc_country=='Ukraine'){ ?>selected <?php } ?> value="Ukraine">Ukraine</option>
<option <?php if($vacc_country=='United Arab Erimates'){ ?>selected <?php } ?> value="United Arab Erimates">United Arab Erimates</option>
<option <?php if($vacc_country=='United States of America'){ ?>selected <?php } ?> value="United States of America">United States of America</option>
<option <?php if($vacc_country=='Uraguay'){ ?>selected <?php } ?> value="Uraguay">Uraguay</option>
<option <?php if($vacc_country=='Uzbekistan'){ ?>selected <?php } ?> value="Uzbekistan">Uzbekistan</option>
<option <?php if($vacc_country=='Vanuatu'){ ?>selected <?php } ?> value="Vanuatu">Vanuatu</option>
<option <?php if($vacc_country=='Vatican City State'){ ?>selected <?php } ?> value="Vatican City State">Vatican City State</option>
<option <?php if($vacc_country=='Venezuela'){ ?>selected <?php } ?> value="Venezuela">Venezuela</option>
<option <?php if($vacc_country=='Vietnam'){ ?>selected <?php } ?> value="Vietnam">Vietnam</option>
<option <?php if($vacc_country=='Virgin Islands (Brit)'){ ?>selected <?php } ?> value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option <?php if($vacc_country=='Virgin Islands (USA)'){ ?>selected <?php } ?> value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option <?php if($vacc_country=='Wake Island'){ ?>selected <?php } ?> value="Wake Island">Wake Island</option>
<option <?php if($vacc_country=='Wallis & Futana Is'){ ?>selected <?php } ?> value="Wallis & Futana Is">Wallis & Futana Is</option>
<option <?php if($vacc_country=='Yemen'){ ?>selected <?php } ?> value="Yemen">Yemen</option>
<option <?php if($vacc_country=='Zaire'){ ?>selected <?php } ?> value="Zaire">Zaire</option>
<option <?php if($vacc_country=='Zambia'){ ?>selected <?php } ?> value="Zambia">Zambia</option>
<option <?php if($vacc_country=='Zimbabwe'){ ?>selected <?php } ?> value="Zimbabwe">Zimbabwe</option>

</select>
									<?php if(form_error('vacc_country')){?>
									<div class="invalid-feedback">Please select a country</div>
									<?php } ?>
								</div>	
							</div>
									
									<div class=" col-md-3">
										<div class="form-group">
											<label class="form-label">1st dose</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker <?php if(form_error('first_dose')){?>is-invalid<?php } ?>" placeholder="MM/DD/YYYY" type="text" name="first_dose" id="first_dose" value=<?= $_1st_dose ?>>
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label class="form-label">2nd dose</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div><input class="form-control fc-datepicker <?php if(form_error('second_dose')){?>is-invalid<?php } ?>" placeholder="MM/DD/YYYY" type="text" name="second_dose" id="second_dose" value=<?= $_2nd_dose ?>>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<div class="d-flex">
							<button type="submit" class="btn btn-primary ml-auto">Save</button>
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
/*$(document).ready(function(){
	var type = <?= set_value('emp_type', true); ?>;
	if(type==1){
		$('#supplier_id').prop('disabled', true);
		$('#labour_card_no').prop('disabled', false);
		$('#labour_card_exp_date').prop('disabled', false);
		$('#uid').prop('disabled', false);
		$('#visa_job_desc').prop('disabled', false);
		$('#basic_salary').prop('disabled', false);
		$('#staff_status').prop('disabled', false);
		$('#labour_contract_type').prop('disabled', false);
		$('#emp_join_date').prop('disabled', false);
		$('#dob').prop('disabled', false);
		$('#group_insurance_add_status').prop('disabled', false);
	}
	else
	{
			$('#supplier_id').prop('disabled', false);
			$('#labour_card_no').prop('disabled', true);
			$('#labour_card_exp_date').prop('disabled', true);
			$('#uid').prop('disabled', true);
			$('#visa_job_desc').prop('disabled', true);
			$('#basic_salary').prop('disabled', true);
			$('#staff_status').prop('disabled', true);
			$('#labour_contract_type').prop('disabled', true);
			$('#emp_join_date').prop('disabled', true);
			$('#dob').prop('disabled', true);
			$('#group_insurance_add_status').prop('disabled', true);
	}

	$('input[type=radio][name=emp_type]').change(function() {
	    if (this.value == '1') {
		    	$('#supplier_id').prop('disabled', true);
			$('#labour_card_no').prop('disabled', false);
			$('#labour_card_exp_date').prop('disabled', false);
			$('#uid').prop('disabled', false);
			$('#visa_job_desc').prop('disabled', false);
			$('#basic_salary').prop('disabled', false);
			$('#staff_status').prop('disabled', false);
			$('#labour_contract_type').prop('disabled', false);
			$('#emp_join_date').prop('disabled', false);
			$('#dob').prop('disabled', false);
			$('#group_insurance_add_status').prop('disabled', false);
	    }
	    else if (this.value == '2') {
	    		$('#supplier_id').prop('disabled', false);
			$('#labour_card_no').prop('disabled', true);
			$('#labour_card_exp_date').prop('disabled', true);
			$('#uid').prop('disabled', true);
			$('#visa_job_desc').prop('disabled', true);
			$('#basic_salary').prop('disabled', true);
			$('#staff_status').prop('disabled', true);
			$('#labour_contract_type').prop('disabled', true);
			$('#emp_join_date').prop('disabled', true);
			$('#dob').prop('disabled', true);
			$('#group_insurance_add_status').prop('disabled', true);
	    }
	});*/
	/*$("#c_id").on("change",function(){			

    var id = $(this).val();
    var ss_id = $("#ss_id").val();
         $.ajax({
			url:'<?=base_url()?>Tickets/getServiceList',
			method: 'post',
			data: {id:id,ss_id:ss_id},
			dataType: 'html',
			success: function(response){
			$('#s_id').html(response);      
			}
			});
    })

    $("#location").on("change",function(){			

    var location = $(this).val();
    if(location=="onsite"){
    	$("#loc").show();
	}
	else
	{
		$("#loc").hide();
		$("#location_name").val("");
	}
    })

    $("#type").on("change",function(){			

    var type = $(this).val();
    if(type.indexOf('Implementation Task') != -1){
    	$("#sales").show();
	}
	else
	{
		$("#sales").hide();
		$("#salesman").val("");
	}

	if(type.indexOf('Sales Order') != -1){
    	$("#sales_order").show();
	}
	else
	{
		$("#sales_order").hide();
		$("#sales_order_no").val("");
	}

	if(type.indexOf('Hardware Asst.') != -1){
    	$("#hardware").show();
	}
	else
	{
		$("#hardware").hide();
		$("#hardware_asst").val("");
	}
	
    })
} );
$(document).ready(function(){
    var id = $("#c_id").val();
    var ss_id = $("#ss_id").val();
         $.ajax({
			url:'<?=base_url()?>Tickets/getServiceList',
			method: 'post',
			data: {id:id,ss_id:ss_id},
			dataType: 'html',
			success: function(response){
			$('#s_id').html(response);  
			}
			});

    var location = $("#location").val();
    if(location=="onsite"){
    	$("#loc").show();
	}
	else
	{
		$("#loc").hide();
		$("#location_name").val("");
	}

	var type = $("#type").val();
    if(type.indexOf('Implementation Task') != -1){
    	$("#sales").show();
	}
	else
	{
		$("#sales").hide();
		$("#salesman").val("");
	}

	if(type.indexOf('Sales Order') != -1){
    	$("#sales_order").show();
	}
	else
	{
		$("#sales_order").hide();
		$("#sales_order_no").val("");
	}

	if(type.indexOf('Hardware Asst.') != -1){
    	$("#hardware").show();
	}
	else
	{
		$("#hardware").hide();
		$("#hardware_asst").val("");
	}


} );*/
       
$(document).ready(function(){
	$("#emp_id").on("change",function(){			
    var id = $("#emp_id").val();
    
    if(id != "NULL"){
    $.ajax({
		url:'<?=base_url()?>Employee/getSingleEmployeeVaccinationDetails2',
		method: 'post',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			
			
			$("#site_id").val(response.site_id).change();
			$("#vacc_name").val(response.vaccine_name);  
			$("#1st_dose").val(response.first_dose);
			$("#2nd_dose").val(response.second_dose); 
		}
		});
	}
	else
	{
		$("#site_id").val("");   
		$("#vacc_name").val("1");
		$("#1st_dose").val("");
		$("#2nd_dose").val("");
	}
    })
} );

</script>
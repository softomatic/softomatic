@extends('layouts.form-app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>EMPLOYEE</h2>
            <div class="flash-message" id="success-alert">
	            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))
					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
			    @endforeach
			</div>
        </div>

        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT EMPLOYEE</h2>                            
                            
                        </div>
                        <div class="body">    
                        	<form id="update_emp_form" method="POST" action="edit-employee/submit" enctype="multipart/form-data">
                        		@csrf
                        		@foreach($emps as $emp)                            	
                            	<input type="hidden" name="emp_id" value="{{ $emp->id }}">
                            	<div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
                            		<fieldset>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading1">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                    Personal Details
                                                    <i class="material-icons mycheck" id="mycheck1">check</i>
                                                </a>

                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                	<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="title">Title <span class="text-danger">*</span></label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select autocomplete="none" type="text" name="title" id="title" class="form-control select2" placeholder="Title">
				            							<option></option>
				            							<!-- <option selected data-default>Select Gender</option> -->
				            							@if($emp->title == 'Mr')
      														<option value="Mr" selected>Mr</option>
														@else
      														<option value="Mr">Mr</option>
														@endif
														@if($emp->title == 'Ms')
      														<option value="Ms" selected>Ms</option>
														@else
      														<option value="Ms">Ms</option>
														@endif
														@if($emp->title == 'Mrs')
      														<option value="Mrs" selected>Mrs</option>
														@else
      														<option value="Mrs">Mrs</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('title') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
                                        <div class="row clearfix">
			                                <div class="form-group">
			                                	<div class="col-md-4 col-sm-6 col-xs-12">
			                                		<label for="first_name">First Name <span class="text-danger">*</span></label>
			                                	</div>
			                                	<div class="col-md-8 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{ $emp->first_name }}" >
					            						<span class="text-danger">{{ $errors->first('first_name') }}</span>
					            					</div>
					            				</div>
				            				</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="middle_name">Middle Name</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" value="{{ $emp->middle_name }}" >
				            						<span class="text-danger">{{ $errors->first('middle_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="last_name">Last Name <span class="text-danger">*</span></label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ $emp->last_name }}" >
				            						<span class="text-danger">{{ $errors->first('last_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="blood_group">Blood Group</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select autocomplete="none" type="text" name="blood_group" id="blood_group" class="form-control" placeholder="Blood Group">
				            							<option value="">Select Blood Group</option>
		                                                <option value="O+" <?php if($emp->blood_group=='O+') echo "selected"; ?>>O+</option>
		                                                <option value="O-" <?php if($emp->blood_group=='O-') echo "selected"; ?>>O-</option>
		                                                <option value="A+" <?php if($emp->blood_group=='A+') echo "selected"; ?>>A+</option>
		                                                <option value="A-" <?php if($emp->blood_group=='A-') echo "selected"; ?>>A-</option>
		                                                <option value="B+" <?php if($emp->blood_group=='B+') echo "selected"; ?>>B+</option>
		                                                <option value="B-" <?php if($emp->blood_group=='B-') echo "selected"; ?>>B-</option>
		                                                <option value="AB+" <?php if($emp->blood_group=='AB+') echo "selected"; ?>>AB+</option>
		                                                <option value="AB-" <?php if($emp->blood_group=='AB-') echo "selected"; ?>>AB-</option>
				            						</select>
				            						<!-- <input autocomplete="none" type="text" name="blood_group" id="blood_group" class="form-control" placeholder="Blood Group" value="{{ $emp->blood_group }}" > -->
				            						<span class="text-danger">{{ $errors->first('blood_group') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="dob">Date Of Birth</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="dob" id="dob" class="form-control datepicker" placeholder="Date Of Birth" value="{{ date('Y-m-d',strtotime($emp->dob)) }}" >
				            						<span class="text-danger">{{ $errors->first('dob') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="mobile">Mobile <span class="text-danger">*</span></label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" value="{{ $emp->mobile }}" >
				            						<span class="text-danger">{{ $errors->first('mobile') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="gender">Gender</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick" name="gender" id="gender" placeholder="Gender" >
				            							<!-- <option selected data-default>Select Gender</option> -->
				            							@if($emp->gender == 'female')
      														<option value="female" selected>Female</option>
														@else
      														<option value="female">Female</option>
														@endif
														@if($emp->gender == 'male')
      														<option value="male" selected>Male</option>
														@else
      														<option value="male">Male</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('gender') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="category">Category</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick select2" name="category" id="category" placeholder="Category" >
				            							<option></option>
				            							<!-- <option selected data-default>Select Gender</option> -->
				            							@if($emp->category == 'General')
      														<option value="General" selected>General</option>
														@else
      														<option value="General">General</option>
														@endif
														@if($emp->category == 'OBC')
      														<option value="OBC" selected>OBC</option>
														@else
      														<option value="OBC">OBC</option>
														@endif
														@if($emp->category == 'ST/SC')
      														<option value="ST/SC" selected>ST/SC</option>
														@else
      														<option value="ST/SC">ST/SC</option>
														@endif
														@if($emp->category == 'Other')
      														<option value="Other" selected>Other</option>
														@else
      														<option value="Other">Other</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('category') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="marital_status">Marital Status</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						
					            						<select class="form-control show-tick" id="marital_status" placeholder="Marital Status"  name="marital_status">
												@if($emp->marital_status == 'married')
													<option value="married" selected>Married</option>
												@else
													<option value="married">Married</option>
												@endif

												@if($emp->marital_status == 'single')
													<option value="single" selected>Single</option>
												@else
													<option value="single">Single</option>
												@endif

												@if($emp->marital_status == 'other')
													<option value="other" selected>Other</option>
												@else
													<option value="other">Other</option>
												@endif

					            						</select>
					            						<span class="text-danger">{{ $errors->first('marital_status') }}</span>
				            						
				            					</div>
				            				</div>
			            				</div>			            				
		            				</div>
		            				</div>
		            				<div class="col-md-6">

		            					<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="email">Email <span class="text-danger">*</span></label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="email" name="email" id="email" class="form-control" placeholder="Email Id" value="{{ $emp->email }}" >
				            						<span class="text-danger">{{ $errors->first('email') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

		            					<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="local_address">Adhaar Number</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" name="adhaar_number" id="adhaar_number" class="form-control" placeholder="Adhaar Number" value="{{ $emp->adhaar_number }}">
				            						<span class="text-danger">{{ $errors->first('adhaar_number') }}</span>
				            					</div>
				            				</div>
				            			</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="local_address">PAN Number</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" name="pan_number" id="pan_number" class="form-control" placeholder="PAN Number" value="{{ $emp->pan_number }}">
				            						<span class="text-danger">{{ $errors->first('pan_number') }}</span>
				            					</div>
				            				</div>
				            			</div>
			            				</div>

		            					<div class="row clearfix">
		                                <div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="local_address">Local Address</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<textarea autocomplete="none" rows="2" name="local_address" id="local_address" class="form-control no-resize" placeholder="Local Address" >{{ $emp->local_address }}</textarea>
				            						<span class="text-danger">{{ $errors->first('local_address') }}</span>
				            					</div>
				            				</div>
				            			</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-12">
			            					<!-- <div class="form-line"> -->
			            						<input autocomplete="none" type="checkbox" id="md_checkbox_22" class="filled-in chk-col-pink">
			            						<label for="md_checkbox_22" style="font-size: 14px"><b>Permanent Address is same as local address</b></label><!-- Block - 69/A, Camp-1, Road No. - 18, Bhilai, Post- Supela, District- Durg, Chhattisgarh.-->
			            					<!-- </div> -->
			            					</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="permanent_address">Permanent Address</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						 <textarea autocomplete="none" rows="2" name="permanent_address" id="permanent_address" class="form-control no-resize" placeholder="Permanent Address" >{{ $emp->permanent_address }}</textarea>
				            						 <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
				            					</div>
				            				</div>
			            				</div>	
			            				</div>
			            				<div class="row clearfix">	            				
			            				<div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="photo">Photograph</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<!-- <span><small>Upload Photograph Here</small></span> -->
				            						<input autocomplete="none" type="file" name="photo" id="photo" class="form-control" placeholder="Photograph" value="{{ $emp->photo }}" >
				            						<small><a href="{{ $emp->photo }}" target="_blank">{{ $emp->photo }}</a></small>
				            						<div id='imagePreview'></div>
				            						<span class="text-danger">{{ $errors->first('photo') }}</span>			
				            					</div>
				            				</div>
			            				</div>
			            			</div>
                                    </div>

                                    <div class="col-md-12">
                                    	<label><h4><u>On Emergency Contact To</u></h4></label>
                                    	<div class="row clearfix">
                                    		<div class="form-group">
			                                	<div class="col-md-2 col-sm-6 col-xs-12">
			                                		<label for="emergency_call_person">Person Name</label>
			                                	</div>
			                                	<div class="col-md-4 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" name="emergency_call_person" id="emergency_call_person" class="form-control" placeholder="Person Name" value="{{ $emp->emergency_call_person }}">
					            						<span class="text-danger">{{ $errors->first('emergency_call_person') }}</span>
					            					</div>
					            				</div>
					            			
			                                	<div class="col-md-2 col-sm-6 col-xs-12">
			                                		<label for="emergency_call_number">Contact Number</label>
			                                	</div>
			                                	<div class="col-md-4 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="number" name="emergency_call_number" id="emergency_call_number" class="form-control" placeholder="Contact Number" value="{{ $emp->emergency_call_number }}">
					            						<span class="text-danger">{{ $errors->first('emergency_call_number') }}</span>
					            					</div>
					            				</div>
					            			</div>
	            						</div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                            	<div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading6">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                                    Family Details
                                                    <i class="material-icons mycheck" id="mycheck6">check</i>
                                                </a>

                                            </h4>
                                        </div>
                                        <div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading6">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                        @if(sizeof($family)!=0)
                                        @foreach($family as $fam)
                                        <?php $father = json_decode($fam->father,true);
                                        	  $mother = json_decode($fam->mother,true);
                                        	  $spouse = json_decode($fam->spouse,true);
                                        	  $children = json_decode($fam->children,true);
                                        	  $no_of_children = sizeof($children); ?><input type="hidden" name="child_no" value="{{$no_of_children}}" id="child_no">
                                        

		                                <div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="father_name">Father Name</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_name" id="father_name" class="form-control" placeholder="Father Name" value="{{ $father['father_name'] }}" >
				            						<span class="text-danger">{{ $errors->first('father_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="father_dob">Father DOB</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_dob" id="father_dob" class="form-control datepicker" placeholder="Father DOB" value="{{ $father['father_dob'] }}" >
				            						<span class="text-danger">{{ $errors->first('father_dob') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				
			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="mother_name">Mother Name</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother Name" value="{{ $mother['mother_name'] }}" >
				            						<span class="text-danger">{{ $errors->first('mother_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="mother_dob">Mother DOB</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="mother_dob" id="mother_dob" class="form-control datepicker" placeholder="Mother DOB" value="{{ $mother['mother_dob'] }}" >
				            						<span class="text-danger">{{ $errors->first('mother_dob') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				
			            				<div class="row clearfix spouse">
												<div class="form-group">
				                                	<div class="col-md-4 col-sm-6 col-xs-12">
				                                		<label for="spouse_name">Spouse Name</label>
				                                	</div>
				                                	<div class="col-md-8 col-sm-6 col-xs-12">
						            					<div class="form-line">
						            						<input autocomplete="none" type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Spouse Name" value="{{ $spouse['spouse_name'] }}" >
						            						<span class="text-danger">{{ $errors->first('spouse_name') }}</span>
						            					</div>
						            				</div>
					            				</div>
				            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="spouse_gender">Spouse Gender</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick select2" name="spouse_gender" id="spouse_gender" placeholder="Spouse Gender" >
				            							<option></option>
				            							@if($spouse['spouse_gender'] == 'female')
      														<option value="female" selected>Female</option>
														@else
      														<option value="female">Female</option>
														@endif
														@if($emp['spouse_gender'] == 'female')
      														<option value="male" selected>Male</option>
														@else
      														<option value="male">Male</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('spouse_gender') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix spouse">
			            					<div class="form-group">
				            					<div class="col-md-4 col-sm-6 col-xs-12">
			                                		<label for="spouse_dob">Spouse DOB</label>
			                                	</div>
			                                	<div class="col-md-8 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="spouse_dob" id="spouse_dob" class="form-control datepicker" placeholder="Spouse DOB" value="{{ $spouse['spouse_dob'] }}" >
					            						<span class="text-danger">{{ $errors->first('spouse_dob') }}</span>
					            					</div>
					            				</div>
				            				</div>
				            			</div>

		            					</div>
	            						<div class="col-md-6">
	            							<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="father_adhaar">Father Adhaar Number</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="number" name="father_adhaar" id="father_adhaar" class="form-control" placeholder="Father Adhaar Number" value="{{ $father['father_adhaar'] }}">
				            						<span class="text-danger">{{ $errors->first('father_adhaar') }}</span>
				            					</div>
				            				</div>
				            			</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="father_place">Father Place of Stay</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_place" id="father_place" class="form-control" placeholder="Father place of stay" value="{{ $father['father_place'] }}" >
				            						<span class="text-danger">{{ $errors->first('father_place') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix">
			            					<div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="mother_adhaar">Mother Adhaar Number</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="number" name="mother_adhaar" id="mother_adhaar" class="form-control" placeholder="Mother Adhaar Number" value="{{ $mother['mother_adhaar'] }}">
					            						<span class="text-danger">{{ $errors->first('mother_adhaar') }}</span>
					            					</div>
					            				</div>
					            			</div>
			            				</div>

			            				<div class="row clearfix">
			            					<div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="mother_place">Mother Place of Stay</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="mother_place" id="mother_place" class="form-control" placeholder="Mother place of stay" value="{{ $mother['mother_place'] }}" >
					            						<span class="text-danger">{{ $errors->first('mother_place') }}</span>
					            					</div>
					            				</div>
				            				</div>
			            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="spouse_adhaar">Spouse Adhaar Number</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="number" name="spouse_adhaar" id="spouse_adhaar" class="form-control" placeholder="Spouse Adhaar Number" value="{{ $spouse['spouse_adhaar'] }}">
					            						<span class="text-danger">{{ $errors->first('spouse_adhaar') }}</span>
					            					</div>
					            				</div>
					            			</div>
				            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="spouse_place">Spouse Place of Stay</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="spouse_place" id="spouse_place" class="form-control" placeholder="Spouse place of stay" value="{{ $spouse['spouse_place'] }}" >
					            						<span class="text-danger">{{ $errors->first('mother_place') }}</span>
					            					</div>
					            				</div>
				            				</div>
				            				</div>  

				            				<div class="row clearfix spouse"><div class="form-group">
			            					<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="spouse_gender">No Of Children</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick select2" name="no_of_children" id="no_of_children" placeholder="No Of Children" >
				            							<option value="">Select No Of Children</option>
				            							@if($no_of_children == '1')
      														<option value="1" selected>1</option>
														@else
      														<option value="1">1</option>
														@endif
														@if($no_of_children == '2')
      														<option value="2" selected>2</option>
														@else
      														<option value="2">2</option>
														@endif
														@if($no_of_children == '3')
      														<option value="3" selected>3</option>
														@else
      														<option value="3">3</option>
														@endif
														@if($no_of_children == '4')
      														<option value="4" selected>4</option>
														@else
      														<option value="4">4</option>
														@endif
														@if($no_of_children == '5')
      														<option value="5" selected>5</option>
														@else
      														<option value="5">5</option>
														@endif
														@if($no_of_children == '6')
      														<option value="6" selected>6</option>
														@else
      														<option value="6">6</option>
														@endif
														@if($no_of_children == '7')
      														<option value="7" selected>7</option>
														@else
      														<option value="7">7</option>
														@endif
														@if($no_of_children == '8')
      														<option value="8" selected>8</option>
														@else
      														<option value="8">8</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('spouse_gender') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

                                        </div>
                                        <div class="col-md-12 spouse">
                                        	<table class="table table-bordered table-striped table-hover" id="children_detail">
                                        		<thead>
	                                        		<tr class="bg-cyan">
	                                        			<th>Name</th>
	                                        			<th>Gender</th>
	                                        			<th>DOB</th>
	                                        			<th>Adhaar Number</th>
	                                        			<th>Place Of Stay</th>
	                                        		</tr>
                                        		</thead>
                                        		<tbody id="children_tbody">
                                        			@if($no_of_children>0) 
                                        			@foreach($children as $child)<?php $child = json_decode($child); ?>
                                        			<tr>
                                        				<td><input type="text" name="child_name[]" class="form-control" placeholder="Child Name" value="{{$child->child_name}}"></td>
                                        				<td>
                                        					<select name="child_gender[]" class="form-control select2 child_gender" placeholder="Child Gender">
                                        						<option value="">Gender</option>
					            								<option value="female">Female</option>
																<option value="male">Male</option>
															</select>
				            							</td>
                                        				<td><input type="text" name="child_dob[]" class="form-control" placeholder="YYYY-MM-DD" value="{{$child->child_dob}}"></td>
                                        				<td><input type="text" name="child_adhaar[]" class="form-control" placeholder="Adhaar Number" value="{{$child->child_adhaar}}"></td>
                                        				<td><input type="text" name="child_place[]" class="form-control" placeholder="Place Of Stay" value="{{$child->child_place}}"></td>
                                        			</tr>
                                        			@endforeach
                                        			@endif
                                        		</tbody>
                                        	</table>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                     <div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="father_name">Father Name</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_name" id="father_name" class="form-control" placeholder="Father Name" value="{{ old('father_name') }}" >
				            						<span class="text-danger">{{ $errors->first('father_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="father_dob">Father DOB</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_dob" id="father_dob" class="form-control datepicker" placeholder="Father DOB" value="{{ old('father_dob') }}" >
				            						<span class="text-danger">{{ $errors->first('father_dob') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				
			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="mother_name">Mother Name</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother Name" value="{{ old('mother_name') }}" >
				            						<span class="text-danger">{{ $errors->first('mother_name') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				<div class="row clearfix"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="mother_dob">Mother DOB</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="mother_dob" id="mother_dob" class="form-control datepicker" placeholder="Mother DOB" value="{{ old('mother_dob') }}" >
				            						<span class="text-danger">{{ $errors->first('mother_dob') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>
			            				
			            				<div class="row clearfix spouse">
												<div class="form-group">
				                                	<div class="col-md-4 col-sm-6 col-xs-12">
				                                		<label for="spouse_name">Spouse Name</label>
				                                	</div>
				                                	<div class="col-md-8 col-sm-6 col-xs-12">
						            					<div class="form-line">
						            						<input autocomplete="none" type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Spouse Name" value="{{ old('spouse_name') }}" >
						            						<span class="text-danger">{{ $errors->first('spouse_name') }}</span>
						            					</div>
						            				</div>
					            				</div>
				            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
		                                		<label for="spouse_gender">Spouse Gender</label>
		                                	</div>
		                                	<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick select2" name="spouse_gender" id="spouse_gender" placeholder="Spouse Gender" >
				            							<option></option>
				            							@if(old('spouse_gender') == 'female')
      														<option value="female" selected>Female</option>
														@else
      														<option value="female">Female</option>
														@endif
														@if(old('spouse_gender') == 'female')
      														<option value="male" selected>Male</option>
														@else
      														<option value="male">Male</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('spouse_gender') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix spouse">
			            					<div class="form-group">
				            					<div class="col-md-4 col-sm-6 col-xs-12">
			                                		<label for="spouse_dob">Spouse DOB</label>
			                                	</div>
			                                	<div class="col-md-8 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="spouse_dob" id="spouse_dob" class="form-control datepicker" placeholder="Spouse DOB" value="{{ old('spouse_dob') }}" >
					            						<span class="text-danger">{{ $errors->first('spouse_dob') }}</span>
					            					</div>
					            				</div>
				            				</div>
				            			</div>

		            					</div>
	            						<div class="col-md-6">
	            							<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="father_adhaar">Father Adhaar Number</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="number" name="father_adhaar" id="father_adhaar" class="form-control" placeholder="Father Adhaar Number" value="{{ old('father_adhaar') }}">
				            						<span class="text-danger">{{ $errors->first('father_adhaar') }}</span>
				            					</div>
				            				</div>
				            			</div>
			            				</div>

			            				<div class="row clearfix"><div class="form-group">
		                                	<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="father_place">Father Place of Stay</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="father_place" id="father_place" class="form-control" placeholder="Father place of stay" value="{{ old('father_place') }}" >
				            						<span class="text-danger">{{ $errors->first('father_place') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

			            				<div class="row clearfix">
			            					<div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="mother_adhaar">Mother Adhaar Number</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="number" name="mother_adhaar" id="mother_adhaar" class="form-control" placeholder="Mother Adhaar Number" value="{{ old('mother_adhaar') }}">
					            						<span class="text-danger">{{ $errors->first('mother_adhaar') }}</span>
					            					</div>
					            				</div>
					            			</div>
			            				</div>

			            				<div class="row clearfix">
			            					<div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="mother_place">Mother Place of Stay</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="mother_place" id="mother_place" class="form-control" placeholder="Mother place of stay" value="{{ old('mother_place') }}" >
					            						<span class="text-danger">{{ $errors->first('mother_place') }}</span>
					            					</div>
					            				</div>
				            				</div>
			            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="spouse_adhaar">Spouse Adhaar Number</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="number" name="spouse_adhaar" id="spouse_adhaar" class="form-control" placeholder="Spouse Adhaar Number" value="{{ old('spouse_adhaar') }}">
					            						<span class="text-danger">{{ $errors->first('spouse_adhaar') }}</span>
					            					</div>
					            				</div>
					            			</div>
				            				</div>

				            				<div class="row clearfix spouse"><div class="form-group">
			                                	<div class="col-md-5 col-sm-6 col-xs-12">
			                                		<label for="spouse_place">Spouse Place of Stay</label>
			                                	</div>
			                                	<div class="col-md-7 col-sm-6 col-xs-12">
					            					<div class="form-line">
					            						<input autocomplete="none" type="text" name="spouse_place" id="spouse_place" class="form-control" placeholder="Spouse place of stay" value="{{ old('mother_place') }}" >
					            						<span class="text-danger">{{ $errors->first('mother_place') }}</span>
					            					</div>
					            				</div>
				            				</div>
				            				</div>  

				            				<div class="row clearfix spouse"><div class="form-group">
			            					<div class="col-md-5 col-sm-6 col-xs-12">
		                                		<label for="spouse_gender">No Of Children</label>
		                                	</div>
		                                	<div class="col-md-7 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control show-tick select2" name="no_of_children" id="no_of_children" placeholder="No Of Children" >
				            							<option value="">Select No Of Children</option>
				            							<!-- @if(old('no_of_children') == '0')
      														<option value="0" selected>None</option>
														@else
      														<option value="0">None</option>
														@endif -->
				            							@if(old('no_of_children') == '1')
      														<option value="1" selected>1</option>
														@else
      														<option value="1">1</option>
														@endif
														@if(old('no_of_children') == '2')
      														<option value="2" selected>2</option>
														@else
      														<option value="2">2</option>
														@endif
														@if(old('no_of_children') == '3')
      														<option value="3" selected>3</option>
														@else
      														<option value="3">3</option>
														@endif
														@if(old('no_of_children') == '4')
      														<option value="4" selected>4</option>
														@else
      														<option value="4">4</option>
														@endif
														@if(old('no_of_children') == '5')
      														<option value="5" selected>5</option>
														@else
      														<option value="5">5</option>
														@endif
														@if(old('no_of_children') == '6')
      														<option value="6" selected>6</option>
														@else
      														<option value="6">6</option>
														@endif
														@if(old('no_of_children') == '7')
      														<option value="7" selected>7</option>
														@else
      														<option value="7">7</option>
														@endif
														@if(old('no_of_children') == '8')
      														<option value="8" selected>8</option>
														@else
      														<option value="8">8</option>
														@endif
				            						</select>
				            						<span class="text-danger">{{ $errors->first('spouse_gender') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            				</div>

                                        </div>
                                        <div class="col-md-12 spouse">
                                        	<table class="table table-bordered table-striped table-hover" id="children_detail">
                                        		<thead>
	                                        		<tr class="bg-cyan">
	                                        			<th>Name</th>
	                                        			<th>Gender</th>
	                                        			<th>DOB</th>
	                                        			<th>Adhaar Number</th>
	                                        			<th>Place Of Stay</th>
	                                        		</tr>
                                        		</thead>
                                        		<tbody id="children_tbody">
                                        			<tr>
                                        				<td><input type="text" name="child_name[]" class="form-control" placeholder="Child Name"></td>
                                        				<td>
                                        					<select name="child_gender[]" class="form-control select2 child_gender" placeholder="Child Gender">
                                        						<option value="">Gender</option>
					            								<option value="female">Female</option>
																<option value="male">Male</option>
															</select>
				            							</td>
                                        				<td><input type="text" name="child_dob[]" class="form-control datepicker" placeholder="YYYY-MM-DD"></td>
                                        				<td><input type="text" name="child_adhaar[]" class="form-control" placeholder="Adhaar Number"></td>
                                        				<td><input type="text" name="child_place[]" class="form-control" placeholder="Place Of Stay"></td>
                                        			</tr>
                                        		</tbody>
                                        	</table>
                                        </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse2" aria-expanded="true"
                                                   aria-controls="collapse2">
                                                    Company Details
                                                    <i class="material-icons mycheck" id="mycheck2">check</i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                <div class="row clearfix"><div class="form-group">			            					
					            						<div class="col-md-4 col-sm-6 col-xs-12">
					            							<label for="genesis_ledger_id">Genesis Ledger Id <span class="text-danger">*</span></label>
					            						</div>
					            						<div class="col-md-8 col-sm-6 col-xs-12">
					            							<div class="form-line">
					            								<input autocomplete="none" type="text" name="genesis_ledger_id" id="genesis_ledger_id" class="form-control" placeholder="Genesis Ledger Id" value="{{ $emp->genesis_ledger_id }}" >
					            								<span class="text-danger">{{ $errors->first('genesis_ledger_id') }}</span>
					            							</div>
					            						</div>
						            				</div>
						            				</div>

						            				<div class="row clearfix"><div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="branch_location_id">Branch <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">		
							            						 <select class="form-control show-tick" placeholder="Shreeshivam Branch" id="branch_location_id" name="branch_location_id">
							            						 	<option>Select Branch</option>
						@foreach($branches as $branch)
				           		@if($emp->branch_location_id == $branch->id)
									<option value="{{$branch->id}}" selected>{{$branch->branch}}</option>	
								@else
									<option value="{{$branch->id}}">{{$branch->branch}}</option>
								@endif	
						@endforeach
							            						</select>
							            						<span class="text-danger">{{ $errors->first('branch_location_id') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>


						            				<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="department">Department <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">		
							            						 <select class="form-control show-tick" placeholder="Department" id="department" name="department">
							            						 	<option>Select Department</option>
						@foreach($depts as $dept)
				           	<!-- @if($dept->department_name!='Admin') -->
				           		@if($emp->department == $dept->id)
									<option value="{{$dept->id}}" selected>{{$dept->department_name}}</option>	
								@else
									<option value="{{$dept->id}}">{{$dept->department_name}}</option>
								@endif	
							<!-- @endif  -->
						@endforeach
							            						</select>
							            						<span class="text-danger">{{ $errors->first('department') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>
						            				<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="designation">Designation <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">			            	
							            						<select autocomplete="none" type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
							            							<option></option>
																	@foreach($desigs as $desig)
															       		@if($emp->designation == $desig->id)
																			<option value="{{$desig->id}}" selected>{{$desig->designation}}</option>	
																		@else
																			<option value="{{$desig->id}}">{{$desig->designation}}</option>
																		@endif	
																	@endforeach
							            						</select>
							            						<span class="text-danger">{{ $errors->first('designation') }}</span>
							            					</div>
							            				</div>
						            				</div>			            				
						            			</div>

						            			<div class="row clearfix"><div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="out_source">Out Source <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">		
							            						 <select class="form-control show-tick select2" placeholder="out_source" id="out_source" name="out_source">
							            						 	<option></option>
						
				           		@if($emp->out_source == '1')
									<option value="1" selected>Yes</option>	
								@else
									<option value="1">Yes</option>
								@endif	
								@if($emp->out_source == '0' || $emp->out_source=='')
									<option value="0" selected>No</option>	
								@else
									<option value="0">No</option>
								@endif	
							            						</select>
							            						<span class="text-danger">{{ $errors->first('out_source') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>

						            				<div class="row clearfix"><div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="division">Division</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">		
							            						 <select class="form-control show-tick select2" placeholder="division" id="division" name="division[]" multiple="multiple">
							            						 	<option></option>
						@foreach($division as $div)				       
				           		@if($emp->division!='')
				           			@if(in_array($div->id,json_decode($emp->division)))
									<option value="{{$div->id}}" selected>{{$div->division}}</option>
									@endif	
								@else
									<option value="{{$div->id}}">{{$div->division}}</option>
								@endif							
						@endforeach
							            						</select>
							            						<span class="text-danger">{{ $errors->first('division') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>
						            				<div class="row clearfix"><div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="section">Section</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">		
							            						 <select class="form-control show-tick select2" placeholder="section" id="section" name="section[]" multiple="multiple">
							            						 	<option></option>
						@foreach($section as $sec)
				       			@if($emp->section!='')
				           			@if(in_array($sec->id,json_decode($emp->section)))
									<option value="{{$sec->id}}" selected>{{$sec->section}}</option>	
									@endif
								@else
									<option value="{{$sec->id}}">{{$sec->section}}</option>
								@endif							
						@endforeach
							            						</select>
							            						<span class="text-danger">{{ $errors->first('section') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>

						            			<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="doj">Date Of Joining <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="text" name="doj" id="doj" class="form-control datepicker" placeholder="Date Of Joining" value="{{ date('Y-m-d',strtotime($emp->doj)) }}" >
							            						<span class="text-danger">{{ $errors->first('doj') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>
						            			<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="status">Status</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">			            	
							            						<select class="form-control show-tick" name="status" id="status" placeholder="Status" >
							            						<option></option>
							            				@if($emp->status == 'active')
							            					<option value="active" selected>Active</option>
														@else
															<option value="active">Active</option>
														@endif

														@if($emp->status == 'inactive')
															<option value="inactive" selected>Inactive</option>
														@else
															<option value="inactive">Inactive</option>
														@endif
								            					</select>
								            					<span class="text-danger">{{ $errors->first('status') }}</span>
							            					</div>
							            				</div>
						            				</div>	
						            			</div>
						            			
						            			</div>
						            			<div class="col-md-6">

						            				<div class="row clearfix"><div class="form-group">			            					
					            						<div class="col-md-4 col-sm-6 col-xs-12">
					            							<label for="genesis_id">Genesis Id</label>
					            						</div>
					            						<div class="col-md-8 col-sm-6 col-xs-12">
					            							<div class="form-line">
					            								<input autocomplete="none" type="text" name="genesis_id" id="genesis_id" class="form-control" placeholder="Genesis Id" value="{{ $emp->genesis_id }}" >
					            								<span class="text-danger">{{ $errors->first('genesis_id') }}</span>
					            							</div>
					            						</div>
						            				</div>
						            				</div>

						            				<div class="row clearfix"><div class="form-group">	
					            						<div class="col-md-4 col-sm-6 col-xs-12">
					            							<label for="emplayee_id">Biometric Id</label>
					            						</div>
					            						<div class="col-md-8 col-sm-6 col-xs-12">
					            							<div class="form-line">
					            								<input autocomplete="none" type="text" name="biometric_id" id="biometric_id" class="form-control" placeholder="Biometric Id" value="{{$emp->biometric_id}}" >
					            								<span class="text-danger">{{ $errors->first('biometric_id') }}</span>
					            							</div>
					            						</div>
						            				</div>
						            				</div>

						            				<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="esic_number">ESIC Number</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="text" name="esic_number" id="esic_number" class="form-control" placeholder="ESIC Number" value="{{ $emp->esic_number}}" >
							            						<span class="text-danger">{{ $errors->first('esic_number') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>
												<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="epf_number">EPF Number</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="text" name="epf_number" id="epf_number" class="form-control" placeholder="EPF Number" value="{{ $emp->epf_number }}" >
							            						<span class="text-danger">{{ $errors->first('epf_number') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>

						            			<div class="row clearfix">
						            				<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="lin_number">LIN Number</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="text" name="lin_number" id="esic_number" class="form-control" placeholder="LIN Number" value="{{ $emp->lin_number }}" >
							            						<span class="text-danger">{{ $errors->first('lin_number') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>
												<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="uan_number">UAN Number</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="text" name="uan_number" id="epf_number" class="form-control" placeholder="UAN Number" value="{{ $emp->uan_number }}" >
							            						<span class="text-danger">{{ $errors->first('uan_number') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>						            			
						            			<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="basic">Reason for code zero</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<select class="form-control" name="reason_code_0" id="reason_code_0" >
							            						    <option <?php if($emp->reason_code_0==''){ echo 'selected';} ?> value="" > Select </option>
							            						    <option <?php if($emp->reason_code_0=='0'){ echo 'selected';} ?> value="0"> 0 </option>
							            						    <option <?php if($emp->reason_code_0=='1'){ echo 'selected';} ?> value="1"> 1 </option>
							            						    <option <?php if($emp->reason_code_0=='2'){ echo 'selected';} ?> value="2"> 2 </option>
							            						    <option <?php if($emp->reason_code_0=='3'){ echo 'selected';} ?> value="3"> 3 </option>
							            						    <option <?php if($emp->reason_code_0=='4'){ echo 'selected';} ?> value="4"> 4 </option>
							            						    <option <?php if($emp->reason_code_0=='5'){ echo 'selected';} ?> value="5"> 5 </option>
							            						    <option <?php if($emp->reason_code_0=='6'){ echo 'selected';} ?>value="6"> 6 </option>
							            						    <option <?php if($emp->reason_code_0=='7'){ echo 'selected';} ?> value="7"> 7 </option>
							            						    <option <?php if($emp->reason_code_0=='8'){ echo 'selected';} ?>value="8"> 8 </option>
							            						    <option  <?php if($emp->reason_code_0=='9'){ echo 'selected';} ?> value="9"> 9 </option>
							            						    <option <?php if($emp->reason_code_0=='10'){ echo 'selected';} ?> value="10"> 10 </option>
							            						    <option <?php if($emp->reason_code_0=='11'){ echo 'selected';} ?> value="11"> 11 </option>
							            						    <option <?php if($emp->reason_code_0=='12'){ echo 'selected';} ?> value="12"> 12 </option>
							            						    <option <?php if($emp->reason_code_0=='13'){ echo 'selected';} ?> value="13"> 13 </option>
							            						</select>
							            						<span class="text-danger"></span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>
						            			<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-4 col-sm-6 col-xs-12">
						            						<label for="basic">Last Working Day</label>
						            					</div>
						            					<div class="col-md-8 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            					<input autocomplete="none" type="text" name="last_working_day" id="dob" class="form-control datepicker" placeholder="Last Working Day" value="<?php if($emp->last_working_day !='') echo date('Y-m-d',strtotime($emp->last_working_day)); ?>" >
							            						<span class="text-danger"></span>
							            					</div>
							            				</div>
						            				</div>
						            			</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading3">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse3" aria-expanded="true"
                                                   aria-controls="collapse3">
                                                    Salary Details
                                                    <i class="material-icons mycheck" id="mycheck3">check</i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                                            <div class="panel-body">

                                            	<div class="row clearfix">
                                            		<div class="form-group">
                                            			<div class="col-md-2 col-sm-6 col-xs-12">
						            						<input autocomplete="none" type="checkbox" name="esic_option" id="esic_option" class="filled-in chk-col-teal" placeholder="ESIC " value="1" <?php if($emp->esic_option=='1') echo "checked"; ?>>
						            						<label for="esic_option" style="font-size: 14px">ESIC</label>
						            						<span class="text-danger">{{ $errors->first('esic_option') }}</span>
							            				</div>
					            						<div class="col-md-2 col-sm-6 col-xs-12">
						            						<input autocomplete="none" type="checkbox" name="epf_option" id="epf_option" class="filled-in chk-col-teal" placeholder="EPF Number" value="1" <?php if($emp->epf_option=='1') echo "checked"; ?>>	
					            							<label for="epf_option" style="font-size: 14px">EPF</label>
					            							<span class="text-danger">{{ $errors->first('epf_option') }}</span>
					            						</div>	
								            		</div>
								            		</div>
								            		<?php 
								            		$salary = (array) json_decode($salaries,true);
								            		if($salaries!='') 
                                        			{
								            		$salary = $salary['emp_salary'];
								            		?>
								            		@foreach($salary as $type=>$value)
								            		@if($type == 'salary')
								            		<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-2 col-sm-6 col-xs-12">
						            						<label for="salary">Salary <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-4 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="number" name="salary" id="salary" class="form-control salary_value" placeholder="Salary" value="{{ $value }}" >
							            						<span class="text-danger">{{ $errors->first('salary') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>
						            				@endif
						            				@if($type == 'basic' )
						            				<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-2 col-sm-6 col-xs-12">
						            						<label for="basic">Basic + DA</label>
						            					</div>
						            					<div class="col-md-4 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="number" name="basic" id="basic" class="form-control salary_value" placeholder="Basic + DA" value="{{ $value }}" <?php if($emp->epf_option=='0'){echo "disabled";}?>>
							            						<span class="text-danger">{{ $errors->first('basic') }}</span>

							            						<input type="hidden" class="mybasic" name="mybasic" value="{{ $value }}">
							            					</div>
							            				</div>
						            				</div>
						            				</div>
						            				@endif
						            			@endforeach
						            		<?php }
						            		else{ ?>

						            			<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-2 col-sm-6 col-xs-12">
						            						<label for="salary">Salary <span class="text-danger">*</span></label>
						            					</div>
						            					<div class="col-md-4 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="number" name="salary" id="salary" class="form-control salary_value" placeholder="Salary" value="{{ old('salary') }}" >
							            						<span class="text-danger">{{ $errors->first('salary') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>
						            				<div class="row clearfix">
													<div class="form-group">
						            					<div class="col-md-2 col-sm-6 col-xs-12">
						            						<label for="basic">Basic + DA</label>
						            					</div>
						            					<div class="col-md-4 col-sm-6 col-xs-12">
							            					<div class="form-line">
							            						<input autocomplete="none" type="number" name="basic" id="basic" class="form-control salary_value" placeholder="Basic + DA" value="{{ old('basic') }}" <?php if($emp->epf_option=='0'){echo "disabled";}?> >
							            						<span class="text-danger">{{ $errors->first('basic') }}</span>
							            					</div>
							            				</div>
						            				</div>
						            				</div>

						            		<?php } ?>

                                            	<div class="table-responsive" style="display: none;">                                           		
                                            	<table class="table table-stripped">
                                            		<tbody id="salary_body" name="salary_body">
                                        			<?php $i=0;
                                        			$salary = (array) json_decode($salaries,true);
                                        			if($salaries!='') 
                                        			{
                                        			?>
                                            		@foreach($salary['emp_salary'] as $salary_type=>$salary_value)
                                            		<?php $i++; ?>
                                            			<tr>
                                            				<td>
                                            					<input type="text" autocomplete="none" name="salary_type[<?php echo $i; ?>]" id="salary_type[<?php echo $i; ?>]" class="form-control salary_type" value="{{ $salary_type }}">
                                            				</td>
                                            				<td>
                                            					<input autocomplete="none" type="number" name="salary_value[<?php echo $i; ?>]" id="salary_value[<?php echo $i; ?>]" class="form-control salary_value" placeholder="" value="{{ $salary_value }}" >
                                            				</td>
                                            				<!-- <td>
                                            					<button type="button" name="remove[<?php echo $i; ?>]" class="btn btn-danger btn-sm remove">
                                            						<i class="material-icons">delete</i>
                                            					</button>
                                            				</td> -->
                                            			</tr>
                                            		@endforeach	
                                            		<?php } ?>	
                                            		</tbody>
                                            	</table>
                                            	</div>

						            		<div class="row clearfix" style="display: none;">
                                                <div class="form-group">
					            					<!-- <div class="col-md-4 col-sm-6 col-xs-12">
					            						<label for="joining_salary">Joining Salary</label>
					            					</div> -->
					            					<div class="col-md-12 col-sm-12 col-xs-12">
						            					<div class="form-line">	
						            						<input type="hidden" name="row_number" id="row_number" value="<?php echo $i; ?>">
						            					<button type="button" id="add_row" name="add_row" class="btn btn-info">Add New Row</button>          	
						            					</div>
						            				</div>
					            				</div>
					            			</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading4">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse4" aria-expanded="true"
                                                   aria-controls="collapse4">
                                                   Bank Account Details
                                                   <i class="material-icons mycheck" id="mycheck4">check</i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading4">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                        <div class="row clearfix">
                                   		<div class="form-group">
			                            	<div class="col-md-4 col-sm-6 col-xs-12">
				            					<label for="acc_holder_name">Account Holder Name <span class="text-danger">*</span></label>
				            				</div>
				            				<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="acc_holder_name" id="acc_holder_name" class="form-control" placeholder="Account Holder Name" value="{{ $emp->acc_holder_name }}" >
				            						<span class="text-danger">{{ $errors->first('acc_holder_name') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
						            	<div class="row clearfix">
				            			<div class="form-group">
					            			<div class="col-md-4 col-sm-6 col-xs-12">
				            					<label for="acc_no">Account Number <span class="text-danger">*</span></label>
				            				</div>
				            				<div class="col-md-8 col-sm-6 col-xs-12">  			
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="acc_no" id="acc_no" class="form-control" placeholder="Account Number" value="{{ $emp->acc_no }}" >
				            						<span class="text-danger">{{ $errors->first('acc_no') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
						            	<div class="row clearfix">
				            			<div class="form-group">
					            			<div class="col-md-4 col-sm-6 col-xs-12">
				            					<label for="ifsc_code">IFSC Code <span class="text-danger">*</span></label>
				            				</div>
				            				<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="IFSC Code" value="{{ $emp->ifsc_code }}" >
				            						<span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
						            	<div class="row clearfix">
				            			<div class="form-group">
					            			<div class="col-md-4 col-sm-6 col-xs-12">
				            					<label for="bank_name">Bank Name <span class="text-danger">*</span></label>
				            				</div>
				            				<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<select class="form-control select2" placeholder="Shreeshivam Bank" id="bank_name" name="bank_name">
			                                            <option></option>
			                                            @foreach($bank_list as $bank)
			                                                <option value="{{$bank->id}}" <?php if($emp->bank_name==$bank->id) echo "selected" ?>>{{$bank->bank_name}}</option>
			                                            @endforeach
			                                        </select>
				            						<!-- <input autocomplete="none" type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="{{ $emp->bank_name }}" > -->
				            						<span class="text-danger">{{ $errors->first('bank_name') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
						            	<div class="row clearfix">
				            			<div class="form-group">
					            			<div class="col-md-4 col-sm-6 col-xs-12">
				            					<label for="branch">Branch <span class="text-danger">*</span></label>
				            				</div>
				            				<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="branch" id="branch" class="form-control" placeholder="Branch" value="{{ $emp->branch }}" >
				            						<span class="text-danger">{{ $errors->first('branch') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            		</div>
		                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="heading5">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapse5" aria-expanded="true"
                                                   aria-controls="collapse5">
                                                    Login Details
                                                    <i class="material-icons mycheck" id="mycheck5">check</i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading5">
                                            <div class="panel-body">
                                                <div class="col-md-8">
                                        <div class="row clearfix">
                                		<div class="form-group">
	                                		<div class="col-md-4 col-sm-6 col-xs-12">
	                                			<label for="login_email">Email <span class="text-danger">*</span></label>
	                                		</div>
	                                		<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="email" name="login_email" id="login_email" class="form-control" placeholder="Email" value="{{ $emp->email }}" readonly>
				            						<span class="text-danger">{{ $errors->first('login_email') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
				            			<div class="row clearfix">
				            			<div class="form-group">
	                                		<div class="col-md-4 col-sm-6 col-xs-12">
	                                			<label for="password">Password</label>
	                                		</div>
	                                		<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">
				            						<input autocomplete="none" type="text" name="password" id="password" class="form-control" placeholder="Password" value="{{ $emp->password }}" >
				            						<span class="text-danger">{{ $errors->first('password') }}</span>
				            					</div>
				            				</div>
				            			</div>
				            			</div>
				            			<div class="row clearfix">
				            			<div class="form-group">
			            					<div class="col-md-4 col-sm-6 col-xs-12">
			            						<label for="role">Role <span class="text-danger">*</span></label>
			            					</div>
			            					<div class="col-md-8 col-sm-6 col-xs-12">
				            					<div class="form-line">		
				            						 <select class="form-control show-tick select2" name="role" id="role" placeholder="Role" >
				            						 	<option></option>
			@foreach($roles as $role)
	           	@if($role->role!='admin')
	           		@if($emp_role_id == $role->role_id)
						<option value="{{$role->role_id}}" selected>{{ucfirst(trans($role->role))}}</option>
					@else
						<option value="{{$role->role_id}}">{{ucfirst(trans($role->role))}}</option>	
					@endif
				@endif 
			@endforeach
				            						</select>
				            						<span class="text-danger">{{ $errors->first('role') }}</span>
				            					</div>
				            				</div>
			            				</div>
			            			</div>
			            				<!-- <div class="form-group">
					            			<div class="col-md-6 col-md-offset-3">
					            				<div class="form-group">
					            						<button autocomplete="none" type="submit" name="submit" class="btn btn-success">Add Employee</button>
					            				</div>
				            				</div>
				            			</div> -->
                                	</div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                    
                                </div>

                                <fieldset>
				            			<div class="row clearfix">
	                                    <div class="form-group">
					            			<div class="col-md-4 col-md-offset-4">
					            				<div class="form-group">
					            						<button autocomplete="none" type="submit" name="submit" class="btn btn-success btn-lg">Update Employee</button>
					            				</div>
				            				</div>
				            			</div>
				            			</div>
				            		</fieldset>
				            	@endforeach
                            </form>



                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

<style type="text/css">
	#imagePreview {
  width: 100px;
  height: 120px;
  padding: 12px;
  margin-top: 6px;
  background-position: center center;
  background-size: contain;
  background-repeat: no-repeat;
  background-clip: padding-box;
  border: 1px solid silver;
  -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
  display: inline-block;
}
.mycheck{
	font-weight: 700;
	color: yellow;
	float: right!important;
}
</style>


<!-- <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" /> -->
@endsection

@section('jquery')
<script type="text/javascript">
	function personal_details(){
		$count=0;
				if($('#title').val()!='' && $('#first_name').val()!='' && $('#middle_name').val()!='' && $('#last_name').val()!='' && $('#blood_group').val()!='' && $('#email').val()!='' && $('#dob').val()!='' && $('#mobile').val()!='' && $('#gender').val()!='' && $('#category')!='' && $('#adhaar_number').val()!='' && $('#pan_number').val()!='' && $('#marital_status').val()!='' && $('#local_address').val()!='' && $('#permanent_address').val()!='' && $('#photo').val()!='' && $('#emergency_call_number').val()!='' && $('#emergency_call_person').val()!='')
				{
					$count++;
				}				
			if($count>0)
				{
					$('#mycheck1').show();
				}
				else
				{
					$('#mycheck1').hide();
				}
		}
		
		function family_details(){
		$count=0;
				if($('#father_name').val()!='' && $('#father_place').val()!='' && $('#father_dob').val()!='' && $('#father_adhaar').val()!='' && $('#mother_name').val()!='' && $('#mother_place').val()!='' && $('#mother_dob').val()!='' && $('#mother_adhaar').val()!='')
				{
					$count++;
				}				
			if($count>0)
				{
					$('#mycheck6').show();
				}
				else
				{
					$('#mycheck6').hide();
				}
		}

		function company_details(){
		$count=0;
				if($('#reason_code_0').val()!='' && $('#last_working_day').val()!='' && $('#genesis_ledger_id').val()!='' && $('#genesis_id').val()!='' && $('#biometric_id').val()!='' && $('#employee_id').val()!='' && $('#department').val()!='' && $('#designation').val()!='' && $('#doj').val()!='' && $('#status').val()!='' && $('#esic_number').val()!='' && $('#epf_number').val()!='' && $('#lin_number').val()!='' && $('#uan_number').val()!='')
				{
					$count++;
				}				
			if($count>0)
				{
					$('#mycheck2').show();
				}
				else
				{
					$('#mycheck2').hide();
				}
		}
		function salary_details(){
		$count=0;
			$('.salary_value').each(function(){
				if($(this).val()=='')
				{
					$count++;
				}
			});	
			$('.salary_type').each(function(){
				if($(this).val()=='')
				{
					$count++;
				}
			});				
			if($count==0)
				{
					$('#mycheck3').show();
				}
				else
				{
					$('#mycheck3').hide();
				}
		}
		function bank_details(){
		$count=0;
				if($('#acc_holder_name').val()!='' && $('#acc_no').val()!='' && $('#ifsc_code').val()!='' && $('#bank_name').val()!='' && $('#branch').val()!='')
				{
					$count++;
				}				
			if($count>0)
				{
					$('#mycheck4').show();
				}
				else
				{
					$('#mycheck4').hide();
				}
		}
		function login_details(){
		$count=0;
				if($('#login_email').val()!='' && $('#password').val()!='' && $('#role').val()!='')
				{
					$count++;
				}				
			if($count>0)
				{
					$('#mycheck5').show();
				}
				else
				{
					$('#mycheck5').hide();
				}
		}
	$(document).ready(function(){

		if($('#no_of_children').val()=='' || $('#no_of_children').val()==0)
		{
			$('#children_detail').hide();
		}

		$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		$("#success-alert").slideUp(500);
		});

		$("#branch_location_id").select2({
	     placeholder: "Select Branch Location",
	     allowClear: true
	    });

		$("#title").select2({
	     placeholder: "Select Title",
	     allowClear: true
	    });

		 $("#department").select2({
	     placeholder: "Select Department",
	     allowClear: true
	    });
		 $("#designation").select2({
	     placeholder: "Select Designation",
	     allowClear: true
	    });

		 $("#out_source").select2({
	     placeholder: "Select Out Source",
	     allowClear: true
	    });
		$("#division").select2({
	     placeholder: "Select Division",
	     allowClear: true,
	     multiple:true
	    });
	    $("#section").select2({
	     placeholder: "Select Section",
	     allowClear: true,
	     multiple:true
	    });
	    $("#blood_group").select2({
	     placeholder: "Select Blood Group",
	     allowClear: true
	    });

		 $("#gender").select2({
	     placeholder: "Select Gender",
	     allowClear: true
	    });
		 $("#spouse_gender").select2({
	     placeholder: "Select Spouse Gender",
	     allowClear: true
	    });
		 $("#status").select2({
	     placeholder: "Select Status",
	     allowClear: true
	    });
		 $("#marital_status").select2({
	     placeholder: "Select Marital Status",
	     allowClear: true
	    });
		 $("#role").select2({
	     placeholder: "Select User Role",
	     allowClear: true
	    });
		 $("#category").select2({
	     placeholder: "Select Category",
	     allowClear: true
	    });
		  $("#role").select2({
	     placeholder: "Select Login Role",
	     allowClear: true
	    });
		$("#bank_name").select2({
         placeholder: "Select Bank",
         allowClear: true
        });
		  $('#epf_option').click(function(){
			if($(this).prop("checked") == true)
			{
				$('#basic').attr('disabled',false);
				var basic = $('#basic').closest('div').find('.mybasic').val();
				$('#basic').val(basic);
				$('#basic').focus();
			}
			else
			{
				$('#basic').val('');				
				$('#basic').attr('disabled',true);
			}
		});

		$('.mycheck').hide();
		// $('.datepicker').datepicker();
		$('.datepicker').datepicker().on('changeDate', function (ev) {
		    $('.dropdown-menu').hide();
		});

		$('#md_checkbox_22').click(function(){
			var local = $('#local_address').val();
            if($(this).prop("checked") == true){
                if($('#local_address').val()!='')
                {
                	$('#permanent_address').val(local);
                }
                else if($('#local_address').val()=='')
                {
                	// alert('Fill the Local Address');
                	$(this).prop('checked',false);
                	$('#local_address').focus();
                }
            }
            else
            {
            	if($('#permanent_address').val() == local)
            	{
            		$('#permanent_address').val('')
            	}
            }
		});

		$('#local_address').on('keyup',function(){
			if($('#md_checkbox_22').prop("checked") == true)
			{
				if($('#local_address').val()!='')
				{
					var local = $('#local_address').val();
					$('#permanent_address').val(local);
				}
			}
		});

		$('#email').on('keyup',function(){
			var login_email = $(this).val();
			$('#login_email').val(login_email);
		});

		$('#first_name,#middle_name,#last_name').on('keyup',function(){
			var first = $('#first_name').val();
			var middle = $('#middle_name').val();
			var last = $('#last_name').val();
			var acc_holder_name = first+' '+middle+' '+last;
			$('#acc_holder_name').val(acc_holder_name);
		});

		var uploadFile;	
		uploadFile = 'photo';

		uploadFile = $('#'+uploadFile);
		// uploadFile.after("<div id='imagePreview'></div>");
		$('#imagePreview').hide();
		uploadFile.on('click', function() {
		  $('#imagePreview').hide();
		});

		uploadFile.on('change', function() {
		  var files, reader;
		  files = !!this.files ? this.files : [];
		  if ( !files.length || !window.FileReader ) {
		    return; // no file selected, or no FileReader support
		  }

		  if ( /^image/.test(files[0].type)) {
		    reader = new FileReader();
		    reader.readAsDataURL(files[0]); 
		    reader.onloadend = function() {
		      $('#imagePreview').css('background-image', 'url(' + this.result + ')');
		      $('#imagePreview').show();
		    }
		  }
		});


		$('#department').change(function(){
			var dept_id = $(this).val();
			$.ajax({
            type:'GET',
            url:'add-employee/get_desig',
            data:{dept_id : dept_id},
            success:function(data){
            	//alert(data);
            	$('#designation').empty().html(data)
              // refreshTable();
            }
            });
		});

		$('#division').change(function(){
			var division_id = $(this).val();
			$.ajax({
            type:'GET',
            url:'add-employee/get_section',
            data:{division_id : division_id},
            success:function(data){
            	//alert(data);
            	$('#section').empty().html(data)
              // refreshTable();
            }
            });
		});

		$('#add_row').click(function(){
			// alert();
			var row_number=parseInt($('#row_number').val());
			var row =row_number +1;
		 	var tr = '<tr><td><input type="text" autocomplete="none" name="salary_type['+row+']" id="salary_type['+row+']" class="form-control salary_type" value=""></td><td><input autocomplete="none" type="number" name="salary_value['+row+']" id="salary_value['+row+']" class="form-control salary_value" placeholder="" value="{{ old('salary_value[row]') }}" ></td><td><button type="button" name="remove['+row+']" class="btn btn-danger btn-sm remove"><i class="material-icons">delete</i></button></td></tr>';
			$('#salary_body').append(tr);
			$('#row_number').val(row);
			salary_details();
		});

		$('#salary_body').on("click", "button.remove",function(){
			$(this).closest("tr").remove();
			var num = $('#row_number').val();
			var dec= num-1;
			$('#row_number').val(dec);
			salary_details();
		});

		$('#title,#first_name,#middle_name,#last_name,#blood_group,#email,#mobile,#dob,#marital_status,#gender,#category,#adhaar_number,#pan_number,#local_address,#permanent_address,#photo,#emergency_call_number,#emergency_call_person').blur(function(){
			personal_details();
		});
		$('#heading1').click(function(){
			personal_details();
		});

		$('#father_place,#father_dob,#father_name,#father_adhaar,#mother_place,#mother_dob,#mother_name,#mother_adhaar,#spouse_gender,#spouse_dob,#spouse_name,#spouse_place,#spouse_adhaar,#no_of_children').blur(function(){
			family_details();
		});
		$('#heading6').click(function(){
			family_details();
		});

		$('#employee_id,#department,#designation,#doj,#status,#genesis_ledger_id,#genesis_id,#biometric_id,#esic_number,#epf_number,#lin_number,#uan_number','#reason_code_0','#last_working_day').blur(function(){
			company_details();
		});
		$('#heading2').click(function(){
			company_details();
		});
		$('#salary_body').on("blur",".salary_value,.salary_type",function(){
			salary_details();			
		});
		$('#heading3').click(function(){
			salary_details();
		});
		$('#acc_holder_name,#acc_no,#ifsc_code,#bank_name,#branch').blur(function(){
			bank_details();
		});
		$('#heading4').click(function(){
			bank_details();
		});
		$('#login_email,#password,#role').blur(function(){
			login_details();
		});
		$('#heading5').click(function(){
			login_details();
		});

		$('#marital_status').change(function(){
			if($(this).val()=='single')
			{
				$('.spouse').hide();
			}
			else
			{
				$('.spouse').show();
			}
		});
		$('#no_of_children').change(function(){
			var rows = $('#children_detail tbody tr').length;
			var child_no = $('#child_no').val();
			var child = $(this).val();
			if(child!='')
			{
				if(child_no>0)
				{
					var out='';
					if(child>rows)
					{
						child = child-rows;
						for(var i=1; i<=child;i++)
						{
							out+='<tr><td><input type="text" name="child_name[]" class="form-control" placeholder="Child Name"></td><td><select name="child_gender[]" class="form-control select2 child_gender" placeholder="Child Gender"><option value="">Gender</option><option value="female">Female</option><option value="male">Male</option></select></td><td><input type="text" name="child_dob[]" class="form-control" placeholder="YYYY-MM-DD"></td><td><input type="text" name="child_adhaar[]" class="form-control" placeholder="Adhaar Number"></td><td><input type="text" name="child_place[]" class="form-control" placeholder="Place Of Stay"></td></tr>';
						} 
						$('#children_tbody').append(out);
					}
					else
					{
						child = rows-child;
						for(var i=1; i<=child;i++)
						{
							$('#children_detail tr:last').remove();
							/*out+='<tr><td><input type="text" name="child_name[]" class="form-control" placeholder="Child Name"></td><td><select name="child_gender[]" class="form-control select2 child_gender" placeholder="Child Gender"><option value="">Gender</option><option value="female">Female</option><option value="male">Male</option></select></td><td><input type="text" name="child_dob[]" class="form-control" placeholder="YYYY-MM-DD"></td><td><input type="text" name="child_adhaar[]" class="form-control" placeholder="Adhaar Number"></td><td><input type="text" name="child_name[]" class="form-control" placeholder="Place Of Stay"></td></tr>';*/
						} 
						/*$('#children_tbody').append(out);*/
					}
				}
				else
				{
					var out='';
					for(var i=1; i<=child;i++)
					{
						out+='<tr><td><input type="text" name="child_name[]" class="form-control" placeholder="Child Name"></td><td><select name="child_gender[]" class="form-control select2 child_gender" placeholder="Child Gender"><option value="">Gender</option><option value="female">Female</option><option value="male">Male</option></select></td><td><input type="text" name="child_dob[]" class="form-control" placeholder="YYYY-MM-DD"></td><td><input type="text" name="child_adhaar[]" class="form-control" placeholder="Adhaar Number"></td><td><input type="text" name="child_name[]" class="form-control" placeholder="Place Of Stay"></td></tr>';
					} 
					$('#children_tbody').html(out);
				}
				$('#children_detail').show();
			}
			else
			{
				$('#children_tbody').empty();
				$('#children_detail').hide();
			}
			
		});
		

	});
</script>



@endsection
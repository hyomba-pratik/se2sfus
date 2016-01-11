<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ($edit_lead)?"Edit":"Add"; ?> Lead
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
			<form class="" method="post" action="<?php echo URL; ?>leads/<?php echo ($edit_lead)?"update_lead/".$lead_id:"do_add_lead"; ?>">
				<div class="col-md-6">
	    			<div class="box box-success">
	    				<div class="box-header with-border">
	    					<h3 class="box-title">Leads' Information</h3>
	    				</div><!-- /.box-header -->
	    				<!-- form start -->
	    					<div class="box-body">	
	    						<div class="row">
	    							<div class="col-sm-6">
	    								<div class="form-group">
	    									<label class="control-label">First Name</label>
		    								<input type="text" value="<?php echo ($edit_lead)?$lead_detail["first_name"]:""; ?>" class="form-control" placeholder="Enter leads' first name" name="first_name">
			    						</div>
	    							</div>
	    							<div class="col-sm-6">
	    								<div class="form-group">
	    									<label class="control-label">Last Name</label>
		    								<input type="text" value="<?php echo ($edit_lead)?$lead_detail["last_name"]:""; ?>" class="form-control" placeholder="Enter leads' last name" name="last_name">
			    						</div>
	    							</div>
	    						</div>
	    						
	    						<div class="form-group">
	    							<label class="control-label">Contact Number</label>
    								<input type="text" value="<?php echo ($edit_lead)?$lead_detail["contact_no"]:""; ?>" class="form-control" placeholder="Enter leads' contact number" name="contact">
	    						</div>
	    						<div class="form-group">
	    							<label class="control-label">Email</label>
    								<input type="email" value="<?php echo ($edit_lead)?$lead_detail["email"]:""; ?>" class="form-control" placeholder="Enter leads' email address" name="email">
	    						</div>
	    						<div class="row">
	    							<div class="col-sm-6">
	    								<div class="form-group">
			    							<label class="control-label">Address</label>
		    								<input type="text" value="<?php echo ($edit_lead)?$lead_detail["address"]:""; ?>" class="form-control" placeholder="Enter leads' street address" name="address">
			    						</div>
	    							</div>
	    							<div class="col-sm-6">
	    								<div class="form-group">
										    <label class="control-label">District</label>
										    <select class="form-control" name="district">
										    	<?php 
										    		if ($edit_lead) {
										    			echo '<option selected="">'.$lead_detail["district"].'</option>';		
										    		}
										    	?>
										        
										        <option>option 1</option>
										        <option>option 2</option>
										        <option>option 3</option>
										        <option>option 4</option>
										        <option>option 5</option>
										    </select>
										</div>
	    							</div>
	    						</div>   

	    						<?php 

	    						if ($edit_lead) {
	    							$follow_up_date = strtotime($lead_detail["follow_up_date"]);
	    							$curr_date = strtotime(date("Y-m-d")); 
	    							$diff =  ($follow_up_date-$curr_date)/(60*60*24);
	    						}else{
	    							$diff="";
	    						}
	    							
	    						?>	
	    						<div class="form-group">
	    							<label class="control-label">Next follow up after <small>(In Days)</small></label>
    								<div class="form-group">
    									<div class="form-group">
	        								<input type="number" class="form-control" value="<?php echo $diff; ?>" placeholder="Enter the number of days to followup after." name="next_follow">

										</div>
    								</div>
	    						</div>  					
	    						
	    					</div><!-- /.box-body -->
	    			</div><!-- /.box -->
	    		</div>

	    		<div class="col-md-6">
	    			<div class="box box-success">
	    				<div class="box-header with-border">
	    					<h3 class="box-title">Course Interested</h3>
	    				</div><!-- /.box-header -->
	    				<!-- form start -->
	    					<div class="box-body">	
	    						<div class="form-group">
	    							<label class="control-label">Level</label>
    								<div class="form-group">
    									<label class="radio-inline">
											<input type="radio" name="interested_level" value="A-Level" checked=""> A-Level
										</label>
										<label class="radio-inline">
											<input type="radio" name="interested_level" value="Bachelors"> Bachelors
										</label>
										<label class="radio-inline">
											<input type="radio" name="interested_level" value="Masters"> Masters
										</label>
										<label class="radio-inline">
											<input type="radio" name="interested_level" value="Others"> Other
										</label>
    								</div>
	    						</div>  

	    						<div class="form-group">
	    							<label class="control-label">Faculty/Course</label>
    								<div class="form-group">
    									<div class="form-group">
										    <select class="form-control" name="interested_faculty">
										    	<?php 
										    		if ($edit_lead) {
										    			echo '<option>'.$lead_detail["interested_faculty"].'</option>';
										    		}
										    	?>
										    	
										        <option>Computing</option>
										        <option>Networking</option>
										        <option>Multimedia</option>
										        <option>Business</option>
										        <option>Other</option>
										    </select>
										</div>
    								</div>
	    						</div> 

	    						<div class="form-group">
	    							<label class="control-label">Semester</label>
    								<div class="form-group">
    									<div class="form-group">
										    <select class="form-control" name="interested_semester">
										    <?php 
										    	if ($edit_lead) {
										    		echo '<option>'.$lead_detail["interested_semester"].'</option>';
										    	}
										    ?>
										    
										        <option>1st</option>
										        <option>2nd</option>
										        <option>3rd</option>
										        <option>4th</option>
										        <option>5th</option>
										        <option>6th</option>
										        <option>7th</option>
										        <option>8th</option>
										        <option>Other</option>
										    </select>
										</div>
    								</div>
	    						</div>  	

	    						<div class="form-group">
									<label>Notes/Comments</label>
								    <textarea class="form-control h65" placeholder="Enter notes or comments if any." name="comments"><?php echo ($edit_lead)?$lead_detail["comments"]:""; ?></textarea>
								</div>		

								<div class="box-footer">
									<div class="pull-right">
										<button type="submit" class="btn btn-success mr15"><?php echo ($edit_lead)?"Save Changes":"Add Lead"; ?></button>
										<button type="reset" class="btn btn-danger ">Reset</button>
									</div>			
								</div>
	    						
	    						
	    					</div><!-- /.box-body -->
	    			</div><!-- /.box -->
	    		</div>
			</form>
    	</div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


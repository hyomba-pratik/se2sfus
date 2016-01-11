<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Follow up
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
			
			<div class="col-md-6">
    			<div class="box box-success">
    				<div class="box-header with-border">
    					<h3 class="box-title">Leads' Information</h3>
    				</div><!-- /.box-header -->
    				<!-- form start -->
    					<div class="box-body">	
    						<dl class="dl-horizontal">
			                    <dt>Full Name</dt>
			                    <dd><?php echo ucfirst($lead_detail["first_name"]." ".ucfirst($lead_detail["last_name"])); ?></dd>

			                    <dt>Contact Number</dt>
			                    <dd><?php echo $lead_detail["contact_no"]; ?></dd>
			                    
			                    <dt>Email</dt>
			                    <dd><a href="mailto:<?php echo $lead_detail["email"]; ?>"><?php echo $lead_detail["email"]; ?></a> </dd>
			                    
			                    <dt>Address</dt>
			                    <dd><?php echo $lead_detail["address"].", ".$lead_detail["district"]; ?></dd>

			                    <dt>Interested Level</dt>
			                    <dd><?php echo $lead_detail["interested_level"]; ?></dd>

			                    <dt>Interested Semester</dt>
			                    <dd><?php echo $lead_detail["interested_semester"]; ?></dd>

			                    <dt>Interested Faculty</dt>
			                    <dd><?php echo $lead_detail["interested_faculty"]; ?></dd>

			                    <dt>Type</dt>
			                    <dd><?php echo $lead_detail["type"]; ?></dd>

			                    <dt>Status</dt>
			                    <dd><?php echo ucfirst($lead_detail["status"]); ?></dd>

			                    <dt>Comments</dt>
			                    <dd><?php echo ($lead_detail["comments"]!="")?$lead_detail["comments"]:"-"; ?></dd>

			                    <dt>Follow up Date</dt>
			                    <dd><?php echo $lead_detail["follow_up_date"]; ?></dd>

			                    <dt>Follow ups</dt>
			                    <dd><?php echo $followup_detail["follow_up_count"]; ?></dd>

			                    <dt>Follow up Feedback</dt>
			                    <dd><?php echo ($followup_detail["feedback_message"]!="")?$followup_detail["feedback_message"]:"-"; ?></dd>
		                  </dl>				
    						
    					</div><!-- /.box-body -->
    			</div><!-- /.box -->
    		</div>

			<?php 
				if ($lead_detail["follow_up_date"]==date("Y-m-d")) {
			?>
    		<div class="col-md-6">
    			<div class="box box-success">
    				<div class="box-header with-border">
    					<h3 class="box-title">Update Follow up</h3>
    				</div><!-- /.box-header -->
    					<!-- form start -->
    					
    					<form class="" method="post" action="<?php echo URL; ?>leads/do_followup/<?php echo $lead_id; ?>/<?php echo $followup_detail["id"] ?>">
	    					<div class="box-body">	
	    						<div class="form-group">
	    							<label class="control-label">Next follow up after <small>(In Days)</small></label>
    								<div class="form-group">
    									<div class="form-group">
	        								<input type="number" class="form-control" value="<?php echo $diff; ?>" placeholder="Enter the number of days to followup after." name="next_follow">
										</div>
    								</div>
	    						</div>  		

	    						<div class="form-group">
									<label>Feedback</label>
								    <textarea class="form-control h65" placeholder="Enter feedback or comments if any." name="comments"></textarea>
								</div>	

								<div class="box-footer">
									<div class="pull-right">
										<a href="<?php echo URL; ?>leads/change_status/postpone/<?php echo $lead_id; ?>" class="mr15 btn btn-warning" data-rel="tooltip" title="Postpone for next semester">Postpone</a>
										<a href="<?php echo URL; ?>leads/change_status/dismiss/<?php echo $lead_id; ?>" class="mr15 btn btn-danger" data-rel="tooltip" title="Dismiss the lead">Not Interested</a>
										<button type="submit" class="btn btn-success mr15">Update Follow Up</button>
										<!-- <button type="reset" class="btn btn-danger ">Reset</button> -->
									</div>			
								</div>
	    						
	    						
	    					</div><!-- /.box-body -->
    					</form>
				</div><!-- /.box -->
    		</div>
			<?php 	}
			?>
			
    	</div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


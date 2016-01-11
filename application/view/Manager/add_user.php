<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
			<form class="" method="post" action="<?php echo URL; ?>manager/do_add_user">
				<div class="col-md-6">
	    			<div class="box box-success">
	    				<div class="box-header with-border">
	    					<h3 class="box-title">User' Information</h3>
	    				</div><!-- /.box-header -->
	    				<!-- form start -->
	    					<div class="box-body">	
	    						
								<div class="form-group">
									<label class="control-label">Name</label>
    								<input type="text" class="form-control" placeholder="Enter users' name" name="name">
	    						</div>
	    							
	    						<div class="row">
	    							<div class="col-sm-6">
	    								<div class="form-group">
			    							<label class="control-label">Contact Number</label>
		    								<input type="text" class="form-control" placeholder="Enter users' contact number" name="contact">
			    						</div>
	    							</div>
	    							<div class="col-sm-6">
	    								<div class="form-group">
			    							<label class="control-label">Email</label>
		    								<input type="email" class="form-control" placeholder="Enter users' email address" name="email">
			    						</div>
	    							</div>
	    						</div>

								<div class="form-group">
	    							<label class="control-label">Address</label>
    								<input type="text" class="form-control" placeholder="Enter users' address" name="address">
	    						</div>

	    						<div class="form-group">
	    							<label class="control-label">Role</label>
	    							<select class="form-control" name="role">
	    								<option>Manager</option>
	    								<option>Counsellor</option>
	    							</select>
	    						</div>

	    						<div class="row">
	    							<div class="col-sm-6">
	    								<div class="form-group">
			    							<label class="control-label">Password</label>
		    								<input type="password" class="form-control" placeholder="Enter users' password" name="password">
			    						</div>
	    							</div>
	    							<div class="col-sm-6">
	    								<div class="form-group">
			    							<label class="control-label">Re enter Password</label>
		    								<input type="password" class="form-control" placeholder="Re-enter users' password" name="re_password">
			    						</div>
	    							</div>
	    						</div>
	    						
	    					</div><!-- /.box-body -->
	    					<div class="box-footer">
								<div class="pull-right">
									<button type="submit" class="btn btn-success mr15">Add User</button>
									<button type="reset" class="btn btn-danger ">Reset</button>
								</div>			
							</div>
	    			</div><!-- /.box -->
	    		</div>

	    		
			</form>
    	</div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


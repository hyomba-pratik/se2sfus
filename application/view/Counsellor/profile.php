<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Profile
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">       
            <form action="<?php echo URL."counsellor/update_profile"; ?>" method="post">
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">User Information</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                            <div class="box-body">  
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $profile_detail["name"]; ?>">                                       
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your address" name="address" value="<?php echo $profile_detail["address"]; ?>">                                       
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Contact</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your contact number" name="contact_no" value="<?php echo $profile_detail["contact_no"]; ?>">                                       
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $profile_detail["email"]; ?>">                                       
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Role</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="" disabled="" value="<?php echo ucfirst($profile_detail["role"]); ?>">                                       
                                            </div>
                                        </div> 

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="" disabled="" value="<?php echo ucfirst($profile_detail["status"]); ?>">                                       
                                            </div>
                                        </div>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Current Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Enter your current password" name="password">                                       
                                    </div>
                                </div>  
                                
                                
    

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                        <!-- <button type="reset" class="btn btn-danger ">Reset</button> -->
                                    </div>          
                                </div>
                                
                                
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </form>

            <form action="<?php echo URL."counsellor/update_password"; ?>" method="post">
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Change Password</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                            <div class="box-body">  
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Enter your new password" name="new_password">                                       
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label">Reenter New Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Reenter your new password" name="re_new_password">                                       
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label">Current Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Enter your current password" name="cur_password">                                       
                                    </div>
                                </div>  

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success">Change Password</button>
                                        <!-- <button type="reset" class="btn btn-danger ">Reset</button> -->
                                    </div>          
                                </div>
                                
                                
                            </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </form>


        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


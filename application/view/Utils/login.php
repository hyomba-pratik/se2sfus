<div class="login-box mt20">
    <div class="login-box mb20">
        <div class="login-logo">
            <a href="" class="font26"><b>Student</b> Follow up System</a>
            <img src="<?php echo URL."assets/images/logo.png"?>" class="h100 w120" alt="College Logo">
        </div>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo URL ?>utils/do_login" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
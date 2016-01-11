<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo URL; ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>SFuS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg font16">Islington College - <b>SFuS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?php echo $countTodayLeads; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php echo $countTodayLeads; ?> follow ups to do today.</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php 
                                        foreach ($leads_detail_today as $key => $lead) {
                                    ?>
                                    <li>
                                        <a href="<?php echo URL."leads/todays_followup";?>">
                                            <i class="fa fa-user text-<?php echo (($loggedin_user["user_role"])=="Counsellor")?"green":"blue"; ?>"></i> <?php echo ucfirst($lead["first_name"])." ".ucfirst($lead["last_name"]); ?>
                                        </a>
                                    </li>
                                    <?php    }
                                    ?>
                                </ul>
                            </li>
                            <li class="footer"><a href="<?php echo URL."leads/todays_followup";?>">View all leads</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?php echo ucwords($loggedin_user["user_name"]); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo URL."assets/images/logo.png"?>" class="h100 w120" alt="College Logo">
                                <p>
                                    <?php echo ucwords($loggedin_user["user_name"]); ?> - <?php echo ucwords($loggedin_user["user_role"]); ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo URL."utils/do_logout"; ?>" class="btn btn-default btn-flat">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
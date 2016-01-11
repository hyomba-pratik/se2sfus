<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo ($active_menu=="dashboard")?"active":""; ?>">
                <a href="<?php echo URL; ?>"  accesskey="1">
                    <i class="fa fa-dashboard"></i> <span>1. Dashboard</span>
                </a>
            </li>

            
            <?php 
                if($loggedin_user["user_role"]=="Counsellor"){
            ?>   
            <li class="<?php echo ($active_menu=="followups")?"active":""; ?>">
                <a href="<?php echo URL."leads/todays_followup" ?>" accesskey="2">
                    <i class="fa fa-star"></i> <span>2. Todays' Follow up</span> <small class="label pull-right bg-<?php echo (($loggedin_user["user_role"])=="Counsellor")?"green":"blue"; ?>"><?php echo $countTodayLeads; ?></small>
                </a>
            </li>
            <li class="<?php echo ($active_menu=="add_leads")?"active":""; ?>">
                <a href="<?php echo URL."leads/add_leads"; ?>" accesskey="3">
                    <i class="fa fa-user-plus"></i> <span>3. Add Lead</span>
                </a>
            </li>                
            <?php    }else{
            ?>    
            <li class="<?php echo ($active_menu=="add_counsellor")?"active":""; ?>">
                <a href="<?php echo URL."counsellor/add_counsellor" ?>" accesskey="2">
                    <i class="fa fa-user-plus"></i> <span>2. Add Counsellor</span>
                </a>
            </li>
            <li class="<?php echo ($active_menu=="list_counsellor")?"active":""; ?>">
                <a href="<?php echo URL."counsellor/list_counsellor"; ?>" accesskey="3">
                    <i class="fa fa-list"></i> <span>3. List Counsellor</span>
                </a>
            </li>
            <?php } ?>
            
            <li class="<?php echo ($active_menu=="list_leads")?"active":""; ?>">
                <a href="<?php echo URL."leads/list_leads"; ?>" accesskey="4">
                    <i class="fa fa-list"></i> <span>4. List Leads</span> <small class="label pull-right bg-<?php echo (($loggedin_user["user_role"])=="Counsellor")?"green":"blue"; ?>"><?php echo $countLead; ?></small>
                </a>
            </li>
            <li class="<?php echo ($active_menu=="profile")?"active":""; ?>">
                <a href="<?php echo URL."counsellor/profile"; ?>" accesskey="5">
                    <i class="fa fa-user"></i> <span>5. My Profile</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo URL."utils/do_logout"; ?>" accesskey="6">
                    <i class="fa fa-sign-out"></i> <span>6. Log Out</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
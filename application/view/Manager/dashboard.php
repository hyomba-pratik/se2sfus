<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?php echo $countLead; ?></h3>
                                <p>Leads</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="<?php echo URL."leads/list_leads"; ?>" class="small-box-footer">List all leads <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3><?php echo $countUsers; ?></h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo URL; ?>manager/add_user" class="small-box-footer">Add new user <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xs-6">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student Status Chart</h3>
                               
                            </div>
                            <div class="box-body">
                                <canvas id="pieChart" height="215"></canvas>
                            </div><!-- /.box-body -->
                        </div>                         
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Leads Registration Rate</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="chart">
                                            <canvas id="lineChart" height="150"></canvas>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            <?php 
               

                //echo $countActive;
            ?>
           
            

            <div class="col-sm-3">
                <div class="pad box-pane-right bg-blue pb20" >
                    <div class="description-block margin-bottom">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header"><?php echo $countLead; ?></h5>
                        <span class="description-text">Total Leads/Students</span>
                    </div>
                    <div class="description-block margin-bottom">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header">
                        <?php 
                            $countLeadsChart = 0;
                            foreach ($leads_detail as $key => $leads) {
                                if ($leads["type"]=="Lead") {
                                    $countLeadsChart++;
                                }
                            }
                            echo number_format($countLeadsChart/$countLead*100,0)." %";
                        ?>
                        </h5>
                        <span class="description-text">Leads</span>
                    </div>
                    <div class="description-block">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header">
                        <?php 
                            $countStudentsChart = 0;
                            foreach ($leads_detail as $key => $leads) {
                                if ($leads["type"]=="Student") {
                                    $countStudentsChart++;
                                }
                            }
                            echo number_format($countStudentsChart/$countLead*100,0)." %";
                        ?>
                        </h5>
                        <span class="description-text">Students</span>
                    </div>
                </div>                
            </div>
            
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


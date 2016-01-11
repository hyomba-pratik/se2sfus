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
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $countTodayLeads; ?></h3>
                                <p>Follow ups Today</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <a href="<?php echo URL."leads/todays_followup"; ?>" class="small-box-footer">List all follow ups <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>5</h3>
                                <p>New Leads Today</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="<?php echo URL; ?>leads/add_leads" class="small-box-footer">Add new lead <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $countLead; ?></h3>
                                <p>Leads</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo URL; ?>leads/list_leads" class="small-box-footer">List all leads <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Leads Location Chart</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="250"></canvas>
                                        </div><!-- ./chart-responsive -->
                                    </div><!-- /.col -->
                                   
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                        </div>
                    </div>    
                </div>    

                
            </div>

            <div class="col-sm-3">
                <div class="pad box-pane-right bg-green pb20" >
                    <div class="description-block margin-bottom">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header">20</h5>
                        <span class="description-text">Total Leads</span>
                    </div><!-- /.description-block -->
                    <div class="description-block margin-bottom">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header">30%</h5>
                        <span class="description-text">Not Interested</span>
                    </div><!-- /.description-block -->
                    <div class="description-block">
                        <div class="sparkbar pad" >
                            <i class="fa fa-bar-chart fa-4x"></i>
                        </div>
                        <h5 class="description-header">70%</h5>
                        <span class="description-text">Interested</span>
                    </div><!-- /.description-block -->
                </div>                
            </div>

            

            

                 

            


        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


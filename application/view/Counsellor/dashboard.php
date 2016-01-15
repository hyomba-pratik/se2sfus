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

                      
                </div>    

                
            </div>

        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Leads Added By <strong><?php echo $counsellor_detail["name"]; ?></strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
			<div class="col-sm-12">
				<table class="table" data-table='footable']>
					<thead>
						<tr>
							<th>SN</th>
							<th data-sortable="false">Full Name</th>
							<th data-sortable="false">Contact</th>
							<th data-breakpoints="all" data-type="html" data-sortable="false">Email</th>
							<th data-breakpoints="all">Address</th>
							<th data-type="date">Follow up</th>
							<th >Level</th>
							<th >Faculty</th>
							<th data-breakpoints="all">Semester</th>
							<th data-breakpoints="all">Notes</th>
							<th data-breakpoints="all">Type</th>
							<th data-breakpoints="all">Status</th>
							<th data-type="html"></th>
							
						</tr>
					</thead>
					<tbody>
					<?php 
					//print_r($leads_detail);
						foreach ($leads_detail as $key => $lead) {
					?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo ucfirst($lead["first_name"])." ".ucfirst($lead["last_name"]); ?></td>
							<td><?php echo $lead["contact_no"]; ?></td>
							<td><a href="mailto:<?php echo $lead["email"]; ?>"><?php echo $lead["email"]; ?></a></td>
							<td><?php echo $lead["address"].", ".$lead["district"]; ?></td>
							<td><?php echo date('M d, Y', strtotime($lead["follow_up_date"])); ?></td>
							<td><?php echo $lead["interested_level"]; ?></td>
							<td><?php echo $lead["interested_faculty"]; ?></td>
							<td><?php echo $lead["interested_semester"]; ?></td>
							<td><?php echo ucfirst($lead["comments"]); ?></td>
							<td><?php echo $lead["type"]; ?></td>
							<td><?php echo ucfirst($lead["status"]); ?></td>
							
						
							<td>
								<a href="<?php  echo URL; ?>leads/followup/<?php echo $lead["id"]; ?>" data-id="<?php echo $lead["id"]; ?>" title="Follow up detail" data-rel="tooltip"><i class="fa fa-chevron-circle-right"></i></a>
							</td>
							
						</tr>
					<?php 
						}
					?>	
					</tbody>
				</table>
			</div>
    	</div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


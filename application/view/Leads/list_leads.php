<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Lead
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
			<div class="col-sm-12">
				<table class="table" data-table='footable']>
					<thead>
						<tr>
							<th>ID</th>
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
							<?php 
								if ($loggedin_user["user_role"]=="Counsellor") {
									echo '<th data-sortable="false" data-type="html"></th>';
								}
							?>
							
							
						</tr>
					</thead>
					<tbody>
					<?php 
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
							<?php 
								if ($loggedin_user["user_role"]=="Counsellor") {
							?>
							<td>
								<a href="#<?php /* echo URL; ?>leads/change_status/delete/<?php echo $lead["id"]; */?>" title="Edit" data-rel="tooltip"><i class="fa fa-pencil"></i></a> |
								<a href="<?php echo URL; ?>leads/change_status/delete/<?php echo $lead["id"]; ?>" data-action='delete' title="Delete" data-rel="tooltip"><i class="fa fa-user-times"></i></a> |
								<a class="<?php echo ($lead["type"]=='Student')?"hide":""; ?>" href="<?php echo URL; ?>leads/change_status/student/<?php echo $lead["id"]; ?>" data-action='make_student' title="Make student" data-rel="tooltip"><i class="fa fa-mortar-board"></i></a>
								<a class="<?php echo ($lead["type"]=='Lead')?"hide":""; ?>" href="<?php echo URL; ?>leads/change_status/lead/<?php echo $lead["id"]; ?>" data-action='make_student' title="Make Lead" data-rel="tooltip"><i class="fa fa-mortar-board"></i></a>
							</td>
							<?php } ?>
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


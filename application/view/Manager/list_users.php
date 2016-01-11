<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Users
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
							<th data-sortable="false">Name</th>
							<th data-sortable="false">Contact</th>
							<th data-breakpoints="all" data-type="html" data-sortable="false">Email</th>
							<th data-breakpoints="all">Address</th>
							<th data-breakpoints="xs">Leads Added</th>
							<th>Role</th>
							<th data-breakpoints="all">Status</th>
							<th data-type="html"></th>
							
							
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($users_detail as $key => $user) {
					?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo ucwords($user["name"]); ?></td>
							<td><?php echo $user["contact_no"]; ?></td>
							<td><a href="mailto:<?php echo $user["email"]; ?>"><?php echo $user["email"]; ?></a></td>
							<td><?php echo $user["address"]; ?></td>
							<td><?php echo $user["no_of_leads"]; ?></td>
							<td><?php echo $user["role"]; ?></td>
							<td><?php echo ucfirst($user["status"]); ?></td>
							
							<td>
								<a href="" data-rel="tooltip" title="Edit Profile"><i class="fa fa-pencil"></i></a> |
								<a href="" data-rel="tooltip" title="View Leads"><i class="fa fa-users"></i></a> |
								<a href="" data-rel="tooltip" title="Deactivate Profile"><i class="fa fa-remove"></i></a>
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


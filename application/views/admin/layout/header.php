<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title> Admin</title>

	<link href="<?php echo base_url(); ?>admin/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>admin/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>admin/css/admin.css" rel="stylesheet">
	
	<script src="<?php echo base_url(); ?>admin/js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/js/core.js"></script>
	<script src="<?php echo base_url(); ?>admin/js/all.js"></script>
</head>
<body>
	<header class="container-fluid">
		<div class="row">
			<div class="span6"><h1>Bootstrap Admin</h1></div>
			<div class="span6">
				<ul class="nav nav-pills pull-right">
					<li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-black"></i> Dashboard</a></li>
					<li><a href="#"><i class="icon-question-sign icon-black"></i> Help</a></li>
<!-- lam contact -->

					<li class="dropdown" id="contact-auto">
						<a class="dropdown-toggle" data-toggle="modal" href="#" data-target="#unread_contact" >
							<i class=" icon-envelope icon-black"></i> Contact 
							<span id="number_contact" class="badge badge-info"> 3 </span> 
							<b class="caret"></b>
						</a>
						<!-- Modal -->
						<div class="modal fade" id="unread_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Modal title</h4>
							  </div>
							  <div class="modal-body">
								...
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</li>
<!-- end lam contact -->					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user icon-black"></i> Aydao <span class="badge badge-info">3</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="#"><i class="icon-envelope icon-black"></i> Messages <span class="badge badge-info">3</span></a></li>
							<li><a href="#"><i class="icon-tasks icon-black"></i> Tasks</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-pencil icon-black"></i> Edit profile</a></li>
							<li><a href="#"><i class="icon-random icon-black"></i> Change password</a></li>
							<li><a href="#"><i class="icon-wrench icon-black"></i> Settings</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url(); ?>admin_home/logout"><i class="icon-off icon-black"></i> Logout</a></li>
						</ul>
					</li>					
				</ul>
			</div>
		</div>
	</header>

	<div class="navbar navbar-static-top navbar-inverse">
		<div class="navbar-inner">
			<ul class="nav">
				<li><a href="<?php echo base_url(); ?>admin_posts"><i class="icon-file icon-white"></i> Posts</a></li>
				<li><a href="#"><i class="icon-comment icon-white"></i> Comments</a></li>
				<li><a href="<?php echo base_url(); ?>admin_items"><i class="icon-folder-open icon-white"></i> Categories</a></li>
				<li><a href="#"><i class="icon-tag icon-white"></i> Tags</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user icon-white"></i> Members <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>admin_users"><i class="icon-list-alt icon-black"></i> List users</a></li>
						<li><a href="#"><i class="icon-star icon-black"></i> Roles</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="icon-wrench icon-white"></i> System</a></li>
			</ul>
		</div>
	</div>
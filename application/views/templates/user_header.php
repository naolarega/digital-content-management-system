<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Digital content management system</title>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/custom.css" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="row">
				<div class="col-lg-3 brand">
					<span class="glyphicon glyphicon-globe"></span>
					digital content distribution
				</div>
				<div class="col-lg-offset-7 col-lg-2">
					<span class="badge">0</span>
					<span >user name</span>
					<button type="button" class="btn btn-default pull-right">
						<span class="glyphicon glyphicon-user"></span>
						profile</button>
				</div>
			</div>
		</div>
		<div id="upload-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload</h4>
			  </div>
				<div class="modal-body">
				<form action="#">
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-6">
							<button type="button" class="btn btn-default" id="firstname">choose file...</button>
						</div><br />
					</div>
					<div class="form-group">
						<label for="title" class="col-lg-2 control-label">Title</label>
						<div class="col-lg-6">
							<input type="text" class="form-control" id="title" />
						</div><br />
					</div>
					<div class="form-group">
						<label for="description" class="col-lg-2 control-label">Description</label>
						<div class="col-lg-6">
							<textarea class="form-control" row="4" id="description"></textarea>
						</div><br />
					</div>
					<div class="form-group">
						<label for="tags" class="col-lg-2 control-label">Tags</label>
						<div class="col-lg-6">
							<input type="number" class="form-control" id="tags" />
						</div><br />
					</div>
					<div class="form-group">
						<label for="price" class="col-lg-2 control-label">Price</label>
						<div class="col-lg-2">
							<input type="number" class="form-control" id="price" />
						</div>
						birr
						<br />
					</div>
					<div class="form-group">
						<div class="col-lg-offset-5 col-lg-3">
							<button type="button" class="btn btn-default btn-block">
								<span class="glyphicon glyphicon-save"></span>
								Publisher</button>
						</div>
					</div>
				</form>
				</div>
			 </div>
			</div>
		  </div>
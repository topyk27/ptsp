<html>
<?php $this->load->view("_partials/head.php") ?>
<body>
	<div class="navbar navbar-inverse logo-pa">
		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 full-card">
				<h1 class="tengah">LOGIN</h1>
				<?php if($this->session->flashdata('success')): ?>
					<div class="alert alert-success tengah" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<div class="card login">
					<form method="post">
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" type="text" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<input class="btn btn-success" type="submit" value="LOGIN">
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
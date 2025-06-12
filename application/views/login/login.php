<?php $this->load->view('login/header'); ?>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h4>PT. Korsia Boan Perkasa</h4>
			</div>
			<div class="card-body">
				<form method="POST" action="<?=base_url('home/login')?>">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Username" name="username" required="">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Password" name="password" required="">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right btn-primary btn-block" id="btnLogin">
					</div>
				</form>
			</div>
		</div>
	</div>

	

<?php $this->load->view('login/footer'); ?>

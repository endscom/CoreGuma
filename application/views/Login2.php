
<body class="avoid-fout page-blue ">
	<header class="header">		
		<img src="<?php echo base_url('assets/img/LGW.png');?>" style="width:170px;height:auto">
	</header>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">
					<section class="content-inner">
						<div class="card-wrap">
							<div class="card">
								<div class="card-main">
									<div class="card-header">
										<div class="card-inner">
											<center>
												<h5 class="card-heading">Plataforma DWEB, Bienvenido.</h5>			    								
			    							</center>
										</div>
									</div>
									<div class="card-inner">
										<p class="text-center">
											<span class="avatar avatar-inline avatar-lg">

												<img alt="Login" src="<?php echo base_url('assets/images/users/avatar-001.jpg');?>">
											</span>
										</p>										
										<form class="form" method="post" action="<?php echo base_url('index.php/Acreditar')?>">		      
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-username">Usuario.</label>
														<input class="form-control"  type="text" name="txtUsuario">
													</div>
												</div>
											</div>											
											<div class="form-group form-group-label">
												<div class="row">
													<div class="col-md-10 col-md-push-1">
														<label class="floating-label" for="login-username">Contraseña</label>
														<input class="form-control"  type="password" name="txtpassword">
													</div>
												</div>
											</div>											
											<div class="form-group">
												<div class="row">
													<div class="col-md-10 col-md-push-1">														
														<button Class="btn btn-block btn-blue waves-button waves-effect waves-light" type="submit" name="action">Acceder</button>
													</div>
													
												</div>
											</div>										
										</form>
									</div>
								</div>
							</div>
						</div>						
					</section>
				</div>
			</div>
		</div>
	</div>


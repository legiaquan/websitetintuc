
	<body>
		<header>
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
							<?php if(isset($_SESSION['is_authenticated']) and $_SESSION['is_authenticated'] == 1){
								?>
									<ul>
										<li>
											<div class="dropdown">
												<button type="button" class="btn btn-outline-dark dropdown-toggle text-white" data-toggle="dropdown">
													<?php echo 'Xin chào, '.$_SESSION['last_name']; ?>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item text-danger" href="<?php echo base_url(); ?>Home/logout">Đăng xuất</a>
												</div>
											</div>
										</li>
									</ul>
								<?php
							}else{ ?>
							<ul>
								<li><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dangKi">Đăng kí</button></li>
								<div class="modal" id="dangKi">
									<div class="modal-dialog">
										<div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Đăng kí</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal body -->
											<div class="modal-body">
												<div class="container">
													<div class="row">
														<aside class="col-sm">
															<div class="card">
																<?php echo form_open('Home/register_validation'); ?>
																<article class="card-body">
																	<h4 class="card-title text-center mb-4 mt-1">Đăng kí tài khoản mới</h4>
																	<hr>
																	<p class="text-success text-center">Đăng kí đồng nghĩa với đồng ý với điều khoản</p>
																	<form>
																	<div class="form-group">
																		<div class="input-group">
																			<div class="input-group-prepend">
																				<span class="input-group-text"> <i class="fa fa-user"></i> </span>
																			 </div>
																			<input name="firstname" class="form-control" placeholder="Họ và chữ lót" type="text">
																			<input name="lastname" class="form-control" placeholder="Tên" type="text">
																		</div> <!-- input-group.// -->
																	</div> <!-- form-group// -->
																	<div class="form-group">
																		<div class="input-group">
																			<div class="input-group-prepend">
																				<span class="input-group-text"> <i class="fa fa-user"></i> </span>
																			 </div>
																			<input name="user" class="form-control" placeholder="Tên tài khoản" type="text">
																		</div> <!-- input-group.// -->
																	</div>
																	<div class="form-group">
																		<div class="input-group">
																			<div class="input-group-prepend">
																				<span class="input-group-text"> <i class="fa fa-user"></i> </span>
																			 </div>
																			<input name="email" class="form-control" placeholder="Email của bạn" type="email">
																		</div> <!-- input-group.// -->
																	</div> <!-- form-group// -->
																	 <!-- form-group// -->
																	<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-prepend">
																			<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																		 </div>
																		<input name="password" class="form-control" placeholder="Mật khẩu" type="password">
																	</div> <!-- input-group.// -->
																	</div> <!-- form-group// -->
																	<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-prepend">
																			<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																		 </div>
																		<input name="repassword" class="form-control" placeholder="Nhập lại mật khẩu" type="password">
																	</div> <!-- input-group.// -->
																</div> <!-- form-group// -->
																	<div class="form-group">
																	<button name="submit" type="submit" class="btn btn-primary btn-block"> Đăng kí  </button>
																	</div> <!-- form-group// -->
																	</form>
																</article>
																<?php form_close(); ?>
															</div> <!-- card.// -->

														</aside> <!-- col.// -->
													</div> <!-- row.// -->

													</div> 
													<!--container end.//-->
											</div>
											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
											</div>
										</div>
									</div>
								</div>
								<li><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dangNhap">Đăng nhập</button></li>
								<div class="modal" id="dangNhap">
									<div class="modal-dialog">
										<div class="modal-content">
											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Đăng nhập</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<!-- Modal body -->
											<div class="modal-body">
												<div class="container">
													<div class="row">
														<aside class="col-sm">
															<div class="card">
																<article class="card-body">
																	<h4 class="card-title text-center mb-4 mt-1">Đăng nhập</h4>
																	<hr>
																	
																	<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-prepend">
																			<span class="input-group-text"> <i class="fa fa-user"></i> </span>
																		 </div>
																		<input id="login_username" name="login_username" class="form-control" placeholder="Tên tài khoản" type="text">
																	</div> <!-- input-group.// -->
																	<div id="username-error"></div>
																	</div> <!-- form-group// -->
																	<div class="form-group">
																	<div class="input-group">
																		<div class="input-group-prepend">
																			<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																		 </div>
																		<input id="login_password" name="login_password" class="form-control" placeholder="Mật khẩu" type="password">
																	</div> <!-- input-group.// -->
																	<div id="password-error"></div>
																	</div> <!-- form-group// -->
																	<div class="form-group">
																	<button name="login_submit" type="submit" class="btn btn-primary btn-block" onclick="loginAjax()"> Đăng nhập  </button>
																	</div> <!-- form-group// -->
																	<div id="error"></div>
																	<p class="text-center"><a href="#" class="btn">Quên mật khẩu?</a></p>
																	
																</article>
															</div> <!-- card.// -->

														</aside> <!-- col.// -->
													</div> <!-- row.// -->

													</div> 
													<!--container end.//-->
											</div>
											<!-- Modal footer -->
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</ul><?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="logo-wrap">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
							<a href="<?php echo base_url(); ?>">
								<img class="img-fluid" style="max-width: 130px" src="<?php echo base_url(); ?>assets/img/logo.png" alt="">
							</a>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
							<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/banner-ad.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col">
					  <?php if(!empty($this->input->get('msg')) && $this->input->get('msg') == 'reg_error') { ?>
					  <div class="alert alert-danger">
						Mật khẩu nhập lại không khớp, vui lòng thử lại
					  </div>
					<?php }else if(!empty($this->input->get('msg')) && $this->input->get('msg') == 'successfully'){
						?>
						<div class="alert alert-success">
						Bạn đã đăng kí thành công!
					  </div>
						<?php 
					}else if(!empty($this->input->get('msg')) && $this->input->get('msg') == 'login_error'){
						?>
						<div class="alert alert-danger">
						Thông tin đăng nhập không chính xác, thử lại
					  </div>
						<?php
					}else if(!empty($this->input->get('msg')) && $this->input->get('msg') == 'reg_error_dup'){
						?>
						<div class="alert alert-danger">
						Tên đăng nhập hoặc email đã bị trùng, xin đăng kí tên khác
					  </div>
						<?php
					} ?>
					</div>
				</div>
			</div>
			<div class="container main-menu" id="main-menu">
				<div class="row align-items-center justify-content-between">
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="menu-active"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
							<li class="menu-has-children"><a href="">Thể loại</a>
								<ul>
									<?php 
									foreach($danhmuctt as $rows_dmtt){
										$loaitin = $this->M_tin_tuc->ds_loaitin_theo_nhomtin($rows_dmtt->id_nhomtin);
										?>
										<li><a href=""><?php echo $rows_dmtt->ten_nhomtin; ?></a>
											<ul>
												<?php
													if($loaitin){
														foreach($loaitin as $rows_lt){
															if($rows_dmtt->id_nhomtin == $rows_lt->id_nhomtin){
																?>
																	<li><a href="<?php echo base_url().m_cut_space($rows_lt->ten_loaitin).'.html'; ?>"><?php echo $rows_lt->ten_loaitin; ?></a></li>
																<?php	
															}
														}
													}
												?>
											</ul>
										</li>
										<?php
									}
									?>
								</ul>
							</li>
							<li><a href="<?php echo base_url(); ?>about">Thông tin</a></li>
							<li><a href="<?php echo base_url(); ?>contact">Liên hệ</a></li>
						</ul>
					</nav><!-- #nav-menu-container -->
					<div class="navbar-right">
						<form action="<?php echo base_url('search'); ?>" method="GET">
							<input type="text" class="form-control Search-box" name="keywords" id="Search-box" placeholder="Search">
							<label for="Search-box" class="Search-box-label">
								<span class="lnr lnr-magnifier"></span>
							</label>
							<span class="Search-close">
								<span class="lnr lnr-cross"></span>
							</span>
						</form>
					</div>
				</div>
			</div>
		</header>
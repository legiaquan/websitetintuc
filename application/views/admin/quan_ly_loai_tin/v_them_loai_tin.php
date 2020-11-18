<!-- 
    @Author: Lê Gia Quân  
    @Student Code: DH51500890
    THIET KE VIEW
-->
<!-- 
    @Author: Lai Van Sang  
    @Student Code: DH51501933
    Fetch Data
-->
<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
    <?php $this->load->view('admin/include/head');?>
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

<!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <?php $this->load->view('admin/include/main-menu');?>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <?php $this->load->view('admin/include/navbar_header');?>
      </nav>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row">
        <div class="col-sm-12">
            <div class="content-header">Quản lý loại tin</div>
        </div>
    </div>
	<div class="row" style="width: 100%">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Thêm loại tin</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<?php echo form_open(current_url()); ?>
							<div class="form-body">
								<hr>
								<div class="row">	
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">Mã loại</label>
											<?php echo form_input($maloai); ?>
										</div>
										<?php echo form_error('maloai','<font color="red">', '</font>'); ?>
									</div>						
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">Tên loại</label>
											<?php echo form_input($tenloai); ?>
										</div>
										<?php echo form_error('tenloai', '<font color="red">', '</font>'); ?>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Nhóm tin</label>
											<select id="projectinput6" name="nhomtin" class="form-control">
												<?php foreach($newsgroup as $v): ?>
												<option value="<?php echo $v->id_nhomtin; ?>"><?php echo $v->ten_nhomtin; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Trạng thái</label>
											<select id="projectinput6" name="status" class="form-control">
												<option value="1" selected="">Hiển thị</option>
												<option value="0">Không hiển thị</option>
											
											</select>
										</div>
									</div>
									
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-raised btn-raised btn-warning mr-1" onclick="quayve()">
									<i class="ft-x"></i> Quay về
								</button>
								<button type="submit" class="btn btn-raised btn-raised btn-primary">
									<i class="fa fa-check-square-o"></i> Thêm
								</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>

</section>
<!-- // Basic form layout section end -->
          </div>
        </div>
        <!-- footer-->
        <?php $this->load->view('admin/include/footer');?>
        <!--END footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

   
     <!-- Theme customizer Starts-->
    <?php $this->load->view('admin/include/theme-custom');?>
    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->
    <?php $this->load->view('admin/include/js');?>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
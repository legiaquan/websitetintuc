<!-- 
    @Author: Lê Gia Quân  
    @Student Code: DH51500890
    THIET KE VIEW
-->
<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
    <?php $this->load->view('admin/include/head');?>
    <!-- CKEditor -->
		<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    <style>
		.col-md-6-x {
			position: relative;
		    width: 100%;
		    min-height: 1px;
		    padding-right: 15px;
		    padding-left: 15px;
		}
		select.form-control{
			width: 220px;
		}
	</style>
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
            <div class="content-header">Quản lý tin tức</div>
        </div>
    </div>
	<div class="row" style="width: 100%">
		<div class="col-md-6-x">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Thêm tin tức</h4>
					
				</div>
				<div class="card-body">
					<div class="px-3">
						<?php echo form_open(current_url()); ?>
							<div class="form-body">
								<hr>
								<div class="row">
									<div class="col-md-6-x">
										<div class="form-group">
											<label for="projectinput2">Tiêu đề</label>
											<?php echo form_input($tieude); ?>
										</div>
										<?php echo form_error('tieude'); ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6-x">
										<div class="form-group">
											<label for="editor">Mô tả</label>
											<?php echo form_input($mota, set_value('mota')); ?>
										</div>
										<?php echo form_error('mota'); ?>
									</div>
									<div class="col-md-6-x">
										<div class="form-group">
											<label for="projectinput4">Tác giả</label>
											<?php echo form_input($tacgia); ?>
										</div>
										<?php echo form_error('tacgia'); ?>
									</div>
								</div>

								

								<div class="row">
									<div class="col-md-6-x">
										<div class="form-group">
											<label for="projectinput5">Nhóm tin</label>
											<select name="nhomtin" id="nhomtin" class="form-control">
												<option value="null">--Chọn nhóm tin--</option>
												<?php foreach($nhomTin as $rows): ?>
												<option value="<?php echo $rows->id_nhomtin ?>"><?php echo $rows->ten_nhomtin; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-6-x">
										<div class="form-group">
											<label for="projectinput5">Loại tin</label>
											<select id="loaitin" name="loaitin" class="form-control">
												
											</select>
										</div>
									</div>

									<div class="col-md-6-x">
										<div class="form-group">
											<label for="projectinput6">Tin hot</label>
											<select id="tinhot" name="tinhot" class="form-control">
												<option value="0">None</option>
												<option value="1">HOT</option>
											
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="editor">Nội dung</label>
						            <textarea name="content" id="editor" rows="5" type="text" class="form-control"></textarea>
							
							    </div>
							    <?php echo form_error('content'); ?>
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

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#nhomtin").change(function(){
    			id = $(this).val();
    			$.get("<?php echo base_url('ajax/getLoaiTin/') ?>"+id, function(data){
    				$("#loaitin").html(data);
    			});
    		});
    	});
    </script>
		<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
  </body>
</html>
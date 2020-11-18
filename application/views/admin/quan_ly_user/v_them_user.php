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
            <div class="content-header">Quản lý user</div>
        </div>
    </div>
  <div class="row" style="width: 100%">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-form">Thêm user</h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">
            <?php echo form_open(uri_string());?>
              <div class="form-body">
                <hr>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Username </label>
                      <?php echo form_input($identity);?>
                    </div>
                    <?php echo form_error('identity','<font color="red">','</font>');?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Email </label>
                      <?php echo form_input($email);?>
                    </div>
                    <?php echo form_error('email','<font color="red">','</font>');?>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Họ </label>
                      <?php echo form_input($first_name);?>
                    </div>
                    <?php echo form_error('first_name','<font color="red">','</font>');?>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2">Tên </label>
                      <?php echo form_input($last_name);?>
                    </div>
                    <?php echo form_error('last_name','<font color="red">','</font>');?>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('create_user_fname_label', 'company');?> </label>
                      <?php echo form_input($company);?>
                    </div>
                    <?php echo form_error('company','<font color="red">','</font>');?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('create_user_phone_label', 'phone');?> </label>
                      <?php echo form_input($phone);?>
                    </div>
                    <?php echo form_error('phone','<font color="red">','</font>');?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('create_user_password_label', 'password');?> </label>
                      <?php echo form_input($password);?>
                    </div>
                    <?php echo form_error('password','<font color="red">','</font>');?>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?> </label>
                      <?php echo form_input($password_confirm);?>
                    </div>
                    <?php echo form_error('password_confirm','<font color="red">','</font>');?>
                  </div>
                </div>
              </div>

              <div class="form-actions">
                
                <button type="button" class="btn btn-raised btn-raised btn-warning mr-1" onclick="quayve()">
                  <i class="ft-x"></i> Quay về
                </button>
                <p><?php echo form_button($submit);?></p>
              </div>
            <?php echo form_close();?>
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

    <!-- START Notification Sidebar-->
     <!-- Theme customizer Starts-->
    <?php $this->load->view('admin/include/theme-custom');?>
    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->
    <?php $this->load->view('admin/include/js');?>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
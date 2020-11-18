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
          <h4 class="card-title" id="basic-layout-form">Sửa user</h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open(uri_string());?>
              <div class="form-body">
                <hr>
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_fname_label', 'first_name');?> </label>
                      <?php echo form_input($first_name);?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_lname_label', 'last_name');?> </label>
                      <?php echo form_input($last_name);?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_company_label', 'company');?> </label>
                      <?php echo form_input($company);?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_phone_label', 'phone');?> </label>
                      <?php echo form_input($phone);?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_password_label', 'password');?> </label>
                      <?php echo form_input($password);?>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput2"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?> </label>
                      <?php echo form_input($password_confirm);?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <?php if ($this->ion_auth->is_admin()): ?>

                          <h3><?php echo lang('edit_user_groups_heading');?></h3>
                          <?php foreach ($groups as $group):?>
                              <label class="checkbox">
                              <?php
                                  $gID=$group['id'];
                                  $checked = null;
                                  $item = null;
                                  foreach($currentGroups as $grp) {
                                      if ($gID == $grp->id) {
                                          $checked= ' checked="checked"';
                                      break;
                                      }
                                  }
                              ?>
                              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                              </label>
                          <?php endforeach?>

                      <?php endif ?>

                      <?php echo form_hidden('id', $user->id);?>
                      <?php echo form_hidden($csrf); ?>
                    </div>
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
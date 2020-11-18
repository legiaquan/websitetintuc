<!DOCTYPE html>
<html lang="en" class="loading">
  <head>
    <?php $this->load->view('admin/include/head');?>
  </head>
  <body data-col="2-columns" class=" 2-columns ">
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
          <div class="content-wrapper"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo lang('deactivate_heading');?></h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                      <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

                      <?php echo form_open("auth/deactivate/".$user->id);?>

                        <p>
                          <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                          <input type="radio" name="confirm" value="yes" checked="checked" />
                          <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                          <input type="radio" name="confirm" value="no" />
                        </p>

                        <?php echo form_hidden($csrf); ?>
                        <?php echo form_hidden(['id' => $user->id]); ?>

                        <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

                      <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Zero configuration table -->


          </div>
        </div>

        <?php $this->load->view('admin/include/footer');?>

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
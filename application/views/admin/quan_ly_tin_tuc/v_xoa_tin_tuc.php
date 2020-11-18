<!-- 
    @Author: Lê Gia Quân  
    @Student Code: DH51500890
    THIET KE VIEW
-->
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
                    <h4 class="card-title">Xóa bài viết (<?php echo $tieude;?>)</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">

                      <?php echo form_open(current_url());?>
                        <input type="hidden" name="confirm" value="1" />
                        <div class="form-actions">
                          <button type="button" class="btn btn-raised btn-raised btn-warning mr-1" onclick="quayve()">
                            <i class="ft-x"></i> Quay về
                          </button>
                          <button type="submit" name="submit" class="btn btn-raised btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Xóa
                          </button>
                        </div>

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
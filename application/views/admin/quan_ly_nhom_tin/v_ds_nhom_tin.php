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
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-12">
        <div class="content-header">Quản lý nhóm tin</div>
        <p class="content-sub-header"></p>
    </div>
</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách nhóm tin - <a href="<?php echo current_url() ?>/add">Thêm</a></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table table-responsive-md-md text-center">
                            <thead>
                                <tr>
                                    <th>Mã nhóm tin</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    foreach ($nhom_list as $row) {

                                    ?>
                                <tr>
                                    <td><?php echo $row->id_nhomtin ?></td>    
                                    <td><?php echo $row->ten_nhomtin ?></td>
                                    <td><?php echo check_trangthai($row->trangthai);?></td>
                                    <td>
                                        <a class="success p-0" data-original-title="" title="" href="<?php echo current_url() ?>/edit/<?php echo $row->id_nhomtin;?>">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="" href="<?php echo current_url() ?>/remove/<?php echo $row->id_nhomtin;?>">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Extended Table Ends-->

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
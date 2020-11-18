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
                    <h4 class="card-title">Quản lý loại tin</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <p class="card-text">Danh sách loại tin - <a href="<?php echo current_url(); ?>/add" /><b>Thêm</b></a></p>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Mã loại tin</th>
                                    <th>Nhóm tin</th>
                                    <th>Tên loại tin</th>
                                    <th>Trạng thái</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php

                                    foreach ($cate_list as $row) {

                                ?>
                                <tr>
                                    <td><?php echo $row->id_loaitin ?></td>    
                                    <td><?php echo $row->ten_nhomtin ?></td>
                                    <td><?php echo $row->ten_loaitin ?></td>
                                    <td><?php echo check_trangthai($row->trangthai);?></td>
                                    <td>
                                        <a class="success p-0" data-original-title="" title="" href="<?php echo current_url() ?>/edit/<?php echo $row->id_loaitin;?>">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="" href="<?php echo current_url() ?>/remove/<?php echo $row->id_loaitin;?>">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>

                                
                        </table>
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
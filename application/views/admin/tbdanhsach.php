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
                    <h4 class="card-title">Danh sách user</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <p class="card-text"></p>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                   <th>Tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Mail</th>
                                    <th>SĐT</th>
                                    <th>Trạng thái</th>
                                    <th>Chức vụ</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($user_list as $row) {

                                ?>
                                <tr>
                                    <td><?php echo $row->id_user ?></td>    
                                    <td><?php echo $row->hoten ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->sdt ?></td>
                                   
                                    <td>Đang hoạt động</td>
                                    <td><?php check_capquyen($row->capquyen);?></td>
                                    <td>
                                        <a class="success p-0" data-original-title="" title="" href="qlusersua?id=<?php echo $row->id_user;?>">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title="">
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
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
                    <h4 class="card-title">Danh sách user <a href="<?php echo current_url() ?>/add"><b>Thêm</b></a></h4>
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
                                    <th>Groups</th>
                                    <th>Trạng thái</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user):?>
                                <tr>
                                    <td><?php echo $user->id ?></td>    
                                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8')." ".htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');;?></td>
                                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                    <td>
                                      <?php foreach ($user->groups as $group):?>
                                        <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                      <?php endforeach?>
                                    </td>
                                   
                                    <td><?php echo ($user->active) ? anchor("Admin/users/deactivate/".$user->id, lang('index_active_link')) : anchor("Admin/users/activate/". $user->id, lang('index_inactive_link'));?></td>
                                    <td>
                                        <a class="success p-0" data-original-title="" title="" href="<?php echo base_url('Admin/users/edit/'.$user->id); ?>">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <!--<a class="danger p-0" data-original-title="" title="">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>-->
                                    </td>
                                </tr>
                                <?php endforeach;?>     
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
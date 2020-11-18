<!-- 
    @Author: Lê Gia Quân  
    @Student Code: DH51500890
    THIET KE VIEW
-->
<?php
  //var_dump($tin_list);
?>
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
                    <h4 class="card-title">Quản lý tin tức</h4>
                </div>
                <div class="card-body collapse show">
                    <div class="card-block card-dashboard">
                        <p class="card-text">Danh sách tin tức - <a href="<?php echo current_url() ?>/add"><b>Thêm</b></a></p>
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Hình ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Tác giả</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                    <th>HOT</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    foreach ($tin_list as $row) {

                                ?>
                                <tr>
                                    <td><?php echo $row->id_tin ?></td>    
                                    <td><img src="<?php echo get_firstimage($row->noidung); ?>" width="200px" ></td>
                                    <td><?php echo gioihan_hienthi($row->tieude,40); ?></td>
                                    <td><?php echo gioihan_hienthi($row->mota,30); ?></td>
                                    <td><?php echo $row->tacgia ?></td>
                                    <td><div class="status" id="status-<?php echo $row->id_tin; ?>" style="cursor:pointer;" data-id="<?php echo $row->id_tin; ?>"><?php echo check_trangthai($row->trangthai); ?></div></td>
                                    <td><a href="<?php echo base_url().m_cut_space($row->tieude).'-post'.$row->id_tin.'.html'; ?>">Xem</a></td>
                                    <td><div class="hot" id="hot-<?php echo $row->id_tin ?>" style="cursor:pointer;" data-id="<?php echo $row->id_tin ?>" ><?php echo check_hot($row->tinhot);?></div></td>
                                    <td>
                                        <a class="success p-0" data-original-title="" title="" href="<?php echo current_url(); ?>/edit/<?php echo $row->id_tin; ?>">
                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                        </a>
                                        <a class="danger p-0" data-original-title="" title=""  href="<?php echo current_url(); ?>/remove/<?php echo $row->id_tin; ?>">
                                            <i class="ft-x font-medium-3 mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                           <?php }?>     

                                
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
    <script type="text/javascript">
      var url = '<?php echo base_url(); ?>';
        $(document).on('click', '.hot', function(){
            var id = $(this).data('id');

            $.ajax({
              url    :    url+'/ajax/updateHot',
              method :   'POST',
              data   :    {
                "id" :  id
              },
              success : function(response){
                $("div#hot-"+id).html(response);
              }
            });
        });

        $(document).on('click', '.status', function(){
          var id = $(this).data('id');
          $.ajax({
            url     :   url+'/ajax/updateStatus',
            method  :   'POST',
            data    :   {
              "id"  :   id
            },
            success : function(response){
              $("div#status-"+id).html(response);
            }
          });
        });
    </script>
  </body>
</html>
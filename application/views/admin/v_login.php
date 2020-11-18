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
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
<section id="login">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="card gradient-indigo-purple text-center width-400">
                    <div class="card-img overlap">
                        <img alt="element 06" class="mb-1" src="<?php echo base_url('public/admin'); ?>/app-assets/img/portrait/avatars/avatar-08.png" width="190">
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <h2 class="white">Login</h2>
                             <p class="text-warning"></p>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo form_input($identity);?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo form_input($password);?>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo form_button($button);?>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!--
                    <div class="card-footer">
                        <div class="float-left"><a (click)="onForgotPassword()" class="white">Recover Password</a></div>
                        <div class="float-right"><a (click)="onRegister()" class="white">New User?</a></div>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <?php $this->load->view('admin/include/js');?>
    <script type="text/javascript">
        $(function(){
            $('#button').click(function(){
                var identity = $('#identity').val();
                var password = $('#password').val();
                $.ajax({
                    url     : '<?php echo base_url('Admin/ajaxLogin'); ?>',
                    method  : 'POST',
                    data    : {
                        'identity'  : identity,
                        'password'  : password,
                    },
                    success: function(data){
                        if(data == 'success'){
                            window.location.reload();
                        }else{
                            $('.text-warning').html(data);
                        }
                    }
                });

            });
        });
    </script>
  </body>
</html>
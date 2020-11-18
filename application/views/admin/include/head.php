    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ADMIN - DATN 2019</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/admin'); ?>/app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin'); ?>/app-assets/css/app.css">
    
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->

    <!-- BEGIN Function PHP-->
    <?php
        /*
            @Author: Lê Gia Quân    
            @Student Code: DH51500890 
        */
        //kiem tra str <= limit | true -> str ; false return chuoi bi gioi han +'...'
        function gioihan_hienthi($str,$limit=100){
            if(strlen($str)<=$limit) return $str;
            return mb_substr($str,0,$limit-3,'UTF-8').'...';
        }
        /*
            @Author: Lê Gia Quân    
            @Student Code: DH51500890 
        */
        //cap quyen admin ?1 | true -> Admin; false -> Người dùng
        function check_capquyen($capquyen)
        {
            if($capquyen==1)
                echo "<a style='color:tomato;'>Admin</a>";
            else 
                echo "<a style='color:MediumSeaGreen;'>Người dùng</a>";
        }
        /*
            @Author: Lê Gia Quân    
            @Student Code: DH51500890 
        */
        //trang thai ?1 | true-> ON; false -> OFF
        function check_trangthai($trangthai)
        {
            if($trangthai==1)
                echo "<font style='color:MediumSeaGreen;'>SHOW</font>";
            else
                echo "<font style='color:GREY;'>HIDE</font>";
        }
        /*
            @Author: Lê Gia Quân    
            @Student Code: DH51500890 
        */
        //trang thai ?1 | true-> HOT; false -> ---
        function check_hot($hot)
        {
            if($hot==1)
                echo "<font style='color:MediumSeaGreen;'>HOT</font>";
            else
                echo "<font style='color:GREY;'>NORMAL</font>";
        }
        /*
            @Author: Lê Gia Quân    
            @Student Code: DH51500890 
        */
        function check_trangthaiuser($trangthai)
        {
            if($trangthai==1)
                echo "<a style='color:MediumSeaGreen;'>Hoạt động</a>";
            else
                echo "<a style='color:GREY;'>Bị Khóa</a>";
        }
        function get_firstimage( $contents ){
           if( preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $contents, $img) ){
              return $img[1];
           }else{
              return base_url('public/upload/no-thumbnail.jpg');
           }
        }
?>
    <!-- END function PHP-->
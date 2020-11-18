<div data-active-color="white" data-background-color="man-of-steel" data-image="<?php echo base_url('public/admin'); ?>/app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="<?php echo base_url('admin'); ?>" class="logo-text float-left">
              <div class="logo-img"><img src="<?php echo base_url('public/admin'); ?>/app-assets/img/logo.png"/></div><span class="text align-middle">ADMIN</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-toggle-right toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="has-sub nav-item <?php if(isset($page_news) == TRUE) echo "open"; ?>"><a href="#"><i class="ng-tns-c1-0 ft-file-text"></i><span data-i18n="" class="menu-title">Quản lý tin tức</span></a>
                <ul class="menu-content">
                  <li <?php if(isset($page_news_sub) == TRUE) echo "class='is-shown active'"; ?>><a href="<?php echo base_url('Admin/news');?>" class="menu-item">Tin tức</a>
                  </li>
                  <li <?php if(isset($page_news_sub2) == TRUE) echo "class='is-shown active'"; ?>><a href="<?php echo base_url('Admin/news-group');?>" class="menu-item">Nhóm tin</a>
                  </li>
                  <li <?php if(isset($page_news_sub3) == TRUE) echo "class='is-shown active'"; ?>><a href="<?php echo base_url('Admin/cat');?>" class="menu-item">Loại tin</a>
                  </li>
                </ul>
              </li>

              <li class="has-sub nav-item <?php if(isset($page_user) == TRUE) echo "open"; ?>"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">Quản lý User</span></a>
                <ul class="menu-content">
                  <li <?php if(isset($page_user_sub) == TRUE) echo "class='is-shown active'"; ?>><a href="<?php echo base_url('Admin/users');?>" class="menu-item">Danh sách User</a>
                  </li>
                </ul>
              </li>

              
              <li class=" nav-item"><a href="<?php echo base_url();?>"><i class="ft-life-buoy"></i><span data-i18n="" class="menu-title">TRANG CHỦ</span></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
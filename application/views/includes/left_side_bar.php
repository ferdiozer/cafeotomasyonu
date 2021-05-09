<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/images/user_256.png');?>" class="img-circle" alt="Kullanıcı">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="<?php echo base_url('Account/logout');?>"><i class="fa fa-circle text-danger"></i>Çıkış</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">KONTROL PANELİ</li>
            <li>
                <a href="<?php echo base_url('Dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Anasayfa</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('Customer');?>">
                    <i class="fa fa-user"></i> <span>Kullanıcılar</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('Location');?>">
                    <i class="fa fa-map-marker"></i> <span>Konumlar</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('Adverd');?>">
                    <i class="fa fa-home"></i> <span>İlanlar</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('Categories');?>">
                    <i class="fa fa-newspaper-o"></i> <span>Kategori</span></a>
            </li>
            <li>
                <a href="<?php echo base_url('Settings');?>">
                    <i class="fa fa-gears"></i> <span>Ayarlar</span></a>
            </li>
            <li class="hidden">
                <a href="#">
                    <i class="fa fa-try"></i> <span>Kasa</span></a>
            </li>
            <li class="hidden">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mesaj</span></a>
            </li>
            <li class="treeview hidden">
                <a href="#">
                    <i class="fa fa-sticky-note"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Blog');?>"><i class="fa fa-circle-o"></i> Blog Listesi</a></li>
                    <li><a href="<?php echo base_url('Blog/category');?>"><i class="fa fa-circle-o"></i> Kategori</a></li>

                </ul>
            </li>
            <li class="hidden">
                <a href="#">
                    <i class="fa fa-sticky-note-o"></i> <span>Sabit Sayfalar</span></a>
            </li>
            <li class="hidden">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Ayarlar</span></a>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
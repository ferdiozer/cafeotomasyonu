<header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Logo -->
        <a href="<?php echo base_url("Dashboard");?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Bug</b>POS</span>
        </a>
        <!-- Logo -->
        <a href="javascript:void(0);" class="logo bg-red">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>J</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"> <?php
                echo get_user()->brand;
                ?></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown messages-menu">
                    <a href="#" class="sidebar-toggle dropdown-toggle" data-toggle="dropdown" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu bg-warning text-black">
                                <li>
                                    <a href="<?php echo base_url("Desk");?>">
                                        <i class="fa fa-table text-red"></i>
                                        Masa İşlemleri
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("Product");?>">
                                        <i class="fa fa-glass text-yellow"></i>
                                        Ürün İşlemleri
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("Operation/DeskState");?>">
                                        <i class="fa fa-calendar text-green"></i>
                                        Masa Durum
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo base_url(); ?>">Anasayfa</a></li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/images/user_256.png');?>" class="user-image" alt="Admin">
                        <span class="hidden-xs">
                            <?php
                            echo get_user()->username;
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/images/user_256.png');?>" class="img-circle" alt="User Image">

                            <p>
                                <?php
                                echo get_user()->name;
                                ?>
                                <small>Yetkili</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('Account/logout');?>" class="btn btn-default btn-flat">Çıkış</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('Account/updatePasswordPage');?>" class="btn btn-danger btn-flat">Şifre İşlemleri</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

</header>

<span class="base_url hidden"><?php echo base_url(); ?></span>
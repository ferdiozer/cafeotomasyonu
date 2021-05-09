<!doctype html>
<html lang="tr">
<head>
        <?php $this->load->view("includes/head"); ?>
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view("includes/left_side_bar"); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Bulunamadı.</h3>

                    <p>
                       İstediğiniz Sayfa Bulunamadı<b> <a href="<?php echo base_url("Dashboard"); ?>">ANASAYFAYA GİDİN</a></b><br> yada tekrar deneyin.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

        <?php $this->load->view("includes/footer"); ?>
    <?php $this->load->view("includes/include_script"); ?>
</div>
</body>
</html>
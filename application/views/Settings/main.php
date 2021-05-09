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
        <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <a href="<?php echo base_url('Settings/general'); ?>" class="btn btn-block btn-danger btn-flat">Site Genel Ayarları</a>
                    <br>
                    <a href="<?php echo base_url('Settings/analytic_code'); ?>" class="btn btn-block btn-danger btn-flat">Analitik Kod Alanı</a>
                    <br>
                    <a href="<?php echo base_url('Settings/adverd_page'); ?>" class="btn btn-block btn-danger btn-flat">İlan Sayfası Seo</a>
                </div>
            </div>

        </section>
        <!-- /.content-wrapper -->
    </div>
        <?php $this->load->view("includes/footer"); ?>
    <?php $this->load->view("includes/include_script"); ?>
</div>
</body>
</html>
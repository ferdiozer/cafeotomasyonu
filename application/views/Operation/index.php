<!doctype html>
<html lang="tr">
<head>
        <?php $this->load->view("includes/head"); ?>
                                               <?php $this->load->view("Dashboard/index/page_style"); ?>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
    <div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
                                               <?php $this->load->view("Dashboard/index/breadcrumb"); ?>
                                               <?php $this->load->view("Dashboard/index/main"); ?>
        <!-- /.content-wrapper -->
    </div>
        <?php $this->load->view("includes/footer"); ?>
    <?php $this->load->view("includes/include_script"); ?>
</div>
                                                <?php $this->load->view("Dashboard/index/page_script"); ?>
</body>
</html>
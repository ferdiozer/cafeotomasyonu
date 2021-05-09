<!doctype html>
<html lang="tr">
<head>
        <?php $this->load->view("includes/head"); ?>
                                               <?php $this->load->view("Operation/deskDetail/page_style"); ?>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
    <div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
                                               <?php $this->load->view("Operation/deskDetail/breadcrumb"); ?>
                                               <?php $this->load->view("Operation/deskDetail/main_content"); ?>
        <!-- /.content-wrapper -->
    </div>
        <?php $this->load->view("includes/footer"); ?>
    <?php $this->load->view("includes/include_script"); ?>
</div>
                                                <?php $this->load->view("Operation/deskDetail/page_script"); ?>
</body>
</html>
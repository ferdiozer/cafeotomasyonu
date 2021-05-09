<!doctype html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head"); ?>
                         <?php $this->load->view("Settings/general/page_style"); ?>
</head>
<body class="hold-transition skin-yellow sidebar-mini">

<div class="wrapper">

    <?php $this->load->view("includes/header"); ?>
    <!-- Left side column. contains the logo and sidebar -->

    <?php $this->load->view("includes/left_side_bar"); ?>


    <div class="content-wrapper">

        <!-- Content Wrapper. Contains page content -->
                            <?php $this->load->view("Settings/general/main_content"); ?>
    <!-- /.content-wrapper -->
    </div>

    <?php $this->load->view("includes/footer"); ?>
</div>

<?php $this->load->view("includes/include_script"); ?>
                        <?php $this->load->view("Settings/general/page_script"); ?>

</body>
</html>
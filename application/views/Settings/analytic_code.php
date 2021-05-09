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
        <form role="form" method="post" action="<?php echo base_url("Settings/analytic_codeUpdate");?>">
            <textarea id="analytic_code" name="analytic_code" rows="15" class="col-md-12"><?php echo $row;?></textarea>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Güncelle</button>

        </form>
        
    <!-- /.content-wrapper -->
    </div>

    <?php $this->load->view("includes/footer"); ?>
</div>

<?php $this->load->view("includes/include_script"); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=lamv0jjrqtpyhann28cwuihzgyfwp6d40ufp0x9ynam213g7"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script type="application/javascript">
    $(document).ready(function () {

/*
        tinymce.init({
            selector: "textarea",  // change this value according to your HTML
            plugins: "advcode",
            toolbar: "code",
            menubar: "tools"
        });
*/

        CKEDITOR.replace('analytic_code');

    })
</script>


</body>
</html>
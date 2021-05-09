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

        <section class="content-header">
            <h1>
                İlan Sayfası Ayarları ( SEO )
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
        <!-- Content Wrapper. Contains page content -->
        <form role="form" method="post" action="<?php echo base_url("Settings/adverd_pageUpdate");?>">

            <div class="form-group">
                <label>Title</label><br>
                <textarea name="a_seo_title" rows="5" class="col-md-12"><?php echo $row->a_seo_title;?></textarea>
            </div>
            <div class="form-group">
                <label>Description</label><br>
                <textarea name="a_seo_description" rows="10" class="col-md-12"><?php echo $row->a_seo_description;?></textarea>
            </div>
            <div class="form-group">
                <label>Keyword</label><br>
                <textarea name="a_seo_keyword" rows="10" class="col-md-12"><?php echo $row->a_seo_keyword;?></textarea>
            </div>
            <div class="clearfix"></div>
            <hr>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Güncelle</button>

        </form>
                </div>
            </div>
        </section>
    <!-- /.content-wrapper -->
    </div>

    <?php $this->load->view("includes/footer"); ?>
</div>

<?php $this->load->view("includes/include_script"); ?>


</body>
</html>
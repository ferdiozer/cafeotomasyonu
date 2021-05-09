<!doctype html>
<html lang="tr">
<head>
        <?php $this->load->view("includes/head"); ?>
                                               <?php $this->load->view("Product/index/page_style"); ?>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
        <?php $this->load->view("includes/header"); ?>
    <div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
            <h1>
                Şifre
                <small>Güncelle</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center">
                    <form class="form" method="post" action="<?php echo base_url("Account/updatePassword"); ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="small"> En az 6 karakter olmalı</span><br>
                                    <label>Eski Şifre</label>
                                    <input type="password"
                                           class="form-control"
                                           name="password"
                                           placeholder="Eski Şifre .."
                                           required>
                                    <label>Yeni Şifre</label>
                                    <input type="password"
                                           class="form-control"
                                           name="new_password"
                                           placeholder="Yeni Şifre .."
                                           required>
                                    <label>Yeni Şifre (Tekrar)</label>
                                    <input type="password"
                                           class="form-control"
                                           name="confirm_password"
                                           placeholder="Yeni Şifre Tekrarı .."
                                           required>
                                </div>
                                <!--end form-group-->
                            </div>

                        </div>

                        <div class="form-group center">
                            <button type="submit" class="btn btn-primary btn-block">Şifre Oluştur</button>
                        </div>                        <!--end form-group-->
                    </form>
                            </div>
                            <!--end col-md-6-->
            </div>



        </section>
        <!-- /.content-wrapper -->
</div>
        <?php $this->load->view("includes/footer"); ?>
    <?php $this->load->view("includes/include_script"); ?>
</div>
                                                <?php $this->load->view("Product/index/page_script"); ?>
</body>
</html>
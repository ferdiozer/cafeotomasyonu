<!-- Main content -->
<section class="content">

    <div class="row">


            <div class="col-md-3">
                <a href="<?php echo base_url(); ?>" class="btn btn-warning btn-block">
                    <i class="fa fa-arrow-left"></i>
                    Geri
                </a>
            </div>

            <form method="post" action="<?php echo base_url('Operation/report');?>">
                <div class="col-md-3">
                    <input type="text" name="date1" id="date1" class="form-control datepicker" placeholder="Başlangıç Tarihi" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <input type="text" name="date2" id="date2" class="form-control datepicker" placeholder="Bitiş Tarihi" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <input type='submit' class='btn btn-finish btn-primary' value='Sonuçları Getir' />
                    <button id="clear_cookies" class='btn btn-finish btn-danger'><i class="fa fa-trash-o"></i> Temizle</button>
                </div>
            </form>

        <hr>
    </div>
    <div class="row">

        <div class="col-xs-12 col-md-6">
            <div class="box box-success sales_product">
                <div class="box-header with-border">
                    <h3 class="box-title">Satılan Ürünlerin Detaylı Listesi</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>İsim</th>
                        <th>Adet</th>
                        <th>Tarih</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($order_products as $order_product) { ?>
                            <tr>
                                <td>
                                    <?php
                                    if (isset(get_product(array('id'=>$order_product->product_id))->title))
                                        echo get_product(array('id'=>$order_product->product_id))->title;
                                    else{
                                        echo "<b>ürün bulunamadı</b>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $order_product->quantity; ?>
                                </td>
                                <td>
                                    <?php echo $order_product->date; ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-12 col-md-6">
            <div id="chart_order_product" style="height: 300px; width: 100%;"></div>
        </div>



        <div class="col-xs-12 col-md-3">

            <span class="label label-success">Satılan Ürünler <span class="small"> (Adet)</span> </span><br>

            <?php
            foreach ($product_paid_distrinct_sales as $distrinct_sale){
                ?>
                <i class="fa fa-circle-o text-red"></i>
                <?php
                if (isset(get_product(array('id'=>$distrinct_sale->product_id))->title)){
                    echo get_product(array('id'=>$distrinct_sale->product_id))->title; }
                else{
                    echo "<b>Bulunamadı</b>"; }

                    echo " :  <span class='text-red text-bold'>".get_product_quantity(array('product_id'=>$distrinct_sale->product_id))->quantity."</span>";
                ?>

                <br>
                <?php
            }
            ?>

        </div>

        <div class="col-xs-12 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Toplam Satış Tutarı</span>
                    <span class="info-box-number">
                           <?php
                           echo $sales_total->paid;
                           ?>
                    </span>  <i class="fa fa-turkish-lira"></i>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>





    </div>
    <div class="row">

    </div>
</section>
<!-- /.content -->




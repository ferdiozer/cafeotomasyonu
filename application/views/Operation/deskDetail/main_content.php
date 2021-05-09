<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <button id="closed_desk" type="button" class="btn btn-success btn-lg btn-flat btn-block">
                <i class="fa fa-paypal"></i>
                Masayı Kapat
            </button>
        </div>
    </div>

    <div class="row">
                  <span class=" col-md-6 pull-left">
                <h2><span class="text-sm">Genel Toplam : </span> <span class="text-green" id="total_price">0</span>  <small><i class="fa fa-turkish-lira"></i></small> </h2>
           </span>
            <span class=" col-md-6">
                <br>
                <div class="btn-group pull-right">
                     <button id="refresh" type="button" class="btn btn-sm btn-flat  btn-success pull-left"><i class="fa fa-refresh"></i> Yenile</button>
                      <button dataID="1" type="button" class="btn btn-sm btn-flat  btn-default payment_type"><i class="fa fa-money"></i> Nakit <span class="small">Ödeme Türü</span> </button>
                 <button dataID="2" type="button" class="btn btn-sm btn-flat btn-default payment_type"><i class="fa fa-credit-card"></i> Kart <span class="small">Ödeme Türü</span> </button>
                    <button type="button" class="btn btn-sm btn-flat  btn-danger" data-toggle="modal" data-target="#desk_transfer"><i class="fa fa-exchange"></i> Masayı Taşı</button>
                </div>


           </span>
    </div>
    <div class="row">

        <div class="col-xs-12 col-md-5">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Alınan Siparişler</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Ürün Adı</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam Fiyat</th>
                        <th></th>
                        </thead>
                        <tbody class="desk_order">
                        <?php
                        foreach ($order_products as $order_product) {


                            if ($order_product->is_paid==0){

                            ?>

                                <tr class="order_prices_list">
                                    <td>
                                        <?php
                                        echo get_product(array('id'=>$order_product->product_id))->title;
                                        ?>
                                    </td>
                                    <td class="price_l">
                                        <?php
                                        echo get_product(array('id'=>$order_product->product_id))->price_default;
                                        ?>
                                    </td>
                                    <td class="quantities">
                                        <?php
                                        echo $order_product->quantity;
                                        ?>
                                    </td>
                                    <td class="total_prices">
                                        0
                                    </td>
                                    <td>
                                        <button dataID="<?php echo $order_product->id; ?>" type="button" class="btn btn-xs btn-success to_payment"><i class="fa fa-check"></i> Öde</button>
                                        <button dataID="<?php echo $order_product->id; ?>" type="button" class="btn btn-xs btn-danger to_cancel">İptal</button>
                                    </td>
                                </tr>

                            <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>

                    <a href="<?php echo base_url("Operation/DeskState"); ?>" class="btn btn-warning btn-sm btn-block btn-flat">
                        <i class="fa fa-arrow-left"></i>
                        Geri
                    </a>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-12 col-md-7">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ürünler</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <button type="button" class="btn bg-orange btn-flat margin btn_category_all">
                       <b>Tümü</b>
                    </button>
                    <?php
                    foreach ($product_categories as $product_category) {
                        ?>
                        <button dataID="<?php echo $product_category->id; ?>" type="button"
                                class="btn bg-orange btn-flat margin btn_category">
                            <?php echo $product_category->title; ?>
                        </button>
                        <?php
                    }
                    ?>
                    <table class="table table-hover table-striped" id="target_table_id">
                        <thead>
                        <th>Ürün Adı</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($products as $product) {
                            ?>
                            <tr class="product_list">
                                <td>
                                    <?php
                                    echo $product->title;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $product->price_default;
                                    ?>
                                </td>
                                <td style="width: 15%">
                                    <input name="quantity" dataID="<?php echo $product->id; ?>" quantity<?php echo $product->id; ?>=""
                                           class="form-control quantity" value="1" type="number" min="1" max="100">
                                </td>
                                <td>
                                    <button product_id = "<?php echo $product->id;  ?>" title="<?php echo $product->title; ?>"
                                            price="<?php echo $product->price_default; ?>
" dataID="<?php echo $product->id; ?>"
                                            type="button" class="btn bg-orange add_product_button">
                                        <i class="fa fa-plus"></i> Ekle
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


    </div>


    <div class="modal fade" id="desk_transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masa Taşıma Ekleme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="box-body col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Taşımak İstediğiniz Masayı Seçin</label>
                                    <select name="desk_to_id" id="desk_to_id" class="form-control" required>
                                        <?php
                                        foreach ($desks_for_transfer as $item) {

                                            echo "<option value='" . $item->id . "'>" . $item->title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="clearfix"></div>
                        <div class="box-footer">
                            <button id="desk_transfer_button" type="button" class="btn btn-primary btn-block">Kaydet</button>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->




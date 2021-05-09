<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kayıtlı Ürün Listesi</h3>
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#add_product">
                        <i class="fa fa-plus-circle"></i>
                        Yeni
                    </button>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Ad</th>
                        <th>Fiyat</th>
                        <th>Kategori</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($products as $product) { ?>
                            <tr>
                                <td>
                                    <?php echo $product->title; ?>
                                </td>
                                <td>
                                    <?php echo $product->price_default; ?>
                                </td>
                                <td>
                                    <?php echo get_product_category(array('id'=>$product->product_category_id))->title; ?>
                                </td>
                                <td>
                                    <a class="removeBtn"
                                       dataURL="<?php echo base_url("Product/delete/$product->id"); ?>">
                                        <i class="fa fa-trash"></i>
                                        SİL
                                    </a>
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

        <div class="col-xs-12 col-md-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ürün Kategorileri</h3>
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#add_product_category">
                        <i class="fa fa-plus-circle"></i>
                        Yeni
                    </button>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Kategori Adı</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($product_categories as $product_category) { ?>
                            <tr>
                                <td>
                                    <?php echo $product_category->title; ?>
                                </td>
                                <td>
                                    <a class="removeBtn"
                                       dataURL="<?php echo base_url("Product/deleteProductCategory/$product_category->id"); ?>">
                                        <i class="fa fa-trash"></i>
                                        SİL
                                    </a>
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

    </div>


    <!-- Modal -->
    <!-- add Desk Category -->
    <div class="modal fade" id="add_product_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ürün Kategori Ekleme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?php echo base_url("Product/saveProductCategory"); ?>">
                        <div class="box-body col-md-12">
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input type="text" class="form-control" name="title"
                                       placeholder="Kategori adını giriniz.." required>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="clearfix"></div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ürün Ekleme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?php echo base_url("Product/saveProduct"); ?>">
                        <div class="box-body col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori Adı</label>
                                    <select name="product_category_id" class="form-control" required>
                                        <?php
                                        foreach ($product_categories as $product_category) {

                                            echo "<option value='" . $product_category->id . "'>" . $product_category->title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ürün Adı</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Masa adını giriniz.." required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fiyat</label>
                                    <input name="price_default" type='number' class="form-control" step='0.01' value='0.00' placeholder='0.00' />

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="clearfix"></div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>


</section>
<!-- /.content -->
<!-- Main content -->
<section class="content">


    <div class="row">


        <div class="col-md-3">
            <a href="<?php echo base_url(); ?>" class="btn btn-warning btn-block">
                <i class="fa fa-arrow-left"></i>
                Geri
            </a>
        </div>

        <form method="post" action="<?php echo base_url('Operation/expense');?>">
            <div class="col-md-3">
                <input type="text" name="date1_ex" id="date1_ex" class="form-control datepicker" placeholder="Başlangıç Tarihi" autocomplete="off">
            </div>
            <div class="col-md-3">
                <input type="text" name="date2_ex" id="date2_ex" class="form-control datepicker" placeholder="Bitiş Tarihi" autocomplete="off">
            </div>
            <div class="col-md-3">
                <input type='submit' class='btn btn-finish btn-primary' value='Sonuçları Getir' />
                <button id="clear_cookies" class='btn btn-finish btn-danger'><i class="fa fa-trash-o"></i> Temizle</button>
            </div>
        </form>

        <hr>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <button type="button" class="btn btn-block btn-sm" data-toggle="modal" data-target="#add_desk">
                <i class="fa fa-plus"></i>
                Yeni
            </button>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kayıtlı Gider Listesi</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Ad</th>
                        <th>Tip</th>
                        <th>Tarih</th>
                        <th>Tutar</th>
                        <th>İşlem</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($rows as $row) { ?>
                            <tr class="order_prices_list">
                                <td>
                                    <?php echo $row->title; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row->type==0) echo "Diğer";
                                    else
                                    if(isset(get_product(array('id'=>$row->type))->title)) echo get_product(array('id'=>$row->type))->title; ?>
                                </td>
                                <td>
                                    <?php echo $row->date; ?>
                                </td>
                                <td>
                                   <span class="quantities"><?php echo $row->price; ?></span>&nbsp;<i class="fa fa-turkish-lira"></i>
                                </td>
                                <td>
                                    <a class="removeBtn"
                                       dataURL="<?php echo base_url("Operation/expenseDelete/$row->id"); ?>">
                                        <i class="fa fa-trash"></i>  SİL
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>   Toplam Tutar :   <span id="total_price" class="text-bold text-black"></span> <i class="fa fa-turkish-lira"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->

        </div>


    </div>


    <!-- Modal -->

    <div class="modal fade" id="add_desk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masa Bölümü Ekleme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" action="<?php echo base_url("Operation/expense_add"); ?>">
                        <div class="box-body col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ürün Adı ( Yoksa diğer kategorisinden başlık kısmını doldurun)</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="0">Diğer</option>
                                        <?php
                                        foreach ($products as $desks_category) {

                                            echo "<option value='" . $desks_category->id . "'>" . $desks_category->title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input name="title" type='text' class="form-control"/>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bedeli</label>
                                    <input name="price" type='number' class="form-control" step='0.01' value='0.00' placeholder='0.00' />

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
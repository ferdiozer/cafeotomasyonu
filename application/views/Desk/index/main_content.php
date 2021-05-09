<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Kayıtlı Masa Listesi</h3>
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#add_desk">
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
                        <th>Numara</th>
                        <th>Kategori</th>
                        <th>Kapasite</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($desks as $desk) { ?>
                            <tr>
                                <td>
                                    <?php echo $desk->title; ?>
                                </td>
                                <td>
                                    <?php echo get_desk_category(array('id'=>$desk->desk_category_id))->title; ?>
                                </td>
                                <td>
                                    <?php echo $desk->capacity; ?>
                                </td>
                                <td>
                                    <a class="removeBtn"
                                       dataURL="<?php echo base_url("Desk/delete/$desk->id"); ?>">
                                        <i class="fa fa-trash"></i> SİL
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
                    <h3 class="box-title">Masa Kategorileri</h3>
                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#add_desk_category">
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
                        <th>Konum Adı</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($desks_categories as $desks_category) { ?>
                            <tr>
                                <td>
                                    <?php echo $desks_category->title; ?>
                                </td>
                                <td>
                                    <a class="removeBtn"
                                       dataURL="<?php echo base_url("Desk/deleteDeskCategory/$desks_category->id"); ?>">
                                        <i class="fa fa-trash"></i> SİL
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
    <div class="modal fade" id="add_desk_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form role="form" method="post" action="<?php echo base_url("Desk/saveDeskCategory"); ?>">
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
                    <form role="form" method="post" action="<?php echo base_url("Desk/saveDesk"); ?>">
                        <div class="box-body col-md-12">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori Adı</label>
                                    <select name="desk_category_id" class="form-control" required>
                                        <?php
                                        foreach ($desks_categories as $desks_category) {

                                            echo "<option value='" . $desks_category->id . "'>" . $desks_category->title . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Masa Numarası (Başlık)</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Masa adını giriniz.." required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kapasite</label>
                                    <input type="number" min="0" step="1" class="form-control" name="capacity"
                                           placeholder="Masa Kapasitesini giriniz..">
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
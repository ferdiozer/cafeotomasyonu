<!-- Git için Test -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
                <div class="box-header with-border">
                <h3 class="box-title">Genel Ayarlar</h3>
                </div>
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url("Settings/generalUpdate");?>">
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $row->title;?>">
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Adres</label><br>
                            <textarea id="detail" name="address" rows="5" class="col-md-12"><?php echo $row->address;?></textarea>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row->phone;?>">
                        </div>
                    </div>
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Fax</label>
                            <input type="text" class="form-control" name="fax" value="<?php echo $row->fax;?>">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Mail</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row->email;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label >Web Adresi</label>
                            <input type="text" class="form-control" name="web" value="<?php echo $row->web;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Facebook Adresi (örn : http://www.facebook/example)</label>
                            <input type="text" class="form-control" name="facebook" value="<?php echo $row->facebook;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Twitter Adresi (örn : http://www.twitter/example)</label>
                            <input type="text" class="form-control" name="twitter" value="<?php echo $row->twitter;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Google Plus</label>
                            <input type="text" class="form-control" name="google_plus" value="<?php echo $row->google_plus;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>İnstagram</label>
                            <input type="text" class="form-control" name="instagram" value="<?php echo $row->instagram;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="<?php echo $row->youtube;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="<?php echo $row->linkedin;?>">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Misyon</label><br>
                            <textarea id="detail1" name="mission" rows="5" class="col-md-12"><?php echo $row->mission;?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Vizyon</label><br>
                            <textarea id="detail2" name="vision" rows="5" class="col-md-12"><?php echo $row->vision;?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Hakkımızda</label><br>
                            <textarea id="detail3" name="about_us" rows="8" class="col-md-12"><?php echo $row->about_us;?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Hakkımızda Kısa (özet)</label><br>
                            <textarea id="detail4" name="about_us_short" rows="5" class="col-md-12"><?php echo $row->about_us_short;?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Meta Keyword  (anahtar kelimeler(,(virgül) ile ayırın)</label><br>
                            <textarea name="meta_keyword" rows="5" class="col-md-12"><?php echo $row->meta_keyword;?></textarea>
                        </div>
                    </div>
                    <div class="box-body col-md-12">
                        <div class="form-group">
                            <label>Meta Description (Açıklama)</label><br>
                            <textarea name="meta_description" rows="5" class="col-md-12"><?php echo $row->meta_description;?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Map Latitude (Harita Enlemi)</label>
                            <input type="text" class="form-control" name="map_att" value="<?php echo $row->map_att;?>">
                        </div>
                    </div>
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Map Longitude (Harita Boylamı)</label>
                            <input type="text" class="form-control" name="map_lat" value="<?php echo $row->map_lat;?>">
                        </div>
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Güncelle</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
</section>
<!-- /.content -->
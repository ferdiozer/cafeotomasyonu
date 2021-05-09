
<section class="content">
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?php
                    echo get_product_count();
                    ?>
                </h3>

                <p>Ürün</p>
            </div>
            <div class="icon">
                <i class="ion ion-beaker"></i>
            </div>
            <a href="<?php echo base_url("Product");?>" class="small-box-footer">Devam <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-9 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>
                    <?php
                    echo get_desk_count();
                    ?>
                </h3>

                <p>Masa <span class="pull-right text-uppercase"><span class="text-gray">Dolu Masa  : </span><span  class="text-bold"> <?php
                            echo get_desk_count(array('state'=>1));
                            ?>
                        </span><span class="text-gray"> Boş Masa : </span><span class="text-bold">
                             <?php
                             echo get_desk_count(array('state'=>0));
                             ?>
                        </span>
                    </span></p>
            </div>
            <div class="icon">
                <i class="ion ion-calendar"></i>
            </div>
            <a href="<?php echo base_url("Operation/DeskState");?>" class="small-box-footer">Devam <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo base_url("Operation/report"); ?>" class="btn btn-lg btn-success btn-flat btn-block"><i class="fa fa-newspaper-o"></i> Rapor</a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo base_url("Operation/expense"); ?>" class="btn btn-lg btn-danger btn-flat btn-block"><i class="fa fa-money"></i> Gider</a>
        </div>
    </div>
<hr>
    <div class="row">

        <div class="col-md-12">
            <div class="text-center">
                <img src="<?php echo base_url("uploads/bugsoft_logo.png"); ?>" class="rounded" alt="Bugsoft">
            </div>


        </div>
    </div>

</section>
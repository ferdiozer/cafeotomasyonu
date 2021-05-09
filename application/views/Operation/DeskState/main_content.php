<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
            <a href="<?php echo base_url("Operation/DeskState"); ?>" class="btn btn-lg btn-danger btn-flat">
                <b>Tümü</b>
            </a>
            <?php
            foreach ($desk_categories as $desk_category) {
                ?>
                <a href="<?php echo base_url("Operation/DeskState/$desk_category->id"); ?>"
                   class="btn btn-lg btn-danger btn-flat">
                    <?php echo $desk_category->title; ?>
                </a>
                <?php
            }
            ?>
        </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
        <?php
        foreach ($desks as $desk){
            ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box desk hidden" dataID="<?php echo $desk->id; ?>">
                    <div class="inner">
                        <h3 style="font-size: 24px">
                            <?php
                            echo $desk->title;
                            ?>
                        </h3>

                        <p>
                            <?php
                           echo get_desk_category(array('id'=>$desk->desk_category_id))->title;
                            ?>
                            &nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-calendar"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        <?php
        }
        ?>

        </div>
    </div>
</section>
<!-- /.content -->




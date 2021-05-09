<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="application/javascript">
    (function($) {

//Date Picker

        if($('.datepicker').length){
            $( '.datepicker' ).datepicker();
            $.datepicker.regional['tr'] = {clearText: 'Sil', clearStatus: '',
                closeText: 'Kapat', closeStatus: 'Pencereyi Kapat',
                prevText: '<Geri', prevStatus: 'Önceki Ayı Görüntüle',
                nextText: 'İleri>', nextStatus: 'Sonraki Ayı Görüntüle',
                currentText: 'Şuan', currentStatus: 'Şuanki Ayı Görüntüle',
                monthNamesShort: ['Oca','Şub','Mar','Nis','May','Haz',
                    'Tem','Ağu','Eyl','Eki','Kas','Ara'],
                monthStatus: 'Başka Bir Ay Görüntüle', yearStatus: 'Başka Bir Yıl Görüntüle',
                weekHeader: 'Sm', weekStatus: '',
                monthNames:["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
                dayNames:["Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi"],
                dayNamesMin:["Paz","Pts","Sal","Çar","Per","Cum","Cts"],
                dayStatus: 'Haftanın İlk Gününü Kullanın', dateStatus: 'Gün, Ay Yıl',
                dateFormat: 'yy-mm-dd', firstDay: 1,
                initStatus: 'Tarih Seç', isRTL: false

            };
            $.datepicker.setDefaults($.datepicker.regional['tr']);
        }
        $( ".datepicker" ).datepicker( "option", "showAnim", "drop" );






    })(jQuery);


    $("#date1").change(function () {
        var date1  = $(this).val();
        Cookies.set("date1",date1)
    });

    $("#date2").change(function () {
        var date2  = $(this).val();
        Cookies.set("date2",date2)
    });

    if(Cookies.get("date1")){
        $("#date1").val(Cookies.get("date1"));
    }
    if(Cookies.get("date2")){
        $("#date2").val(Cookies.get("date2"));
    }

    $("#clear_cookies").click(function () {
        Cookies.remove("date1");
        Cookies.remove("date2");
        $("#date1").val();
        $("#date1").val();
        location.reload();

    })



    $(".sales_product").slimscroll({
        height: "400px",
        alwaysVisible: false,
        size: "20px"
    }).css("width", "100%");






</script>

<script>
    window.onload = function () {

        var chart = {
            title: {
                text: "Satış Grafiği"
            },
            data: [
                {
                    type: "column",
                    dataPoints: [




                        <?php
                        foreach ($product_paid_distrinct_sales as $distrinct_sale){
                        ?>
                        <?php
                        if (isset(get_product(array('id' => $distrinct_sale->product_id))->title)){

                        ?>
                        {
                            label: "<?php echo get_product(array('id' => $distrinct_sale->product_id))->title;?>",y: <?php echo get_product_quantity(array('product_id' => $distrinct_sale->product_id))->quantity; ?>
                        },


                        <?php
                        }


                        else{
                        ?>
                        {
                            label: "<?php echo "Bulunmadı";?>",y:<?php echo get_product_quantity(array('product_id' => $distrinct_sale->product_id))->quantity; ?>
                        },





                        <?php
                        }
                        }
                        ?>



                    ]
                }
            ]
        };


        $("#chart_order_product").CanvasJSChart(chart);

    }
</script>
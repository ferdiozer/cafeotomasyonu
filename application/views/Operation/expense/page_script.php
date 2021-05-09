
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








        total_price_work();
    })(jQuery);


    function total_price_work() {

        var total_price =0;

        var i=0;
        $(".order_prices_list").each(function () {
            var quantity_for_list =  parseInt($(this).children("td").children(".quantities").html());

            console.log(quantity_for_list);

            try {
                total_price = total_price+quantity_for_list;
            }
            catch(err) {
                total_price = 0;
                console.log("hesaplama da hata var ");
            }

        });

        $("#total_price").html(total_price);

    }

    $("#date1_ex").change(function () {
        var date1  = $(this).val();
        Cookies.set("date1_ex",date1)
    });

    $("#date2_ex").change(function () {
        var date2  = $(this).val();
        Cookies.set("date2_ex",date2)
    });

    if(Cookies.get("date1_ex")){
        $("#date1_ex").val(Cookies.get("date1_ex"));
    }
    if(Cookies.get("date2_ex")){
        $("#date2_ex").val(Cookies.get("date2_ex"));
    }

    $("#clear_cookies").click(function () {
        Cookies.remove("date1_ex");
        Cookies.remove("date2_ex");
        $("#date1_ex").val();
        $("#date1_ex").val();
        location.reload();

    })


</script>
<script type="application/javascript">
    $(document).ready(function () {


        var desk_id = $("#desk_id").val();

       // Cookies.set("payment_type",1);



        $(".btn_category").click(function () {
            var category = $(this).attr("dataID");

            Cookies.set("category_id",category);
            window.location.href = "<?php echo base_url("Operation/deskDetail/$desk->id"); ?>" + '?product_category=' + category;

        });

        $(".btn_category_all").click(function () {

            window.location.href = "<?php echo base_url("Operation/deskDetail/$desk->id"); ?>";

        });

        $("#desk_transfer_button").click(function () {
           var desk_to_id =  $("#desk_to_id").val();

           var back_url ="<?php echo base_url("Operation/DeskState"); ?>";
            var url_transfer = "<?php echo base_url("Home_service/desk_transfer")?>";
            $.post( url_transfer, { desk_new_id: desk_to_id,desk_old_id:desk_id })
                .done(function( data ) {
                    if (data=="true"){
                        console.log("masa taşıma işlemi başarılı");
                        window.location.href=back_url;
                    }
                });

        });

        $("#refresh").click(function () {

            window.location.href = "<?php echo base_url("Operation/deskDetail/$desk->id"); ?>";

        });

        /*ödeme türü*/
        $(".payment_type").click(function () {
            var id = $(this).attr("dataID");
            Cookies.set("payment_type",id);

        });


        $(".product_list").click(function () {
            //alert("deneme");
            var dd = $('input[name="quantity"]').val();
            // alert(dd)
        });

        var quantity = 1;

        $(".quantity").change(function () {


            /*adet*/
            quantity = $(this).val();
            var id = $(this).attr(quantity);

            // var carpim = $("[quantity'"+id+"'='"+quantity+"']").val();

            // alert(carpim)

        });

        $(".to_cancel").click(function () {
            var id = $(this).attr("dataID");

            var url_delete = "<?php echo base_url("Home_service/delete_order_product")?>";
            $.post( url_delete, { order_product_id: id })
                .done(function( data ) {
                    // alert( "Data Loaded: " + data );
                    if (data=="true"){
                        console.log("ürün iptal işlemi başarılı");
                    }
                });

            $(this).parent("td").parent("tr").remove();
            total_price_work();
        });

        /*masayı kapatma*/
       $("#closed_desk").click(function () {

           swal({
               title: "Emin misiniz?",
               text: "Masa Kapanacak.",
               icon: "warning",
               buttons: ["İptal", "Evet"],
               dangerMode: false,
           })
               .then((willDelete) => {
               if (willDelete) {


                   var redirect_to_link = "<?php echo base_url("Operation/DeskState")?>";

                   var url_closed = "<?php echo base_url("Home_service/closed_desk")?>";
                   $.post( url_closed, { desk_id: desk_id, payment_type:Cookies.get("payment_type")})
                       .done(function( data ) {
                           // alert( "Data Loaded: " + data );
                           if (data=="true"){
                               console.log("masa kapatma başarılı");
                               Cookies.remove("payment_type");
                               window.location.href = redirect_to_link;
                           }
                       });
               } else {
               }
           });



       });

        /*mayaya ürün ekleme*/
        $(".add_product_button").click(function () {

         //  get_json_service("http://localhost:81/bugpos/panel/Home_service/get_order_product");
          //  var dd = $(this).get();

            //  var quantity = $(".price_default").val();
            // var quantity = $(".price_default").val();
            //  alert(quantity);

            var price = $(this).attr("price");
            var title = $(this).attr("title");
            var product_id = $(this).attr("product_id");

            var total_price = quantity * price;



            /*masaya ürün ekleme */
            var url_add = "<?php echo base_url("Home_service/add_product_desk")?>";
            $.post( url_add, { desk_id: desk_id, product_id: product_id, quantity: quantity  })
                .done(function( data ) {
                   // alert( "Data Loaded: " + data );
                    if (data=="true"){
                        console.log("ürün ekleme başarılı");
                    }
                });


        /*
            var remove_button = '' +
                '   <td>\n' +
                '                                <a class="removeBtn"\n' +
                '                                   dataURL="'+product_id+'">\n' +
                '                                    <i class="fa fa-trash"></i> SİL\n' +
                '                                </a>\n' +
                '                            </td>';
         */

           // $(".desk_order").append("<tr class='order_prices_list'><td>" + title + "</td><td class='price_l'>" + price + "</td><td class='quantities'>" + quantity + "</td><td class='total_prices'>" + total_price + "</td>" + remove_button + "</tr>")
            $(".desk_order").append("<tr class='order_prices_list'><td>" + title + "</td><td class='price_l'>" + price + "</td><td class='quantities'>" + quantity + "</td><td class='total_prices'>" + total_price + "</td><td></td></tr>")



            /*değerleri eski haline döndür*/
            quantity = 1;
            $(".quantity").val(1);


            total_price_work();

        });

        /*YEAP*/
        $(".to_payment").click(function () {
            var id = $(this).attr("dataID");

            var odenen = parseFloat($(this).parent("td").parent(".order_prices_list").children(".total_prices").html());
            console.log(odenen);
            $(this).parent("td").parent(".order_prices_list").remove();
            var url_payment = "<?php echo base_url("Home_service/paid_with_german")?>";
            $.post( url_payment, { desk_id: desk_id, order_product_id: id })
                .done(function( data ) {
                    if (data=="true"){
                        console.log("alman üsulu ödeme başarılı");
                    }
                });

           // alert(odenen);
            total_price_work();
        })

        function deneme() {

            var total = 0;

            $(".total_prices").each(function (index) {
                total = total + parseInt($(this).html());
                // console.log(index + ": " + $(this).html());
            });

            // $("#total_price").html();
            $("#total_price").html(total);

        }

      //  deneme();
        function total_price_work() {

            var total_price =0;

            var i=0;
            $(".order_prices_list").each(function () {
                var quantity_for_list =  parseInt($(this).children(".quantities").html());
                var price_for_list =  parseFloat($(this).children(".price_l").html());


                var price_total_for_list =  parseFloat($(this).children(".total_prices").html(quantity_for_list*price_for_list));


                try {
                    total_price = total_price+(quantity_for_list*price_for_list);
                }
                catch(err) {
                    total_price = 0;
                    console.log("hesaplama da hata var ");
                }


               // console.log(quantity_for_list*price_for_list);


               /// console.log(total_price);

            });

            $("#total_price").html(total_price);

        }




        total_price_work();

      //  deneme();
    });



</script>
 <script type="application/javascript">
        $(document).ready(function () {



            $(".desk").click(function(){

                var desk_id = $(this).attr("dataID");

                window.location.href = "<?php echo base_url("Operation/deskDetail"); ?>"+'/'+desk_id;

            });




            /*masa durumunu 5 saniyede kontrol etme işlemi*/
            setInterval(function(){

                $.ajax({
                    url: '<?php echo base_url('Home_service/desk_all');?>',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {

                            var desk_id = value.id;


                            if(value.state==0){
                                $("[dataID='"+desk_id+"']").addClass("bg-green");
                            }
                            else if(value.state==1){
                                $("[dataID='"+desk_id+"']").addClass("bg-red");
                            }


                        });

                    }
                });

                }, 5000);





            $.ajax({
                url: '<?php echo base_url('Home_service/desk_all');?>',
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $.each(data, function(key, value) {

                        var desk_id = value.id;


                        if(value.state==0){
                            $("[dataID='"+desk_id+"']").removeClass("bg-red");
                            $("[dataID='"+desk_id+"']").addClass("bg-green");
                        }
                        else if(value.state==1){
                            $("[dataID='"+desk_id+"']").removeClass("bg-green");
                            $("[dataID='"+desk_id+"']").addClass("bg-red");
                        }

                        $('.desk').removeClass("hidden");

                    });

                }
            });



        });



</script>
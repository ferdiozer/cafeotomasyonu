<script
        src="https://code.jquery.com/jquery-2.2.3.min.js"
        integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets/dist/js/app.min.js");?>"></script>
<script src="<?php echo base_url("assets/dist/js/custom.js");?>"></script>
<script src="<?php echo base_url("assets/dist/js/js.cookie.js");?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="application/javascript">

    $(document).ready(function () {

        var base_url = $(".base_url").text();


        /* Remove Confirm   */
        $(".removeBtn").click(function () {

            var dataURL = $(this).attr("dataURL");

            swal({
                title: "Emin misiniz?",
                text: "Silinecek!",
                icon: "warning",
                buttons: ["İptal", "Evet"],
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    window.location.href = dataURL;
                } else {
        }
        });

        });




        if(!document.URL.includes('deskDetail')){
            Cookies.remove("payment_type");
            console.log('deskDetail yok');
        }
        else{
             console.log('deskDetail var');
        }



        <?php
        if (isset($this->session->userdata['alert']))
        {
        ?>

        swal({
            title: "<?php echo $this->session->userdata['alert']['title'];?>",
            text: "<?php echo $this->session->userdata['alert']['message'];?>",
            button: "Tamam",
            icon: "<?php echo $this->session->userdata['alert']['icon'];?>",
        });

        <?php
        }
        $this->session->unset_userdata('alert');
        ?>



    })


</script>
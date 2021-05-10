$(document).ready(function () {


    var base_url = $(".base_url").text();


    $(".sortableList").sortable();

    $(".sortableList").on("sortupdate",function(event, ui){

        var data    = $(this).sortable("serialize");
        var postUrl = $(this).attr("postUrl");


        $.post(base_url + postUrl,{data:data},function(response){})

    })



})
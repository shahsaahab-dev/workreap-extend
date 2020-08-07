jQuery(document).ready(function ($) {
    var ajax_url = ajax_controller.ajaxurl;
    $("tbody td").on("click",function(){
        var row_prev = $(this).parent().data("row-num");
        var row_next = $(this).parent().next("tr").data("row-num");
        var fm = String(row_prev).substring(0,2);
        var ft = fm.replace(/[{:}]/g, '');
        if(ft < 10){
            var string_build = `${row_prev}:00-${row_next}:00`;
            var tLength = $(this).text();
            if($(this).hasClass("greenBg")){
                $(this).removeClass("greenBg");
                $(this).text("");
                var day = $(this).data("day");
                $("table").find(`input[name=${day}]`).val(function(i,currVal){
                    var val = currVal;
                    var a2 = val.replace(`{${string_build}},`,"");
                    return a2;
                })
            }else{
                 $(this).addClass("greenBg");
                 var tLenB = tLength.replace(/ /g, "");
            $(this).text(string_build);
            var day = $(this).data("day");
            $("table").find(`input[name="${day}"]`).val(function(i,currVal){
                return currVal + `{${string_build}},`;
            });
            }
            
        }else{
            var string_build = `${row_prev}:00-${row_next}:00`;
            var tLength = $(this).text();
            if($(this).hasClass("greenBg")){
                $(this).removeClass("greenBg");
                $(this).text("");
                var day = $(this).data("day");
                $("table").find(`input[name=${day}]`).val(function(i,currVal){
                    var val = currVal;
                    var a2 = val.replace(`{${string_build}},`,"");
                    return a2;
                })
            }else{
                 $(this).addClass("greenBg");
                 var tLenB = tLength.replace(/ /g, "");
            $(this).text(string_build);
            var day = $(this).data("day");
            $("table").find(`input[name="${day}"]`).val(function(i,currVal){
                return currVal + `{${string_build}},`;
            });
            }
           
        }
       
        
    });

    // ajax to save data
    $(".save-hours").on("click",function(e){
        e.preventDefault();
        $.ajax({
            url:ajax_url,
            type:"post",
            data:{
                monday_timings:$("input[name='monday']").val(),
                tuesday_timings:$("input[name='tuesday']").val(),
                wednesday_timings:$("input[name='wednesday']").val(),
                thursday_timings:$("input[name='thursday']").val(),
                friday_timings:$("input[name='friday']").val(),
                saturday_timings:$("input[name='saturday']").val(),
                sunday_timings:$("input[name='sunday']").val(),
                action:"work_reap_extend_save_hours"
            },
            success:function(response){
                console.log(response);
                location.reload();
            }
        })
    });
    // Monday
    var vls = jQuery("input[name='monday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='monday']").attr("name");
    ar.forEach(stA);
    // Tuesday
    var vls = jQuery("input[name='tuesday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='tuesday']").attr("name");
    ar.forEach(stA);

    var vls = jQuery("input[name='wednesday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='wednesday']").attr("name");
    ar.forEach(stA);


    var vls = jQuery("input[name='thursday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='thursday']").attr("name");
    ar.forEach(stA);

    var vls = jQuery("input[name='friday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='friday']").attr("name");
    ar.forEach(stA);

    var vls = jQuery("input[name='saturday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='saturday']").attr("name");
    ar.forEach(stA);


    var vls = jQuery("input[name='sunday']").val();
    var ar = vls.split(",");
    var day_name = jQuery("input[name='sunday']").attr("name");
    ar.forEach(stA);


    function stA(item,index){
        var elements = [];
        var date = item;
        var fDate = date.replace( /[{}]/g, '' );
        var first_num = fDate.substring(0,2);
        console.log(first_num);
        var fFirst = first_num.replace(/[{:}]/g, '');
        var target = jQuery("table").find(`tr[data-row-num="${first_num}"]`);
        var ob = jQuery(target).find(`td[data-day="${day_name}"]`);
        jQuery(ob).addClass("greenBg");
        var first_row = ob.parent().data("row-num");
        var last_row = ob.parent().next().data("row-num");
        var put = `${first_row}:00 - ${last_row}:00`;
        jQuery(ob).text(put)
    }



    // DatePicker
    $("#kavi").datepicker();

     // Front End 
     $(".set_timings").on("click",function(e){
        e.preventDefault();
        $(".search-widget").fadeIn();
    })
});
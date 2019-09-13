function set_content(a){
    $(".bear_6").fadeOut(500);
    setTimeout(function(){ $(".bear_6."+a).fadeIn(500); }, 500);
}
function set_prava(a){
    if($(".bear_6.c table tr td.right div.check div:eq("+a+")").hasClass("off")){
        $(".bear_6.c table tr td.right div.check div:eq("+a+")").removeClass("off");
        $(".bear_6.c table tr td.right div.check div:eq("+a+")").addClass("on");
    }
    else{
        $(".bear_6.c table tr td.right div.check div:eq("+a+")").removeClass("on");
        $(".bear_6.c table tr td.right div.check div:eq("+a+")").addClass("off");
    }
}

$(".bear_1 div.button").click(function(){
    if((($.trim($(".bear_1 input[type=text]").val())) !== "") && (($.trim($(".bear_1 input[type=password]").val())) !== "")){
        $.ajax({
            type: "POST",
            url: '/pages/login.php',
            data: "is=logined&login="+$(".bear_1 input[type=text]").val()+"&password="+$(".bear_1 input[type=password]").val(),
            success: function (data) {
                $(location).attr('href', data);
            } 
        });
    }
});

$(".bear_2 div.button").click(function(){
    if(($.trim($(".bear_2 input[type=text]").val())) !== ""){
        $.ajax({
            type: "POST",
            url: '/pages/search.php',
            data: "is=search_user&login="+$(".bear_2 input[type=text]").val(),
            success: function (data) {
                $(location).attr('href', data);
            } 
        });
    }
});

$(".bear_6.c div.button").click(function(){
    if(($.trim($(".bear_6.c input[type=text]").val())) !== ""){
        var set_moder_user = [
            ($.trim($(".bear_6.c input[type=text]").val())),
            "",
            "",
            "",
            "",
            "",
            ""
        ];
        if($(".bear_6.c table tr td.right div.check div:eq(0)").hasClass("on")){
            set_moder_user[1] = 1;
        }
        else{
            set_moder_user[1] = 0;
        }
        if($(".bear_6.c table tr td.right div.check div:eq(1)").hasClass("on")){
            set_moder_user[2] = 1;
        }
        else{
            set_moder_user[2] = 0;
        }
        if($(".bear_6.c table tr td.right div.check div:eq(2)").hasClass("on")){
            set_moder_user[3] = 1;
        }
        else{
            set_moder_user[3] = 0;
        }
        if($(".bear_6.c table tr td.right div.check div:eq(3)").hasClass("on")){
            set_moder_user[4] = 1;
        }
        else{
            set_moder_user[4] = 0;
        }
        if($(".bear_6.c table tr td.right div.check div:eq(4)").hasClass("on")){
            set_moder_user[5] = 1;
        }
        else{
            set_moder_user[5] = 0;
        }
        if($(".bear_6.c table tr td.right div.check div:eq(5)").hasClass("on")){
            set_moder_user[6] = 1;
        }
        else{
            set_moder_user[6] = 0;
        }
        set_moder_user = set_moder_user.toString().split(',');
        $.ajax({
            type: "POST",
            url: '/pages/panel.php',
            data: "is=set_moder_user&set_moder_user="+set_moder_user
        });
    }
});


$(".bear_6.d div.button.left").click(function(){
    if((($.trim($(".bear_6.d input:eq(0)").val())) !== "") && (($.trim($(".bear_6.d input:eq(1)").val())) !== "") && (($.trim($(".bear_6.d input:eq(2)").val())) !== "") && (($.trim($(".bear_6.d input:eq(3)").val())) !== "")){
        $.ajax({
            type: "POST",
            url: '/pages/panel.php',
            data: "is=ban_user&ban_user="+$(".bear_6.d input.day").val()+","+$(".bear_6.d input.month").val()+","+$(".bear_6.d input.year").val()+","+$(".bear_6.d input.reason").val()
        });
    }
});

$(".bear_6.d div.button:eq(1)").click(function(){
    $.ajax({
        type: "POST",
        url: '/pages/panel.php',
        data: "is=unban_user"
    });
});

$(".bear_6.e div.button:eq(0)").click(function(){
    $.ajax({
        type: "POST",
        url: '/pages/panel.php',
        data: "is=warn_user"
    });
});

$(".bear_6.e div.button:eq(1)").click(function(){
    $.ajax({
        type: "POST",
        url: '/pages/panel.php',
        data: "is=unwarn_user"
    });
});

$(".bear_4.right div.button:eq(5)").click(function(){
    if((($.trim($(".bear_4.right input:eq(0)").val())) !== "") && (($.trim($(".bear_4.right input:eq(1)").val())) !== "") && (($.trim($(".bear_4.right input:eq(2)").val())) !== "")){
        $.ajax({
            type: "POST",
            url: '/pages/panel.php',
            data: "is=watch_logs&date="+$(".bear_4.right input.day").val()+","+$(".bear_4.right input.month").val()+","+$(".bear_4.right input.year").val(),
            success: function(data){
                $(".money_box_2").empty().append(data);
            }
        });
    }
});
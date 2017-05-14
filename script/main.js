function grand() {
    var str = checkname() + "\n" + checksurname() + "\n" + checkmail();
    if (str != "\n\n") {
        alert(str);
        return false
    };
    return true;
}

function checkmail() {
    var txt = $("#MailAddress").val();
    if (txt == "Email") return "Введіть емайл";
    if (txt == "") return "Введіть адресу електронної пошти";
    dot = txt.indexOf('.');
    if (dot == -1) return "Немає символу\".\"";
    if ((txt.indexOf(",") >= 0) || (txt.indexOf(";") >= 0) || (txt.indexOf(" ") >= 0)) return "Адрес електронної пошти було введено неправильно.";
    dog = txt.indexOf("@");
    if (dog == -1) return "Немає символу\"@\".";
    if ((dog < 1) || (dog > txt.length - 5)) return "Шось не так.";
    if ((dot - dog) <= 1) return 'Знов шось не так';
    return "";
}

function checkname() {
    var txt = $("#Name").val();
    if (txt == "Name") return "Введіть ім'я";
    if (txt == " ") return "Поле для імені пусте";
    if (txt.length < 4) return "Шось дуже коротке ім'я";
    if (txt.length > 20) return "Та твої мама з татом шутніки, та?";
    return "";
}

function checksurname() {
    var txt = $("#Surname").val();
    if (txt == "LastName") return "Введіть прізвище";
    if (txt == " ") return "Поле для прізвища пусте";
    if (txt.length < 3) return "Шось дуже коротке прізвище";
    if (txt.length > 20) return "Нє ну нічо собі прізвище";
    return "";
}

function addpicture() {
    //var where=document.getElementById("pictures");
    //var img = document.createElement('img');
    /*var img=$("<img>",{
        src: 'images/cat2.jpg',
        weight: '200px',
        height:'200px',
    }).insertBefore($("#add_pic"));
      img.setAttribute('src', 'images/cat2.jpg');
      img.setAttribute('weight',"200px");
      img.setAttribute('height','200px');*/
    //where.insertBefore(img, where.childNodes[4])
}

$(function () {
    $(".image").change(showPreviewImage_click);
})

function showPreviewImage_click() {
    var $input = $(this);
    var inputFiles = this.files;
    if (inputFiles == undefined || inputFiles.length == 0) return;
    var inputFile = inputFiles[0];
    var img = $('<img/>', {
        width: "100%",
        height: "100%"
    });
    img.insertBefore($("#add_pic"))
    var reader = new FileReader();
    reader.onload = function (event) {
        img.attr("src", event.target.result);
    };
    reader.onerror = function (event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(inputFile);
}

function audio_play() {
    /*var audio = document.getElementsByTagName("audio")[0];
    audio.play();  */
    $("audio").trigger("play");
}

function audio_stop() {
    /*
    var audio=document.getElementsByTagName("audio")[0];
    audio.pause();*/
    clearTimeout(timer_id);
    $("audio").trigger("pause");
}

//////////////////////////////////////////////////////////
////////////////For NyanCat///////////////////////////////
//////////////////////////////////////////////////////////
var i = 0;
img_a = new Array()
img_a[0] = new Image()
img_a[1] = new Image()
img_a[2] = new Image()
img_a[3] = new Image()
img_a[4] = new Image()
img_a[5] = new Image()
img_a[6] = new Image()
img_a[7] = new Image()
img_a[8] = new Image()
img_a[9] = new Image()
img_a[10] = new Image()
img_a[11] = new Image()

img_a[0].src = "images/NyanCat/1.jpg"
img_a[1].src = "images/NyanCat/2.jpg"
img_a[2].src = "images/NyanCat/3.jpg"
img_a[3].src = "images/NyanCat/4.jpg"
img_a[4].src = "images/NyanCat/5.jpg"
img_a[5].src = "images/NyanCat/6.jpg"
img_a[6].src = "images/NyanCat/7.jpg"
img_a[7].src = "images/NyanCat/8.jpg"
img_a[8].src = "images/NyanCat/9.jpg"
img_a[9].src = "images/NyanCat/10.jpg"
img_a[10].src = "images/NyanCat/11.jpg"
img_a[11].src = "images/NyanCat/12.jpg"

var timer_id
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

function NyanCat() {
    //document.getElementById("Nyan_Cat").src=img_a[i].src;
    $("#Nyan_Cat").attr("src", img_a[i].src);
    i++
    if (i > 11) i = 0;
    timer_id = setTimeout("NyanCat()", 40)
    $("audio").trigger("play");
}

var is_scretch = false;

function read_more(el) {
    if (is_scretch == false) {
        $(".news").not(el).toggle("slow");
        if ($(el).width() < $("#news_id").width()) {
            var ris = $("#news_id").width() - $(el).width() - $("#news_id").width() * 0.05;
            $(el).animate({
                width: "+=" + ris
            }, "slow");
        }
        is_scretch = true;
        $('#TO').val(el.id);
    } else {
        if ($(el).width() >= ($("#news_id").width() - $("#news_id").width() * 0.05)) {
            var rss = $("#news_id").width() * 0.505;
            $(el).animate({
                width: "-=" + rss
            }, "slow", function () {
                $(".news").not(el).toggle("slow");
            });
        }
        is_scretch = false;
        $('#TO').val(null);
    }
    $('.describe').toggle();
    $("#COMM").toggle();
}

function del(ident) {
    if (confirm("Точно видалити цей пост?"))
        $.post('php_delete.php', {
            Id: ident
        }).done(function () {
            window.location.reload();
        });
}

function leave_comment(ident) {
        $.post('php_delete.php', {
            Id: ident
        }).done(function () {
            window.location.reload();
        });
}

function ren_post(identef) {
    $("#Remake_ed").val(identef);
    $("#Remake_form").submit();
}

function check_change() {
    if ($("#DATE_TODAY").prop('checked')) $('#DATE').toggle();
    else $('#DATE').toggle(500);
}

function create_renew() {
    if ($("#DATE_TODAY").prop('checked')) var Date_str = 'yes';
    else {
        var str = $("#DATE").val();
        var sub_s = str.split("-");
        if (sub_s.length > 3) return alert('Дата не правельна');
        if (sub_s[2] == null || sub_s[1] == null || sub_s[0] == null) return alert('Дата не правельна');
        if (sub_s[2] == NaN || sub_s[1] == NaN || sub_s[0] == NaN) return alert('Дата не правельна');
        if (sub_s[2] > 31 || sub_s[1] > 12 || sub_s[0] < 0) return alert('Дата не правельна');
        var Date_str = 'no';
    }
    str = $('#BODY_TXT').val();
    while (str.indexOf("'") > 1) {
        str = str.slice(0, str.indexOf("'")) + '&prime;' + str.slice(str.indexOf("'") + 1);
    }
    $.post('php_create_renew.php', {
        Id: $("#ID").val(),
        LOGO: $('#LOGO').val(),
        BODY_TXT: str,
        OPTIONAL: $("#OPTIONAL").val(),
        MIN_R: $('#MIN_R').val(),
        MAX_R: $('#MAX_R').val(),
        DATE: $("#DATE").val(),
        DATE_TODAY: Date_str
    }); //.done(function (data) {alert(data);});    
    window.location.replace("news.php");
}

function pass() {
    if (is_scretch == true) $(".Data")[1].click();
}

function renew_page() {
    $('.describe').hide();
    $("#COMM").hide();

    function key() {
        var k = window.event.keyCode;
        if (k == 37) {
            $('#back').click()
        } else if (k == 39) {
            $('#next').click()
        }
    }
    document.onkeydown = key;
    $('.describe').hide();
    $("#COMM").hide();
}

function send_test() {

}

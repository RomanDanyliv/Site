<div class="Header">
        <div class="Logo">
            <img id='Logo_pic' src="images/logo.png" alt="Web-Sait-Logo" onmousedown="$(this).attr('src','images/logopressed.png')" onmouseup="$(this).attr('src','images/logo.png')">
        </div>
        <div class="Search">
            <form name="Search" id="Search_form" action="search.php" method="post">
                <input name="WHAT_POST" id="WHAT_POST" value='' type="hidden">
                <input type="text" id='search_ed' name="question" value='' placeholder="Search" onkeyup="if (this.value.length==0) $('#search_prev').empty(); else $.ajax( {type: 'POST', url: 'Php_requests/search_previev.php', data: {'question': this.value}, success: function(data) {$('#search_prev').html(data);}})">
                <button type="submit">GO</button>
                <div id="search_prev"></div>
            </form>
            <?php
                   include "Php_requests/php_user_name.php";
                ?>
        </div>
    </div>
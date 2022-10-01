<?php
    $title = 'Игра';
    require "assets/blocks/header.php";
?>

<main>
    <div class="container_chess_main">
        <div class="container_chess">
        </div>
        <div class="menu_chess">
            <div class="timer"><span class="time_enter" id="black_timer"></span></div>
            <div class="container_menu">
                <div><progress class="black_time_bar" max="100" value="100"></progress></div>
                <div>
                    <button class="reverse" onclick="reverse_board();"><img class="btn_chess" height="20px" width="20px" src="/assets/images/reverse.png"></button>
                    <button class="left-left" onclick="fullBack_stroke();"><img class="btn_chess" height="20px" width="20px" src="/assets/images/left-left.png"></button>
                    <button class="left" onclick="back_stroke();"><img class="btn_chess" height="20px" width="20px" src="/assets/images/left.png"></button>
                    <button class="right" onclick="next_stroke();"><img class="btn_chess" height="20px" width="20px" src="/assets/images/right.png"></button>
                    <button class="right-right" onclick="fullNext_stroke();"><img class="btn_chess" height="20px" width="20px" src="/assets/images/right-right.png"></button>
                </div>
                <div class="list_of_stroke" style="height: 200px;"></div>
                <div><progress class="white_time_bar" max="100" value="100"></progress></div>
            </div>        
            <div class="timer"><span class="time_enter" id="white_timer"></span></div>
        </div>
    </div>

</main>

    
<?php
    require "assets/blocks/footer.php";
?>

<?php
    $title = 'Главная';
    require "assets/blocks/header.php";
?>

<main>
    <div class="container_main">
        <a class ="main_href">Играть с компьютером</a>
    </div>

</main>
<script language="JavaScript" type="text/javascript" src="/assets/js/others.js"></script>

<div class="start_game_block">
    <div class="container_start_game">
        <div class="container_extra">
            <h1>Сыграть с компьютером</h1>
            <div class="control_time_block">
                <form>
                    <span>Контроль времени: </span>
                    <select class="time_control">
                        <option selected>Отсутствует</option>
                        <option>По часам</option>
                    </select>
                </form>
                <div class="extra_time_menu">
                    <span>Минут на партию: </span><span class="time_for_game">5</span>
                    <input name="range" type="range", class="range", value="7" min="0" max="32" step="1" oninput="show_time(this.value, 0)">
                    <br>
                    <span>Добавление секунд на ход: </span><span class="time_for_game">3</span>
                    <input name="range" type="range", class="range", value="3" min="0" max="30" step="1" oninput="show_time(this.value, 1)">
                </div>
            </div>
            <div class="color_start_game_block">
                <form>
                    <span>Цвет: </span>
                    <select class="color_control">
                        <option selected>Случайный</option>
                        <option>Белый</option>
                        <option>Черный</option>
                    </select>
                </form>
            </div>
            <a class ="start_game_call">Играть с компьютером</a>
        </div>
        <span class="close">×</span>
    </div>
</div>

<?php
    require "assets/blocks/footer.php";
?>

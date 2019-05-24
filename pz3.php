<?php
session_start();
$basehp_player = 10;
$basehp_computer = 10;
$control_number = rand(1, 3);
$_SESSION['damage'] = $_POST['user_number'];

if (!empty($_POST['user_number'])) {
    if ($_POST['user_number'] == $control_number) {
        $_SESSION['hp_player'] -= $_POST['user_number'];
        $_SESSION['player_get_damage'] = 1;
        unset($_SESSION['computer_get_damage']);
        unset($_POST['user_number']);
    } else {
        $_SESSION['hp_computer'] -= $_POST['user_number'];
        $_SESSION['computer_get_damage'] = 1;
        unset($_SESSION['player_get_damage']);
        unset($_POST['user_number']);
    }
} else {
    unset($_SESSION['player_get_damage']);
    unset($_SESSION['computer_get_damage']);
}
// vinner
if ($_SESSION['hp_player'] > $_SESSION['hp_computer']) {
    $_SESSION['vinner'] = 'Игрок';
} else {
    $_SESSION['vinner'] = 'Компьютер';
}
if ($_GET['page'] == 'game1' && ($_SESSION['hp_player'] <= 0 || $_SESSION['hp_computer'] <= 0)) {
    header('Location: /pz3.php?module=games&page=game1over', true, 301);
    exit();
}

// header
require_once 'header.php';
?>
<!--main content-->
<div class="main">
    <div class="container">
        <?php
        if ($_GET['page'] == 'game1') {

            ?>
            <form method="post">
                <input type="number" name="user_number" min="1" max="3" list="defaultNumbers">
                <datalist id="defaultNumbers">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                </datalist>
                <br>
                <br>
                <input type="submit" value="Ввод" class="btn waves-effect waves-light light-blue darken-4">
            </form>
            <div class="row center-align">
                <div class="col s6">
                    <p>Игрок</p>
                    <i class="material-icons">accessibility</i>
                    <p>Здоровье: <?php echo $_SESSION['hp_player']; ?></p>
                    <?php
                    echo $_SESSION['player_get_damage'] ? '<p>Получил урон: ' . $_SESSION['damage'] .'</p>' : '';
                    ?>
                </div>
                <div class="col s6">
                    <p>Компьютер</p>
                    <i class="material-icons">android</i>
                    <p>Здоровье: <?php echo $_SESSION['hp_computer']; ?></p>
                    <?php
                    echo $_SESSION['computer_get_damage'] ? '<p>Получил урон: ' . $_SESSION['damage'] .'</p>' : '';
                    ?>
                </div>
            </div>
            <?php
        } elseif ($_GET['page'] == 'game1over') {
            ?>
            <div class="row center-align">
                <p>Победитель: <?php echo $_SESSION['vinner']; ?></p>
                <a href=" /pz3.php" class="btn waves-effect waves-light light-blue darken-4">NEW GAME</a>
            </div>
            <?php
        } else {
            unset($_SESSION['damage']);
            unset($_SESSION['computer_get_damage']);
            unset($_SESSION['player_get_damage']);
            $_SESSION['hp_player'] = $basehp_player;
            $_SESSION['hp_computer'] = $basehp_computer;
            ?>
            <div class="row center-align">
                <a href=" /pz3.php?page=game1" class="btn waves-effect waves-light light-blue darken-4">GAME START</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php

// footer
require_once 'footer.php';
?>

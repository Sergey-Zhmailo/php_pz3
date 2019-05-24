<?php
// header
require_once 'header.php';

?>
<!--main content-->
<div class="main">
    <div class="container">
        <h4 class="center-align">ООП. Наследование. Инкапсуляция</h4>
<?php

class Transport {
    public $korpus;
    public $rul;
    public $kolesa;
    public $speed = 50;
    const Qwe = 60;

    public function ww($a) {
        return $a / self::Qwe;
    }


}
class Auto extends Transport {
    public $speed = 100;

    function __construct()
    {
        echo __CLASS__;
    }
}
class Velo extends  Transport {
    public $speed = 20;
    const Qwe = 70;


//    public function ww($distance) {
//        return ($distance / $this->speed) * 1.3;
//    }

    public function ww($distance) {
        return parent::ww($distance) * 1.3;
    }
}

//$a = new Auto;
//echo $a->speed;
//echo $a->ww(100) . '<br/>';
//
//$b = new Velo;
//echo $b->ww(100);




//$transport = new Transport;
//echo $transport->speed;
//$transport->speed = 123;
//$b = new Transport;
//echo $b->speed;

// Инкапсуляция - область видимости свойтв класса
class A {
    public $a = 'public';
    protected  $b = 'protected'; // текущий класс и дочерние
    private $c = 'privat'; // только внутри класса, дочерние нет


}
//class B extends A {
//    public function bb() {
//        return $this->b;
//    }
//    public function cc() {
//        return$this->c;
//    }
//}

//$a = new B;
//echo $a->bb();

// ==========================================


/*if (!empty($_POST['user_number'])) {
    if ($_POST['user_number'] % 6 == 0) {
        $_SESSION['result'] = 'Красный свет светофора';
    } elseif ($_POST['user_number'] % 6 <= 3) {
        $_SESSION['result'] = 'Зеленый сигнал свет светофора';
    } else {
        $_SESSION['result'] = 'Желтый сигнал свет светофора';
    }
} else {
    $_SESSION['result'] = 'Ничего не введено';
}*/







?>
<!--        <form method="post">
            <input type="text" name="user_number">
            <button class="btn waves-effect waves-light light-blue darken-4" type="submit">Ввод</button>
        </form>
        <p>Ответ: <?php /*echo $_SESSION['result'] */?></p>
       -->
        <div class="row center-align">
            <a href="/?page=game1" class="btn waves-effect waves-light light-blue darken-4">GAME START</a>
        </div>
    </div>
</div>
<?php

    // footer
    require_once 'footer.php';
?>

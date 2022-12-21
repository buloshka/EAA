<?php
$category = ["Доски и лыжи", "Крепления",
    "Ботинки", "Одежда",
    "Инструменты", "Разное"];
$product = array(
    array(
        "name" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => 10999,
        "URL" => "img/lot-1.jpg"
    ),
    array(
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "URL" => "img/lot-2.jpg"
    ),
    array(
        "name" => "Крепления Union Contact Pro 2015
        года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "URL" => "img/lot-3.jpg"
    ),
    array(
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "URL" => "img/lot-4.jpg"
    ),
    array(
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "URL" => "img/lot-4.jpg"
    ),
    array(
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "URL" => "img/lot-6.jpg"
    )
);
function formating($value)
{
    $value = ceil($value);
    return (string)number_format($value,0,'',' ')." ₽";
}

function get_dt_range($dt)
{
    $date =  new DateTime($dt);
    $now = new DateTime("now");
    if ($date>$now == 1)
    {
        $range = $date->diff($now);
        $hours = $range->h;
        $hours = $hours + ($range->days*24);
        echo '">'.$hours.":".$range->i;
    }
    else{
        echo 'timer--finishing"> 00:00';
    }
}
?>
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach($category as &$value)
        {
            echo '<li class="promo__item promo__item--boards">
                      <a class="promo__link" href="pages/all-lots.html">',$value['name'],'</a>
                  </li>';
        }
        ?>

    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php
        foreach($product as &$value)
        {
            echo '
            <li class="lots__item lot">
            <div class="lot__image">
                <img src="',$value["image"],'" width="350" height="260" alt="">
            </div>
            <div class="lot__info">
                <span class="lot__category">',$category[$value["category_id"]]['name'],'</span>
                <h3 class="lot__title"><a class="text-link" href="pages/lot.html">',$value["name"],'</a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost">',formating($value["start_price"]),'</span>
                    </div>
                    <div class="lot__timer timer">',get_dt_range($value["end_date"]),'</div>
                </div>
            </div>
        </li>';
        }?>
    </ul>
</section>

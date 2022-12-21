<?php
$category;
$product;
require_once('helpers.php');
?>
<main class="container">
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
                    <span class="lot__category">',$category[array_search($value['category_id'],array_column($category,'id'))]['name'],'</span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=',$value["id"],'">',$value["name"],'</a></h3>
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
</main>

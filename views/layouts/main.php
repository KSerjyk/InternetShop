<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Best Shop</title>
    <?php $this->head() ?>
</head>
<body class="home option2">
<?php $this->beginBody() ?>

<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item"><img alt="phone" src="/images/phone.png"/>00-62-658-658</a>
                <a href="/site/contact"><img alt="email" src="/images/email.png"/>Зв'язатись з нами!</a>
            </div>

            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>My Account</span>
                    </a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <?= Yii::$app->user->isGuest?
                            '<li><a href="/site/login">Логін</a></li>'.
                            '<li><a href="/site/register">Реєстрація</a></li>':
                            '<li><a href="#">Профіль</a></li>'.
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                            'Вихід('.Yii::$app->user->identity->login.')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                .'</li>';?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="index.html"><img alt="Kute shop - themelock.com" src="/images/logo2.png"/></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form class="form-inline">
                    <div class="form-group input-serach">
                        <input type="text" placeholder="Keyword here...">
                    </div>
                    <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            <div class="col-xs-5 col-sm-2 group-button-header">
                <a title="Compare" href="#" class="btn-compare">compare</a>
                <a title="My wishlist" href="#" class="btn-heart">wishlist</a>
                <div class="btn-cart" id="cart-block">
                    <a title="My cart" href="cart.html">Cart</a>
                    <span class="notify notify-right">2</span>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title">2 Items in my cart</h5>
                            <div class="cart-block-list">
                                <ul>
                                    <li class="product-info">
                                        <div class="p-left">
                                            <a href="#" class="remove_link"></a>
                                            <a href="#">
                                                <img class="img-responsive" src="assets/data/product-100x122.jpg"
                                                     alt="p10">
                                            </a>
                                        </div>
                                        <div class="p-right">
                                            <p class="p-name">Donec Ac Tempus</p>
                                            <p class="p-rice">61,19 €</p>
                                            <p>Qty: 1</p>
                                        </div>
                                    </li>
                                    <li class="product-info">
                                        <div class="p-left">
                                            <a href="#" class="remove_link"></a>
                                            <a href="#">
                                                <img class="img-responsive" src="assets/data/product-s5-100x122.jpg"
                                                     alt="p10">
                                            </a>
                                        </div>
                                        <div class="p-right">
                                            <p class="p-name">Donec Ac Tempus</p>
                                            <p class="p-rice">61,19 €</p>
                                            <p>Qty: 1</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Total</span>
                                <span class="toal-price pull-right">122.38 €</span>
                            </div>
                            <div class="cart-buttons">
                                <a href="order.html" class="btn-check-out">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- END MANIN HEADER -->
<!--    <div id="nav-top-menu" class="nav-top-menu">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-3" id="box-vertical-megamenus">-->
<!--                    <div class="box-vertical-megamenus">-->
<!--                        <h4 class="title">-->
<!--                            <span class="title-menu">Categories</span>-->
<!--                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>-->
<!--                        </h4>-->
<!--                        <div class="vertical-menu-content is-home">-->
<!--                            <ul class="vertical-menu-list">-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/12.png">Electronics</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a class="parent" href="#"><img class="icon-menu" alt="Funky roots"-->
<!--                                                                    src="assets/data/13.png">Sports &amp; Outdoors</a>-->
<!--                                    <div class="vertical-dropdown-menu">-->
<!--                                        <div class="vertical-groups col-sm-12">-->
<!--                                            <div class="mega-group col-sm-4">-->
<!--                                                <h4 class="mega-group-header"><span>Tennis</span></h4>-->
<!--                                                <ul class="group-link-default">-->
<!--                                                    <li><a href="#">Tennis</a></li>-->
<!--                                                    <li><a href="#">Coats &amp; Jackets</a></li>-->
<!--                                                    <li><a href="#">Blouses &amp; Shirts</a></li>-->
<!--                                                    <li><a href="#">Tops &amp; Tees</a></li>-->
<!--                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>-->
<!--                                                    <li><a href="#">Intimates</a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="mega-group col-sm-4">-->
<!--                                                <h4 class="mega-group-header"><span>Swimming</span></h4>-->
<!--                                                <ul class="group-link-default">-->
<!--                                                    <li><a href="#">Dresses</a></li>-->
<!--                                                    <li><a href="#">Coats &amp; Jackets</a></li>-->
<!--                                                    <li><a href="#">Blouses &amp; Shirts</a></li>-->
<!--                                                    <li><a href="#">Tops &amp; Tees</a></li>-->
<!--                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>-->
<!--                                                    <li><a href="#">Intimates</a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="mega-group col-sm-4">-->
<!--                                                <h4 class="mega-group-header"><span>Shoes</span></h4>-->
<!--                                                <ul class="group-link-default">-->
<!--                                                    <li><a href="#">Dresses</a></li>-->
<!--                                                    <li><a href="#">Coats &amp; Jackets</a></li>-->
<!--                                                    <li><a href="#">Blouses &amp; Shirts</a></li>-->
<!--                                                    <li><a href="#">Tops &amp; Tees</a></li>-->
<!--                                                    <li><a href="#">Hoodies &amp; Sweatshirts</a></li>-->
<!--                                                    <li><a href="#">Intimates</a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                            <div class="mega-custom-html col-sm-12">-->
<!--                                                <a href="#"><img src="assets/data/banner-megamenu.jpg" alt="Banner"></a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/14.png">Smartphone-->
<!--                                        &amp; Tablets</a></li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/15.png">Health-->
<!--                                        &amp; Beauty Bags</a></li>-->
<!--                                <li>-->
<!--                                    <a class="parent" href="#">-->
<!--                                        <img class="icon-menu" alt="Funky roots" src="assets/data/16.png">Shoes &amp;-->
<!--                                        Accessories</a>-->
<!--                                    <div class="vertical-dropdown-menu">-->
<!--                                        <div class="vertical-groups col-sm-12">-->
<!--                                            <div class="mega-group col-sm-12">-->
<!--                                                <h4 class="mega-group-header"><span>Special products</span></h4>-->
<!--                                                <div class="row mega-products">-->
<!--                                                    <div class="col-sm-3 mega-product">-->
<!--                                                        <div class="product-avatar">-->
<!--                                                            <a href="#"><img src="assets/data/p10.jpg"-->
<!--                                                                             alt="product1"></a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-name">-->
<!--                                                            <a href="#">Fashion hand bag</a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-price">-->
<!--                                                            <div class="new-price">$38</div>-->
<!--                                                            <div class="old-price">$45</div>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-star">-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star-half-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-sm-3 mega-product">-->
<!--                                                        <div class="product-avatar">-->
<!--                                                            <a href="#"><img src="assets/data/p11.jpg"-->
<!--                                                                             alt="product1"></a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-name">-->
<!--                                                            <a href="#">Fashion hand bag</a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-price">-->
<!--                                                            <div class="new-price">$38</div>-->
<!--                                                            <div class="old-price">$45</div>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-star">-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star-half-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-sm-3 mega-product">-->
<!--                                                        <div class="product-avatar">-->
<!--                                                            <a href="#"><img src="assets/data/p12.jpg"-->
<!--                                                                             alt="product1"></a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-name">-->
<!--                                                            <a href="#">Fashion hand bag</a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-price">-->
<!--                                                            <div class="new-price">$38</div>-->
<!--                                                            <div class="old-price">$45</div>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-star">-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star-half-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-sm-3 mega-product">-->
<!--                                                        <div class="product-avatar">-->
<!--                                                            <a href="#"><img src="assets/data/p13.jpg"-->
<!--                                                                             alt="product1"></a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-name">-->
<!--                                                            <a href="#">Fashion hand bag</a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-price">-->
<!--                                                            <div class="new-price">$38</div>-->
<!--                                                            <div class="old-price">$45</div>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-star">-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star"></i>-->
<!--                                                            <i class="fa fa-star-half-o"></i>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/17.png">Toys-->
<!--                                        &amp; Hobbies</a></li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/18.png">Computers-->
<!--                                        &amp; Networking</a></li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/19.png">Laptops-->
<!--                                        &amp; Accessories</a></li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/20.png">Jewelry-->
<!--                                        &amp; Watches</a></li>-->
<!--                                <li><a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/21.png">Flashlights-->
<!--                                        &amp; Lamps</a></li>-->
<!--                                <li>-->
<!--                                    <a href="#">-->
<!--                                        <img class="icon-menu" alt="Funky roots" src="assets/data/21.png">-->
<!--                                        Cameras &amp; Photo-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="cat-link-orther">-->
<!--                                    <a href="#">-->
<!--                                        <img class="icon-menu" alt="Funky roots" src="assets/data/22.png">-->
<!--                                        Television-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="cat-link-orther">-->
<!--                                    <a href="#">-->
<!--                                        <img class="icon-menu" alt="Funky roots" src="assets/data/12.png">Computers-->
<!--                                        &amp; Networking-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="cat-link-orther">-->
<!--                                    <a href="#">-->
<!--                                        <img class="icon-menu" alt="Funky roots" src="assets/data/14.png">-->
<!--                                        Toys &amp; Hobbies-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="cat-link-orther">-->
<!--                                    <a href="#"><img class="icon-menu" alt="Funky roots" src="assets/data/17.png">Jewelry-->
<!--                                        &amp; Watches</a></li>-->
<!--                            </ul>-->
<!--                            <div class="all-category"><span class="open-cate">All Categories</span></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div id="main-menu" class="col-sm-9 main-menu">-->
<!--                    <nav class="navbar navbar-default">-->
<!--                        <div class="container-fluid">-->
<!--                            <div class="navbar-header">-->
<!--                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
<!--                                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">-->
<!--                                    <i class="fa fa-bars"></i>-->
<!--                                </button>-->
<!--                                <a class="navbar-brand" href="#">MENU</a>-->
<!--                            </div>-->
<!--                            <div id="navbar" class="navbar-collapse collapse">-->
<!--                                <ul class="nav navbar-nav">-->
<!--                                    <li class="active"><a href="#">Home</a></li>-->
<!--                                    <li class="dropdown">-->
<!--                                        <a href="category.html" class="dropdown-toggle"-->
<!--                                           data-toggle="dropdown">Fashion</a>-->
<!--                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="img_container">-->
<!--                                                        <a href="#">-->
<!--                                                            <img class="img-responsive" src="assets/data/men.png"-->
<!--                                                                 alt="sport">-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">MEN'S</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container"><a href="#">Skirts</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Jackets</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Tops</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Scarves</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Pants</a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="img_container">-->
<!--                                                        <a href="#">-->
<!--                                                            <img class="img-responsive" src="assets/data/women.png"-->
<!--                                                                 alt="sport">-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">WOMEN'S</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container"><a href="#">Skirts</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Jackets</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Tops</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Scarves</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Pants</a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="img_container">-->
<!--                                                        <a href="#">-->
<!--                                                            <img class="img-responsive" src="assets/data/kid.png"-->
<!--                                                                 alt="sport">-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">Kids</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container"><a href="#">Shoes</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Clothing</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Tops</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Scarves</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Accessories</a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="img_container">-->
<!--                                                        <a href="#">-->
<!--                                                            <img class="img-responsive" src="assets/data/trending.png"-->
<!--                                                                 alt="sport">-->
<!--                                                        </a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">TRENDING</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container"><a href="#">Men's Clothing</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Kid's Clothing</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Women's Clothing</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Accessories</a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                    <li><a href="category.html" class="dropdown-toggle"-->
<!--                                           data-toggle="dropdown">Sports</a></li>-->
<!--                                    <li class="dropdown">-->
<!--                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Foods</a>-->
<!--                                        <ul class="mega_dropdown dropdown-menu" style="width: 830px;">-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">Asian</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Vietnamese Pho</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Noodles</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Seafood</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">Sausages</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Meat Dishes</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Desserts</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">European</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Greek Potatoes</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Famous Spaghetti</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Famous Spaghetti</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">Chicken</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Italian Pizza</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">French Cakes</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">FAST</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Hamberger</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Pizza</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Noodles</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container group_header">-->
<!--                                                        <a href="#">Sandwich</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Salad</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Paste</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                    <li class="link_container">-->
<!--                                                        <a href="#">Tops</a>-->
<!--                                                    </li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="block-container col-sm-3">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="img_container">-->
<!--                                                        <img src="assets/data/banner-topmenu.jpg" alt="Banner">-->
<!--                                                    </li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!---->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                    <li class="dropdown">-->
<!--                                        <a href="category.html" class="dropdown-toggle"-->
<!--                                           data-toggle="dropdown">Digital</a>-->
<!--                                        <ul class="dropdown-menu container-fluid">-->
<!--                                            <li class="block-container">-->
<!--                                                <ul class="block">-->
<!--                                                    <li class="link_container"><a href="#">Mobile</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Tablets</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Laptop</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Memory Cards</a></li>-->
<!--                                                    <li class="link_container"><a href="#">Accessories</a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                    <li><a href="category.html">Furniture</a></li>-->
<!--                                    <li><a href="category.html">Jewelry</a></li>-->
<!--                                    <li><a href="category.html">Blog</a></li>-->
<!--                                </ul>-->
<!--                            </div><!--/.nav-collapse -->-->
<!--                        </div>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- userinfo on top-->-->
<!--            <div id="form-search-opntop">-->
<!--            </div>-->
<!--            <!-- userinfo on top-->-->
<!--            <div id="user-info-opntop">-->
<!--            </div>-->
<!--            <!-- CART ICON ON MMENU -->-->
<!--            <div id="shopping-cart-box-ontop">-->
<!--                <i class="fa fa-shopping-cart"></i>-->
<!--                <div class="shopping-cart-box-ontop-content"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
<!-- end header -->
<!---->

<div class="container">
    <?= Breadcrumbs::widget([
        'homeLink' => ['label' => 'Домашня', 'url' => '/'],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<!-- Footer -->
<footer id="footer">
    <div class="container">
        <!-- introduce-box -->
        <div id="introduce-box" class="row">
            <div class="col-md-3">
                <div id="address-box">
                    <a href="#"><img src="/images/logo2.png" alt="logo"/></a>
                    <div id="address-list">
                        <div class="tit-name">Address:</div>
                        <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                        <div class="tit-name">Phone:</div>
                        <div class="tit-contain">+00 123 456 789</div>
                        <div class="tit-name">Email:</div>
                        <div class="tit-contain">support@business.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
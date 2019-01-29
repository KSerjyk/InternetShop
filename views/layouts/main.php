<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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


        <title>МАГАЗIН</title>
        <?php $this->head() ?>
    </head>
    <body class="home option2">
    <?php $this->beginBody() ?>

    <!-- HEADER -->
    <div id="header" class="header">
        <div class="top-header">
            <div class="container">
                <div class="nav-top-links">
                    <a class="first-item"><img alt="phone" src="/images/phone.png"/>123465879</a>
                    <a href="/site/contact"><img alt="email" src="/images/email.png"/>Зв'язатись з нами!</a>
                </div>

                <div id="user-info-top" class="user-info pull-right">
                    <div class="dropdown">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Акаунт</span>
                        </a>
                        <ul class="dropdown-menu mega_dropdown" role="menu">
                            <?= Yii::$app->user->isGuest ?
                                '<li><a href="/site/login">Логін</a></li>' .
                                '<li><a href="/user/register">Реєстрація</a></li>' :
                                '<li><a href="#">Профіль</a></li>' .
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    'Вихід(' . Yii::$app->user->identity->login . ')',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>'; ?>
                        </ul>

                    </div>
                </div>

                <!-- MAIN HEADER -->
                <div class="container main-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 logo">
                            <a href="/"><img alt="Kute shop - themelock.com" src="/images/logo2.png"/></a>
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
                            <div class="btn-cart" id="cart-block">
                                <a title="My cart" href="site/korzina">Cart</a>
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
                                                            <img class="img-responsive"
                                                                 src="/images/product-100x122.jpg"
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
                                                            <img class="img-responsive"
                                                                 src="/images/product-s5-100x122.jpg"
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
                                            <a href="site/korzina" class="btn-check-out">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- END MANIN HEADER -->


                <div id="nav-top-menu" class="nav-top-menu">


                    <div class="container" style="margin-left: 300px">
                        <div class="row">
                            <div id="main-menu" class="col-sm-9 main-menu">
                                <nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                            <a class="navbar-brand" href="#">MENU</a>
                                        </div>
                                        <div id="navbar" class="navbar-collapse collapse">
                                            <div class="MyDropdown">
                                                <ul class="nav navbar-nav">

                                                    <?php $level = 0;


                                                    function build($categoriesArr, $parent = 0)
                                                    {

                                                        $result = '<ul>';
                                                        foreach ($categoriesArr as $item) {
                                                            if ($item->parent_category_id == $parent) {
                                                                $result .= '<li>' . $item->name . ' ' . $item->id;
                                                                if (has_children($categoriesArr, $item->id)) {
                                                                    $result .= build($categoriesArr, $item->id);
                                                                }
                                                                $result .= '</li>';
                                                            }
                                                        }
                                                        $result .= '</ul>';
                                                        return $result;
                                                    }

                                                    function has_children($categories, $id)
                                                    {
                                                        foreach ($categories as $category) {
                                                            if ($category['parent_category_id'] == $id)
                                                                return true;
                                                        }
                                                        return false;
                                                    }

                                                    function build_menu($categories, $parent = 0)
                                                    {
                                                        global $level;
                                                        if($level == 0)
                                                            $result = '';
                                                        else if($level == 1)
                                                            $result = '<li class="block-container col-sm-3"><ul class="block">';
                                                        foreach ($categories as $category) {
                                                            if ($category['parent_category_id'] == $parent) {
                                                                if($level == 0)
                                                                    $result .= "<li class = 'dropdown'><a href='/?categoryName={$category['name']}' class='dropdown-toggle' data-togle='dropdown'>{$category['name']}</a>";
                                                                else if($level == 1)
                                                                    $result .= "<li class='link_container group_header'><a href=\"/?categoryName={$category['name']}\">{$category['name']}</a></li>";
                                                                else if($level == 2)
                                                                    $result .= "<li class='link_container'><a href=\"/?categoryName={$category['name']}\">{$category['name']}</a></li>";
                                                                if (has_children($categories, $category['id'])) {
                                                                    if($level == 0)
                                                                        $result .= '<ul class="mega_dropdown dropdown-menu" style="width: 830px;">';
                                                                    $level++;
                                                                    $result .= build_menu($categories, $category['id']);
                                                                }
                                                            }
                                                        }
                                                        if($level == 1)
                                                            $result .= '</ul></li></ul></li>';
                                                        $level--;

                                                        return $result;
                                                    }
                                                    $categoriesArr = $this->context->categories;
                                                    echo build_menu($categoriesArr);?>
                                                    <!-- begin categories -->
                                                   <!-- <li class="active"><a href="#">Home</a></li>
                                                    <li class="dropdown">
                                                        <a href="category.html" class="dropdown-toggle"
                                                           data-toggle="dropdown">Fashion</a>
                                                        <ul class="dropdown-menu mega_dropdown" role="menu"
                                                            style="width: 830px;">
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="img_container">
                                                                        <a href="#">
                                                                            <img class="img-responsive"
                                                                                 src="/images/men.png"
                                                                                 alt="sport">
                                                                        </a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">MEN'S</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Skirts</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Jackets</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                                    <li class="link_container"><a href="#">Scarves</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Pants</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="img_container">
                                                                        <a href="#">
                                                                            <img class="img-responsive"
                                                                                 src="/images/women.png"
                                                                                 alt="sport">
                                                                        </a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">WOMEN'S</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Skirts</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Jackets</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                                    <li class="link_container"><a href="#">Scarves</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Pants</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="img_container">
                                                                        <a href="#">
                                                                            <img class="img-responsive"
                                                                                 src="/images/kid.png"
                                                                                 alt="sport">
                                                                        </a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">Kids</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Shoes</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Clothing</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                                    <li class="link_container"><a href="#">Scarves</a>
                                                                    </li>
                                                                    <li class="link_container"><a
                                                                                href="#">Accessories</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="img_container">
                                                                        <a href="#">
                                                                            <img class="img-responsive"
                                                                                 src="/images/trending.png"
                                                                                 alt="sport">
                                                                        </a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">TRENDING</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Men's
                                                                            Clothing</a></li>
                                                                    <li class="link_container"><a href="#">Kid's
                                                                            Clothing</a></li>
                                                                    <li class="link_container"><a href="#">Women's
                                                                            Clothing</a></li>
                                                                    <li class="link_container"><a
                                                                                href="#">Accessories</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="category.html" class="dropdown-toggle"
                                                           data-toggle="dropdown">Sports</a></li>
                                                    <li class="dropdown">
                                                        <a href="category.html" class="dropdown-toggle"
                                                           data-toggle="dropdown">Foods</a>
                                                        <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="link_container group_header">
                                                                        <a href="#">Asian</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Vietnamese Pho</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Noodles</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Seafood</a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">Sausages</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Meat Dishes</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Desserts</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="link_container group_header">
                                                                        <a href="#">European</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Greek Potatoes</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Famous Spaghetti</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Famous Spaghetti</a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">Chicken</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Italian Pizza</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">French Cakes</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li class="block-container col-sm-3">
                                                                <ul class="block">
                                                                    <li class="link_container group_header">
                                                                        <a href="#">FAST</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Hamberger</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Pizza</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Noodles</a>
                                                                    </li>
                                                                    <li class="link_container group_header">
                                                                        <a href="#">Sandwich</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Salad</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Paste</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                    <li class="link_container">
                                                                        <a href="#">Tops</a>
                                                                    </li>
                                                                </ul>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="category.html" class="dropdown-toggle"
                                                           data-toggle="dropdown">Digital</a>
                                                        <ul class="dropdown-menu container-fluid">
                                                            <li class="block-container">
                                                                <ul class="block">
                                                                    <li class="link_container"><a href="#">Mobile</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Tablets</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Laptop</a>
                                                                    </li>
                                                                    <li class="link_container"><a href="#">Memory
                                                                            Cards</a></li>
                                                                    <li class="link_container"><a
                                                                                href="#">Accessories</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="category.html">Furniture</a></li>
                                                    <li><a href="category.html">Jewelry</a></li>
                                                    <li><a href="category.html">Blog</a></li>
<!-- end categories -->
                                                </ul>
                                            </div><!--/.nav-collapse -->
                                        </div>
                                </nav>
                            </div>
                        </div>
                        <!-- userinfo on top-->
                        <div id="form-search-opntop">
                        </div>
                        <!-- userinfo on top-->
                        <div id="user-info-opntop">
                        </div>
                        <!-- CART ICON ON MMENU -->
                        <div id="shopping-cart-box-ontop">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="shopping-cart-box-ontop-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header -->
        </div>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
        <footer id="footer">

            <div class="container">
                <!-- introduce-box -->
                <div id="introduce-box" class="row">
                    <div class="col-md-8">
                        <div id="address-box">
                            <a href="/" style="margin-left: 440px"><img src="/images/logo2.png" alt="logo"/></a>
                            <div class="tit-name" style="margin-left: 400px">Адреса: вул. Євгена Сверстюка 2, Луцьк,
                                Волинська обл., Україна. Телефон: +380-99-00-25-075 Email: admin@gmail.com
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <br>
        </footer>
        <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>

        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
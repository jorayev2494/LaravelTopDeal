<template>
    <header id="header" class="typeheader-6">
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left  col-lg-6  col-sm-12 col-md-7 hidden-xs">
                        <div class="list-contact hidden-sm hidden-xs">
                            Get an extra 10% off or more on select hotels with Member Pricing Join now, it’s free!
                        </div>
                    </div>
                    <div class="header-top-right collapsed-block col-lg-6 col-sm-12 col-md-5 col-xs-12 ">
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                <li class="login">
                                    <router-link :to="{ name: 'login' }">Login </router-link>
                                </li>
                                <li class="account" v-if="authCheckComp" id="my_account">
                                    <a href="my-account.html" title="My Account" class="btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span>My Account</span>
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="order-history.html">Order History</a></li>
                                        <li><a href="#">Transactions</a></li>
                                        <li><a href="#">Downloads</a></li>
                                        <li class="checkout">
                                            <a href="checkout.html" class="btn-link" title="Checkout">
                                                <span>Checkout </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" v-on:click.prevent="logout()">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- LANGUAGE CURENTY -->
                                <li>
                                    <div class="pull-left">
                                        <form action="#" method="post" enctype="multipart/form-data" id="form-language">
                                            <div class="btn-group">
                                                <button class="btn-link dropdown-toggle" data-toggle="dropdown">
                                                    <img src="/public/image/catalog/flags/gb.png" alt="English"
                                                        title="English">
                                                    <span class="hidden-xs hidden-sm hidden-md">English</span>&nbsp;<i
                                                        class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button class="btn-block language-select" type="button" name="ar-ar">
                                                        <img src="/public/image/catalog/flags/ar.png" alt="Arabic" title="Arabic"> Arabic</button>
                                                    </li>
                                                    <li>
                                                        <button class="btn-block language-select" type="button" name="en-gb">
                                                        <img src="/public/image/catalog/flags/gb.png" alt="English" title="English"> English</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="code" value="">
                                            <input type="hidden" name="redirect" value="#">
                                        </form>
                                    </div>
                                </li>
                                <li class="currency">
                                    <div class="pull-left">
                                        <form action="#" method="post" enctype="multipart/form-data" id="form-currency">
                                            <div class="btn-group">
                                                <button class="btn-link dropdown-toggle" data-toggle="dropdown">
                                                    $<span class="hidden-xs"> US Dollar</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <button class="currency-select btn-block" type="button"
                                                            name="EUR">€ Euro</button>
                                                    </li>
                                                    <li>
                                                        <button class="currency-select btn-block" type="button"
                                                            name="GBP">£ Pound Sterling</button>
                                                    </li>
                                                    <li>
                                                        <button class="currency-select btn-block" type="button"
                                                            name="USD">$ US Dollar</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="code" value="">
                                            <input type="hidden" name="redirect" value="#">
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->
        <!-- Header center -->
        <div class="header-center">
            <div class="container">
                <div class="row">
                    <div class="navbar-logo col-lg-3 col-md-12 col-xs-12">
                        <a href="index6.php"><img src="/public/image/catalog/demo/logo/logo-home6.png" 
                                title="Your Store - Layout 6" alt="Your Store - Layout 6"></a>
                    </div>
                    <div class="header-center-right col-lg-6 col-md-7 col-sm-7 col-xs-9">
                        <div class="header_search">
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                <form method="GET" action="#">
                                    <div id="search0" class="search input-group form-group">
                                        <div class="select_category filter_type  icon-select">
                                            <select class="no-border" name="category_id">
                                                <option value="0">All Categories </option>
                                                <option value="82 ">Book Stationery </option>
                                                <option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Girls New
                                                </option>
                                                <option value="56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kitchen
                                                </option>
                                                <option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl mens
                                                </option>
                                                <option value="38 ">Laptop &amp; Notebook </option>
                                                <option value="52 ">Spa &amp; Massage </option>
                                                <option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge
                                                    mange </option>
                                                <option value="53">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Necklaces
                                                </option>
                                                <option value="54">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl
                                                    Jewelry </option>
                                                <option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Slider 925
                                                </option>
                                                <option value="24">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phones &amp;
                                                    PDAs </option>
                                                <option value="59 ">Sport &amp; Entertaiment </option>
                                                <option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camping
                                                    &amp; Hiking </option>
                                                <option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cusen mariot
                                                </option>
                                                <option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engite nanet
                                                </option>
                                                <option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fashion
                                                </option>
                                                <option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men
                                                </option>
                                                <option value="60 ">Travel &amp; Vacation </option>
                                                <option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Best Tours
                                                </option>
                                                <option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cruises
                                                </option>
                                                <option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destinations
                                                </option>
                                                <option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hotel &amp;
                                                    Resort </option>
                                                <option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infocus
                                                </option>
                                                <option value="18 ">Laptops &amp; Notebooks </option>
                                                <option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Macs
                                                </option>
                                                <option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Windows
                                                </option>
                                                <option value="34 ">Food &amp; Restaurant </option>
                                                <option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet
                                                    magente </option>
                                                <option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
                                                </option>
                                                <option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
                                                </option>
                                                <option value="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
                                                </option>
                                                <option value="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
                                                </option>
                                                <option value="51">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Web Cameras
                                                </option>
                                                <option value="39 ">Shop Collection </option>
                                                <option value="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet
                                                    magente </option>
                                                <option value="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
                                                </option>
                                                <option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge
                                                    mange </option>
                                                <option value="58">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
                                                </option>
                                                <option value="17">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
                                                </option>
                                                <option value="57">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
                                                </option>
                                                <option value="35 ">Fashion &amp; Accessories </option>
                                                <option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dress Ladies
                                                </option>
                                                <option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jean
                                                </option>
                                                <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men Fashion
                                                </option>
                                                <option value="88">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T-shirt
                                                </option>
                                                <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trending
                                                </option>
                                                <option value="37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Western Wear
                                                </option>
                                                <option value="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Women
                                                    Fashion </option>
                                                <option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bags
                                                </option>
                                                <option value="33 ">Digital &amp; Electronics </option>
                                                <option value="83">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell
                                                    Computers </option>
                                                <option value="84">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
                                                    Accessories </option>
                                                <option value="85">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
                                                    Headsets </option>
                                                <option value="86">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Desna Jacket
                                                </option>
                                                <option value="87">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Electronics
                                                </option>
                                                <option value="89">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Headphone
                                                </option>
                                                <option value="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laptops
                                                </option>
                                                <option value="78">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobiles
                                                </option>
                                                <option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sound
                                                </option>
                                                <option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USB &amp;
                                                    HDD </option>
                                                <option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VGA and CPU
                                                </option>
                                                <option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video &amp;
                                                    Camera </option>
                                                <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video You
                                                </option>
                                                <option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wireless
                                                    Speakers </option>
                                                <option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camera New
                                                </option>
                                                <option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Case
                                                </option>
                                                <option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell &amp;
                                                    Cable </option>
                                                <option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile &amp;
                                                    Table </option>
                                                <option value="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bluetooth
                                                    Speakers </option>
                                            </select>
                                        </div>
                                        <input class="autosearch-input form-control" type="text" value="" size="50"
                                            autocomplete="off" placeholder="Search" name="search">
                                        <span class="input-group-btn">
                                            <button type="submit" class="button-search btn btn-default btn-lg"
                                                name="submit_search"><i class="fa fa-search"></i><span
                                                    class="hidden">Search</span></button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="route" value="product/search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-cart-phone col-lg-3 col-md-5 col-sm-5 col-xs-3">
                        <div class="bt-head header-cart">
                            <div class="shopping_cart">
                                <div id="cart" class="btn-shopping-cart">
                                    <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                        data-toggle="dropdown">
                                        <div class="shopcart">
                                            <span class="handle pull-left"></span>
                                            <div class="cart-info">
                                                <h2 class="title-cart">Shopping cart</h2>
                                                <h2 class="title-cart2 hidden">My Cart</h2>
                                                <span class="total-shopping-cart cart-total-full">
                                                    <span class="items_cart">2 </span><span
                                                        class="items_cart2">item(s)</span><span class="items_carts">
                                                        - $206.80</span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu pull-right shoppingcart-box">
                                        <li class="content-item">
                                            <table class="table table-striped" style="margin-bottom:10px;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center size-img-cart">
                                                            <a href="product.html"><img
                                                                    src="/public/image/catalog/demo/product/travel/10-54x54.jpg"
                                                                    alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
                                                                    title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
                                                                    class="img-thumbnail"></a>
                                                        </td>
                                                        <td class="text-left"><a href="product.html">Bougainvilleas
                                                                on Lombard Street, San Francisco, Tokyo</a>
                                                            <br> - <small>Size M</small>
                                                        </td>
                                                        <td class="text-right">x1</td>
                                                        <td class="text-right">$120.80</td>
                                                        <td class="text-center">
                                                            <button type="button" title="Remove"
                                                                class="btn btn-danger btn-xs"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-striped" style="margin-bottom:10px;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center size-img-cart">
                                                            <a href="product.html"><img
                                                                    src="/public/image/catalog/demo/product/travel/2-54x54.jpg"
                                                                    alt="Canada Travel One or Two European Facials at  Studio"
                                                                    title="Canada Travel One or Two European Facials at  Studio"
                                                                    class="img-thumbnail"></a>
                                                        </td>
                                                        <td class="text-left"><a href="product.html">Canada Travel
                                                                One or Two European Facials at Studio</a>
                                                            <br> - <small>Size M</small>
                                                        </td>
                                                        <td class="text-right">x1</td>
                                                        <td class="text-right">$86.00</td>
                                                        <td class="text-center">
                                                            <button type="button" title="Remove"
                                                                class="btn btn-danger btn-xs"><i
                                                                    class="fa fa-trash-o"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <div class="checkout clearfix">
                                                <a href="cart.html" class="btn btn-view-cart inverse"> View Cart</a>
                                                <a href="checkout.html" class="btn btn-checkout pull-right">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="header_custom_link hidden-xs">
                            <ul>
                                <li class="compare"><a href="compare.html" class="top-link-compare"
                                        title="Compare "></a></li>
                                <li class="wishlist"><a href="wishlist.html" class="top-link-wishlist"
                                        title="Wish List (0) "></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header center -->
        <!-- Heaader bottom -->
        <div class="header-bottom hidden-compact">
            <div class="container">
                <div class="header-bottom-inner">
                    <div class="row">
                        <div class="header-bottom-left menu-vertical col-md-3 col-sm-6 col-xs-7">
                            <div class="megamenu-style-dev megamenu-dev">
                                <div class="responsive">
                                    <div class="so-vertical-menu no-gutter">
                                        <nav class="navbar-default">
                                            <div class=" container-megamenu  container   vertical  ">
                                                <div id="menuHeading">
                                                    <div class="megamenuToogle-wrapper">
                                                        <div class="megamenuToogle-pattern">
                                                            <div class="container">
                                                                <div><span></span><span></span><span></span></div>
                                                                <span class="title-mega">
                                                                    All Categories
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-header">
                                                    <span class="title-navbar hidden-lg hidden-md"> All Categories
                                                    </span>
                                                    <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                        class="navbar-toggle">
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                </div>
                                                <div class="vertical-wrapper">
                                                    <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                    <div class="megamenu-pattern">
                                                        <div class="container">
                                                            <ul class="megamenu" data-transition="slide"
                                                                data-animationtime="300">
                                                                <li class="item-vertical  style1">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-6.png"
                                                                                    alt="">Hot Deal</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li
                                                                    class="item-vertical  vertical-style2 with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-1.png"
                                                                                    alt="">Electronics</strong>
                                                                        </span>
                                                                        <b class="fa fa-caret-right"></b>
                                                                    </a>
                                                                    <div class="sub-menu" data-subwidth="100">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="html item-1">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-7 col-md-7 col-sm-8">
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 icon-1">
                                                                                                    <a href="#"
                                                                                                        title="Mobile &amp; Table">Mobile
                                                                                                        &amp;
                                                                                                        Table</a>
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                title="Laptops &amp; Tablets">Laptops
                                                                                                                &amp;
                                                                                                                Tablets</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                title="Computer Accessories">Computer
                                                                                                                Accessories</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 cat-child icon-2 parent">
                                                                                                    <a href="#"
                                                                                                        title="Sound">Sound</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Bluetooth Speakers">Bluetooth
                                                                                                                Speakers</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Wireless Speakers">Wireless
                                                                                                                Speakers</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 cat-child icon-3 parent">
                                                                                                    <a href="#"
                                                                                                        title="Headphone">Headphone</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="VGA and CPU">VGA
                                                                                                                and
                                                                                                                CPU</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Desna Jacket">Desna
                                                                                                                Jacket</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 cat-child icon-4 parent">
                                                                                                    <a href="#"
                                                                                                        title="Video &amp; Camera">Video
                                                                                                        &amp;
                                                                                                        Camera</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Camera New">Camera
                                                                                                                New</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Video You">Video
                                                                                                                You</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 cat-child icon-5 parent">
                                                                                                    <a href="#"
                                                                                                        title="Mobile &amp; Table">USB
                                                                                                        &amp;
                                                                                                        HDD</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Usb Computer">USB
                                                                                                                Computer</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="HDD Computer">HDD
                                                                                                                Computer</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 icon-6">
                                                                                                    <a href="#"
                                                                                                        title="Cell &amp; Cable">Cell
                                                                                                        &amp;
                                                                                                        Cable</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Cell Computers">Cell
                                                                                                                Computers</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Cable Com">Cable
                                                                                                                Com</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 icon-7">
                                                                                                    <a href="#"
                                                                                                        title="Cell &amp; Cable">Laptop</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Computer Headsets">Computer
                                                                                                                Headsets</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Headphone Earpads">Headphone
                                                                                                                Earpads</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="item-3 col-lg-6 col-md-6 cat-child icon-8 parent">
                                                                                                    <a href="#"
                                                                                                        title="Case">Case</a>
                                                                                                    <ul>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Case Computer">Case
                                                                                                                Computer</a>
                                                                                                        </li>
                                                                                                        <li class="">
                                                                                                            <a href="#"
                                                                                                                title="Vafar Comfaoe">Vafar
                                                                                                                Comfaoe</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="img-banner col-lg-5 col-md-5 col-sm-4">
                                                                                                <a href="#"><img
                                                                                                        src="/public/image/catalog/demo/menu/img-static-megamenu-h.jpg"
                                                                                                        alt="banner"></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="item-vertical  vertical-style3 with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-2.png"
                                                                                    alt="">Travel &amp;
                                                                                Vacation</strong>
                                                                        </span>
                                                                        <b class="fa fa-caret-right"></b>
                                                                    </a>
                                                                    <div class="sub-menu" data-subwidth="65">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-5">
                                                                                    <div class="html item-1">
                                                                                        <div class="label-vertical">
                                                                                            <div><a href="#"><span
                                                                                                        class="color1">Hot!</span>Best
                                                                                                    Sellers </a>
                                                                                            </div>
                                                                                            <div><a href="#"><span
                                                                                                        class="color2">New!</span>New
                                                                                                    Arrivals </a>
                                                                                            </div>
                                                                                            <div><a href="#"><span
                                                                                                        class="color3">Sale!</span>Special
                                                                                                    Offers </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <ul>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Hotel &amp; Resort">Hotel
                                                                                                    &amp; Resort</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Best Tours">Best
                                                                                                    Tours</a></li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Vacation Rentanls">Vacation
                                                                                                    Rentanls</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Infocus">Infocus</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Restaurants">Restaurants</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Travel Trekking">Travel
                                                                                                    Trekking</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Destinations">Destinations</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Cruises">Cruises</a>
                                                                                            </li>
                                                                                            <li class=""><a href="#"
                                                                                                    title="Water Parks">Water
                                                                                                    Parks</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-7">
                                                                                    <div class="html ">
                                                                                        <div class="row img-banner">
                                                                                            <a href="#"><img
                                                                                                    src="/public/image/catalog/demo/menu/ver-img-1.jpg"
                                                                                                    alt="banner"></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-3.png"
                                                                                    alt="">Book Stationery</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li
                                                                    class="item-vertical   item-style3 with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-4.png"
                                                                                    alt="">Fashion</strong>
                                                                        </span>
                                                                        <b class="fa fa-caret-right"></b>
                                                                    </a>
                                                                    <div class="sub-menu" style="width: 650px;">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Digital
                                                                                                                &amp;
                                                                                                                Electronics</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Girls
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bluetooth
                                                                                                                        Speakers</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Digital
                                                                                                                        &amp;
                                                                                                                        Electronics</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Book
                                                                                                                        Stationery</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bluetooth
                                                                                                                        Speakers</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Cell
                                                                                                                        &amp;
                                                                                                                        Cable</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Fashion
                                                                                                                &amp;
                                                                                                                Accessories</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Girls
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        Jewelry</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Spa
                                                                                                                        &amp;
                                                                                                                        Massage</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Digital
                                                                                                                        &amp;
                                                                                                                        Electronics</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Camera
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bags</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Western
                                                                                                                Wear</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Video
                                                                                                                        You</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Dress
                                                                                                                        Ladies</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Jean</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Web
                                                                                                                        Cameras</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Laptop
                                                                                                                        &amp;
                                                                                                                        Notebook</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Dress
                                                                                                                        Ladies</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="border"></div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="link banner-full">
                                                                                        <img src="/public/image/catalog/demo/menu/menu_bg2.jpg"
                                                                                            alt="" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-5.png"
                                                                                    alt="">Sport &amp;
                                                                                Entertaiment</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="item-vertical  css-menu with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-8.png"
                                                                                    alt="">Spa &amp;
                                                                                Massage</strong>
                                                                        </span>
                                                                        <b class="fa fa-caret-right"></b>
                                                                    </a>
                                                                    <div class="sub-menu" style="width: 250px;">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-12 hover-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Book
                                                                                                                Stationery<b
                                                                                                                    class="fa fa-angle-right"></b></a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Camera
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Dress
                                                                                                                        Ladies</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Jean</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Case</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Book
                                                                                                                Stationery<b
                                                                                                                    class="fa fa-angle-right"></b></a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Girls
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens<b
                                                                                                                            class="fa fa-angle-right"></b></a>
                                                                                                                    <ul>
                                                                                                                        <li><a href="#"
                                                                                                                                onclick="window.location = '#';">Bluetooth
                                                                                                                                Speakers</a>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Fashion
                                                                                                                        &amp;
                                                                                                                        Accessories</a>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <a href="#"
                                                                                                                        onclick="window.location = '#';">Trending<b
                                                                                                                            class="fa fa-angle-right"></b></a>
                                                                                                                    <ul>
                                                                                                                        <li><a href="#"
                                                                                                                                onclick="window.location = '#';">Punge
                                                                                                                                nenune</a>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li><a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Kitchen</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Book
                                                                                                                Stationery<b
                                                                                                                    class="fa fa-angle-right"></b></a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Cell
                                                                                                                        &amp;
                                                                                                                        Cable</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Camera
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Digital
                                                                                                                        &amp;
                                                                                                                        Electronics</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Case<b
                                                                                                                    class="fa fa-angle-right"></b></a>
                                                                                                            <ul>
                                                                                                                <li>
                                                                                                                    <a href="#"
                                                                                                                        onclick="window.location = '#';">Bluetooth
                                                                                                                        Speakers<b
                                                                                                                            class="fa fa-angle-right"></b></a>
                                                                                                                    <ul>
                                                                                                                        <li><a href="#"
                                                                                                                                onclick="window.location = '#';">Cell
                                                                                                                                &amp;
                                                                                                                                Cable</a>
                                                                                                                        </li>
                                                                                                                        <li><a href="#"
                                                                                                                                onclick="window.location = '#';">Bags</a>
                                                                                                                        </li>
                                                                                                                        <li><a href="#"
                                                                                                                                onclick="window.location = '#';">Women
                                                                                                                                Fashion</a>
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-9.png"
                                                                                    alt="">Real House</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-6.png"
                                                                                    alt="">Mom &amp; Baby</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-7.png"
                                                                                    alt="">Food &amp;
                                                                                Restaurant</strong>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="item-vertical">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <span>
                                                                            <strong><img
                                                                                    src="/public/image/catalog/demo/menu/icon/icon-9.png"
                                                                                    alt="">Jewelry &amp;
                                                                                Watches</strong>
                                                                        </span>
                                                                        <span class="labelho"></span>
                                                                    </a>
                                                                </li>
                                                                <li class="loadmore"><i
                                                                        class="fa fa-plus-square"></i><span
                                                                        class="more-view"> More Categories</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Menuhome -->
                        <div class="header-bottom-right col-md-9 col-sm-6 col-xs-5">
                            <div class="header-menu">
                                <div class="megamenu-style-dev megamenu-dev">
                                    <div class="responsive">
                                        <nav class="navbar-default">
                                            <div class="container-megamenu horizontal">
                                                <div class="navbar-header">
                                                    <button type="button" id="show-megamenu" data-toggle="collapse"
                                                        class="navbar-toggle">
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                </div>
                                                <div class="megamenu-wrapper">
                                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                                    <div class="megamenu-pattern">
                                                        <div class="container">
                                                            <ul class="megamenu" data-transition="slide"
                                                                data-animationtime="500">
                                                                <li class="full-width menu-home with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <strong>
                                                                            Home
                                                                        </strong>
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <div class="sub-menu"
                                                                        style=" display: none; right: auto;">
                                                                        <div class="content"
                                                                            style="display: none; height: 400px;">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="html ">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="index.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout1.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 1</p>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="home2.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout2.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 2 </p>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="home3.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout3.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 3 </p>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="home4.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout4.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 4 </p>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="home5.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout5.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 5 </p>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="col-lg-4 col-md-4 col-sm-12"
                                                                                            style="text-align: center; margin-bottom: 20px;min-height: 140px;">
                                                                                            <a href="home6.html"
                                                                                                title=""
                                                                                                style="font-size: 12px;text-transform: uppercase;font-weight: bold;text-align: center;">
                                                                                                <img src="/public/image/catalog/demo/menu/feature/layout6.jpg"
                                                                                                    alt="layout"
                                                                                                    style="margin: 0 0 10px; border: 1px solid #ddd;display: inline-block">
                                                                                                <p>Home Page 6 </p>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="full-width option2 with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <strong>
                                                                            Features
                                                                        </strong>
                                                                        <span class="labelopencart"></span>
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <div class="sub-menu" style="width: 100%;">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="html ">
                                                                                        <div class="row">
                                                                                            <div class="col-md-3">
                                                                                                <div class="column">
                                                                                                    <a href="#"
                                                                                                        class="title-submenu">Listing
                                                                                                        pages</a>
                                                                                                    <div>
                                                                                                        <ul
                                                                                                            class="row-list">
                                                                                                            <li><a
                                                                                                                    href="category.html">Category
                                                                                                                    Page
                                                                                                                    1
                                                                                                                </a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="category-v2.html">Category
                                                                                                                    Page
                                                                                                                    2</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="category-v3.html">Category
                                                                                                                    Page
                                                                                                                    3</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3">
                                                                                                <div class="column">
                                                                                                    <a href="#"
                                                                                                        class="title-submenu">Product
                                                                                                        pages</a>
                                                                                                    <div>
                                                                                                        <ul
                                                                                                            class="row-list">
                                                                                                            <li><a
                                                                                                                    href="product.html">Image
                                                                                                                    size
                                                                                                                    -
                                                                                                                    small</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="product-v2.html">Image
                                                                                                                    size
                                                                                                                    -
                                                                                                                    medium</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="product-v3.html">Image
                                                                                                                    size
                                                                                                                    -
                                                                                                                    big</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3">
                                                                                                <div class="column">
                                                                                                    <a href="#"
                                                                                                        class="title-submenu">Shopping
                                                                                                        pages</a>
                                                                                                    <div>
                                                                                                        <ul
                                                                                                            class="row-list">
                                                                                                            <li><a
                                                                                                                    href="cart.html">Shopping
                                                                                                                    Cart
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="checkout.html">Checkout
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="compare.html">Compare
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="wishlist.html">Wishlist
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3">
                                                                                                <div class="column">
                                                                                                    <a href="#"
                                                                                                        class="title-submenu">My
                                                                                                        Account
                                                                                                        pages</a>
                                                                                                    <div>
                                                                                                        <ul
                                                                                                            class="row-list">
                                                                                                            <li><a
                                                                                                                    href="login.html">Login
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="register.html">Register
                                                                                                                    Page</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="my-account.html">My
                                                                                                                    Account</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="order-history.html">Order
                                                                                                                    History</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="order-information.html">Order
                                                                                                                    Information</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="return.html">Product
                                                                                                                    Returns</a>
                                                                                                            </li>
                                                                                                            <li><a
                                                                                                                    href="gift-voucher.html">Gift
                                                                                                                    Voucher</a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="item-style1 content-full with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <strong>
                                                                            Colections
                                                                        </strong>
                                                                        <span class="labelNew"></span>
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <div class="sub-menu"
                                                                        style="width: 100%; right: 0px;">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-3">
                                                                                    <div class="link ">
                                                                                        <img src="/public/image/catalog/demo/menu/menu-img1.jpg"
                                                                                            alt="" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="link ">
                                                                                        <img src="/public/image/catalog/demo/menu/menu-img2.jpg"
                                                                                            alt="" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="link ">
                                                                                        <img src="/public/image/catalog/demo/menu/menu-img3.jpg"
                                                                                            alt="" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="link ">
                                                                                        <img src="/public/image/catalog/demo/menu/menu-img4.jpg"
                                                                                            alt="" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="border"></div>
                                                                            <div class="row">
                                                                                <div class="col-sm-3">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-12 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="category-v3.html"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Food
                                                                                                                &amp;
                                                                                                                Restaurant</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Tange
                                                                                                                        manue</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Women
                                                                                                                        Fashion</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bags</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Fashion</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Trending</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Macs</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-12 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Fashion
                                                                                                                &amp;
                                                                                                                Accessories</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        Jewelry</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Destinations</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Camera
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Spa
                                                                                                                        &amp;
                                                                                                                        Massage</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Camera
                                                                                                                        New</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Cell
                                                                                                                        &amp;
                                                                                                                        Cable</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-12 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Sport
                                                                                                                &amp;
                                                                                                                Entertaiment</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Tange
                                                                                                                        manue</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Fashion
                                                                                                                        &amp;
                                                                                                                        Accessories</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bags</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Men
                                                                                                                        Fashion</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Knage
                                                                                                                        unget</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Qunge
                                                                                                                        genga</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-12 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Mobile
                                                                                                                &amp;
                                                                                                                Table</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Web
                                                                                                                        Cameras</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Windows</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        mens</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Pearl
                                                                                                                        Jewelry</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Spa
                                                                                                                        &amp;
                                                                                                                        Massage</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="item-style2 content-full feafute with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <strong>
                                                                            Accessories
                                                                        </strong>
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <div class="sub-menu" style="width: 100%">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-sm-8">
                                                                                    <div class="categories ">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Fashion
                                                                                                                &amp;
                                                                                                                Accessories</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Digital
                                                                                                                        &amp;
                                                                                                                        Electronics</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bluetooth
                                                                                                                        Speakers</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Cell
                                                                                                                        &amp;
                                                                                                                        Cable</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Spa
                                                                                                                        &amp;
                                                                                                                        Massage</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Sport
                                                                                                                        &amp;
                                                                                                                        Entertaiment</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Pearl
                                                                                                                mens</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Web
                                                                                                                        Cameras</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Windows</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Tange
                                                                                                                        manue</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Knage
                                                                                                                        unget</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Sport
                                                                                                                &amp;
                                                                                                                Entertaiment</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Jean</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Latenge
                                                                                                                        mange</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Punge
                                                                                                                        nenune</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Trending</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Tange
                                                                                                                        manue</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Mobile
                                                                                                                &amp;
                                                                                                                Table</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Case</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Laptop
                                                                                                                        &amp;
                                                                                                                        Notebook</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Laptops
                                                                                                                        &amp;
                                                                                                                        Notebooks</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Dress
                                                                                                                        Ladies</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Kitchen</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="col-sm-4 static-menu">
                                                                                                <div class="menu">
                                                                                                    <ul>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Cell
                                                                                                                &amp;
                                                                                                                Cable</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bluetooth
                                                                                                                        Speakers</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Fashion
                                                                                                                        &amp;
                                                                                                                        Accessories</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Qunge
                                                                                                                        genga</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Punge
                                                                                                                        nenune</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Punge
                                                                                                                        nenune</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="#"
                                                                                                                onclick="window.location = '#';"
                                                                                                                class="main-menu">Food
                                                                                                                &amp;
                                                                                                                Restaurant</a>
                                                                                                            <ul>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Fashion</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Bags</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Necklaces</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Tange
                                                                                                                        manue</a>
                                                                                                                </li>
                                                                                                                <li><a href="#"
                                                                                                                        onclick="window.location = '#';">Men
                                                                                                                        Fashion</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <div
                                                                                        class="product best-sellers-menu">
                                                                                        <div class="image">
                                                                                            <a href="#"
                                                                                                onclick="window.location = '#'"><img
                                                                                                    src="/public/image/catalog/demo/product/fashion/24.png"
                                                                                                    alt=""></a>
                                                                                        </div>
                                                                                        <div class="name"><a href="#"
                                                                                                onclick="window.location = '#'">Est
                                                                                                Officia Including
                                                                                                Shoes Beautiful
                                                                                                Pieces Canaz</a>
                                                                                        </div>
                                                                                        <div class="price">
                                                                                            $98.00
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="style-page with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a class="clearfix">
                                                                        <strong>
                                                                            Pages
                                                                        </strong>
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <div class="sub-menu" style="width: 40%;">
                                                                        <div class="content">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <ul class="row-list">
                                                                                        <li><a class="subcategory_item"
                                                                                                href="faq.html">FAQ</a>
                                                                                        </li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="sitemap.html">Site
                                                                                                Map</a></li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="contact.html">Contact
                                                                                                us</a></li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="banner-effect.html">Banner
                                                                                                Effect</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <ul class="row-list">
                                                                                        <li><a class="subcategory_item"
                                                                                                href="about-us.html">About
                                                                                                Us 1</a></li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="about-us-2.html">About
                                                                                                Us 2</a></li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="about-us-3.html">About
                                                                                                Us 3</a></li>
                                                                                        <li><a class="subcategory_item"
                                                                                                href="about-us-4.html">About
                                                                                                Us 4</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="">
                                                                    <p class="close-menu"></p>
                                                                    <a href="blog-page.html" class="clearfix">
                                                                        <strong>
                                                                            Blog
                                                                        </strong>
                                                                    </a>
                                                                </li>
                                                                <li class="deal-h5 hidden">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <strong>
                                                                            <img src="/public/image/catalog/demo/menu/hot-block.png"
                                                                                alt="">Buy This Theme!
                                                                        </strong>
                                                                    </a>
                                                                </li>
                                                                <li class="deal-h5 hidden">
                                                                    <p class="close-menu"></p>
                                                                    <a href="#" class="clearfix">
                                                                        <strong>
                                                                            Today Deals
                                                                        </strong>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        methods: {
            async logout() {
                var result = await this.$store.dispatch('auth/USER_LOGOUT', null);
                if (result == 'user_successfully_logged_out') {
                    this.$router.push({ name: 'login' });
                }
            }
        },
        computed: {
            authCheckComp() {
                return this.$store.getters['auth/GET_AUTH_CHECK'];
            }
        }
    }

</script>

<style scoped>

</style>

<!DOCTYPE html>
<html>
    <head>
        <base href="{{ url()->current() }}" />
        <link href="{{ url()->current() }}" rel="canonical" />
        <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" href="/css/styles.css" type="text/css" />
        <link rel="stylesheet" href="/vendor/magnific_popup/magnific-popup.css" type="text/css" />
        <meta name="yandex-verification" content="5bb39b492aa12271" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="{{ isset(json_decode($page->extras)->meta_description) ? json_decode($page->extras)->meta_description : "" }}" />
        <meta name="keywords" content="{{ isset(json_decode($page->extras)->meta_keywords) ? json_decode($page->extras)->meta_keywords : ""}}" />
        <meta name="author" content="Nilov Vadim" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <title>{{ json_decode($page->extras)->meta_title }}</title>
    </head>
    <body>
    <div id="wrapper">
        <div id="head">
            <a id="logo" href="/"></a>
            <!--div id="contacts"></div-->
            <div class="contacts_new" style="float: right;margin-top:20px;line-height: 37px;padding-right: 10px;text-align:right;font-size:18px;
">
                <p style="font-size:20px;">VIP обслуживание в аэропортах</p>
                <!--p style="text-decoration:underline;">Наши контакты:</p-->
                <p style="margin-top: -11px; margin-bottom: -11px;"><strong>Ежедневно и круглосуточно</strong></p>
                <p style="font-size:20px;">+7 (495) <span style="color:rgb(180, 13, 13)">664-34-44</span></p>
                <p><a href="mailto:info@vip-pilot.ru">info@vip-pilot.ru</a></p>
                <!--<a href="/" class="mform"><p style="font-size:15px; font-weight:bold; margin-right:20px;">Заказать звонок</p></a>-->
            </div>
            <img class="slogan" src="/images/22.png" />
            <!--div class="let" style="color: #FF0000;left: 356px; position: absolute; text-shadow: 1px 1px 1px #000000; top: 27px;"><p style="font-size:19px; font-weight:bold; margin-right:20px;">17 лет с Вами!</p></div-->
            <p class="soc"><noindex><a href="https://www.facebook.com/VIP.PIL0T" target="_blank"><img src="/images/facebook.png" alt="facebook"/></a></noindex></p>
        </div>
        
        @include('public.menu')

        <div id="content">
            <div class="item-page">
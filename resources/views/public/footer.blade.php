        </div>
    </div>
</div>

<div id="footer">
    <div class="foot-kontakt">ежедневно и круглосуточно:<br>
        г. Москва, ул. 4-я Гражданская, д. 32 офис 15<br>
        +7 (495) 664-34-44<br>
        +7 (910)428-21-95<br>
        info@vip-pilot.ru</div>

    <div id="counter">
        @foreach($counters as $counter)
            {!! $counter->value !!}
        @endforeach
    </div>
</div>
        <form id="feedback_form" class="white-popup-block mfp-hide vn-form" name="feedback_form" action="/mail" method="post">
            {{ csrf_field() }}
            <div class="vn-form-header">Закажите обратный звонок</div>
            <div class="vn-form-notice">*Если Вы спешите - укажите только свой номер телефона</div>
            <input type="text" placeholder="Номер телефона*" id="phone" name="phone" value="">
            <input type="text" placeholder="Удобное время для звонка" id="time" name="time" value="">
            <input type="text" placeholder="Ваше имя" id="name" name="name" value="">
            <input type="submit" class="send_btn" value="Отправить">
        </form>
        <script src="/vendor/magnific_popup/jquery.magnific-popup.min.js"></script>
        <script src="/vendor/validate/validate.min.js"></script>
        <script src="/js/scripts.js"></script>
        </body>
</html>
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
        @if( $show_popup )
        <form id="feedback_sent" class="white-popup-block vn-form" name="feedback_sent">
            <div class="vn-form-header">Спасибо, Ваша заявка принята, мы перезвоним в ближайшее время</div>
        </form>
        <script>
        $(document).ready(function() {
            $.magnificPopup.open({
                items: {
                src: '#feedback_sent'
                },
                type: 'inline'
            });
        });
        </script>
        @endif
        <script src="/vendor/magnific_popup/jquery.magnific-popup.min.js"></script>
        <script src="/vendor/validate/validate.min.js"></script>
        <script src="/js/scripts.js"></script>
        </body>
</html>
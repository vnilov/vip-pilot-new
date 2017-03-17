@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Краткая памятка по использованию административной панели сайта.</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>
                        Панель визуально разделена на 2 колонки:
                        <ol>
                            <li>Левая колонка &ndash; <strong>Меню панели</strong></li>
                            <li>Правая колонка &ndash; <strong>Содержание страницы панели</strong></li>
                        </ol>
                    </p>
                    <p>Основное меню содержит в себе ссылки на основные страница панели: 
                        <ul>
                        <li>Рабочий стол (<strong>Вы сейчас здесь</strong>)</li>
                        <li>Меню - страница для добавления/редактирования/удаления элементов меню сайта, которые могут ссылаться как на страницы, созданные в разделе "Страницы", так и на сторонние ресурсы</li>
                        <li>Страницы - страница для добавления/редактирования/удаления страниц сайта</li>
                        <li>Счетчика - страница для добавления/редактирования/удаления счетчиков, установленных на сайте</li>
                        </ul>
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="small-box bg-red">
                <div class="inner">
                    <?php $t = (\App\Utilities\Metrica::i()->getTodayVisitors()); ?>
		    <h3>{{ $t[0][0] }}</h3>
                    <p>Посетителей за сегодня</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
	<div class="col-md-4">
            <div class="small-box bg-green">
                <div class="inner">
                    <?php $t = (\App\Utilities\Metrica::i()->getTodayViews()); ?>
		    <h3>{{ $t[0][0] }}</h3>
                    <p>Просмотров страниц за сегодня</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
       
    </div>
@endsection

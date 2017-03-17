@include('public.header')
<h1 class="vn-header">{{$page->title}}</h1>
{!! isset($page->content) ? $page->content : "" !!}

@include('public.footer')
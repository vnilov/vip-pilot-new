<div id="menu">
    <ul class="nav menu">
        @php($i = 0)
        @foreach($menu as $menu_item)
            
            @if ($menu_item->children->count() > 0)
                <li class="parent deeper"><a href="{{ $menu_item->url() }}" >{{ $menu_item->name }}</a>
                <ul class="nav-child unstyled small">
                    @foreach($menu_item->children as $child)
                        <li class="vn-menu-child-item"><a class="vn-link" href="{{ $child->url() }}">{{ $child->name }}</a>
                    @endforeach
                </ul>
            @else
                <li class="single"><a href="{{ $menu_item->url() }}" >{{ $menu_item->name }}</a>
            @endif
            @if($i < count($menu) - 1)
            <li class="menu-ras"></li>
            @endif

            @php($i++)
        @endforeach
    </ul>
</div>
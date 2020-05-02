@empty($item->allChildren[0])
    <a class="dropdown-item" type="button" href="{{$item->link}}">{{$item->name}}</a>
@else
    <div class="dropdown dropleft dropdown-submenu">
        <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">{{$item->name}}</button>
        <div class="dropdown-menu">
            @foreach($item->allChildren as $child_item)
                @component('components.headerItem',['item'=>$child_item])
                @endcomponent
            @endforeach
        </div>
    </div>
@endempty

<div class="sidebar">
    <h4 class="sidebar-title">categories<span class="special-color">.</span></h4>
    <div class="title-separator-primary"></div>
    <div class="margin-top-30"></div>
    <ul class="blue-ul">
        @foreach($categories as $category)
            @if (isset($active_category) && $active_category == $category->id )
                <li class=""><span class="custom-ul-bullet"></span><a
                            href="{{ $category->url }}">{{ $category->name }}</a></li>
            @else
                <li class=""><span class="custom-ul-bullet"></span><a
                            href="{{ $category->url }}"> {{ $category->name }}</a></li>
            @endif
        @endforeach
    </ul>
</div>


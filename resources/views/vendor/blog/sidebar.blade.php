<div class="col-xs-12 col-md-3">
    <div class="sidebar">
        <h4 class="sidebar-title">categories<span class="special-color">.</span></h4>
        <div class="title-separator-primary"></div>
        <div class="margin-top-30"></div>
        <ul class="blue-ul">
            @foreach($categories as $category)
                @if (isset($active_category) && $active_category == $category->id )
                    <li class="special-color list-group-item clearfix"><a href="{{ $category->url }}"><span class="custom-ul-bullet"></span>{{ $category->name }}</a></li>
                @else
                    <li class="list-group-item clearfix"><a href="{{ $category->url }}"><span class="custom-ul-bullet"></span> {{ $category->name }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

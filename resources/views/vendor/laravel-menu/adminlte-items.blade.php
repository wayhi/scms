@foreach($items as $item)
  <li@lm-attrs($item) @if($item->hasChildren())class ="treeview"@endif @lm-endattrs>
    @if($item->link) <a@lm-attrs($item->link) @lm-endattrs href="{!! $item->url() !!}">
      {!! $item->title !!}
    </a>
    @else
      {!! $item->title !!}
    @endif
    @if($item->hasChildren())
      <ul class="treeview-menu">
        @include(config('laravel-menu.views.adminlte-items'), 
array('items' => $item->children()))
      </ul> 
    @endif
  </li>
  @if($item->divider)
    <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
  @endif
@endforeach

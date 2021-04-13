

@foreach($itemsCategory as $key => $value)
    @if($value['display'] == 'list')
        @include('News.block.Category_list')
    @elseif($value['display'] == 'grid')
       @include('News.block.Category_grid')

    @endif
@endforeach
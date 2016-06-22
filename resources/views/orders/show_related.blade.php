
    
    @if(isset(json_decode($order->goods_info, true)['goods']))
        @foreach(json_decode($order->goods_info, true)['goods'] as $item)
            
            <div class="form-group col-sm-4">
            <p>{{$item['field_name']}}:{{$item['field_value']}}</p>
            </div>
            
        @endforeach
    @endif

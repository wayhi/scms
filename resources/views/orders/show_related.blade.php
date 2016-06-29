
    
    @if(isset(json_decode($order->goods_info, true)['goods']))
        @foreach(json_decode($order->goods_info, true)['goods'] as $item)
             <div class="row">
            <div class="form-group col-sm-4">
            <p>{{$item['field_name']}}:{{$item['field_value']}}</p>
            </div>
            </div>
            
        @endforeach
    @endif

    <div class="row">
    <div class="form-group col-sm-4">
    车险订单二维码：
    	<p>{!! QrCode::size(100)->generate('http://dev01.yifenqi.com:8881/web/carInsurance/uploadCert?orderNumber='.$order->order_number) !!}</p>
    </div>
    </div>

<!--for service fee & downpayments related with the order-->
    <table id="downpayment_table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>类型</th>
        <th>计划金额</th>
        <th>计划日期</th>
        <th>实际金额</th>
        <th>实际日期</th>
        <th>状态</th>
      </tr>
      </thead>
      <tbody>
      @foreach($order->receivables->wherein('type',[3,4]) as $receivable)
        <tr @if($receivable->status==2)class='success'@endif>
          <td>{!!$receivable->type_text!!}</td>
          <td>{{$receivable->amount_scheduled}}</td>
          <td>{{$receivable->pd_scheduled}}</td>
          <td>{{$receivable->amount_actual}}</td>
          <td>{{$receivable->pd_actual}}</td>
          <td>{{$receivable->status_text}}</td>
        </tr>
      @endforeach

      @foreach($order->payables->wherein('type',[1,2]) as $payable)
        <tr @if($payable->status==2)class='success'@endif>
            <td>{{$payable->type_text}}</td>
            <td>{{$payable->amount_scheduled}}</td>
            <td>{{$payable->pd_scheduled}}</td>
            <td>{{$payable->amount_actual}}</td>
            <td>{{$payable->pd_actual}}</td>
            <td>{{$payable->status_text}}</td>
        </tr>
      @endforeach
     
      </tbody>
      <tfoot>
      
      </tfoot>
    </table>
 
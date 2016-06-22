
    <table id="receivables_table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>期数</th>
        <th>计划还款金额</th>
        <th>计划还款日期</th>
        <th>实际还款金额</th>
        <th>实际还款日期</th>
        <th>状态</th>
      </tr>
      </thead>
      <tbody>
      @foreach($order->receivables->where('type',2) as $receivable)
        <tr>
          <td>{!!$receivable->serial_no_with_link!!}</td>
          <td>{{$receivable->amount_scheduled}}</td>
          <td>{{$receivable->pd_scheduled}}</td>
          <td>{{$receivable->amount_actual}}</td>
          <td>{{$receivable->pd_actual}}</td>
          <td>{{$receivable->status_text}}</td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>总计</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      </tfoot>
    </table>
 
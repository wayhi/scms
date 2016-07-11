 <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-sm-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> 订单明细
            <small class="pull-right">生效日期: {{$order->effective_date}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          服务方：
          <address>
            <strong>{!!Config('app.company_name')!!}</strong><br>
            <small>广东省广州市天河区<br>
            珠江东路16号高德置地冬广场3606<br>
            电话: 400-838-3187<br>
            电子邮件: info@yifenqi.com</small>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          需求方：
          <address>
            <strong>{!!$order->customer->name!!}</strong><br>
            <small>身份证号：{!!$order->customer->id_number!!}<br>
            <br>
            电话: {!!$order->customer->mobile_phone!!}<br>
            电子邮件:
            </small> 
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
        
          <b>订单号:</b> {!!$order->order_number!!}<br>
          
          @if(isset(json_decode($order->goods_info, true)['goods']))
            @foreach(json_decode($order->goods_info, true)['goods'] as $item)
            <b>{{$item['field_name']}}:</b>&nbsp{{$item['field_value']}}<br>
            @endforeach
          @endif
          
        </div>
        <div class="col-sm-2 invoice-col">
          {!! QrCode::size(100)->generate('http://dev01.yifenqi.com:8881/web/carInsurance/uploadCert?orderNumber='.$order->order_number) !!}<br>
          <small>扫描二维码以完善您的个人信息。</small>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>产品/服务</th>
              <th>数量</th>
              <th>描述</th>
              <th>费用</th>
              <th>备注</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{!!$order->goods->goods_name!!}</td>
              <td>1</td>
              <td>借款本息合计金额</td>
              <td>{!!$order->repay_target_formatted!!}</td>
              <td>分期支付</td>
            </tr>
            <tr>
              <td>服务费</td>
              <td>1</td>
              <td>本次借贷的服务费用</td>
              <td>{!!$order->handling_fees_formatted!!}</td>
              <td>@if($order->process_status>1 && $order->handling_fees>0)已支付@endif</td>
            </tr>
            <tr>
              <td>预收费用</td>
              <td>1</td>
              <td>预收费用，在借款本息中抵扣</td>
              <td>{!!$order->downpayment_amount_formatted!!}</td>
              <td>@if($order->process_status>1 && $order->downpayment_amount>0)已支付@endif</td>
            </tr>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">付款方式:</p>
          <img src="/img/unionpay_logo.png" size='50' alt="Union Pay">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            经以下账户扣款：<br>
            @if(!empty($order->bankcard))
            开户名：{!!$order->customer->name!!}<br>
            开户银行：{!!$order->bankcard->bin!!}<br>
            账号：{!!$order->bankcard->code!!}
            @endif
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">分期计划:</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">借贷本金:</th>
                <td>{!!$order->apply_amount_formatted!!}</td>
              </tr>
              <tr>
                <th>已归还/预收费用:</th>
                <td>{!!$order->downpayment_amount_formatted!!}</td>
              </tr>
              <tr>
                <th>剩余每期支付:</th>
                <td>{!!$order->currency." ".$repay_amount!!}</td>
              </tr>
              <tr>
                <th>剩余期数:</th>
                <td>{!!$order->goods->repay_times!!}</td>
              </tr>
              <tr>
                <th>还款总计:</th>
                <td>{!!$order->repay_target_formatted!!}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{!!route('orders.summary_print',$order->id)!!}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
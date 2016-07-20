@extends('layouts.app')

@section('htmlheader_title')
	Dashboard
@endsection

@section('contentheader_title')
    业务指标
@endsection

@section('contentheader_description')
	Welcome
@endsection

@section('main-content')
	
 <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua">{{date('Y')}}</span>

            <div class="info-box-content">
              <span class="info-box-text">本年度交易金额<br>Txs Value YTD</span>
              <span class="info-box-number">CNY {{$txs_value_ytd}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red">{{date('M')}}</i></span>

            <div class="info-box-content">
              <span class="info-box-text">本月交易金额<br>Txs Value MTD</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-ticket"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">本月交易数量<br>Txs Volume MTD</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-battery-half"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">贷款余额<br>Loans Balance</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->




@endsection


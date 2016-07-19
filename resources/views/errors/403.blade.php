@extends('layouts.error')


@section('main-content')

<div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Action Forbidden.</h3>
        <p>
            你没有被授权执行此操作，如有疑问请联系管理员！
        </p>
        
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection
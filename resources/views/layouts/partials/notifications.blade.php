@if (isset($errors) && count($errors->all()) > 0)
<div class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    请核对以下数据是否有效完整。
</div>
@endif

<?php $types = ['success', 'error', 'warning', 'info']; ?>

@foreach ($types as $type)
    @if ($message = Session::get($type))
    <?php if ($type === 'error') $type = 'danger'; ?>
    <div class="alert alert-{{ $type }} cms-alert">
        <a class="close" data-dismiss="alert">×</a>
        {!! $message !!}
    </div>
    @endif
@endforeach
@if ( Session::has('message') )
<div role="alert" class="alert {{ Session::get('message.class')  }} alert-dismissible fade in">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    @if ( Session::has('message.icon') )
    <i class="{{ Session::get('message.icon') }}"></i>&nbsp;
    @endif
    {{ Session::get('message.text')  }}
</div>
<?php Session::forget('message') ?>
@endif
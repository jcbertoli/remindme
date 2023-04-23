@if (isset($errorBag) && $errorBag->first())
<div class="alert alert-danger">
    {{ $errorBag->first() }}
</div>
@endif

@if(isset($message))
<div class="alert alert-{{ $messageType ?? 'success' }}">
    {{ $message }}
</div>
@endif
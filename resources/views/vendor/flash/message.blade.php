@foreach (session('flash_notification', collect())->toArray() as $message)
@if ($message['overlay'])
@include('flash::modal', [
'modalClass' => 'flash-modal',
'title' => $message['title'],
'body' => $message['message']
])
@else

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if('{{$message->level}}' =='danger')
        toastr["error"]("{!! $message['message'] !!}", "Thông báo");
    else
        toastr["success"]("{!! $message['message'] !!}", "Thông báo");
    
</script>
@endif
@endforeach
{{ session()->forget('flash_notification') }}
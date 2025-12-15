@if (Session::has('notif'))
    @php
        if (Session::get('notif_status') == '1') {
            $notif_class = 'success';
        } elseif (Session::get('notif_status') == '0') {
            $notif_class = 'danger';
        } else {
            $notif_class = 'warning';
        }
    @endphp
    <div class="alert alert-{{ $notif_class }} btn-block" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        {{ Session::get('notif') }}
    </div>
    {{-- <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Danger alert—At vero eos et accusamus praesentium!</div> --}}
@endif

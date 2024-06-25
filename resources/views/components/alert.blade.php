
@if(session('success'))
    @include('components.alert-success')
@endif

@if(session('error'))
    @include('components.alert-danger')
@endif

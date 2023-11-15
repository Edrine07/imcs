@if (session('error'))
    <div class="alert alert-custom alert-danger alert-dismissible fade show d-flex justify-content-start" role="alert">
        <div class="alert-icon me-2"><i class="fa fa-warning"></i></div>
        <div class="alert-text text-black">{{ session('error') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            {{-- <i class="fa fa-times" aria-hidden="true"></i> --}}
        </button>
    </div>
@endif

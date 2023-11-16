@if (session('success'))
    <div class="modal fade custom-modal" tabindex="-1" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fas fa-calendar-check fa-5x text-center"></i>
                    <h1 class="text-center mt-5 text-primary">Appointment Set Successfully!</h1>
                    <br>
                    <h3 class="text-center my-5">
                        {{ session('success') }}
                    </h3>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

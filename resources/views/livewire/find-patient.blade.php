<div>
    <form wire:submit.prevent="findPatient" autocomplete="off">
        @csrf
        <div class="row mt-5">
            <div class="form-group mb-4 col-md-12">
                <div class="form-floating">
                    <input wire:model="firstname" type="text" name="firstname" class="form-control" id="firstname"
                        value="{{ old('firstname') }}" placeholder="Firstname" required>
                    <label for="floatingPassword">First Name</label>
                </div>
            </div>
            <div class="form-group mb-4 col-md-12">
                <div class="form-floating">
                    <input wire:model="lastname" type="text" name="lastname" class="form-control" id="lastname"
                        value="{{ old('lastname') }}" placeholder="lastname" required>
                    <label for="floatingPassword">Last Name</label>
                </div>
            </div>

            <div class="form-group mb-4 col-md-12">
                <div class="form-floating">
                    <input wire:model="birthdate" type="date" name="birthdate" class="form-control" id="birthdate"
                        value="{{ old('birthdate') }}" max="{{ date('Y-m-d') }}" placeholder="birthdate" required>
                    <label for="floatingPassword">Birthdate</label>
                </div>
            </div>

            {{-- button wire:click --}}
            <div class="form-group mb-4 col-md-12">
                <button type="button" class="btn btn-primary form-control" wire:click="findPatient">Find My
                    Record</button>
            </div>

        </div>
    </form>

    @if ($patients->isNotEmpty())
        <div class="col-md-12 mt-4">
            <div class="card" style="padding: 10px;">
                <h5>FOUND YOUR RECORD!</h5>
                @foreach ($patients as $patient)
                    <div class="row">
                        <input type="hidden" name="patient_id[]" value="{{ $patient->id }}">
                        <input type="hidden" class="form-control" name="patient_name[]"
                            value="{{ $patient->full_name }}">

                        <input type="hidden" class="form-control" name="patient_birthdate[]"
                            value="{{ $patient->birthdate }}">
                        {{-- <label>ID: {{ $patient->id }}</label> --}}
                        <label>Fullname: {{ $patient->full_name }}</label>
                        <label>Birthdate: {{ $patient->birthdate->format('F d, Y') }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @if ($firstname || $lastname || $birthdate)
            <p>No existing records found. Are you sure you are an existing patient?</p>
        @endif
    @endif
</div>

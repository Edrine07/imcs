@extends('layouts.admin')
@section('content')
    <div class="row g-5 g-xxl-8">
        <div class="col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Medicines List</span>
                    </h3>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#medicineModal">
                                Add Medicine</button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>#</th>
                                <th class="min-w-120px">Medicine Name</th>
                                <th class="min-w-120px">Medicine Type</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">

                            @forelse ($meds as $med)
                                <tr class="text-gray-800 text-hover-primary">
                                    <td class="text-gray-400">{{ $loop->iteration }}</td>
                                    <td>{{ $med->medicine_name }}</td>
                                    <td>{{ $med->medicine_type }}</td>

                                    <td class="d-flex justify-content-center align-items-end">
                                        <button data-bs-toggle="modal" data-bs-target="#defaultModal{{ $med->id }}"
                                            class="btn btn-sm me-2 btn-primary">
                                            Edit
                                        </button>
                                        <a href="#{{-- route('med-list.delete',$med->id) --}}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <div id="defaultModal{{ $med->id }}" class="modal fade">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Update Medicine</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="#{{-- route('med-list.update',$med->id) --}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="medicine_name" class="form-label">Medicine
                                                            Name</label>
                                                        <input name="medicine_name" type="text" class="form-control"
                                                            required placeholder="Medicine Name"
                                                            value="{{ $med->medicine_name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="medicine_type" class="form-label">Medicine
                                                            Type</label>
                                                        <input name="medicine_type" type="text" class="form-control"
                                                            required placeholder="Medicine Type"
                                                            value="{{ $med->medicine_type }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Decline</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Medicine Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- {{ $meds->links() }} --}}
        </div>

        <div class="modal fade" id="medicineModal" tabindex="-1" aria-labelledby="medicineModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="medicineModalLabel">Add Medicine</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('med-list.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="medicine_name" class="form-label">Medicine Name</label>
                                <input name="medicine_name" type="text" class="form-control" id="medicine_name" required
                                    placeholder="Medicine Name">
                            </div>
                            <div class="mb-3">
                                <label for="medicine_type" class="form-label">Medicine Type</label>
                                <input name="medicine_type" type="text" class="form-control" id="medicine_type" required
                                    placeholder="Medicine Type">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">ADD MEDICINE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

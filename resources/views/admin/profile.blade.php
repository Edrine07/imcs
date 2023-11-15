@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Profile</h5>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('assets/img/gallery1.jpg') }}" alt="Clinic Image"
                            class="img-fluid rounded-circle mb-3">
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> Dr. Leonardo Carpio</li>
                            <li><strong>Email:</strong> admin@gmail.com</li>
                            <li><strong>Phone:</strong> 09632040284</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>

                                <input type="password" class="form-control" id="currentPassword"
                                    aria-describedby="currentPasswordFeedback">

                            </div>

                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>

                                <input type="password" class="form-control" id="newPassword"
                                    aria-describedby="newPasswordFeedback">

                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>

                                <input type="password" class="form-control" id="confirmPassword"
                                    aria-describedby="confirmPasswordFeedback">

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">Email Already Sent</div>
                    <div class="card-body">

                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                        <form method="POST">
                            @csrf
                            <div class="form-group row w-100 justify-content-center" style="text-transform: capitalize">
                                <h5>Your Password Reset Link Successfully sent to your email. Please check your email
                                    inbox or spam</h5>
                            </div>
                            <div class="col-md-6 offset-md-4 col-sm-12">
                                {{-- <button type="submit" class="btn btn-danger">
                                    Send Password Reset Link
                                </button> --}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

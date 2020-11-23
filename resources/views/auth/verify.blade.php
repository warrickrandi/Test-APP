@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="alert alert-success">
                            We have sent you a email with verification link. Please click on the link to verify your account. Thank You..!
                        </div>

                        @error('verifyerr')
                            <div class="alert alert-danger text-center">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

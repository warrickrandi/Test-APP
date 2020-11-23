@extends('layouts.app')

@section('content')
<div class="container">
    <section class="bg-secondary p-5">
        
            <div class="row w-100 m-0 justify-content-center">

                <div class="col-lg-6">
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox mr-sm-2 text-center">
                           
                        </div>
                    </div>
                    <div class="form-group text-center mb-0">
                        
                    </div>
                </div>

            </div>
    </section>

    <section class="property-section mt-5">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Regiser</div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required autocomplete="address">{{old('address')}}</textarea>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                        
                            <div class="form-group row">
                                <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone_no" onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" maxlength="10"  value="{{old('phone_no')}}" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" required autocomplete="phone_no">
                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="u_type" class="col-md-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select id="u_type" required name="u_type" class="form-control @error('u_type') is-invalid @enderror">
                                        <option value="">-- Select the User Type --</option>
                                        @foreach ($u_types as $key => $item)
                                            @if (old('u_type') == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->name}}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                    @error('u_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection
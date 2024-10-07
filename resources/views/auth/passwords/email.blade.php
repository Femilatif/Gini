@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 py-5">
            <div class="tptrack__product mb-40">
                <div class="tptrack__content grey-bg">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class=" mb-3">
                 

                            
                                <input id="Email" placeholder="Email" type="email" class="form-control p-3 shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        
                            <div class="tptrack__btn">
                                <button type="submit" class="tptrack__submition active">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

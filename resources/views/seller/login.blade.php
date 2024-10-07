@extends('layouts.seller')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">




            <div class="col-lg-6 col-sm-12">
                <div class="tptrack__product mb-40">
                    <div class="tptrack__content grey-bg">
                        <div class="tptrack__item d-flex mb-20">
                            <div class="tptrack__item-icon">
                               <i class="fal fa-user-unlock"></i>
                            </div>
                            <div class="tptrack__item-content">
                               <h4 class="tptrack__item-title">Merchant Login</h4>
                               <p>Your personal data will be required to sign into your account</p>
                            </div>
                         </div>
                        <form method="POST" action="{{ route('sellerlogin') }}">
                            @csrf

                            <div class="row mb-3">


                                <div class="">
                                    <input id="email" placeholder="Email" type="email"
                                        class="form-control shadow-sm p-3 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control shadow-sm p-3 @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-between">

                                <div class="form-check align-self-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>

                            <div class="tptrack__btn mb-0">
                               
                                    <button type="submit" class="tptrack__submition active">
                                        {{ __('Login') }}
                                    </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <a href=" {{ route('sellersignup') }}" >Do not have a merchant account? <span class="text-success">Sign up now</span></a>
                </div>
            </div>
        </div>
       
    </div>
@endsection

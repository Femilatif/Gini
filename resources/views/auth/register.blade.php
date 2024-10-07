@extends('layouts.app')

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
                                <h4 class="tptrack__item-title">Create an Account</h4>
                                <p>Your personal data will be required to create an account</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">


                                <div class="">
                                    <input id="name" placeholder="Fullname" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">


                                <div class="">
                                    <input id="email" placeholder="Email" type="email"
                                        class="form-control shadow-sm  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="">
                                  
                                        <select name="country" id="country" class="w-100">
                                            <option selected disabled>Select your country</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Cabo Verbe">Cabo Verbe</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Cote d'ivoire">Cote d'ivoire</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Togo">Togo</option>
                                        </select>
                                

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control shadow-sm @error('password') is-invalid @enderror"
                                        name="password" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">


                                <div class="">
                                    <input id="password-confirm" placeholder="Confirm password" type="password"
                                        class="form-control" name="password_confirmation" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="tptrack__btn mb-0">

                                <button type="submit" class="tptrack__submition active p-3">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    <a href=" {{ route('register') }}">Not yet registered? <span class="text-success">Sign up now</span></a>
                </div>
            </div>
        </div>

    </div>
@endsection

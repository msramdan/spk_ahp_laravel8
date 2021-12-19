@extends('layouts.auth')
@section('title')
    {{ __('Login') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                        </div>
                        <form class="user" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user"
                                    id="email" aria-describedby="emailHelp"
                                    placeholder="Email" required value="{{ old('email') }}">
                                    @error('email')
                                        <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span style="color:red; font-size:12px">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Login') }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

</div>

@endsection

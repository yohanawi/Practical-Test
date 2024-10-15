@extends('layouts.custome')

@section('content')

    @if (Route::has('login'))
        <nav class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark px-4 py-2 mb-2 mx-2 rounded-pill shadow-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-danger px-4 py-2 mb-2 mx-2 rounded-pill shadow-sm">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn btn-outline-success px-4 py-2 mb-2 mx-2 rounded-pill shadow-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </nav>
    @endif

@endsection

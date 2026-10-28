@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="card" style="max-width:420px">
        <h1 style="margin-top:0">Log in</h1>
        <p class="muted">Demo account: student@example.com / password</p>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
            <p><button type="submit">Log in</button></p>
        </form>
    </div>
@endsection

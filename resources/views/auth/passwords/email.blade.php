@extends('../layouts.app2')
@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group row">
        <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>


        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
<hr>
<div class="text-center">
    @if (Route::has('password.request'))
    <a class="small" href="{{ route('login') }}">
        {{ __('Want to login?') }}
    </a>
    @endif
</div>

@endsection
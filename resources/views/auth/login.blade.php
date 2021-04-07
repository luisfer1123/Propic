@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5 text-white login-content">
                <div class="d-flex justify-content-center mt-5 container_logo">
                    <div class="logo_container_text ">
                        <h3 class="">Propic
                        </h3>
                    </div>
                </div>
                <form class="p-5 " action="{{ route('login') }}" method="POST" >
                    @csrf
                    <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                    <div class="mb-3 input-group">
                      <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <div class="mb-3 input-group">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="exampleCheck1">Guardar sesion</label>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link ml-4" href="{{ route('password.request') }}">
                                ¿Olvidaste la contraseña?
                            </a>
                        @endif
                      <a href="" class="ml-5 form-label"></a>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    <a href="register" class="btn-link ml-5">No tengo una cuenta</a>
                  </form>
            </div>
        </div>
    </div>

@endsection

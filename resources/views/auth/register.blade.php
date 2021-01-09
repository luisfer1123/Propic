@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-5 border bg-dark text-white rounded">
            <div class="d-flex justify-content-center mt-5 container_logo">
                <div class="logo_container_text ">
                    <h3 class="">Propic</h3>
                </div>
            </div>
            <form class="p-5" method="POST" action="{{ route('register') }}">
                @csrf

                <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                <div class="mb-3 input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>

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

                <label for="exampleInputPassword1" class="form-label">Confirmar contraseña</label>
                <div class="mb-3 input-group">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="register" class="btn-link ml-5">Ya tengo una cuenta</a>
              </form>
        </div>
    </div>
</div>
@endsection

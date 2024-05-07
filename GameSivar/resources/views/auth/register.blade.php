<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>


    <body>
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{route('register')}}" method="post">
            @csrf
              <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
              <p class="text-white-50 mb-5">Ingresa tus datos </p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="form2Example11">Nombre</label>
                <input class="form-control form-control-lg" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>          
              
            </div>


            <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="form2Example11">Apellido</label>
                <input class="form-control form-control-lg" id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>          
               
            </div>


            <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="form2Example11">Telefono</label>
                <input class="form-control form-control-lg" id="phone"  type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>          
             
            </div>


              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="typeEmailX">Correo</label>
                <input class="form-control form-control-lg" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">  
                
            </div>

            <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="typeEmailX">Fecha Nacimiento</label>
                <input class="form-control form-control-lg" id="birth" type="date" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{ old('birth') }}"  autocomplete="birth">  
               
            </div>


              <div data-mdb-input-init class="form-outline form-white mb-4">
               <label class="form-label" for="typePasswordX">Contrasena</label>
               <input class="form-control form-control-lg" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
               
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
               <label class="form-label" for="typePasswordX">Confirmar Contraseña</label>
               <input  class="form-control form-control-lg" id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
              </div>


              <button data-mdb-button-init data-mdb-ripple-init id="simonsytopro" class="btn btn-outline-light btn-lg px-5" type="submit">Crear Cuenta</button>
              

            <div>
              <p class="mb-0">Ya estas registrado? <a href="{{route('login')}}" class="text-white-50 fw-bold">Login</a>
              </p>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


              
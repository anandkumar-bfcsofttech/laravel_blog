<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"/>
  <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</head>
<body>
  <!-- /resources/views/post/create.blade.php -->
 

 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<!-- Create Post Form -->
<h1 class="h1"><center>Admin Login Form</center></h1>

<form action="login" method="post">
  @csrf
  <!-- Email input -->
  <div class="form-outline mb-4 {{ $errors->has('email') ? 'has-ex`rror' : '' }}">
    <input type="email" id="email" class="form-control" name="email" />
    <label class="form-label" for="form2Example1">Email address</label>
    <span class="text-danger">{{ $errors->first('email') }}</span>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4 {{ $errors->has('email') ? 'has-ex`rror' : '' }}">
    <input type="password" id="form2Example2" class="form-control" name="password" />
    <label class="form-label" for="form2Example2">Password</label>
    <span class="text-danger">{{ $errors->first('password') }}</span>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
</body>
</html>
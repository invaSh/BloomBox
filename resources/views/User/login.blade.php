<x-layout>
  @include('sweetalert::alert');
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black customC">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
                      @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                              {{ session('success') }}
                          </div>
                      @elseif(session('error'))
                          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                              {{ session('error') }}
                          </div>
                      @endif
                      <div class="text-center">
                        <img src="{{ asset('img/logo_nobg.png')}}"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Login</h4>
                      </div>
                      <form action="{{ route('login.post') }}" method="post">
                        @csrf
                        <p class="text-center">Please login to your account</p>
                        <div class="form-outline mb-4">
                          <input type="text" id="login-username" class="form-control"
                            placeholder="Please enter your username.." name="username"/>
                          <label class="form-label text-muted" for="login-username">Username</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="password" id="login-password" placeholder="Enter your password.." class="form-control" name="password"/>
                          <label class="form-label text-muted"  for="login-password">Password</label>
                        </div>
                        <div class="text-center pt-1 mb-5 pb-1 d-flex flex-column">
                          <button class="btn btn-primary btn-block fa-lg mb-3" type="submit">Log
                            in</button>
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <button type="button" class="btn btn-outline-light">
                            <a href="/register" class="text-decoration-none" style="color:inherit;">Create new</a>
                        </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2">
                    <img src="{{ asset('img/welcome-nobg.png') }}" class="img-fluid customImg d-none d-lg-block" alt="">
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-layout>
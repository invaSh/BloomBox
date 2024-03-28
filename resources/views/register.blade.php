
<x-layout>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black customC">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
                      <div class="text-center">
                        <img src="{{ asset('img/logo_nobg.png')}}"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Register</h4>
                      </div>
                      <form>
                        <p>Create your account</p>
                        <div class="form-outline mb-4">
                          <input type="email" id="register-username" class="form-control"
                            placeholder="Please enter a username.." name="username" />
                          <label class="form-label text-muted" for="register-username">Username</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="email" id="register-email" class="form-control"
                            placeholder="Please enter a valid Email address" name="email"/>
                          <label class="form-label text-muted" for="register-email">Email</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="password" class="form-control" placeholder="Please enter a password.." name="password"/>
                          <label class="form-label text-muted" for="password">Password</label>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1 d-flex flex-column">
                          <button class="btn btn-primary btn-block fa-lg mb-3" type="button">Create Account</button>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Already have an account?</p>
                          <button type="button" class="btn btn-outline-light">
                            <a href="/login" class="text-decoration-none" style="color:inherit;">Log in</a>
                          </button>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2">
                    <img src="{{ asset('img/welcome-nobg.png') }}" class="img-fluid customImg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



</x-layout>
  <x-layout>
      <section class="h-100 gradient-form mb-5">
          <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-xl-10">

                      <div class="card rounded-3 text-black customC">

                          <div class="row g-0">
                              <div class="col-lg-6">
                                  @if (session('error'))
                                      <div class="alert alert-warning text-center mt-2 mx-5">
                                          {{ session('error') }}
                                      </div>
                                  @endif
                                  <div class="card-body p-md-5 mx-md-4">
                                      <div class="text-center">
                                          <img src="{{ asset('img/logo_nobg.png') }}" style="width: 185px;"
                                              alt="logo">
                                          <h4 class="mt-1 mb-5 pb-1">Register</h4>
                                      </div>
                                      <form action="{{ route('register.post') }}" method="POST">
                                          @csrf

                                          <p>Create your account</p>
                                          <div class="form-outline mb-4">
                                              <input type="text" id="register-name" class="form-control"
                                                  placeholder="Please enter your name.." name="name" />
                                              <label class="form-label text-muted" for="register-name">Full name</label>
                                          </div>

                                          <div class="form-outline mb-4">
                                              <input type="text" id="register-username" class="form-control"
                                                  placeholder="Please enter a username.." name="username" />
                                              <label class="form-label text-muted"
                                                  for="register-username">Username</label>
                                          </div>

                                          <div class="form-outline mb-4">
                                              <input id="register-email" class="form-control"
                                                  placeholder="Please enter a valid Email address" name="email" />
                                              <label class="form-label text-muted" for="register-email">Email</label>
                                          </div>

                                          <div class="form-outline mb-4">
                                              <input type="password" id="password" class="form-control"
                                                  placeholder="Please enter a password.." name="password" />
                                              <label class="form-label text-muted" for="password">Password</label>
                                          </div>

                                          <div class="text-center pt-1 mb-5 pb-1 d-flex flex-column">
                                              <button class="btn btn-primary btn-block fa-lg mb-3" type="submit">Create
                                                  Account</button>
                                          </div>

                                          <div class="d-flex align-items-center justify-content-center pb-4">
                                              <p class="mb-0 me-2">Already have an account?</p>
                                              <button type="button" class="btn btn-outline-light">
                                                  <a href="/login" class="text-decoration-none"
                                                      style="color:inherit;">Log in</a>
                                              </button>
                                          </div>

                                      </form>

                                  </div>
                              </div>
                              <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2">
                                  <img src="{{ asset('img/welcome-nobg.png') }}"
                                      class="img-fluid customImg d-none d-lg-block" alt="">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>



  </x-layout>

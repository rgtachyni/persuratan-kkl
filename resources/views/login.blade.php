@extends('layout.style')
<!-- Section: Design Block -->
<section class="vh-100" style="background-color: #1b1415;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-7">
                <div class="card " style="border-radius: 1rem;">



                    <div class="card-body p-4 p-lg-5 text-black d-flex justify-content-center">

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="d-flex  justify-content-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <img src="image/logosulselprov.png" alt="" style="width: 100px">
                            </div>

                            <h1 class="fw-normal mb-3 pb-3 d-flex  justify-content-center" style="letter-spacing: 1px;">
                                <b>LOGIN</b>
                            </h1>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="username" class="form-control form-control-lg" name="username" />
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="pt-1 mb-4 d-flex  justify-content-center">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block"
                                    type="submit">Login</button>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!-- Section: Design Block -->

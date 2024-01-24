@extends('layout.app')

@section('title', 'Register')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="card col-lg-4 offset-4 mb-3 mt-5">
                <div class="card-body">

                    @include('auth.nav-top', ['nav' => 'register'])

                    <hr>

                    <form>
                        <div class="form-group">
                            <label for="exampleInputName" class="fs-14 font-weight-bold">Username</label>
                            <input type="email" placeholder="Please fill in the username" class="form-control form-control-sm"
                                   id="exampleInputName" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail" class="fs-14 font-weight-bold">Email</label>
                            <input type="email" placeholder="Please fill in the email" class="form-control form-control-sm"
                                   id="exampleInputEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="fs-14 font-weight-bold">Password</label>
                            <input type="password" placeholder="Please fill in the password" class="form-control form-control-sm"
                                   id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2" class="fs-14 font-weight-bold">Repeat Password</label>
                            <input type="password" placeholder="Please fill in the password again" class="form-control form-control-sm"
                                   id="exampleInputPassword2">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-100 mt-4 bg-blue text-white">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection

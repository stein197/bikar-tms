@use('App\LoginAction')
@extends('page.main')
@section('title', 'Login')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="my-5 align-self-center col col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <form action="" method="POST" class="card">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <p class="alert alert-{{ $errors->first('color') }}">{{ $errors->first('msg') }}</p>
                            @endif
                            <div class="form-group mb-2">
                                <label>E-Mail:</label>
                                <input class="form-control" type="text" name="email" />
                            </div>
                            <div class="form-group mb-2">
                                <label>Password:</label>
                                <input class="form-control" type="password" name="password" />
                            </div>
                            <div class="row mt-3">
                                <div class="col col-12 col-md-6 mb-3 mb-md-0">
                                    <button name="action" value="{{ LoginAction::Register->name }}" class="btn btn-success w-100">Register</button>
                                </div>
                                <div class="col col-12 col-md-6">
                                    <button name="action" value="{{ LoginAction::Login->name }}" class="btn btn-primary w-100">Log in</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

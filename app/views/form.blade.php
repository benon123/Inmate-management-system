@extends('partials.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <h4 class="font-weight-bold text-info">LOGIN</h4>
                <div class="card card-body shadow">
                    @if (!empty(response()->errors()))
                        
                        @foreach (response()->errors() as $item)
                            <p class="text-danger">{{ $item }}</p>
                        @endforeach
                    @endif
                    
                    <form action="{{ url('users/store') }}" method="post" id="ginForm">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="email" class="form-control bg-light" placeholder="enter your email or phone number" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="sr-only">First Name</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="fname" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="sr-only">Last Name</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="lname" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="age" class="sr-only">Age</label>
                            <i class="fas fa-envelope text-success"></i> <input type="text" name="age" class="form-control bg-light" autocomplete="off" required/>
                        </div>
                        <div class="mb-3">
                            <label for="login" class="sr-only">Login</label>
                            <input type="hidden" name="login" value="1"/>
                            <button type="submit" class="btn btn-success w-100 login-btn">PROCEED</button>
                        </div>
                        Don't have an account? <a href="{{ url('account') }}">Create Account</a>
                    </form>
                    <div class="response"></div>
                </div>
              
            </div>
        </div>
    </div> 
@endsection

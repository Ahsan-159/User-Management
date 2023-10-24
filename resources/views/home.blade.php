@extends('layouts.masterlayouts')
@section('title')
    Home
@endsection
@section('main-content')
<div class="row mt-2">
    <div class="col-md-8 offset-md-2">
            @if(!empty($msg))
            {!! $msg !!}
            @endif
         
    
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="text-center text-primary">User Registration</h5>
            </div>
            <div class="card-body">
                <form action="{{url('/')}}/register" method="POST">
                    @csrf
                    <div class="form-group">  
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Your Name">
                        <small class="form-text text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </small>
                      </div>                  
                        <div class="form-group">  
                          <label>Email:</label>
                          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Your email">
                          <small class="form-text text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                          <small class="form-text text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </small>
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                          
                        </div>
                        <div class="form-group">
                            <label>User Status:</label>
                            <select class="form-control" id="" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                            <small class="form-text text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </small>
                          </div>
                        
                    <button type="submit" class="btn btn-primary float-right" name="Register">Submit</button>
                </form>
            </div>
        </div> 
    
    </div>
</div>
@endsection
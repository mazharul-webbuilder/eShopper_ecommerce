@extends('master.front.master')
@section('title')
    Customer Login
@endsection
@section('body')
   <section class="py-5">
       <div class="container">
           <div class="row">
               <div class="col-md-8 mx-auto">
                   <div class="main-div shadow px-5 py-5">
                       <h3 class="text-center text-dark">Login</h3>
                       <form action="{{route('customer.logincheck')}}" method="POST">
                           @csrf
                           <div class="row mb-4">
                               <div class="col-md-3">
                                   <label for="" class="form-label">Email</label>
                               </div>
                               <div class="col-md-9">
                                   <input type="email" class="form-control" name="email" placeholder=" Email">
                                   <p class="text-danger"> {{Session::get('message')}}</p>

                               </div>
                           </div>
                           <div class="row mb-4">
                               <div class="col-md-3">
                                   <label for="" class="form-label">Password</label>
                               </div>
                               <div class="col-md-9">
                                   <input type="password" class="form-control" name="password" placeholder="Password">
                                   <p class="text-danger"> {{Session::get('message2')}}</p>
                               </div>
                           </div>
                           <div class="row mb-4">
                               <div class="col-md-3">
                               </div>
                               <div class="col-md-9">
                                   <input type="submit" class="btn btn-success" value="Login">
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>
@endsection

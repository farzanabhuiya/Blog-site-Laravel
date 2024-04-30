
@extends('layouts.backendlayout')

@section('backend')


<section id="profile ">

       <div class="container mt-5 pt-4">

             <div class="row">

             <div class="col-lg-6 ">
            <div class="card bg-primary-subtle">
                <div class="card-header ">
                    <h2>Profile page</h2>
                </div>
                <div class="card-body ">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        @method('put')
                        
                        <input name="name" value="{{ auth()->user()->name }}" type="text" class="form-control my-2" placeholder="You user Name">
                          @error('name')
                          <span class="text-danger">{{$message }}</span>
                          @enderror

                        <input name="email" value="{{ auth()->user()->email }}" type="text" class="form-control my-2"  placeholder="You Email">
                             
                        @error('email')
                          <span class="text-danger">{{$message }}</span>
                          @enderror



                        <label for="" class="my-2 d-block">
                                   Your profile image
                     <input name="profile_img" type="file" class="form-control "  placeholder="">
                     </label>

                     @error('profile_img')
                          <span class="text-danger d-block">{{$message }}</span>
                          @enderror

                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </form>
                </div>
            </div>

             </div>



             <div class="col-lg-4 mx-auto ">
            
                <div class="card bg-success-subtle">
                    <div class="card-header  ">
                        <h3>Password Upadate</h3>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('profile.password.update') }}" method="post">
                            @csrf
                           @method('put')
                            <input name="old"  type="text" class=" from-control my-2 php " placeholder="old password">
                            @error('old')
                            <span style="color: red" >{{ $message }}</span>
                            @enderror

                            <input  name="password" type="text" class="from-control my-2" placeholder="new password">
                            @error('password')
                            <span style="color: red" >{{ $message }}</span>
                            @enderror
                            <input  name="password_confirmation" type="text" class="from-control my-2" placeholder="comfirm password">
                            @error('password_confirmation')
                            <span style="color: red" >{{ $message }}</span>
                            @enderror
                            <button class="btn btn-primary d-block " type="submit">UpdatePassword</button>
                        </form>
                    </div>
                </div>

             </div>
             </div>




       </div>
</section>








@endsection

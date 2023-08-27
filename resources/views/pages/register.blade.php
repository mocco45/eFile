@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Register'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>User</h6>
                </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" id="registrationForm" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="container form-space mt-5 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control form-control-lg" name="firstName" id="firstName" placeholder="Enter your first name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control form-control-lg" name="lastName" id="lastName" placeholder="Enter your last name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email </label>
                                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter your email">
                                                <small class="form-text text-muted">example@example.com</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password">
                                                <small class="form-text text-muted">At-least 1 Capital letter and one special character</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="phone" class="form-control form-control-lg" name="phone" id="phone" placeholder="Enter your phone number">
                                                <small class="form-text text-muted">Enter reachable phone number</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="profilePicture">Upload Profile Picture</label>
                                                    <div class="upload-area" id="uploadArea">
                                                        <input type="file" class="form-control-file d-none" name="photo" id="profilePicture">
                                                        <label class="uploaded-image d-none" for="profilePicture">
                                                            <a href="javascript:void(0);" class="image-link"></a>
                                                        </label>
                                                        <i class="fas fa-cloud-upload-alt fa-3x" id="uploadIcon"></i>
                                                        <p class="mt-2">Drag &amp; Drop your files here or click to select</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('update-form')
<script>
    const form = document.getElementById('registrationForm');
  
    form.addEventListener('submit', async function(event) {
      event.preventDefault();
  
      const formData = new FormData(form);
  
      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: formData,
        });
  
        if (response.ok) {

          Toastify({
            text: 'Data Created Successfully!',
            duration: 5000,
            backgroundColor: 'green',
          }).showToast();
  
          // Clear form fields
          form.reset();
          
        } else {
          // Handle error cases
          console.error('Submission failed');
        }
      } catch (error) {
        console.error('An error occurred:', error);
      }
    });

</script>
@endsection
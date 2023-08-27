@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'manage'])  
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>User</h6>
                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0 ui celled" style="width: 97%; margin-left: 20px;">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Photo</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->firstname.' '.$user->lastname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <div class="profile-picture-container">
                                                    <img src="{{ asset('img/profile/'.$user->photo) }}" alt="image" class="profile" data-bs-toggle="modal" data-bs-target="#userModal{{ $user->id }}">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('change-password', $user->id) }}" class="btn btn-link">
                                                    <i class="fas fa-key"></i> Change Password
                                                </a>
                                            </td>
                                        </tr>
                                        @include('components.modal-profile')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@section('delete')
<script>
    // Loop through each user's delete button
    @foreach ($users as $user)
        document.getElementById('deleteUserButton{{ $user->id }}').addEventListener('click', function() {
            var username = this.getAttribute('data-username');
            var isConfirmed = confirm('Are you sure you want to delete the account of ' + username + '?');

            if (isConfirmed) {
                // Submit the form
                this.closest('form').submit();
            }
        });
    @endforeach
</script>
@endsection


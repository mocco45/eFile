@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Records</h6>
                    </div>
                    <div class="button ms-4 my-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#myModal">Add +</button>

                        {{-- modal  --}}

                        <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">New Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myForm" action="{{ route('add-data') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-8 field">
                                                    <div class="label">
                                                        <label for="fname">First Name</label>
                                                    </div>
                                                    <input type="text" name="firstName" id="fname"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8 field">
                                                    <div class="label">
                                                        <label for="lname">Last Name</label>
                                                    </div>
                                                    <input type="text" name="lastName" id="lname"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-8 field">
                                                    <div class="label">
                                                        <label for="phone">Phone Number</label>
                                                    </div>
                                                    <input type="number" name="phone" id="phone"
                                                        class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- modal-end --}}
                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="myTable" class="table align-items-center mb-0 ui celled"
                                style="width: 97%; margin-left: 20px;">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Name</th>
                                        <th>File No</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $file->firstName . ' ' . $file->lastName }}</td>
                                            <td>{{ $file->file_no }}</td>
                                            <td>{{ $file->phone }}</td>
                                            <td class="text-center">
                                                <a data-bs-toggle="modal" data-bs-target="#edit-{{ $file->id }}"><i
                                                        class="fas fa-edit text-primary"></i></a>
                                            @if (auth()->user()->role_id == 1)
                                                <a href="{{ route('delete', $file) }}" class="delete-button" data-id="{{ $file->id }}"><i
                                                        class="fas fa-trash text-danger"></i></a>
                                            @endif
                                            </td>
                                        </tr>
                                        @include('components.modal-edit')
                                        {{-- @include('components.update') --}}

                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Deletion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this record?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('form-sub')
<script>
    const form = document.getElementById('myForm');
    const modal = document.getElementById('myModal');
  
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

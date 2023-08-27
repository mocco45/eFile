<div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel{{ $user->id }}">{{ $user->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="profileImageForm" class="user-form" action="{{ route('update.profile', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="user-form"></div>
                            <label for="profileImageInput" class="image-upload-btn" data-form-id="{{ $user->id }}">
                                <img src="{{ asset('img/profile/'.$user->photo) }}" alt="Profile Image" class="profile-image-modal">
                            </label>
                            <input type="file" id="profileImageInput" style="display: none;" name="photo">

                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('edit-user', $user) }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control form-control-lg" name="firstName" id="firstName" placeholder="Enter your first name">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control form-control-lg" name="lastName" id="lastName" placeholder="Enter your last name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" class="form-control form-control-lg" name="phone" id="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="btn-user">
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                            </form>
                        </div>
                    </div>          
            </div>
            @if (auth()->user()->role_id == 1)
                <div class="modal-footer">
                    <form action="{{ route('delete.user', $user) }}" method="post">
                        @csrf
                        @method('DELETE')
                        @if (auth()->user()->id !== $user->id)
                        <button type="submit" class="btn btn-danger" id="deleteUserButton{{ $user->id }}" data-username="{{ $user->name }}">Delete Account</button>
                        @endif
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@section('upload')
    <script>
      // Attach event listener to a common parent element using event delegation
document.querySelector('.modal-body').addEventListener('click', function(event) {
    if (event.target.classList.contains('image-upload-btn')) {
        var formId = event.target.getAttribute('data-form-id');
        var form = document.querySelector(`form[data-form-id="${formId}"]`);
        
        // Trigger click on the input to open the file dialog
        var input = form.querySelector('input[type="file"]');
        input.click();
    }
});

// Attach event listeners to all file inputs
document.querySelectorAll('input[type="file"]').forEach(function(input) {
    input.addEventListener('change', function() {
        var form = this.closest('.user-form');
    
    if (form) {
        console.log("Form found:", form);
        form.submit();
    } else {
        console.log("Form not found");
    }
    });
});

    </script>
@endsection

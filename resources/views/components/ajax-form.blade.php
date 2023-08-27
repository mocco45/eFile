<!-- resources/views/components/ajax-form.blade.php -->
<div>
    <form {{ $attributes->merge(['class' => 'ajax-form']) }}>
        {{ $slot }}
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.ajax-form').on('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                body: formData,
                success: function(response) {
                    console.log(response);
                    if (form.hasClass('register-form')) {
                        successMessage = 'Record created successfully';
                    } else if (form.hasClass('update-form')) {
                        successMessage = 'Record updated successfully';
                    }
                    
                    Toastify({
                        text: successMessage,
                        duration: 3000,
                        backgroundColor: 'green',
                    }).showToast();
                },
                error: function(xhr) {
                    var errorMessage = xhr.responseJSON.message || 'An error occurred while submitting the form.';
                    
                    Toastify({
                        text: errorMessage,
                        duration: 3000,
                        backgroundColor: 'red',
                    }).showToast();
                }
            });
        });
    });
</script>

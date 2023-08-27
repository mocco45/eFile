<script>
    const form = document.getElementById('editForm');

   form.addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = new FormData(form);

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            const responseData = await response.json();

            // Update the table row using the responseData
            updateTableRow(responseData.data);

            // Display success toastr notification
            showSuccess(responseData.message);

            // Clear form fields
            form.reset();
        } else {
            console.error('Submission failed');
            showError('Failed to submit data');
        }
    } catch (error) {
        console.error('An error occurred:', error);
        showError('An error occurred');
    }
});

function updateTableRow(data) {
    console.log(data);
    // Find the existing table row based on data's ID
    const existingRow = document.querySelector(`#tableRow-${data.id}`);

    // Update the table row content with the new data
    if (existingRow) {
        existingRow.innerHTML = `
            <td>${data.id}</td>
            <td>${data.name}</td>
            <td>${data.attribute1}</td>
            <td>${data.attribute2}</td>
            <td>
                <!-- Add edit and delete buttons or links -->
            </td>
        `;
    } else {
        // Handle case when the row does not exist
    }
}

</script>
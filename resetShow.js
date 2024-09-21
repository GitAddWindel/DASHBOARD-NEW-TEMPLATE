// Show 'Reset Now' button when 'Reset All' is clicked
document.getElementById('resetRecords').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default link behavior
    document.getElementById('resetButtonContainer').style.display = 'block'; // Show the reset button
});

document.getElementById('resetNowBtn').addEventListener('click', function() {
    const user_id = document.getElementById('user_id').value; // Retrieve user_id from hidden input

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to reset all data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, Reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to reset data
            $.ajax({
                url: 'resetData.php', // Adjust path as necessary
                type: 'POST',
                data: { user_id: user_id }, // Use user_id from the modal
                success: function(response) {
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        Swal.fire('Reset!', 'All your data has been reset.', 'success');
                        $('#confirmationModal').modal('hide'); // Hide the modal
                    } else {
                        Swal.fire('Error!', res.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error resetting data:', error);
                    Swal.fire('Error!', 'There was a problem resetting your data.', 'error');
                }
            });
        }
    });
});


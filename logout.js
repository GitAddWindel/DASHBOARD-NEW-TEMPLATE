// Open the logout confirmation modal
document.getElementById('openModalLogout').addEventListener('click', function() {
    // Show the logout modal
    var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
    logoutModal.show();
});

// Handle the logout confirmation
document.getElementById('confirmLogout').addEventListener('click', function() {
    // Perform the logout action (e.g., redirect to logout endpoint)
    window.location.href = 'logout.php'; // Adjust the URL to your logout logic
});

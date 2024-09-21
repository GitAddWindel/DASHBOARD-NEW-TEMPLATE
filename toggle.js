function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
    sidebar.classList.toggle('hide');
}

function showContent(content) {
    document.getElementById('initialContent').style.display = 'none';
    document.getElementById('dashboardContent').style.display = 'none';
    document.getElementById('trackDocumentsContent').style.display = 'none';
    // document.getElementById('timerContent').style.display = 'none';
    document.getElementById('userProfileContent').style.display = 'none';
    document.getElementById('logoutContent').style.display = 'none';

    document.getElementById(content + 'Content').style.display = 'block';
}


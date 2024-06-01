// script.js dropdown
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const userprofil = document.getElementById('userprofil');
    const reportpelaporan = document.getElementById('reportpelaporan');
    const content = document.querySelector('content');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-hidden');
        content.classList.toggle('content-hidden');
        userprofil.classList.toggle('userprofil-hidden');
        reportpelaporan.classList.toggle('reportpelaporan-hidden');
    });
});


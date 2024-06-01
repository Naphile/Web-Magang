// script.js
document.addEventListener('DOMContentLoaded', function() {
    const profilePhoto = document.getElementById('profilePhoto');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profilePhoto.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    window.addEventListener('click', function(event) {
        if (!profilePhoto.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});
//! navbar sempre collassata di partenza
document.addEventListener("DOMContentLoaded", function () {
    var navbarContent = document.getElementById('navbarSupportedContent');
    if (navbarContent.classList.contains('show')) {
        navbarContent.classList.remove('show');
    }
});

//! alert col timer
document.addEventListener("DOMContentLoaded", function () {
    let successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 3000);
    }
});

// JavaScript untuk interaksi tambahan
console.log("JavaScript terhubung!");

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu-button');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    let sidebarVisible = false;

    function toggleSidebar() {
        sidebarVisible = !sidebarVisible;
        sidebar.classList.toggle('show');
        mainContent.classList.toggle('sidebar-visible');
    }

    menuButton.addEventListener('click', toggleSidebar);

    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuButton = menuButton.contains(event.target);

        if (sidebarVisible && !isClickInsideSidebar && !isClickOnMenuButton) {
            toggleSidebar();
        }
    });
});

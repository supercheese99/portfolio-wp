document.addEventListener('DOMContentLoaded', function() {
    // Select all tab headers and info paragraphs
    const tabs = document.querySelectorAll('.tabs h3');
    const info = document.querySelectorAll('.tabs-info .info');

    // Function to hide all info paragraphs
    function hideAllInfo() {
        info.forEach((item) => {
            item.style.display = 'none';
        });
    }

    // Add click event to each tab
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', function() {
            hideAllInfo(); // Hide all info paragraphs
            info[index].style.display = 'block'; // Show the corresponding info
        });
    });

    // Initialize the first tab and info to be visible
    hideAllInfo();
    info[0].style.display = 'block';
});
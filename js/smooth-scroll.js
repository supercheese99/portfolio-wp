document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('a[href*="#"]'); // Match any href containing #

    for (const link of links) {
        link.addEventListener('click', function (e) {
            const linkHref = this.getAttribute('href');
            const baseUrl = window.location.origin + window.location.pathname; // Base URL of your current page

            // Check if the link href contains the base URL and an anchor
            const isSamePageLink = linkHref.startsWith(baseUrl) && linkHref.includes('#');

            if (isSamePageLink) {
                e.preventDefault();

                // Extract the ID from the link
                const targetID = linkHref.split('#')[1];
                const targetSection = document.getElementById(targetID);

                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    }
});

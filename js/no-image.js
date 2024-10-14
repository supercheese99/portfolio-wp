document.addEventListener('DOMContentLoaded', function() {
    displayMessage();
});

function displayMessage() {
    const projectItems = document.getElementsByClassName('project-item');

    for (let i = 0; i < projectItems.length; i++) {
        const projectItem = projectItems[i];
        const imgTag = projectItem.getElementsByTagName('img');

        // no img tag, display 'coming soon'
        if (imgTag.length === 0) {
            const newElem = document.createElement('h2');
            newElem.innerHTML = 'Coming Soon';
            // projectItem.appendChild(newElem);
            newElem.classList.add('coming-soon');
            projectItem.insertBefore(newElem, projectItem.firstChild);
        }
    }

}
document.addEventListener('DOMContentLoaded', function() {
    const siteNavigation = document.getElementById('site-navigation');
    console.log('siteNavigation:', siteNavigation);

    // Return early if the navigation doesn't exist.
    if (!siteNavigation) {
        console.log('siteNavigation does not exist.');
        return;
    }

    const button = siteNavigation.getElementsByTagName('button')[0];
    console.log('button:', button);

    // Return early if the button doesn't exist.
    if ('undefined' === typeof button) {
        console.log('button is undefined.');
        return;
    }

    const menuContainer = siteNavigation.getElementsByClassName('menu-navigation-container')[0];
    console.log('menuContainer:', menuContainer);

    // Hide menu toggle button if menu container is empty and return early.
    if ('undefined' === typeof menuContainer) {
        console.log('menuContainer is undefined.');
        button.style.display = 'none';
        return;
    }

    // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
    button.addEventListener('click', function() {
        console.log('Button clicked');
        menuContainer.classList.toggle('toggled');

        if (button.getAttribute('aria-expanded') === 'true') {
            button.setAttribute('aria-expanded', 'false');
        } else {
            button.setAttribute('aria-expanded', 'true');
        }
    });

    // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
    document.addEventListener('click', function(event) {
        const isClickInside = siteNavigation.contains(event.target);

        if (!isClickInside) {
            menuContainer.classList.remove('toggled');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // Get all the link elements within the menu.
    const links = menuContainer.getElementsByTagName('a');

    // Get all the link elements with children within the menu.
    const linksWithChildren = menuContainer.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // Toggle focus each time a menu link is focused or blurred.
    for (const link of links) {
        link.addEventListener('focus', toggleFocus, true);
        link.addEventListener('blur', toggleFocus, true);
    }

    // Toggle focus each time a menu link with children receive a touch event.
    for (const link of linksWithChildren) {
        link.addEventListener('touchstart', toggleFocus, false);
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus(event) {
        if (event.type === 'focus' || event.type === 'blur') {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains('nav-menu')) {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase()) {
                    self.classList.toggle('focus');
                }
                self = self.parentNode;
            }
        }

        if (event.type === 'touchstart') {
            const menuItem = this.parentNode;
            event.preventDefault();
            for (const link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove('focus');
                }
            }
            menuItem.classList.toggle('focus');
        }
    }
});

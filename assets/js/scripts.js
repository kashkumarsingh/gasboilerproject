jQuery(document).ready(function($) {
    //smooth scroll with active class update
        let $sections = $('section');
    let $navLinks = $('ul.navbar-nav a.nav-link');

    // Smooth scroll to section when clicking on links
    $('ul.navbar-nav a.nav-link[href^="#"]').on('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        var targetID = $(this).attr('href').substring(1); // Get the target section ID from href attribute

        // Get the target section element
        var $targetSection = $('#' + targetID);

        if ($targetSection.length) {
            // Scroll smoothly to the target section
            $('html, body').animate({
                scrollTop: $targetSection.offset().top - 50 // Adjust offset as needed
            }, 800);

            // Update active link after scrolling
            updateActiveLink(targetID);
        }
    });

    // Update active link as you scroll through the sections
    $(window).scroll(function() {
        let currentSection = getCurrentSection();
        if (currentSection) {
            updateActiveLink(currentSection.attr('id'));
        }
    });

    // Get the currently active section based on scroll position
    function getCurrentSection() {
        var scrollPosition = $(window).scrollTop();
        var currentSection = null;

        $sections.each(function() {
            var sectionTop = $(this).offset().top - 70; // Adjust for fixed navigation height
            if (scrollPosition >= sectionTop) {
                currentSection = $(this);
            }
        });

        return currentSection;
    }

    // Update the active link based on the current section
    function updateActiveLink(sectionID) {
        $navLinks.removeClass('active');
        $('ul.navbar-nav a.nav-link[href="#' + sectionID + '"]').addClass('active');
    }

    // Add active class on click for links without data-target
    $('ul.navbar-nav a.nav-link[href^="#"]').click(function(event) {
        event.preventDefault(); // Prevent default link behavior
        // Add "active" class to the clicked link
        $(this).addClass('active');
        // Remove "active" class from other links within the same ul
        $(this).closest('ul.navbar-nav').find('a.nav-link[href^="#"]').not(this).removeClass('active');
    });
    
     // Initialize Owl Carousel for Partners
    $("#boiler-partner-carousel").owlCarousel({
        loop: true,
        margin: 32,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 6
            }
        }
    });

});

    

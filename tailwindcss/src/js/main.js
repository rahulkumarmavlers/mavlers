// Initialize Lozad.js
const observer = lozad(); // lazy loads elements with default selector as '.lozad'

function lozadObserver() {
    observer.observe();

    // Intersection Observer code START
    const sections = document.querySelectorAll('.js-view-element');
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };
    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                setTimeout(() => {
                    if (entry.target.classList.contains('cursor-image')) {
                        entry.target.classList.add('visible-after');
                    }
                },700);
                observer.unobserve(entry.target);
            }
        });
    };
    const observer1 = new IntersectionObserver(observerCallback, observerOptions);
    sections.forEach(section => {
        observer1.observe(section);
    });
    // Intersection Observer code END

     // image hover cursor script START
     const boxes = document.querySelectorAll(".cursor-image ");

     boxes.forEach(box => {
         // Create the cursor element
         const cursor = document.createElement('span');
         cursor.classList.add('link-cursor');
 
         // Create the inner span element with the image
         const innerSpan = document.createElement('span');
         const img = document.createElement('img');
         img.src = "../src/images/link-image-arrow.svg";
         img.alt = "";
 
         // Append the image to the inner span
         innerSpan.appendChild(img);
 
         // Append the inner span to the cursor
         cursor.appendChild(innerSpan);
 
         // Append the cursor to the current box
         box.appendChild(cursor);
 
         // Add mousemove event listener to the current box
         box.addEventListener("mousemove", function (e) {
             const cursorSize = cursor.offsetWidth / 2;
             const rect = this.getBoundingClientRect();
             const cursorX = e.clientX - rect.left - cursorSize; // Adjust to keep the cursor centered
             const cursorY = e.clientY - rect.top - cursorSize; // Adjust to keep the cursor centered
             cursor.style.left = cursorX + 'px';
             cursor.style.top = cursorY + 'px';
         });
 
         box.addEventListener("mouseenter", () => {
             cursor.classList.add("active");
         });
 
         box.addEventListener("mouseleave", () => {
             cursor.classList.remove("active");
         });
     });
     // image hover cursor script END
}

setTimeout(function () {
    
    lozadObserver();

    // Click to smooth scroll START
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (event) {
            event.preventDefault();  // Prevent the default anchor click behavior

            const targetId = this.getAttribute('href');  // Get the href attribute of the clicked element
            const targetElement = document.querySelector(targetId);  // Select the target element based on the href

            if (targetElement) {
                const targetPosition = targetElement.getBoundingClientRect().top; // Get the position of the target
                const startPosition = window.pageYOffset;
                const distance = targetPosition;
                const duration = 1200; // Duration in milliseconds
                let start = null;

                function step(timestamp) {
                    if (!start) start = timestamp;
                    const progress = timestamp - start;
                    const fraction = Math.min(progress / duration, 1); // Ensure that fraction never exceeds 1

                    // Calculate current scroll position
                    const currentScroll = startPosition + distance * fraction;

                    window.scrollTo(0, currentScroll);

                    if (progress < duration) {
                        requestAnimationFrame(step);
                    }
                }
                requestAnimationFrame(step);
            }
        });
    });
    //Click to smooth scroll END

    // image hover cursor script START
    const boxes = document.querySelectorAll(".cursor-image ");

    boxes.forEach(box => {
        // Create the cursor element
        const cursor = document.createElement('span');
        cursor.classList.add('link-cursor');

        // Create the inner span element with the image
        const innerSpan = document.createElement('span');
        const img = document.createElement('img');
        img.src = "../src/images/link-image-arrow.svg";
        img.alt = "";

        // Append the image to the inner span
        innerSpan.appendChild(img);

        // Append the inner span to the cursor
        cursor.appendChild(innerSpan);

        // Append the cursor to the current box
        box.appendChild(cursor);

        // Add mousemove event listener to the current box
        box.addEventListener("mousemove", function (e) {
            const cursorSize = cursor.offsetWidth / 2;
            const rect = this.getBoundingClientRect();
            const cursorX = e.clientX - rect.left - cursorSize; // Adjust to keep the cursor centered
            const cursorY = e.clientY - rect.top - cursorSize; // Adjust to keep the cursor centered
            cursor.style.left = cursorX + 'px';
            cursor.style.top = cursorY + 'px';
        });

        box.addEventListener("mouseenter", () => {
            cursor.classList.add("active");
        });

        box.addEventListener("mouseleave", () => {
            cursor.classList.remove("active");
        });
    });
    // image hover cursor script END

    //Mobile menu toggle START
    const mobileToggle = document.querySelector('.js-mobile-menu-click');
    const closeButton = document.querySelector('.js-mobile-menu-close-click');
    const body = document.body;

    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            body.classList.add('mobile-menu-open');
        });
    }

    if (closeButton) {
        closeButton.addEventListener('click', () => {
            body.classList.remove('mobile-menu-open');
        });
    }
    //Mobile menu toggle END

    //Mobile submenu toggle START
    if (window.innerWidth < 1280) {
        // Add CSS transition to submenu elements
        document.querySelectorAll('.has-children .submenu').forEach(submenu => {
          submenu.style.transition = 'height 0.5s ease';
        });

        document.querySelectorAll('.has-children > a').forEach(icon => {
          icon.addEventListener('click', event => {
            const parent = event.currentTarget.closest('.has-children');
            if (parent) {
              parent.classList.toggle('open');
              const submenu = parent.querySelector('.submenu');
              if (submenu) {
                if (submenu.style.height && submenu.style.height !== '0px') {
                  submenu.style.height = '0px';
                } else {
                  submenu.style.height = `${submenu.scrollHeight}px`;
                }
              }
            }
          });
        });
    }
    function handleTabMenu() {
        const Tab_menuItems = document.querySelectorAll('.has-children');
    
        Tab_menuItems.forEach(item => {
            item.addEventListener('keydown', function (event) {
                if (window.innerWidth > 1280) {
                    if (event.key === 'Enter') {
                        event.preventDefault(); // Prevent default action
                        this.classList.add('open');
                    } else if (event.key === 'Escape') {
                        event.preventDefault(); // Prevent default action
                        this.classList.remove('open');
                    }
                }
            });
    
            // Remove 'open' class when the focus is lost
            item.addEventListener('focusout', function (event) {
                if (window.innerWidth > 1280) {
                    const relatedTarget = event.relatedTarget;
                    if (!item.contains(relatedTarget)) {
                        item.classList.remove('open');
                    }
                }
            });
        });
    }
    
    // Initial call to set up event listeners if the screen width is greater than 1024
    if (window.innerWidth > 1280) {
        handleTabMenu();
    }
    
    // Reapply event listeners on window resize
    window.addEventListener('resize', function () {
        if (window.innerWidth > 1280) {
            handleTabMenu();
        }
    });
    
    //Mobile submenu toggle END

    //Sticky Header START
    window.addEventListener('load', stickyMenu);
    window.addEventListener('resize', stickyMenu);
    window.addEventListener('scroll', stickyMenu);

    let prevScroll = 0;
    let currentScroll = 1;
    let allotPositionScroll = 0;
    const targetScroll_ = 300;

    function stickyMenu() {
        currentScroll = window.scrollY;
        const header = document.querySelector('header');
        const twositeLinks = document.querySelector('.Twolsiteinks');

        if (currentScroll < prevScroll) {
            // MOVING BOTTOM TO TOP
            if (currentScroll > targetScroll_) {
                header.classList.add('fixed-header');
            } else {
                header.classList.remove('fixed-header', 'sticky-ready');
                header.classList.remove('allot-position');
                if (twositeLinks) twositeLinks.classList.remove('allot-position');
            }
        } else {
            // MOVING TOP TO BOTTOM
            if (header.classList.contains('allot-position')) {
                if (currentScroll - allotPositionScroll > 50) {
                    header.classList.add('sticky-ready');
                }
            }
            header.classList.remove('fixed-header');
            if (currentScroll < 100) {
                header.classList.remove('sticky-ready');
            } else {
                if (!header.classList.contains('allot-position')) {
                    allotPositionScroll = currentScroll;
                }
                header.classList.add('allot-position');
                if (twositeLinks) twositeLinks.classList.add('allot-position');
            }
        }
        prevScroll = currentScroll;
    }
    //Sticky Header END

    // Add class on body when scroll up & down for Header animate after some scroll START
    let lastScrollTop = 0;
    const Scroll_Page = document.body;
    const scrollThreshold = 120;
    const initialScrollThreshold = 300;

    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        let scrollDiff = scrollTop - lastScrollTop;

        if (scrollTop > initialScrollThreshold) {
            if (scrollDiff > scrollThreshold) {
                // Scrolling down
                Scroll_Page.classList.remove('scroll-up');
                Scroll_Page.classList.add('scroll-down');
                lastScrollTop = scrollTop; // Update lastScrollTop after threshold is met
            } else if (scrollDiff < -scrollThreshold) {
                // Scrolling up
                Scroll_Page.classList.remove('scroll-down');
                Scroll_Page.classList.add('scroll-up');
                lastScrollTop = scrollTop; // Update lastScrollTop after threshold is met
            }
        } else {
            // Remove classes when above the initial scroll threshold
            Scroll_Page.classList.remove('scroll-up', 'scroll-down');
        }
    });
    // Add class on body when scroll up & down for Header animate after some scroll END

    // Team Popup START
    const popupClick = document.querySelectorAll('.js-popup-click');
    const popupClose = document.querySelectorAll('.js-popup-close');

    if (popupClick) {
        popupClick.forEach((element) => {
            element.addEventListener('click', () => {
                const popupId = element.getAttribute('data-popup-id');
                openPopup(popupId); // Pass the popup ID to open the specific popup
            });
        });
    }

    if (popupClose) {
        popupClose.forEach((element) => {
            element.addEventListener('click', () => {
                closePopup();
            });
        });
    }

    function openPopup(popupId) {
        const body = document.querySelector('body');
        body.classList.add('popup-open');

        // Hide all popups and show the specific one
        const popups = document.querySelectorAll('.popup-wrap');
        popups.forEach(popup => {
            if (popup.id === popupId) {
                popup.classList.add('active'); // Show the specific popup
            } else {
                popup.classList.remove('active'); // Hide other popups
            }
        });
    }

    function closePopup() {
        const body = document.querySelector('body');
        body.classList.remove('popup-open');

        // Hide all popups
        const popups = document.querySelectorAll('.popup-wrap');
        popups.forEach(popup => {
            popup.classList.remove('active'); // Hide all popups
        });
    }
    // Team Popup END

    // Filter change to select box in mobile View START
    function setupMobileFilter() {
        var select = document.querySelector('.js-select-value');
        var selOption = document.getElementById('filter-option');
        var links = selOption ? selOption.querySelectorAll('li') : [];
        var filterWrap = document.querySelector('.filter-wrap');
    
        function addEventListeners() {
            select.addEventListener('click', toggleOptions);
            Array.prototype.forEach.call(links, function(link) {
                link.addEventListener('click', selectOption);
            });
            document.addEventListener('click', closeOptionsOutside);
        }
    
        function removeEventListeners() {
            select.removeEventListener('click', toggleOptions);
            Array.prototype.forEach.call(links, function(link) {
                link.removeEventListener('click', selectOption);
            });
            document.removeEventListener('click', closeOptionsOutside);
        }
    
        function updateFilter() {
            if (!select || !selOption || !filterWrap) {
                console.error('Required elements not found');
                return;
            }
    
            if (window.innerWidth <= 1279) {
                addEventListeners();
                selOption.style.display = 'none'; // Ensure options are hidden initially
            } else {
                removeEventListeners();
                resetFilterState();
            }
        }
    
        function toggleOptions() {
            if (selOption.style.display === 'block') {
                selOption.style.display = 'none';
                filterWrap.classList.remove('open');
            } else {
                selOption.style.display = 'block';
                filterWrap.classList.add('open');
            }
        }
    
        function selectOption(e) {
            select.textContent = this.textContent;
            selOption.style.display = 'none';
            Array.prototype.forEach.call(links, function(l) {
                l.classList.remove('active');
            });
            this.classList.add('active');
            filterWrap.classList.add('filter-selected');
            filterWrap.classList.remove('open');
            e.preventDefault();
        }
    
        function closeOptionsOutside(event) {
            if (!select.contains(event.target) && !selOption.contains(event.target)) {
                selOption.style.display = 'none';
                filterWrap.classList.remove('open');
            }
        }
    
        function resetFilterState() {
            selOption.style.display = ''; // Reset to initial display state
            filterWrap.classList.remove('open');
            filterWrap.classList.remove('filter-selected');
        }
    
        window.addEventListener('resize', updateFilter);
        updateFilter(); // Initial call
    }
    setupMobileFilter();
    
    // Filter change to select box in mobile View END

    

    //Grid
    function breakpointGrids() {
        const breakpoint = document.querySelector('.js-breakpoint');
        const gridVisual = document.querySelector('.grid-visual');

        breakpoint.addEventListener('click', () => {
            if (gridVisual.style.display === 'none' || gridVisual.style.display === '') {
                gridVisual.style.display = 'block'; // Show the element
            } else {
                gridVisual.style.display = 'none'; // Hide the element
            }
        });
    }
    breakpointGrids();

     // Recheck on window resize
     window.addEventListener('resize', breakpointGrids);

}, 1000)


window.onload = () => {

setTimeout(function () {

    //Animate text
    const footerText = new Swiper('.js-animate-text', {
        loop: true,
        autoplay: {
            delay: 0,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
        },
        speed: 3000,
        slidesPerView: 'auto',
        freeMode: true,
    });

    //brands Logos slider START
    const swiper1 = new Swiper('.js-logo-slider', {
        loop: true,
        autoplay: {
            delay: 0,
            pauseOnMouseEnter: true,        // added
            disableOnInteraction: false,    // added
        },
        speed: 3000,
        breakpoints: {
            0: {
                slidesPerView:3.5,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 4.5,
            },
            768: {
                slidesPerView:5.5,
            },
            1200: {
                slidesPerView:8
            },
        },
    });
    //brands Logos slider END

    //Testimonials slider START
    const testimonials = document.querySelectorAll('.js-testimonials-slider').forEach(function (slider) {
        console.log(slider)
        new Swiper(slider, {
            loop: false,
            slidesPerView: 1.3,
            spaceBetween: 100,
            // Navigation arrows
            navigation: {
                nextEl: slider.parentElement.querySelector('.swiper-button-next'),
                prevEl: slider.parentElement.querySelector('.swiper-button-prev'),
            },
            autoplay: false,
            breakpoints: {
                320: {
                    spaceBetween: 20,
                    slidesPerView: 1,
                },
                768: {
                    spaceBetween: 50,
                },
                1200: {
                    spaceBetween: 100,
                    slidesPerView: 1.3,
                },
            },
        });
    });

    //recent Work slider active after tablet screen START
    let swiperInstance = null;

    const initializeSwiper = () => {
    swiperInstance = new Swiper('.js-our-work', {
        loop: true,
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        slidesPerView: "auto",
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView:1.1,
                spaceBetween:15,
            },
            768: {
                slidesPerView: "auto",
                spaceBetween:0,
            }
        },
    });
    };

    const destroySwiper = () => {
    if (swiperInstance !== null) {
        swiperInstance.destroy();
        swiperInstance = null;
    }
    };

    const checkWidthAndInitialize = () => {
    if (window.innerWidth < 1025) {
        if (!swiperInstance) {
        initializeSwiper();
        }
    } else {
        destroySwiper();
    }
    };

    // Check screen width on load
    checkWidthAndInitialize();

    // Recheck on window resize
    window.addEventListener('resize', checkWidthAndInitialize);

    //recent Work slider active after tablet screen END

    //recent News slider START
    const newsSlider = document.querySelectorAll('.js-news-slider').forEach(function (slider) {
        new Swiper(slider, {
            slidesPerView: "auto",
            autoplay: false,
            navigation: {
                nextEl: slider.parentElement.querySelector('.swiper-button-next'),
                prevEl: slider.parentElement.querySelector('.swiper-button-prev'),
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: "auto",
                    spaceBetween: 18,
                },
                1024: {
                    slidesPerView: "auto",
                    spaceBetween: 25,
                }
            },
        });
    });
    //recent News slider END

    //Team slider START
    const teamSlider = document.querySelectorAll('.js-team-slider').forEach(function (slider) {
        new Swiper(slider, {
            slidesPerView: 3.01,
            autoplay: false,
            navigation: {
                nextEl: slider.parentElement.querySelector('.swiper-button-next'),
                prevEl: slider.parentElement.querySelector('.swiper-button-prev'),
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2.1,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3.01,
                    spaceBetween: 25,
                }
            },
        });
    });
    //Team slider END

    //Single Video option START
    const videos = document.querySelectorAll('.js-single-video');
    const playPauseBtns = document.querySelectorAll('.playPauseBtn');
    const playIcon = '<i class="video-play"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M8 5v14l11-7z" fill="#FFF" /></svg></i>';
    const pauseIcon = '<i class="video-pause"><svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="14" width="14" height="3" transform="rotate(-90 0 14)" fill="white"/><rect x="7" y="14" width="14" height="3" transform="rotate(-90 7 14)" fill="white"/></svg></i>';
    playPauseBtns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const video = videos[index];
            if (video.paused) {
                video.play();
                btn.innerHTML = pauseIcon;
            } else {
                video.pause();
                btn.innerHTML = playIcon;
            }
        });
    });
    //Single Video option END

    //custom thumb with video play START
    document.querySelectorAll('.play-button').forEach(button => {
        button.addEventListener('click', function() {
            const wrapper = this.closest('.video-wrapper');
            const platform = wrapper.getAttribute('data-platform');
            const videoId = wrapper.getAttribute('data-video-id');
            const thumbnail = wrapper.querySelector('.video-thumbnail');
            const iframeContainer = wrapper.querySelector('.video-iframe');
    
            if (!videoId) {
                console.error('Video ID is missing');
                return;
            }
    
            let iframe;
    
            if (platform === 'youtube') {
                iframe = document.createElement('iframe');
                iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&rel=0`);
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
                iframe.setAttribute('allowfullscreen', 'true');
            } else if (platform === 'vimeo') {
                iframe = document.createElement('iframe');
                iframe.setAttribute('src', `https://player.vimeo.com/video/${videoId}?autoplay=1&muted=1`);
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture');
                iframe.setAttribute('allowfullscreen', 'true');
    
                // Use Vimeo Player API to unmute the video after a short delay
                const player = new Vimeo.Player(iframe);
                setTimeout(() => {
                    player.setVolume(1);
                }, 500);
            }
    
            thumbnail.style.display = 'none';
            iframeContainer.style.display = 'block';
            iframeContainer.appendChild(iframe);
        });
    });
    

}, 1000)

};



document.addEventListener('DOMContentLoaded', function () {

    const path = 'https://dev-html-projects.pantheonsite.io/Lorem Ipsum/';

    // Our Work Filter Start
    (function () {
        if (document.querySelector('.work-filter')) {
            const filterLinks = document.querySelectorAll('.work-filter a');
            const workListingWrapper = document.querySelector('.our-work-wrapper');

            function fetchData(filter) {

                let url = '../data/our-work.json';

                axios.get(url)
                    .then(response => {
                        const allData = response.data;

                        let filteredData;
                        if (filter === 'all') {
                            filteredData = allData.all; // Access the 'all' array
                        } else {
                            filteredData = allData[filter]; // Access the array for the specific category
                        }

                        // Check if the filteredData is an array
                        if (Array.isArray(filteredData)) {
                            populateWorkItems(filteredData);
                            updateActiveFilter(filter);
                            updateURL(filter);
                        } else {
                            console.error('Filtered data is not an array:', filteredData);
                        }
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            // Function to populate the work items
            function populateWorkItems(data) {
                if (!workListingWrapper) return;

                workListingWrapper.innerHTML = ''; // Clear previous items
                data.forEach(item => {
                    const workItem = document.createElement('div');
                    workItem.className = 'work-box';
                    workItem.innerHTML = `
                        <div class="work-item">
                            <div class="work-img-blk js-view-element cursor-image mb-3">
                                <a href="${item.link}" tabindex="-1" aria-label="View project details for ${item.title}">
                                    <picture class="lozad" data-iesrc="${path}/src/images/${item.image}" data-alt="${item.title}">
                                        <source data-srcset="${path}/src/images/${item.image}?size=1000 1x, ${path}/src/images/${item.image}?size=2000 2x" media="(min-width: 980px)">
                                        <source data-srcset="${path}/src/images/${item.image}?size=500 1x, ${path}/src/images/${item.image}?size=1000 2x" media="(min-width: 475px)">
                                        <source data-srcset="${path}/src/images/${item.image}?size=400 1x, ${path}/src/images/${item.image}?size=800 2x">
                                        <img class="lozad" data-srcset="${path}/src/images/${item.image}" alt="${item.title}" />
                                    </picture>
                                </a>
                            </div>
                            <div class="text-2xs text-primary font-semibold mb-2 block md:text-base tracking-xl">${item.category}</div>
                            <h3 class="work-title"><a href="${item.link}" aria-label="Read more about ${item.title}">${item.title}</a></h3>
                            <div class="hidden mt-4 xl:flex xl:flex-wrap">
                                ${Array.isArray(item.tags) ? 
                                    item.tags.map(tagObj => `
                                        <a href="${tagObj.link}" class="border mr-2 mb-2 border-gray100 text-text_primary py-1 px-3 rounded-full text-2xs font-medium transition duration-500 hover:border-black" aria-label="Learn more about ${tagObj.tag}">${tagObj.tag}</a>
                                    `).join('') : ''
                                }
                            </div>
                        </div>
                    `;
                    workListingWrapper.appendChild(workItem);
                });
            }

            // Function to update URL parameter
            function updateURL(filter) {
                const newURL = `${window.location.origin}${window.location.pathname}?filter=${filter}`;
                window.history.pushState({ path: newURL }, '', newURL);
            }

            // Function to update active class on filter links
            function updateActiveFilter(activeFilter) {
                filterLinks.forEach(link => {
                    const li = link.parentElement; // Get the parent <li> element
                    const filter = link.getAttribute('data-filter');

                    if (filter === activeFilter) {
                        li.classList.add('active'); // Add 'active' to the current filter's <li>
                    } else {
                        li.classList.remove('active'); // Remove 'active' from all others
                    }
                });
            }

            // Event listeners for filter links
            if (filterLinks.length > 0) {
                filterLinks.forEach(newslink => {
                    newslink.addEventListener('click', function (e) {
                        e.preventDefault();
                        const filter = this.getAttribute('data-filter');
                        fetchData(filter);

                        setTimeout(function () {
                            lozadObserver();
                        }, 300);
                    });
                });
            }

            const urlParams = new URLSearchParams(window.location.search);
            const initialFilter = urlParams.get('filter') || 'all';
            fetchData(initialFilter);
        }
    })();
    // Our Work Filter End




    // News Filter Start
    (function () {
        if (document.querySelector('.news-filter')) {
            const filterLinks = document.querySelectorAll('.news-filter a');
            const newsListingWrapper = document.querySelector('.news-wrapper');
            const showMoreButton = document.querySelector('.show-more'); // Use the existing Show More button
            let currentBatch = 0;
            const itemsPerBatch = 10;
            let newsData = [];

            function fetchNewsData(filter) {
                let url = '../data/news-and-insight.json';

                axios.get(url)
                    .then(response => {
                        const allData = response.data;

                        if (filter === 'all') {
                            newsData = Object.values(allData).flat();
                        } else {
                            newsData = allData[filter] || [];
                        }

                        currentBatch = 0;
                        populateNewsItems(newsData);
                        updateNewsActiveFilter(filter);
                        updateNewsURL(filter);
                    })
                    .catch(error => console.error('Error fetching news data:', error));
            }

            function populateNewsItems(data) {
                newsListingWrapper.innerHTML = ''; // Clear previous items
                const itemsToShow = data.slice(0, itemsPerBatch);
                appendNewsItems(itemsToShow);

                // If there are more items to show, display the Show More button
                if (data.length > itemsPerBatch) {
                    showMoreButton.style.display = 'inline-block';
                } else {
                    showMoreButton.style.display = 'none';
                }
            }

            function appendNewsItems(items) {
                items.forEach(item => {
                    const newsItem = document.createElement('div');
                    newsItem.className = 'news-item';
                    newsItem.innerHTML = `
                        <div class="flex flex-wrap border-b border-white border-solid py-8 md:py-6 border-opacity-50" role="list">
                            <div class="w-full md:w-1/6 2xl:w-1/6 md:pr-1 xl:pr-5 text-white flex flex-wrap md:block items-center md:flex-col">
                                <span class="text-2xs md:text-lg" aria-label="Publication date">${item.date}</span>
                                <div class="flex flex-wrap ml-3 md:ml-0 md:mt-3">
                                    <span class="text-1xs md:text-2xs border border-white px-3 rounded-full mr-2 min-h-[26px] font-medium" aria-label="Category: ${item.category}">${item.category}</span> 
                                </div>
                            </div>
                            <div class="w-full md:w-3/5 2xl:w-2/3 xl:pr-5 text-white pt-3 pb-6 md:pb-0 md:pt-0 2xl:pl-6">
                                <a class="news-insight-title text-sm md:text-md xl:text-2xl hover:underline -tracking-sm w-full md:w-11/12 2xl:w-9/12 block xl:pr-10 font-medium" href="${item.link}" title="${item.title}" role="link" aria-label="${item.title}">${item.title}</a>
                            </div>
                            <div class="news-insight-img w-full md:w-1/5 2xl:w-1/6 flex md:justify-end ml-auto">
                                <div class="md:max-w-[235px] w-full">
                                    <a href="${item.link}" tabindex="-1">
                                        <picture class="lozad w-full" data-iesrc="${path}/src/images/${item.image}" data-alt="${item.title}">
                                            <source srcset="${path}/src/images/${item.image}?size=1000 1x, ${path}/src/images/${item.image}?size=2000 2x" media="(min-width: 980px)">
                                            <source srcset="${path}/src/images/${item.image}?size=500 1x, ${path}/src/images/${item.image}?size=1000 2x" media="(min-width: 475px)">
                                            <source srcset="${path}/src/images/${item.image}?size=400 1x, ${path}/src/images/${item.image}?size=800 2x">
                                            <img class="lozad" srcset="${path}/src/images/${item.image}" alt="${item.title}" />
                                        </picture>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                    newsListingWrapper.appendChild(newsItem);
                });
            }

            function updateNewsURL(filter) {
                const newURL = `${window.location.origin}${window.location.pathname}?filter=${filter}`;
                window.history.pushState({ path: newURL }, '', newURL);
            }

            function updateNewsActiveFilter(activeFilter) {
                filterLinks.forEach(link => {
                    const li = link.parentElement; // Get the parent <li> element
                    const filter = link.getAttribute('data-filter');

                    if (filter === activeFilter) {
                        li.classList.add('active'); // Add 'active' to the current filter's <li>
                    } else {
                        li.classList.remove('active'); // Remove 'active' from all others
                    }
                });
            }

            showMoreButton.addEventListener('click', function (e) {
                e.preventDefault();
                currentBatch += 1;
                const start = currentBatch * itemsPerBatch;
                const end = start + itemsPerBatch;
                const moreItems = newsData.slice(start, end);

                appendNewsItems(moreItems);

                // If no more items to show, hide the Show More button
                if (end >= newsData.length) {
                    showMoreButton.style.display = 'none';
                }

                setTimeout(function () {
                    lozadObserver();
                }, 300);
            });

            filterLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const filter = this.getAttribute('data-filter');
                    fetchNewsData(filter);

                    setTimeout(function () {
                        lozadObserver();
                    }, 300);
                });
            });

            const urlParams = new URLSearchParams(window.location.search);
            const initialFilter = urlParams.get('filter') || 'all';
            fetchNewsData(initialFilter);
        }
    })();

    // News Filter End

});

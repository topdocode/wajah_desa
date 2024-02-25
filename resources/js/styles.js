
var scrollpos = window.scrollY;
var header = document.getElementById("header");
var headerLogo = document.getElementById("header-logo");
var navcontent = document.getElementById("nav-content");
var navaction = document.getElementById("navAction");
var brandname = document.getElementById("brandname");
var toToggle = document.querySelectorAll(".toggleColour");

document.addEventListener("scroll", function () {
    /*Apply classes for slide in bar*/

    scrollpos = window.scrollY;

    if (scrollpos > 5) {

        // logo
        headerLogo.classList.add('hidden');
        header.classList.remove('relative');
        header.classList.add('fixed', 'animate__animated', 'animate__fadeInDown');
        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        // navcontent.classList.add("bg-white");



    } else {
        headerLogo.classList.remove('hidden');
        header.classList.remove('fixed', 'animate__animated', 'animate__fadeInDown');
        header.classList.add('relative');
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
    }
});


/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;

function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
            } else {
                navMenuDiv.classList.add("hidden");
            }
        } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
        }
    }
}

function checkParent(t, elm) {
    while (t.parentNode) {
        if (t == elm) {
            return true;
        }
        t = t.parentNode;
    }
    return false;
}



// lazy image
// document.addEventListener("DOMContentLoaded", function () {
//     const images = document.querySelectorAll("img[loading='lazy']");

//     const options = {
//         root: null,
//         rootMargin: "0px",
//         threshold: 0.1
//     };

//     const imageObserver = new IntersectionObserver(function (entries, observer) {
//         entries.forEach(function (entry) {
//             if (entry.isIntersecting) {
//                 const image = entry.target;
//                 image.removeAttribute("loading");
//                 observer.unobserve(image);
//             }
//         });
//     }, options);

//     images.forEach(function (image) {
//         imageObserver.observe(image);
//     });
// });

// lazy video
// document.addEventListener("DOMContentLoaded", function () {
//     const videos = document.querySelectorAll("video[loading='lazy']");

//     const options = {
//         root: null,
//         rootMargin: "0px",
//         threshold: 0.1
//     };

//     const videoObserver = new IntersectionObserver(function (entries, observer) {
//         entries.forEach(function (entry) {
//             if (entry.isIntersecting) {
//                 const video = entry.target;
//                 video.removeAttribute("loading");
//                 observer.unobserve(video);
//                 video.play(); // Memulai pemutaran video saat masuk viewport (opsional)
//             }
//         });
//     }, options);

//     videos.forEach(function (video) {
//         videoObserver.observe(video);
//     });
// });



document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll("img[data-src]");

    const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1
    };

    const imageObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const image = entry.target;
                image.src = image.getAttribute("data-src");
                image.removeAttribute("data-src");
                observer.unobserve(image);
            }
        });
    }, options);

    images.forEach(function (image) {
        imageObserver.observe(image);
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const videos = document.querySelectorAll("video[data-src]");

    const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1
    };

    const videoObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const video = entry.target;
                video.src = video.getAttribute("data-src");
                video.removeAttribute("data-src");
                observer.unobserve(video);
                video.play(); // Mulai pemutaran video (opsional)
            }
        });
    }, options);

    videos.forEach(function (video) {
        videoObserver.observe(video);
    });
});

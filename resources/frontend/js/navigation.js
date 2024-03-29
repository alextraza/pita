(function () {
    'use strict';

    var section = document.querySelectorAll(".heading");
    var sections = {};
    var i = 0;

    Array.prototype.forEach.call(section, function (e) {
        sections[e.id] = e.offsetTop;
    });

    window.onscroll = function () {
        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

        for (i in sections) {
            if (sections[i] <= scrollPosition) {
                document.querySelector('.cat__nav__con').setAttribute('class', 'cat__nav__con inactive');
                document.querySelector('a[href*=' + i + ']').setAttribute('class', 'cat__nav__con active');
            } else {
                document.querySelector('a[href*=' + i + ']').setAttribute('class', 'cat__nav__con inactive');
            }
        }
    };
})();



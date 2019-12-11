(function (root) {
  'use strict';
  var snbSticky = function () {
    // snb sticky
    var wrap = document.querySelector('.js-wrap');
    var headerEl = document.querySelector('.js-header');
    var headerElRect = headerEl.getBoundingClientRect();
    var container = document.querySelector('.js-wrap');
    var topBanner = document.querySelector('.js-banner');
    var snbRect = document.querySelector('.snb').getBoundingClientRect();
    var timeID = null;
    // @return snb show scrollTop value
    var getPinValue = function () { 
      var bannerHeight = 60;
      var isCollapsed = topBanner.getAttribute('data-collapsed');
      return (isCollapsed === 'false') ? bannerHeight + headerElRect.height + snbRect.height : headerElRect.height + snbRect.height;
    };
    var setSnbSticky = function (yOffset) { 

      if (yOffset >= getPinValue()) {
        container.classList.add('sticky');
      } else if (yOffset <= (getPinValue() - snbRect.height)) {
        container.classList.remove('sticky');
      }
    };

    root.addEventListener('scroll', function (e) {
      setSnbSticky(root.pageYOffset);
    });
  };
  window.snbSticky = snbSticky;
})(window);
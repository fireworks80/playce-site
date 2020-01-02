(function (root) {
  'use strict';
  var snbSticky = function () {
    // snb sticky
    var config = {
      wrap: null,
      headerHeight: null,
      snbHeight: null
    };
    
    var setSnbSticky = function (yOffset) { 
      var stickPoint = config.headerHeight + config.snbHeight;

      if (yOffset >= stickPoint) {
        config.wrap.classList.add('sticky');
      } else if (yOffset <= config.headerHeight) {
        config.wrap.classList.remove('sticky');
      }
    };

    root.addEventListener('load', function () {
      config.wrap = document.querySelector('.js-wrap');
      config.headerHeight = config.wrap.querySelector('.js-header').clientHeight;
      config.snbHeight = config.wrap.querySelector('.snb').clientHeight;
    });

    root.addEventListener('scroll', function (e) {
      if (config.headerHeight && config.snbHeight) setSnbSticky(root.pageYOffset);
      
    });
  };
  window.snbSticky = snbSticky;
})(window);
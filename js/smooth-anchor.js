// smooth anchor
(function (root, $) {

  var smoothAnchor = function (el) {
    var $hashContainer = $(el);
    var $hashLinks = $hashContainer.find('a');
    
    var goToSection = function(hash) {
      var snbEl = document.querySelector('.js-snb');
      var snbHeight = snbEl.getBoundingClientRect().height;
      var sectionElOffsetTop = document.querySelector(hash).offsetTop;
      var scrollTop = sectionElOffsetTop - snbHeight;

      Playce.quick(parseInt(scrollTop));
      
    };
  
  // .snb > a 클릭
    $hashLinks.on('click', function (e) {
      e.preventDefault();
      var hash = $(this).attr('href');
      // console.log(hash);
      if (hash.charAt(0) !== '#') {
        location.href = hash;
        return;
      }
      goToSection(hash);
    });

  };

  

  // 상단 올라가기
  $('.js-btn-go-top').on('click', function () { 
  Playce.quick();
  });

  window.smoothAnchor = smoothAnchor;
})(window, jQuery);
// smooth anchor
(function ($) {

  var els = {
    $callout: null,
    $snb: null,
    $goTop: null
  };

  var config = {
    snbHeight: 0
  };

  

  var setInitScrollPos = function () {
    
    var resetScroll = function(isInit) {
      $('html').css('display', isInit ? 'none' : '');
      $('html, body').scrollTop(0);
    };

    if (location.hash) resetScroll(true);

    $(window).on('load', function(e) {
      e.preventDefault();

      resetScroll(false);

      if (!$(location.hash).length) return;

      setTimeout(function() {
        Playce.quick($(location.hash).offset().top - config.snbHeight);
      }, 250);
    });
  };

  var onClickSmoothAnchor = function() {
    // 2depth
    els.$callout.on('click', 'a', function(e) {
      var $this = $(this);
      var href = $this.attr('href').split('#')[1];

      Playce.quick($('#' + href).offset().top - config.snbHeight);
    });

    // snb
    els.$snb.on('click', 'a', function(e) {
      var hash = $(this).attr('href');
      Playce.quick($(hash).offset().top - config.snbHeight);
    });

    els.$goTop.on('click', function() {
      Playce.quick();
    });
  };

  var init = function() {
    els.$callout = $('.callout');
    els.$snb = $('.js-snb');
    els.$goTop = $('.js-btn-go-top');

    config.snbHeight = els.$snb.height();

    setInitScrollPos();
    onClickSmoothAnchor();

    Playce.onResizable(function() {
      config.snbHeight = $('.js-snb').height();
    });
  };

  init();

})(jQuery);
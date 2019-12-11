var Playce = Playce || {};

Playce.isMobile = false;
Playce.lang = 'KOR'; // KOR / ENG
Playce.isIE = function () {
  var agent = navigator.userAgent.toLowerCase();
  // true: ie
  return ((navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1));
};

// resize 
Playce.onResizable = function (callback) {
  var resizeTimeout;

  var resizeThrottler = function () {
    if (!resizeTimeout) {
      resizeTimeout = setTimeout(function () {
        resizeTimeout = null;
        callback();
      }, 66);
    }
  };

  window.addEventListener('resize', resizeThrottler);
};

Playce.quick = function (val) {
  // console.log('quick: ', val);
  $('html, body').stop().animate({
    scrollTop: val || 0
  }, 400);
};

Playce.getHash = function () {
  return location.hash ? location.hash : null;
};


// tab
Playce.tab = function (wrap) {
  var $tab = $(wrap);
  var $tabList = $tab.find('.js-tab-list');
  var activate = location.hash;

  var resetActive = function () {
    $tab.find('.is-active').removeClass('is-active');
  };

  var activeTabList = function ($tab) {
    $tab.addClass('is-active');
  };

  var activeTabPanel = function (hash) {
    $(hash).addClass('is-active');
  };

  var transition = function ($this) {
    // console.log($this);
    resetActive();
    activeTabList($this.parent());
    activeTabPanel($this.attr('href'));
  };

  if (activate) {
    resetActive();
    activeTabPanel(activate);
    $('[href="' + activate + '"]').parent().addClass('is-active');
  }

  $tabList.on('click', 'a', function (e) {
    e.preventDefault();

    var $this = $(this);

    transition($this);
  });
};




// ============================
// wizardSlider
// ============================
var wizardSlider = function (el) {
  var $wizardWrap = $(el);
  var $wizardList = $wizardWrap.find(".js-wizard__list");
  var $wizardImgs = $wizardWrap.find(".js-wizard-panel");

  var resetSlickStep = function () {
    $wizardList.find(".current").removeClass("current");
  };

  var drawSlickStep = function (currentIdx) {
    $.each($wizardList.find("li"), function (idx, el) {
      if (idx <= currentIdx) {
        $(el).addClass("current");
      }
    });
  };

  $wizardImgs.slick({
    fade: true,
    draggable: false,
    arrows: false,
    autoplay: true
  });

  $wizardImgs.on("beforeChange", function (
    event,
    slick,
    currentSlide,
    nextSlide
  ) {
    var numCurrentSlide = currentSlide;
    var totalImgLen = $wizardImgs.find("img").length;

    $wizardList
      .find("li")
      .eq(nextSlide)
      .addClass("current");

    if (numCurrentSlide >= totalImgLen - 1) {
      resetSlickStep();
    }
  });

  $wizardList.on("click", "li", function () {
    var $this = $(this);
    var currentIdx = $this.index();

    $wizardImgs.slick("slickGoTo", currentIdx);

    resetSlickStep();
    drawSlickStep(currentIdx);
  });
};

// ============================
// slick fade
// use roro function, case , wasup case
// ============================

var slickWrapper = function (el, opt) {
  var $wrap = $(el);
  var $slider = $wrap.find(".js-slider");

  $slider.slick(opt);
  // console.log('slider: ' ,$slider);
  return $slider;
};

// 팝업
(function () {
  var dim = document.querySelector(".js-dim");
  var popupBox = dim.querySelector(".js-popup-box");

  var onVideoStatusHandler = function () {
    console.log("video status");
  };

  var onVideoHandler = function () {
    var video = popupBox.querySelector("video");
    var playBtn = popupBox.querySelector(".js-play-btn");

    if (video.paused) {
      video.play();
      playBtn.classList.add("hidden");
    } else {
      video.pause();
      playBtn.classList.remove("hidden");
    }

    playBtn.addEventListener("click", onVideoHandler);
  };

  var onPictureHandler = function () {
    var shirinkBtn = popupBox.querySelector(".js-shrink-btn");

    shirinkBtn.addEventListener("click", onPopupCloseHandler);
  };

  var generateDOM = function (type) {
    var stringDOM = {
      guideRoRo: '<div class="video-wrap">' +
        '<video src="./images/guide-roro.mp4"></video>' +
        '<button class="btn-play js-play-btn" type="button"><span class="a11y">가이드 영상 재생</span></button></div>',
      guideWasup: '<div class="video-wrap">' +
        '<video src="./images/guide-wasup.mp4"></video>' +
        '<button class="btn-play js-play-btn" type="button"><span class="a11y">가이드 영상 재생</span></button></div>',
      architecture: '<img src="./images/architecture-blueprint-large-2x.png" alt="">' +
        '<button class="btn-pic btn-pic--shrink js-shrink-btn" type="button"><span class="a11y">닫기</span></button>',
      architectureRoro: '<img src="./images/img-architecture-roro-2x.png" alt="">' +
        '<button class="btn-pic btn-pic--shrink btn-pic--shrink-roro js-shrink-btn" type="buttslon"><span class="a11y">닫기</span></button>'
    };

    popupBox.innerHTML = stringDOM[type];

    switch (type) {
      case "guideRoRo":
      case "guideWasup":
        onVideoHandler();
        break;
      case "architecture":
      case "architectureRoro":
        onPictureHandler();
        break;
    }
  };

  var onPopupOpenHandler = function (popupName) {
    dim.classList.add("is-active");
    popupBox.classList.add("popup-" + popupName);
    generateDOM(popupName);
  };

  var onPopupCloseHandler = function () {
    popupBox.innerHTML = "";
    dim.classList.remove("is-active");
  };


  document.addEventListener("click", function (e) {
    var clickObj = e.target;
    var tagName = clickObj.tagName.toLowerCase();
    var dataName = clickObj.getAttribute('data-name');

    if (tagName === "button" && dataName) {
      onPopupOpenHandler(clickObj.dataset.name);
    }
    if (tagName === "video") onVideoHandler();
    if (clickObj.className.indexOf("js-dim") > -1) onPopupCloseHandler();
  });

  // esc 클릭시 팝업 닫기
  document.addEventListener("keydown", function (e) {
    // console.log(e.keyCode);
    var esc = 27;
    if (!dim || e.keyCode !== esc) return;

    var dimClassNames = dim.className;
    if (dimClassNames.indexOf("is-active") > -1 && esc === e.keyCode)
      onPopupCloseHandler();
  });
})();



// 특장점 애니메이션
(function (Tl, Tm) {
  var $wrap = $(".feature__pic");
  var $rowDoubles = $wrap.find(".feature__anim-double");
  var $rowSingles = $wrap.find(".feature__anim-single");

  var $rowDouble1 = $rowDoubles.eq(0);
  var $row1 = $rowDouble1.children().eq(0);

  var $rowDouble2 = $rowDoubles.eq(1);
  var $row3 = $rowDouble2.children().eq(0);

  var $playBtn = $wrap.find(".feature__btn--play");

  var clickStart = {
    delay: 1,
    scale: 0.99,
    x: 5,
    y: 5,
    ease: Expo.easeOut
  };

  // 1번 클릭 요소 모션 시작
  Tl.to($rowDouble1, 0.1, clickStart);

  // 1번 클릭요소 선택후 원래 대로
  Tl.to($rowDouble1, 0.1, {
    scale: 1,
    x: 0,
    y: 0,
    onComplete: function () {
      $row1.removeClass("front");
    }
  });

  // 2번 클릭요서 눌린 모션
  Tl.to($rowDouble2, 0.1, clickStart);

  // 2번 클릭요소 변환 완료
  Tl.to($rowDouble2, 0.1, {
    scale: 1,
    x: 0,
    y: 0,
    onComplete: function () {
      $rowDoubles.addClass("selected");
      $row3.removeClass("front");

      $.each($rowDoubles, function (idx, el) {
        var posY = idx ? "-10" : "-15";

        Tm.to($(el), 0.5, {
          delay: 0.5,
          scale: 1.05,
          y: posY
        });
      });
    }
  });

  // 클릭 요소 확대 될때 나머지 요소 흐려지는 모션
  Tl.to($rowSingles, 0.5, {
    delay: 0.5,
    opacity: 0.5,
    onStart: function () {
      Tm.to([$rowSingles.eq(1), $rowSingles.eq(2)], 0.5, {
        y: -10
      });
    },
    onComplete: function () {
      setTimeout(function () {
        $playBtn.addClass("animated rubberBand");
      }, 1000);
    }
  });

  // 원상 복귀
  Tl.to(
    $rowDoubles,
    0.5, {
      scale: 1,
      y: 0,
      onStart: function () {
        // 체크 되어 있는 모션 해제
        $.each([$row1, $row3], function (idx, el) {
          $(el).addClass("front");
        });

        Tm.to($rowSingles, 0.5, {
          opacity: 1,
          y: 0
        });

        Tm.to($rowDoubles, 0.5, {
          y: 0,
          onStart: function () {
            $rowDoubles.removeClass("selected");
          }
        });

        $playBtn.removeClass("animated rubberBand");
      },
      onComplete: function () {
        setTimeout(function () {
          Tl.restart();
        }, 2000);
      }
    },
    "+=2.5"
  );
})(new TimelineMax(), TweenMax);



// ============================
// wasup subscript detail view
//
// ============================
var setSubscriptionScope = function () {
  var $subscription = $(".subscription");
  var $subscriptionDetailBtn = $subscription.find(".js-wasup-subscription");
  var $subscriptionScopeSection = $subscription.find(".js-subscription-scope");

  var onSubscriptDetailBtnStatus = function (status) {
    $('[data-isShow="false"]').attr("style", status);
  };

  $subscriptionDetailBtn.on("click", function () {
    var $this = $(this);
    var btnStatus = $this.data("isshow");

    if (btnStatus) {
      $subscriptionScopeSection.addClass("is-hide");
      onSubscriptDetailBtnStatus("");
    } else {
      $subscriptionScopeSection.removeClass("is-hide");
      onSubscriptDetailBtnStatus("display: none");
    }
  });
};

// ============================
// case script
// ============================
var caseSlider = function (wrap, opt) {
  var $wrap = $(wrap);
  var $logoBtns = $wrap.find(".js-case-logos");
  var currentIdx = 0;

  var setCurrentUserList = function (idx) {
    var $lis = $logoBtns.find("li");
    $.each($lis, function (idx, el) {
      $(el).removeClass("current");
    });

    $lis.eq(idx).addClass("current");
  };

  var sliderObj = slickWrapper(wrap, opt);

  sliderObj.on("beforeChange", function (e, slick, current, next) {
    setCurrentUserList(next);
  });

  $logoBtns.on("click", "button", function () {
    var $this = $(this);
    var idx = $this.parent().index();

    sliderObj.slick("slickGoTo", idx);
    setCurrentUserList(idx);
  });

  setCurrentUserList(currentIdx);
};

// ============================
// visual counter 
// ============================
(function ($, global, TimelineMax, TweenMax) {
  // roro 이미지 확대 축소 애니메이션
  var expandAnim = function () {
    var tl = new TimelineMax();
    var t = TweenMax;
    var $dashboardRow = $('.js-dashboard');
    var $dashboardImgs = $dashboardRow.find('img');

    var extendPic = function ($el) {
      return t.to($el, 0.5, {
        scale: 1.03,
        onStart: function () {
          this.target.addClass('has-shadow');
        }
      });
    };

    var restorePic = function ($el) {
      return t.to($el, 0.5, {
        scale: 1,
        onComplete: function () {
          this.target.removeClass('has-shadow');
        }
      });
    };

    for (var i = 0; i < $dashboardImgs.length; i += 1) {
      tl.add(extendPic($dashboardImgs.eq(i)))
        .add(restorePic($dashboardImgs.eq(i)));
    }
  };

  var counterAnim = function (els, duration) {
    $.each($(els), function (idx, el) {
      $(el).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration: duration || 1000,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.floor(now));
        },
        complete: expandAnim
      });
    });
  };

  window.counterAnim = counterAnim;
}(jQuery, window, TimelineMax, TweenMax));


// ====== 
// 오늘 하루 보이지 않기
// ====== 
(function () {
  var $banner = $('.js-banner');
  var $btn = $banner.find('.js-banner-btn');

  var hideBanner = function () {
    // $banner.data('collapsed', 'true');
    $banner.attr('data-collapsed', 'true').slideUp();
  };

  var showBanner = function () {
    // $banner.data('collapsed', 'false');
    $banner.attr('data-collapsed', 'false').slideDown();
  };

  var onSetCookie = function () {
    var date = new Date();
    date.setDate(date.getDate() + 1);
    date.setHours(0);
    date.setMinutes(0);
    date.setSeconds(0);

    // 'www.play-ce.io' -> 'play-ce.io'
    document.domain = document.domain.split('.').reverse().splice(0, 2).reverse().join('.');
    document.cookie = 'banner=y; path=/; expires=' + date.toUTCString() + ';';
    hideBanner();
  };

  var onGetCookie = function (name) {
    var obj = name + '=';
    var x = 0;
    var cookies = document.cookie;

    var runFn = (cookies.indexOf(name) < 0) ? showBanner : hideBanner;
    runFn();
  };

  onGetCookie('banner');

  $btn.on('click', onSetCookie);

}());
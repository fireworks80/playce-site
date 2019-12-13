  <footer class="footer">
    <div class="l-center">
      <!-- top -->
      <div class="footer__row">
        <!-- locale -->
        <div class="footer__locale">
          <a href="http://osci.kr/main.php" target="_blank">
            <img
              class="footer__logo"
              src="./images/foot-logo2x.png"
              alt="opensource consulting"
            />
          </a>
          <ul class="address">
            <li>
              <span data-i18n="reg-num">사업자등록번호</span> : 114-86-94359
            </li>
            <li data-i18n="representative">대표자 : 장용훈</li>
            <li data-i18n="addr">
              서울특별시 강남구 테헤란로 83길 32, 5층  (삼성동,나라키움삼성동A빌딩)
            </li>
            <li>Tel. 02-516-0711</li>
            <li>Fax. 02-516-0722</li>
          </ul>
          
        </div>
        <!-- // locale -->
        
        <div class="footer__services">
          <div class="footer__service-row">
            <div class="service">
              <h2 class="service__tit" data-i18n="product">제품</h2>
              <ul class="service__list">
                <li><a href="./wasup.html">Playce WASup</a></li>
                <li><a href="./roro.html">Playce RoRo</a></li>
              </ul>
    
              <div class="service service--partner">
                <h2 class="service__tit" data-i18n="partner">파트너</h2>
                <ul class="service__list">
                  <li><a href="./partner.html" data-i18n="partner-program">파트너 프로그램</a></li>
                </ul>
              </div>
            </div>
    
            <div class="service">
              <h2 class="service__tit" data-i18n="resource">리소스</h2>
              <ul class="service__list js-resource-list">
                <li><a href="./resource.html" data-i18n="">Playce WASup</a></li>
                <li><a href="./resource.html#playce-roro" dta-i18n="">Playce RoRo</a></li>
                <li><a href="./resource.html#etc" data-i18n="add-resource">추가 리소스</a></li>
              </ul>
            </div>
          </div>
  
          <div class="footer__service-row">
            <div class="service">
              <h2 class="service__tit" data-i18n="support">고객지원</h2>
              <ul class="service__list">
                <li><a href="https://jira.osci.kr/servicedesk/customer/portal/21" target="_blank" data-i18n="product-inquiry">제품 문의</a></li>
                <li><a href="https://jira.osci.kr/servicedesk/customer/portal/21" target="_blank" data-i18n="tech-support">기술 지원</a></li>
                <li><a href="https://osci.atlassian.net/wiki/spaces/PWUG/pages/19464217/FAQ" target="_blank" data-i18n="qna">자주 묻는 질문</a></li>
                <li><a href="./free-start.html" data-i18n="freeStart">무료로 시작</a></li>
              </ul>
            </div>
    
            <div class="service service--contact">
              <h2 class="service__tit">Contact</h2>
              <ul class="service__list">
                <li>
                  <a href="mailto:sales@osci.kr"><span data-i18n="product-inquiry">제품 문의</span> - sales@osci.kr</a>
                </li>
                <li>
                  <a href="mailto:lab@osci.kr"><span data-i18n="tech-support">기술 문의</span> - lab@osci.kr</a>
                </li>
              </ul>
            </div>
            
          </div>
        </div> <!-- // l-right -->
      </div>
      <!-- // top -->
      
      <!-- bottom -->
      <div class="footer__row">
        <div class="js-select select ">
            <span class="select__current-text">Family Site</span>
            <ul class="select__list">
              <li><a href="http://osci.kr/main.php" target="_blank">Open Source Consulting</a></li>
            </ul>
          </div>
      </div>
      <!-- // bottom -->
      <div class="footer__row copyright">
        <p>Copyright © 2019 Open Source Consulting, Inc. All rights reserved.</p>
        <span class="copyright__link"><a href="./policy.html" type="button" data-i18n="individual-info">개인정보 처리방침</a></span>
        <span class="copyright__link"><a href="./franchisability.html" type="button" data-i18n="software">소프트웨어 사용권동의</a></span>

        <div class="footer__sns">
          <a class="sns__link sns__link--facebook" href="https://www.facebook.com/osckorea" target="_blank"><span class="a11y">facebook</span></a>
          <a class="sns__link sns__link--youtube" href="https://www.youtube.com/channel/UCVtTsqu_d8WNjDpUif2x4Mw" target="_blank"><span class="a11y">youtube</span></a>
          <a class="sns__link sns__link--in" href="https://tech.osci.kr" target="_blank"><span class="a11y">tech blog</span></a>
          <a class="sns__link sns__link--github" href="https://github.com/OpenSourceConsulting" target="_blank"><span class="a11y">github</span></a>
          <a class="sns__link sns__link--blog" href="https://www.slideshare.net/OpenSourceConsulting/presentations" target="_blank"><span class="a11y">in</span></a>
        </div>
      </div>
      <!-- // copyright -->
    </div> <!-- // l-center -->
    <button class="btn-go-top js-btn-go-top" type="button"><span class="a11y">상단으로 올라가기</span></button>
  </footer>

  <div class="dim js-dim">
    <div class="popup-box js-popup-box"></div>
  </div>
</section>
<!-- // wrap -->
<script src="./js/jQuery.3.4.2.js"></script>
<script src="./js/TweenMax.min.js"></script>
<script src="./js/TimelineMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/plugins/ScrollToPlugin.min.js"></script>
<script src="./js/slick.min.js"></script>
<script src="./js/jquery.i18n.js"></script>
<script src="./js/jquery.i18n.messagestore.js"></script>

<script src="./js/Function-anim-class.js"></script>
<script src="./js/snb-stick.js"></script>
<script src="./js/index.js"></script>
<script src="./js/smooth-anchor.js"></script>
<script>
  
  (function() {
    'use strict';
    var setMobileStatus = function() {
      var wrap = document.querySelector('.js-wrap');
      var mobileBrakePointSize = 960;
      Playce.isMobile = (wrap.clientWidth <= mobileBrakePointSize) ? true : false;
      // console.log(Playce.isMobile);
    };


    document.addEventListener('DOMContentLoaded', setMobileStatus);
    Playce.onResizable(setMobileStatus);

  }());




  // 모바일일때 gnb 여닫기
  (function() {
    'use strict';
    var wrap = document.querySelector('.js-wrap');
    var hamburger = wrap.querySelector('.js-hamburger');
    var close = wrap.querySelector('.js-gnb__close');
    var gnb = wrap.querySelector('.gnb');
    var gnbItems = Array.prototype.slice.call(gnb.querySelectorAll('.gnb__item'));

    hamburger.addEventListener('click', function() {
      document.body.classList.add('show-gnb');
    });

    close.addEventListener('click', function() {
      document.body.classList.remove('show-gnb');
    });

    // 2depth 토글

    gnb.addEventListener('click', function(e) {
      var target = e.target;

      if (!target.classList.contains('js-has-callout')) {
        document.body.classList.remove('show-gnb');
      } else {
        target.parentElement.classList.toggle('is-active');
      }
    });
    

    // custion select
    var onCustomSelectHandler = function() {
      var selectEl = document.querySelector('.js-select');

      selectEl.addEventListener('click', function(e) {
        var wrap = e.target.parentElement;

        wrap.classList.contains('is-active') ? wrap.classList.remove('is-active') : wrap.classList.add('is-active');
      });
    };

    document.addEventListener('DOMContentLoaded', onCustomSelectHandler);

  }());

  // 국문 영문
  // (function() {
  //   var langEl = document.querySelector('.js-lang');
  //   var currentLangEl = langEl.querySelector('.js-current-lang');

  //   var getLocale = function () {
  //     return location.pathname.indexOf('en') > -1 ? 'en' : 'ko';
  //   };

  //   var setLocale = function(lang) {
  //     $.i18n({
  //       locale: lang
  //     })
  //     .load({
  //       ko: "./i18n/ko.json",
  //       en: "./i18n/en.json"
  //     })
  //     .done(function () {
  //       $("body").i18n();
  //     });
  //   };
    
    var getGnbLocale = function(lang) {
      currentLangEl.textContent = lang === 'en' ? 'ENG' : 'KOR';        
      langEl.classList.remove('is-active');
    };

    setLocale(getLocale());
    getGnbLocale(getLocale());
  }());

  (function() {

    document.body.addEventListener('click', function(e) {

      if (Playce.isMobile) return;

      var calloutEls = document.querySelectorAll('.has-callout'); 
      var arrCallouts = Array.prototype.slice.call(calloutEls);
      console.log( e.target.className);

      if (e.target.className !== null && e.target.className.indexOf('js-has-callout') < 0) {

        arrCallouts.forEach(function(li, idx) {
          if (li.classList.contains('is-active')) {
            li.classList.remove('is-active');
            console.log('hide');
          }
        });
      }
    });
  }());
</script>

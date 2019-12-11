<?php 
  $header_hook = 'header--';
  
  switch($current_page[0]) {
    case 'index':
      $header_hook = $header_hook.'white';
    break;
    case 'support':
    case 'free-start':
    case 'resource':
      $header_hook = $header_hook.'gray';
    break;
    case 'user-info':
    case 'policy':
    case 'franchisability':
      $header_hook = $header_hook.'white-gray';
    break;
    case 'partner':
      $header_hook = $header_hook.'blue';
    break;
    default:
      $header_hook = '';
  }

?>
<!-- .show-gnb으로 gnb 여닫기 모바일에서.. -->
<header class="header js-header <?php echo $header_hook; ?>">
  <div class="l-center">
    <h1>
      <a class="logo__link" href="<?php echo $root_url; ?>"><span class="a11y">Playce</span></a>
    </h1>
    <nav class="gnb">
      <a class="gnb__logo" href="<?php echo $root_url; ?>"><img src="./images/logo-gray-2x.png" alt="Playce"></a>
      <h2 class="a11y">gnb</h2>
      <ul class="gnb__list gnb__list--main">
        <!-- is-active 시 .callout 이 오픈 -->
        <li class="gnb__item has-callout">
          <span class="gnb__link js-has-callout" data-i18n="product">제품</span>
          <div class="callout">
            <div class="callout__inner">
              <!-- wasup -->
              <div class="callout__content">
                <a class="go-sel-page" href="./wasup.html">
                  <h3 class="callout__tit">Playce WASup</h3>
                  <p class="callout__desc" data-i18n="gnb.dropdown-wasup.desc">통합 미들웨어 관리 솔루션</p>
                </a>
                <ul class="callout__list js-drop-down">
                  <li><a class="callout__link" data-i18n="feature" href="./wasup.html#feature">특장점</a></li>
                  <li><a class="callout__link" data-i18n="case" href="./wasup.html#case">고객사례</a></li>
                  <li><a class="callout__link" data-i18n="function" href="./wasup.html#function">주요기능</a></li>
                  <li>
                    <a class="callout__link" data-i18n="subscription" href="./wasup.html#subscription">서브스크립션</a>
                  </li>
                </ul>
              </div>
              <!-- // wasup -->
              <!-- roro -->
              <div class="callout__content">
                <a class="go-sel-page" href="./roro.html">
                  <h3 class="callout__tit">Playce RoRo</h3>
                  <p class="callout__desc" data-i18n="gnb.dropdown-roro.desc">
                    클라우드 마이그레이션 솔루션
                  </p>
                </a>
                <ul class="callout__list">
                  <li>
                    <a class="callout__link" data-i18n="feature" href="./roro.html#feature">특장점</a>
                  </li>
                  <li>
                    <a class="callout__link" data-i18n="case" href="./roro.html#case">고객사례</a>
                  </li>
                  <li>
                    <a class="callout__link" data-i18n="function" href="./roro.html#function">주요기능</a>
                  </li>
                  <li>
                    <a class="callout__link" data-i18n="price" href="./roro.html#price">요금정책</a>
                  </li>
                </ul>
              </div>
              <!-- // roro -->
            </div>
          </div><!-- // callout -->
        </li>
        <li class="gnb__item"><a data-i18n="partner" class="gnb__link" href="./partner.html">파트너</a></li>
        <li class="gnb__item"><a data-i18n="resource" class="gnb__link" href="./resource.html">리소스</a></li>
        <li class="gnb__item"><a data-i18n="support" class="gnb__link" href="./support.html">고객지원</a></li>
        <li class="gnb__item"><a data-i18n="freeStart" class="gnb__link" href="./free-start.html">무료로 시작</a></li>
      </ul>
      <ul class="gnb__list gnb-etc">
        <li class="gnb__item"><a data-i18n="inquiry" class="gnb__link" href="https://jira.osci.kr/servicedesk/customer/portal/21" target="_blank">문의하기</a></li>
        <!-- .is-active로 하위 메뉴 열림  -->
        <li class="gnb__item has-callout js-lang">
          <span class="gnb__link js-has-callout js-current-lang">KOR</span>
          <div class="callout callout--lang">
            <ul class="callout__inner">
              <li><a class="lang-link" href="<?php echo $ko_url; ?>" data-lang="ko">korean</a></li>
              <li><a class="lang-link" href="<?php echo $en_url; ?>" data-lang="en">english</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <button class="gnb__close js-gnb__close" type="button">
        <span class="a11y">전체 메뉴 닫기</span>
      </button>
    </nav> <!-- // gnb -->
    <button class="hamburger js-hamburger" type="button">
      <span class="a11y">전체메뉴 보기</span>
      <span></span>
    </button>
  </div>
</header>
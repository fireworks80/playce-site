<?php
  if (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'http' || 
    (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https' && !preg_match('/^www/', $_SERVER['HTTP_HOST'])) ) {
      $host = !preg_match('/^www\./i', $_SERVER['HTTP_HOST']) ? 'www.'.$_SERVER['HTTP_HOST'] : $_SERVER['HTTP_HOST'];
      $uri = empty($_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI'] === '/' ? '' : $_SERVER['REQUEST_URI'];
      $redirect = 'https://'.$host.$uri;
      header('Location: '.$redirect);
      exit;
  }

  $current_page = explode('.', basename($_SERVER['PHP_SELF']));
  $locale =  (substr($_SERVER['REQUEST_URI'], 1, 2) === 'en') ? 'en' : 'ko';
  
  // logo click 했을때 
  // test 페이지 주석처리
  // $root_url = $locale === 'en' ? '/'.$locale.'/test' : '/test';
  $root_url = $locale === 'en' ? '/'.$locale : '/';

  // gnb 국문 / 영문 클릭했을때
  $query_string = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
  // $ko_url = '/test/'.basename($_SERVER['PHP_SELF']).$query_string;
  // $en_url = '/en/test/'.basename($_SERVER['PHP_SELF']).$query_string;
  $ko_url = '/'.basename($_SERVER['PHP_SELF']).$query_string;
  $en_url = '/en/'.basename($_SERVER['PHP_SELF']).$query_string;
  
?>
<!DOCTYPE html>
<html lang="<?php echo $locale; ?>">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150725111-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag()

    {dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-150725111-1');
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/slick.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Playce</title>
  </head>
  <body>

    <!-- wrap -->
    <section class="wrap js-wrap">
    <?php include_once 'common-php/gnb.php'; ?>
    <!-- content -->


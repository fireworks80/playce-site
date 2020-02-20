<?php
  session_start();
  include('./common-php/db.php');
  include('./common-php/util.php');
  
  $name = htmlentities($_POST['name']);
  $company = htmlentities($_POST['company']);
  $email = htmlentities($_POST['email']);
  $phone = htmlentities($_POST['phone']);
  $department = htmlentities($_POST['department']);
  $position = htmlentities($_POST['position']);
  $path = htmlentities($_POST['path']);
  $type = $_POST['type'];

  function failed($param) {
    alertNClose("Failed to save data");
    exit;
  }

  if (empty($name) || empty($company) || empty($email) || empty($phone)) {
    failed(0);
  }

  //	id	name	company	email	phone	department	position	path	read_yn	delete_yn	download_date
  
  $tableName = 'gen_wasup_download_user';

  $connect = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB, MYSQL_PORT, MYSQL_CHARSET);
 
  if ($connect->connect_errno) {
    failed(1);
  }

  $preparedQuery = "insert into $tableName (name, company, email, phone, department, position, path) 
                    values (?, ?, ?, ?, ?, ?, ?)";
  if (!($stmt = $connect->prepare($preparedQuery))) {
    $connect->close();
    failed(2);
  }

  if (!$stmt->bind_param("sssssss", $name, $company, $email, $phone, $department, $position, $path)) {
    $connect->close();
    failed(3);
  }

  if (!$stmt->execute()) {
    $connect->close();
    failed(4);
    // print_r($stmt->error_list);
  } else {
    $connect->close();

    $_SESSION['user_info_saved'] = 'success';

    script("
      opener.history.back();
      window.location.assign('download_wasup.php?type=$type');
      setTimeout(function() {
        window.close();
      }, 500);
    ");
  }
?>
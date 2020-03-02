<?php
session_start();

set_time_limit(0); 
ini_set('memory_limit', '512M'); 

if ($_SESSION['user_info_saved'] !== 'success') {
  exit;
}

// version 항목이 따로 있어 수정함 (20200220 한승철)
$ver = $_GET['ver'];

if (!empty($ver)) {
    $fileName = $_GET['type'] === 'zip' ? 'wasup-manager-'.$_GET['ver'].'.zip' : 'wasup-manager-'.$_GET['ver'].'.tar.gz';
} else {
    $fileName = $_GET['type'] === 'zip' ? 'wasup-manager.zip' : 'wasup-manager.tar.gz';
}

$file = "/var/www/html/wasup/$fileName";



function sendHeaders($file, $type, $name=NULL)
{
    if (empty($name))
    {
        $name = basename($file);
    }
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Transfer-Encoding: binary');
    header('Content-Disposition: attachment; filename="'.$name.'";');
    header('Content-Type: ' . $type);
    header('Content-Length: ' . filesize($file));
}


if (is_file($file))
{
    ob_clean();
    sendHeaders($file, 'application/x-gzip', $fileName);
    $chunkSize = 1024 * 1024;
    $handle = fopen($file, 'rb');
    while (!feof($handle))
    {
        $buffer = fread($handle, $chunkSize);
        echo $buffer;
        ob_flush();
        flush();
    }
    fclose($handle);
}

// download complete
$_SESSION['user_info_saved'] = null;
exit;

?>
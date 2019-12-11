<?php
session_start();

set_time_limit(0); 
ini_set('memory_limit', '512M'); 

if ($_SESSION['user_info_saved'] !== 'success') {
  exit;
}

$file = '/var/www/html/wasup/wasup-manager.tar.gz';


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
    sendHeaders($file, 'application/x-gzip', 'wasup-manager.tar.gz');
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
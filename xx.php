php
$dir = uploads;
$files = scandir($dir);
foreach($files as $file) {
  if ($file != . && $file != ..) {
    echo img src=$dir$file alt=$filebr;
  }
}


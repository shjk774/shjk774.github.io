<?php
if(isset($_POST['submit'])){
  $target_dir = "uploads/"; // 上传文件的目录
  $target_file = $target_dir . basename($_FILES["image"]["name"]); //上传文件的路径

  // 检查文件是否已经存在
  if (file_exists($target_file)) {
    echo "对不起，该文件已经存在。";
    exit;
  }

  // 检查文件大小
  if ($_FILES["image"]["size"] > 5000000) {
    echo "对不起，您上传的文件太大了。";
    exit;
  }

  // 允许的文件类型
  $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
  $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if (!in_array($file_type, $allowed_types)) {
    echo "对不起，只允许上传 JPG, JPEG, PNG 和 GIF 文件。";
    exit;
  }

  // 将文件从临时文件夹移动到目标文件夹
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "文件已成功上传。";
  } else {
    echo "对不起，文件上传失败。";
  }
}
?>

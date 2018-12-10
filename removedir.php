<?php
$file ="./posts/2";
if (!is_dir($file)) {
   echo "Not Found";
}
else{
unlink($file);
}
?>
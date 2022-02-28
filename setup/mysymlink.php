<?php 
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public/images';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage/images';
symlink($targetFolder,$linkFolder);
echo 'Symlink completed';
?>
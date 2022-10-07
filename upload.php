<?php
require __DIR__ . '/vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
    $imagetypes = ['image/jpeg', 'image/png', 'image/gif','image/webp'];
if(isset($_POST['submit'])){
    $id = $_POST['student_id'];
    $file = $_FILES['file'];
    // var_dump($file);
    if(in_array($file['type'], $imagetypes)){    
    if(move_uploaded_file($file['tmp_name'], "assets/images/uploads/".$file['name'])){
        //$image = ImageManager::make("assets/images/uploads/".$file['name']);
        $img = Image::make('assets/images/uploads/'.$file['name']);

// now you are able to resize the instance
// resize the image to a width of 300 and constrain aspect ratio (auto height)
$img->resize(800, null, function ($constraint) {
    $constraint->aspectRatio();
});
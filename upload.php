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

// and insert a watermark for example
$img->insert('assets/images/logo.png','center');
// finally we save the image as a new file
$img->save('assets/images/uploads/'.$file['name'],60);
echo "File Uploaded Successfully";
echo "<br>";
echo "<img src='assets/images/uploads/".$file['name']."' alt='image'>";
    }
    
    }
    else{
        echo "File Type or size Not Supported";
    }
    //var_dump($file);

}
?>
<?php
/*
    if(in_array($file['type'], $imagetypes)){
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        $allowed = array('jpg','jpeg','png','gif','webp');
        if(in_array($file_ext, $allowed)){
            if($file_error === 0){
                if($file_size <= 2097152){
                    $file_name_new = $id.'.'.$file_ext;
                    $file_destination = 'uploads/'.$file_name_new;
                    if(move_uploaded_file($file_tmp, $file_destination)){
                        echo 'File Uploaded';
                    }else{
                        echo 'File Not Uploaded';
                    }
                }else{
                    echo 'File size is too big';
                }
            }else{
                echo 'There was an error uploading your file';
            }
        }else{
            echo 'You cannot upload files of this type';
        }
        */
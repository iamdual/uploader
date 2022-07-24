<?php
require __DIR__ . '/../src/Uploader.php';

use \iamdual\Uploader;

if (isset($_FILES["file"])) {

    $upload = new Uploader($_FILES["file"]);
    $upload->allowed_extensions(array("png", "jpg", "jpeg", "gif"));
    $upload->allowed_types(array("image/png", "image/jpeg", "image/gif")); // not recommended
    $upload->max_size(5); // in MB
    $upload->min_size(0); // in MB
    $upload->path("upload/files");
    $upload->encrypt_name();

    if (!$upload->upload()) {
        echo "Upload error: " . $upload->get_error();
    } else {
        echo "Upload successful: " . $upload->get_name();
    }

}
?>

<form enctype="multipart/form-data" action="" method="post">
    Select File: <input type="file" name="file"> <input type="submit" value="Upload">
</form>

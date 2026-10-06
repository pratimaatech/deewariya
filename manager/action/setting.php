
<?php

require_once "../models/commons.php";

$model = new Commons();

$param = $_POST;


// ======================================================
// BASIC DATA
// ======================================================

$feilds = [];
$feilds_valus = [];
$str = [];

$table = $param['table'] ?? '';


// ======================================================
// VALIDATE TABLE
// ======================================================

if (empty($table)) {
    die("Invalid table.");
}


// ======================================================
// NORMAL FIELDS
// ======================================================

if (!empty($param['feild']) && is_array($param['feild'])) {

    foreach ($param['feild'] as $key => $value) {

        $feilds[] = $key;

        $feilds_valus[] = $value;

        $str[] =
            "`{$key}` = '" .
            $model->mysql_real_escape_str($value) .
            "'";

    }

}


// ======================================================
// PHONE
// ======================================================

if (!empty($param['phone'])) {

    $phone = json_encode(
        array_values($param['phone'])
    );

    $feilds[] = 'phone';

    $feilds_valus[] = $phone;

    $str[] =
        "`phone` = '" .
        $model->mysql_real_escape_str($phone) .
        "'";

}


// ======================================================
// EMAIL
// ======================================================

if (!empty($param['email'])) {

    $email = json_encode(
        array_values($param['email'])
    );

    $feilds[] = 'email';

    $feilds_valus[] = $email;

    $str[] =
        "`email` = '" .
        $model->mysql_real_escape_str($email) .
        "'";

}


// ======================================================
// SOCIAL MEDIA
// ======================================================

if (!empty($param['social_media'])) {

    $social_media = json_encode(
        $param['social_media']
    );

    $feilds[] = 'social_media';

    $feilds_valus[] = $social_media;

    $str[] =
        "`social_media` = '" .
        $model->mysql_real_escape_str($social_media) .
        "'";

}


// ======================================================
// UPLOAD DIRECTORY
// ======================================================

$uploadDir = 
    dirname(__DIR__, 2) . 
    DIRECTORY_SEPARATOR . 
    'images' . 
    DIRECTORY_SEPARATOR . 
    $table . 
    DIRECTORY_SEPARATOR;


// Create directory if it doesn't exist

if (!is_dir($uploadDir)) {

    mkdir(
        $uploadDir,
        0777,
        true
    );

}


// ======================================================
// FUNCTION - UPLOAD IMAGE
// ======================================================

function uploadSettingImage(
    $file,
    $oldFile,
    $uploadDir,
    $type
) {

    // No file uploaded
    if (
        !isset($file) ||
        !isset($file['error']) ||
        $file['error'] === UPLOAD_ERR_NO_FILE
    ) {

        return $oldFile;

    }


    // Upload error
    if ($file['error'] !== UPLOAD_ERR_OK) {

        return $oldFile;

    }


    // Maximum file size: 5 MB

    if ($file['size'] > 5 * 1024 * 1024) {

        die(
            ucfirst($type) .
            " image is too large. Maximum size is 5 MB."
        );

    }


    // ==================================================
    // FILE EXTENSION
    // ==================================================

    $extension =
        strtolower(
            pathinfo(
                $file['name'],
                PATHINFO_EXTENSION
            )
        );


    // ==================================================
    // ALLOWED EXTENSIONS
    // ==================================================

    if ($type === 'favicon') {

        $allowedExtensions = [
            'ico',
            'png',
            'jpg',
            'jpeg',
            'webp'
        ];

    } else {

        $allowedExtensions = [
            'png',
            'jpg',
            'jpeg',
            'webp'
        ];

    }


    if (
        !in_array(
            $extension,
            $allowedExtensions,
            true
        )
    ) {

        die(
            "Invalid " .
            $type .
            " image type. Allowed: " .
            implode(
                ', ',
                $allowedExtensions
            )
        );

    }


    // ==================================================
    // MIME TYPE
    // ==================================================

    $finfo =
        finfo_open(FILEINFO_MIME_TYPE);

    $mime =
        finfo_file(
            $finfo,
            $file['tmp_name']
        );

    finfo_close($finfo);


    $allowedMimeTypes = [

        'image/jpeg',
        'image/png',
        'image/webp',
        'image/x-icon',
        'image/vnd.microsoft.icon'

    ];


    if (
        !in_array(
            $mime,
            $allowedMimeTypes,
            true
        )
    ) {

        die(
            "Invalid " .
            $type .
            " image MIME type."
        );

    }


    // ==================================================
    // NEW FILE NAME
    // ==================================================

    $newFileName =
        $type .
        '_' .
        date('YmdHis') .
        '_' .
        mt_rand(1000, 9999) .
        '.' .
        $extension;


    $destination =
        $uploadDir .
        $newFileName;


    // ==================================================
    // MOVE FILE
    // ==================================================

    if (
        !move_uploaded_file(
            $file['tmp_name'],
            $destination
        )
    ) {

        die(
            "Unable to upload " .
            $type .
            ". Please check folder permissions."
        );

    }

    // ==================================================
    // DELETE OLD FILE
    // ==================================================

    if (
        !empty($oldFile) &&
        $oldFile !== 'Not valid image type!'
    ) {

        $oldPath =
            $uploadDir .
            basename($oldFile);


        if (
            file_exists($oldPath)
        ) {

            @unlink($oldPath);

        }

    }


    return $newFileName;
}


// ======================================================
// LOGO UPLOAD
// ======================================================

$previousLogo =
    $param['prev_logo'] ?? '';


if (
    isset($_FILES['logo']) &&
    !empty($_FILES['logo']['name'])
) {

    $logoFile =
        uploadSettingImage(
            $_FILES['logo'],
            $previousLogo,
            $uploadDir,
            'logo'
        );


    $str[] =
        "`logo` = '" .
        $model->mysql_real_escape_str($logoFile) .
        "'";

}


// ======================================================
// REMOVE LOGO
// ======================================================

if (
    isset($param['isRemoveLogo'])
) {

    if (!empty($previousLogo)) {

        $oldLogoPath =
            $uploadDir .
            basename($previousLogo);

        if (
            file_exists($oldLogoPath)
        ) {

            @unlink($oldLogoPath);

        }

    }


    $str[] =
        "`logo` = ''";

}


// ======================================================
// FAVICON UPLOAD
// ======================================================

$previousFavicon =
    $param['prev_fav'] ?? '';


if (
    isset($_FILES['favicon']) &&
    !empty($_FILES['favicon']['name'])
) {

    $faviconFile =
        uploadSettingImage(
            $_FILES['favicon'],
            $previousFavicon,
            $uploadDir,
            'favicon'
        );


    $str[] =
        "`favicon` = '" .
        $model->mysql_real_escape_str($faviconFile) .
        "'";

}


// ======================================================
// REMOVE FAVICON
// ======================================================

if (
    isset($param['isRemoveFavicon'])
) {

    if (!empty($previousFavicon)) {

        $oldFaviconPath =
            $uploadDir .
            basename($previousFavicon);

        if (
            file_exists($oldFaviconPath)
        ) {

            @unlink($oldFaviconPath);

        }

    }


    $str[] =
        "`favicon` = ''";

}


// ======================================================
// UPDATE EXISTING RECORD
// ======================================================

if (
    isset($param['id']) &&
    $param['id'] != ''
) {

    if (
        $model->UPDATE(
            $table,
            $str,
            $param['id']
        )
    ) {

        $_SESSION['message'] =
            '<p class="mb-0">
                Information Updated ' .
            htmlspecialchars($table) .
            '!
            </p>';


        $model->redirect(
            BASE_URL .
            "?page=" .
            $table
        );

    } else {

        die(
            "Unable to update information."
        );

    }

}


// ======================================================
// INSERT NEW RECORD
// ======================================================

else {

    $id =
        $model->INSERT(
            $table,
            $feilds,
            $feilds_valus
        );


    $_SESSION['message'] =
        '<p class="mb-0">
            Information added into ' .
        htmlspecialchars($table) .
        '!
        </p>';


    $model->redirect(
        BASE_URL .
        "?page=" .
        $table
    );

}

?>


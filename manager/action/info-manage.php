<?php
require_once "../models/commons.php";
$model = new Commons();
$param = $_POST;

$feilds = [];
$feilds_valus = [];
$str = [];

$table = $param['table'];
$picon = null;

// ---------- Handle fields ----------
foreach ($param['fields'] as $key => $value) {
    // Agar value array hai to JSON encode kar do
    if (is_array($value)) {
        $value = json_encode($value, JSON_UNESCAPED_UNICODE);
                $value = $model->mysql_real_escape_str($value);

    } else {
        $value = $model->mysql_real_escape_str($value);
    }

    $feilds[] = $key;
    $feilds_valus[] = $value;
    $str[] = "`{$key}` = '{$value}'";
}

// ---------- Previous image ----------
if (isset($_POST['prev_image'])) {
    $picon = $_POST['prev_image'];
}

// ---------- Image upload ----------
if (isset($_FILES['image']) && $_FILES['image']['name'] != null) {
    $icon = $model->uploadFile($picon, $_FILES['image'], $table, $url);
    array_push($str, "`image` = '" . $model->mysql_real_escape_str($icon) . "'");
    array_push($feilds, "image");
    array_push($feilds_valus, $model->mysql_real_escape_str($icon));
}

// ---------- Remove Image ----------
if (isset($param['isRemoveImage'])) {
    $cont = new Config();
    $link = $cont->dirLink();
    $path = $link . "images/" . $table . "/";
    if (isset($param['prev_image'])) {
        @unlink($path . $param['prev_image']);
    }
    array_push($str, "`image` = ''");
}

// ---------- Author Image ----------
$prevAuthorImage = isset($_POST['prev_author_image']) ? $_POST['prev_author_image'] : '';
if (isset($_FILES['author_image']) && $_FILES['author_image']['name'] != "") {
    $newAuthorImage = time() . "-" . basename($_FILES['author_image']['name']);
    $target = "images/authors/" . $newAuthorImage;
    move_uploaded_file($_FILES['author_image']['tmp_name'], $target);

    array_push($str, "`author_image` = '" . $model->mysql_real_escape_str($newAuthorImage) . "'");
    array_push($feilds, "author_image");
    array_push($feilds_valus, $model->mysql_real_escape_str($newAuthorImage));
} else {
    if ($prevAuthorImage != "") {
        array_push($str, "`author_image` = '" . $model->mysql_real_escape_str($prevAuthorImage) . "'");
        array_push($feilds, "author_image");
        array_push($feilds_valus, $model->mysql_real_escape_str($prevAuthorImage));
    }
}

// ---------- Insert / Update ----------
if (isset($param['id']) && $param['id'] != null) {
    if ($model->UPDATE($table, $str, $param['id'])) {
        $_SESSION['message'] = '<p class="text-green mb-0">Information Updated ' . $table . '!</p>';
        $model->redirect(BASE_URL . "?page=" . $table);
    }
} else {
    $id = $model->INSERT($table, $feilds, $feilds_valus);
    $_SESSION['message'] = '<p class="text-green mb-0">Information added into ' . $table . '!</p>';
    $model->redirect(BASE_URL . "?page=" . $table);
}
?>
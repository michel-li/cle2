<?php
//Check if data is valid & generate error if not so
$errors = [];
//if ($behandeling_dame == "") {
//    $errors['behandeling_dame'] = 'kan niet leeg zijn';
//}
//if ($behandeling_heer == "") {
//    $errors['behandeling_heer'] = 'kan niet leeg zijn';
//}
//if ($behandeling_kind == "") {
//    $errors['behandeling_kind'] = 'kan niet leeg zijn';
//}
if ($date_day == "") {
    $errors['date'] = 'kan niet leeg zijn';
}
if ($time == "") {
    $errors['time'] = 'kan niet leeg zijn';
}
if ($email == "") {
    $errors['email'] = 'kan niet leeg zijn';
}
if ($phone == "") {
    $errors['phone'] = 'kan niet leeg zijn';
}
if ($agreed == "" || $agreed == "0") {
    $errors['agreed'] = 'aanvinken';
}
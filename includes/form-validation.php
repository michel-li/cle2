<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($behandeling_dame == "") {
    $errors['behandeling_dame'] = ''
}
<?php
$newCode = $_POST['newCode'] ?? '';
if (strlen($newCode) === 4 && ctype_digit($newCode)) {
    file_put_contents("code.txt", $newCode);
    echo "updated";
} else {
    echo "error";
}
?>

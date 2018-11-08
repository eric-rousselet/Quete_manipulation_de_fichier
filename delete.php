<?php
/**
 * Created by PhpStorm.
 * User: wilder21
 * Date: 08/11/18
 * Time: 14:12
 */

if (isset($_GET['del'])) {
    if (filetype($_GET['del'])=="dir") {
        rmdir($_GET['del']);
    }
    if (filetype($_GET['del'])=="file") {
        unlink($_GET['del']);
    }
    header('Location: index.php');
    exit();
}

<?php include('inc/head.php');
$path="files";
if (isset($_POST['content'])) {
    $file=$_POST['file'];
    $openFile=fopen($file, "w");
    fwrite($openFile, stripslashes($_POST['content']));
    fclose($openFile);
}
if (isset($_GET['f'])) {
    echo "<h2>".$_GET['f']."</h2>";
    if (is_dir($_GET['f'])) {
        $path = $_GET['f'];
    }
}
if (!isset($_GET['f']) || is_dir($_GET['f'])) {
    $folders = opendir($path);
    while ($fileName = readdir($folders)) {
        if ($fileName != "." && $fileName != "..") {
            echo '<div class="icons"><a href="?f=' . $path . "/" . $fileName . '"><img src="assets/images/x_files.jpg" /><br/>' . $fileName . '</a><br/><a href="delete.php?del=' . $path . "/" . $fileName . '">Supprimer</a></div>';
        }
    }
}
if(isset($_GET['f']) && !is_dir($_GET['f'])) {
    $content=file_get_contents($_GET['f']);
?>

<form method="post" action="index.php">
    <textarea name="content" class="fileEdit"><?php echo $content; ?></textarea>
    <input type="hidden" name="file" value="<?php echo $_GET['f'] ?>" />
    <input type="submit" value="Envoyer" />
</form>
<?php } ?>
<?php include('inc/foot.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Filemanager | ECWS</title>
  <style type="text/css">@import "<?php echo DEV ? 'pafm-files/style.css' : '?r=css';?>";
 body{
  background-color:lightgrey;
}
</style>
  <script type="text/javascript">var nonce = "<?php echo $_SESSION['nonce']; ?>";</script>
  <script src="<?php echo DEV ? 'pafm-files/js.js' : '?r=js';?>" type="text/javascript"></script>
</head>
<body>

<div id="header">
  <?php
    if (AUTHORIZE):
  ?>
  <a href="?do=logout&path=<?php echo $pathURL; ?>" title="logout" id="logout">logout</a>
  <?php
    endif;
  ?>
  <span class="pathCrumbs"><?php echo pathCrumbs(); ?>
    <span id="dir-count">
        folders: <?php echo $dirCount['folders']; ?> | files: <?php echo $dirCount['files']; ?>
    </span>
  </span>
</div>

<div id="dirList">
<ul id="info">
  <li>
    <span id="file">name</span>
    <span class="extension">extension</span>
    <span class="filemtime">last modified</span>
    <span class="mode">mode</span>
    <span class="fs">size</span>
    <span id="fileop">file operations</span>
  </li>
</ul>

<ul>
<?php getDirs($path);?>
</ul>

<ul>
<?php getFiles($path);?>
</ul>
</div>

<div id="add" class="b">
  <a href="#" title="Create File" onclick="fOp.create('file', '<?php echo $pathURL; ?>'); return false;"><img src="<?php echo DEV ? "pafm-files/" : "?r="?>images/addfile.gif" alt="Create File"></a>
  <a href="#" title="Create Folder" onclick="fOp.create('folder', '<?php echo $pathURL; ?>'); return false;"><img src="<?php echo DEV ? "pafm-files/" : "?r="?>images/addfolder.gif" alt="Create Folder"></a>
  <br>
  <a href="#" title="Remote Copy File" onclick="fOp.remoteCopy('<?php echo $pathURL; ?>'); return false;"><img src="<?php echo DEV ? "pafm-files/" : "?r="?>images/remotecopy.png" alt="Remote Copy"></a>
  <a href="#" title="Upload File" onclick="upload.init('<?php echo $pathURL; ?>', <?php echo $maxUpload; ?>); return false;"><img src="<?php echo DEV ? "pafm-files/" : "?r="?>images/upload.gif" alt="Upload File"></a>
  <br>
  <a href="#" title="Open Shell" onclick="shell.init('<?php echo @trim(shell_exec('whoami')); ?>', '<?php echo @trim(shell_exec('pwd')); ?>'); return false;"><img src="<?php echo DEV ? "pafm-files/" : "?r="?>images/terminal.png" alt="Terminal"></a>
</div>

<div id="footer">
  <p><?php echo $footer; ?></p>
  <?php
    if (PASSWORD == 'pass') echo '<span>We recommend you change your password.</span>';
    if (PASSWORD == 'password') echo '<span>We recommend you change your password.</span>';
    if (PASSWORD == 'admin') echo '<span>We recommend you change your password.</span>';
  ?>
</div>

</body>
</html>
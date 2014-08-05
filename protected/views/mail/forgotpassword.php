<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/5/14
 * Time: 6:56 PM
 */
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>RING PRO</h2><br />
<div>
    Please click this link to reset your password.
</div><br />
<?php $url = Yii::app()->createUrl('site/resetpassword',array('v'=>$_POST['validation_key'])); ?>
<a href='http://localhost/ring/site/resetPassword/?v=<?php echo $_POST['validation_key']; ?>'>
    http://localhost/ring/site/resetPassword/?v=<?php echo $_POST['validation_key']; ?>
</a>
<div>
</div>
</body>
</html>
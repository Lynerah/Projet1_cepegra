<?php if(MODE == 'dev'):?>
<section class="section debug">
<?php 
echo "session : <br>";
myPrint_r($_SESSION);
echo "GET : <br>";
myPrint_r($_GET);
echo "POST : <br>";
myPrint_r($_POST);
?>
</section>
<?php endif;?>
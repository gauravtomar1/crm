<?php
header('Content-type: text/xml');
?>
<Response>
    <Dial callerId="+13178848977"><?php echo $_POST['To']; ?></Dial>
</Response>
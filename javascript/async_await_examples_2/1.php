<?php
sleep(5);
echo json_encode(array('status'=>true, 'id'=>$_POST['id']));
exit;
?>
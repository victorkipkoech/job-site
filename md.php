<?php
$pass='123';
echo base64_encode(strrev(md5($pass)));

?>
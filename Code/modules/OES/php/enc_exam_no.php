<?php
//Encryption of exam password
//IMPORTANT!!!
$input = $_POST['exam_no'];

$encrypted = encryptIt( $input );
echo $encrypted;

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
?>
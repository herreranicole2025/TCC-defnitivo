<?php

$minhaSenha = "nicole2024";

//hash com sha1 
$hash = sha1($minhaSenha);
echo "<br> hash SHA1: $hash";

//hash com sha256 
$hash = hash(sha256 ,$minhaSenha);
echo "<br> hash SHA256: $hash";

//hash com D5M 
$hash = md5($minhaSenha);
echo "<br> hash MD5: $hash";


//hash com password hash 
$hash = password_hash($minhaSenha, PASSWORD_DEFAULT);
echo "<br> password hash: $hash";

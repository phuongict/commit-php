<?php
require_once('Git.php');

$repo = Git::open('/var/www/html/php/baitap1');  // -or- Git::create('/path/to/repo')

try{
$repo->run(' config  user.email "phamphuong.svit@gmail.com"'); 
$repo->run(' config  user.name "Pham Phuong"'); 
$repo->add('.');
$repo->commit('test commit git with php');
$repo->push('commitphp', 'master');
}
catch(exception $e){
	echo $e->getMessage();
}
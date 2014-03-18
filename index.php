<?
$length = 10;

if (!empty($_GET['length']))
	if ($_GET['length'] >= 10 && $_GET['length'] <= 20)
		$length = (int)$_GET['length'];

if (isset($_GET['json']))
	echo json_encode(array("password" => getPassword($length)));
else
	echo getPassword($length);

function getPassword($length = 10) {
	$chars1 = 'aeiouy';
	$chars2 = 'bcdfghklmnprstvz';
	
	$password = '';
	
	$bound = ceil($length/2.0);
	$half  = ceil($bound/2.0)-2;
	
	for ($i = 0; $i < $bound; $i++) {
		if (strlen($password) < $length)
			$password .= substr($chars2, mt_rand(0, strlen($chars2)-1), 1);
		
		if (strlen($password) < $length)
			$password .= substr($chars1, mt_rand(0, strlen($chars1)-1), 1);
		
		if ($i == $half)
			$password .= rand(10,99);
	}
	
	return $password;
}
?>
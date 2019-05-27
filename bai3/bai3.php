<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="POST" accept-charset="utf-8">
		<input type="text" name="text" value="<?php if(isset($_POST['text'])) echo $_POST['text']?>">
		<input type="submit" name="btntaomang" value="Tao Mang">
		<input type="submit" name="btnchiamang" value="Chia Mang">
	</form>

	<?php
		function random_string($lenght)
		{

			$string = 'abcdefghiklmnopqwzxbfty14256iuonag';
			$size = strlen($string);
			$str='';
			for($i = 0;$i < $lenght; $i ++)
			{
				$str .= $string[rand(0,$size-1)];
			}
			return $str;
		}

		function random_number($lenght)
		{
			$min_num = pow(10, $lenght - 1);
    		$max_num = pow(10, $lenght) - 1;

    		$number =rand($min_num,$max_num);
			return (int)$number;
		}

		if(isset($_POST['btntaomang']))
		{
			$count = $_POST['text'];
			
			if($count<=0)
				echo "Không tạo được mảng.";
			else{
				$arr = array();
				for ($i = 0; $i < $count ; $i ++) { 
					$check = rand(0,1);
					if($check == 0)
						$arr[$i] = random_string(ceil(rand($count/4, 3*$count/4)));
					else
						$arr[$i] = random_number(ceil(rand($count/4, 3*$count/4)));
				}
				echo "<pre>";
				var_dump($arr);	

				$_SESSION['mang'] = $arr;
				$_SESSION['text'] = $_POST['text'];

		 	 }
		}
		if(isset($_POST['btnchiamang']))	
		{
			$count = $_SESSION['text'];
			$chia = $_SESSION['mang'];
			$arr1 = array();
			$arr2 = array();
			$arr1 = array();
			for ($j=0; $j < $count; $j++) { 
				if(is_string($chia[$j]))
				{
					array_push($arr1, $chia[$j]);
				}
				else
				{
					array_push($arr2, $chia[$j]);
				}
			}
			echo "<pre>";
			var_dump($arr1);

			var_dump($arr2);
		}
	?>
</body>
</html>
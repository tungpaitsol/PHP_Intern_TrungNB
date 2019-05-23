<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bai 2</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="" method="POST" accept-charset="utf-8">
		<br>
		<input type="text" name="txta" value="<?php if(isset($_POST['txta'])) echo $_POST['txta']?>">
		<br><br>
		<input type="submit" name="btn" value="Submit">
	</form>

	<?php 
		function ktnt($b)
		{
			$n= $b/2;
			if($b<2)
			{
				return 0;
			}else{
				if($b==2)
					return 1;
			}
			for($i=2;$i<=$n;$i++)
			{
				if($b%$i == 0)
				{
					return 0;
				}
			}
			return 1;
		}
		if(isset($_POST['btn']))
		{

			$a = isset($_POST['txta']) ? $_POST['txta'] : '';
			$a = $_POST['txta'];
			
			if($a == '')
			{
				echo "Moi Ban Nhap data";
				exit();
			}

			$count = substr_count($a,',');
			if(strpos($a, ',') == true)
			{
				$aray = explode(',', $a);
				for ($e=0; $e <= $count; $e++) { 
					
					$arr = explode('-', $aray[$e]);
					if(!is_numeric($arr[0]) || !is_numeric($arr[1]))
						{
							echo "data sai";
							
						}
					for($j=$arr[0]; $j <=$arr[1] ; $j++)
					{
						if(ktnt($j))
						{
							$mang = array();
							array_push($mang, $j);
							$kq = array_unique($mang);
							foreach ($kq as $key => $value) {
								echo $value."<br>";

							}
						}
					}
				}
			}
			else{
				$arr = explode('-', $a);
				if(!is_numeric($arr[0]) || !is_numeric($arr[1]) )
				{
					echo "data sai";
				}
				else{
					if (!is_numeric($arr[0]) && !is_numeric($arr[1])) {
						echo "Data sai";
					}
						for($j=$arr[0]; $j <= $arr[1] ; $j++)
					{
						if(ktnt($j))
						{
							echo $j."<br>";
						}
					}
				}
			}
			
			
		}
		
	?>
</body>
</html>
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
	<style type="text/css" media="screen">
		table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
		h3{
			text-align: center;
			color: red;
		}
	</style>
</head>
<body>
	<form action="" method="POST" accept-charset="utf-8">
		<table style="margin: auto">
			<tr>
				<td colspan="3"><input type="text" name="txtnum" style="width: 98%" value="<?php if(isset($_POST['txtnum'])) echo $_POST['txtnum']?>"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" name="btntao"  value="Tao Mang"></td>
			</tr>
			<tr>
				<td><input type="submit" name="prgiam" value="Price Giam"></td>
				<td><input type="submit" name="prtang" value="Price Tang"></td>
				<td><input type="submit" name="odgiam" value="Order Giam"></td>
			</tr>
			<tr>
				<td><input type="submit" name="odtang" value="Order Tang"></td>
				<td><input type="submit" name="totalgiam" value="Total Giam"></td>
				<td><input type="submit" name="totaltang" style="width: 85px" value="Total Tang"></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<?php 
		$name = array("SP_01","SP_02","SP_03","SP_04","SP_05","SP_06","SP_07","SP_08","SP_09");

		if(isset($_POST["btntao"]))
		{	

			$number = isset($_POST['txtnum']) ? $_POST['txtnum'] : '';
			if($number == '')
			{
				echo "<h3>Moi Ban Nhap Data</h3>";
				exit();
			}
			else{
				if(!is_numeric($number))
				{
					echo "<h3>Data Phai La Number</h3>";
					exit();
				}
				$arr = array('id','name','price','quantity','order','Total');
			
				$arr2 = array();
				$v = 0;
				$bb = array();
				for ($i=0; $i < $number ; $i++) { 
					$arre = $name[rand(0,8)];
					$aa = array($i,$arre,rand(0,5),rand(3,10),rand(100,105));	
					$v = $aa[2]*$aa[4];	
					$aa[] = $v;
					$te  = array_combine($arr, $aa);
					array_push($arr2, $te );
				}			
				$_SESSION['mang'] = $arr2;
			}		
		}

		function sort_price_dsc($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['price'] > $array[$j]['price'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		function sort_price_dec($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['price'] < $array[$j]['price'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		function sort_order_dsc($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['order'] > $array[$j]['order'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		function sort_order_dec($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['order'] < $array[$j]['order'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		function sort_total_dsc($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['Total'] > $array[$j]['Total'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		function sort_total_dec($array) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i]['Total'] < $array[$j]['Total'])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}

		if(isset($_POST['prtang'])){
			$_SESSION['mang'] = sort_price_dsc($_SESSION['mang']);

		}

		if(isset($_POST['prgiam'])){
			$_SESSION['mang'] = sort_price_dec($_SESSION['mang']);

		}
		if(isset($_POST['odtang'])){
			$_SESSION['mang'] = sort_order_dsc($_SESSION['mang']);

		}
		if(isset($_POST['odgiam'])){
			$_SESSION['mang'] = sort_order_dec($_SESSION['mang']);

		}
		if(isset($_POST['totaltang'])){
			$_SESSION['mang'] = sort_total_dsc($_SESSION['mang']);

		}
		if(isset($_POST['totalgiam'])){
			$_SESSION['mang'] = sort_total_dec($_SESSION['mang']);

		}
	?>
	
	<form action="" method="get" accept-charset="utf-8">
		<table style="margin: auto">
			<caption>Danh Sách Sản Phẩm</caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Order</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION['mang'] as $value): ?>
					<tr>
						<td><?php echo $value['id']?></td>
						<td><?php echo $value['name']?></td>
						<td><?php echo $value['price']?></td>
						<td><?php echo $value['quantity']?></td>
						<td><?php echo $value['order']?></td>
						<td><?php echo $value['Total']?></td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</form>
	
</body>
</html>
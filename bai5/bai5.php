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
				<input type="text" name="txtnum" value="<?php if(isset($_POST['txtnum'])) echo $_POST['txtnum']?>">
				<input type="submit" name="btntao"  value="Tao Mang">
				<input type="submit" name="odtang" value="Order Tang">
		</table>
	</form>
	<br>
	<br>
	<?php 
		
		if(isset($_POST["btntao"]))
		{	
			$number = isset($_POST['txtnum']) ? $_POST['txtnum'] : '';
			if($number == '')
			{
				echo "<h3>Moi Ban Nhap Data</h3>";
				session_destroy();
				exit();
			}
			else{
				if(!is_numeric($number))
				{
					echo "<h3>Data Phai La Number</h3>";
					exit();
				}
							
				$_SESSION['mang'] = create_array($number);
				$_SESSION['number'] = $number;
			}		
		}
		function create_array($number)
		{
			$name = array("SP_01","SP_02","SP_03","SP_04","SP_05","SP_06","SP_07","SP_08","SP_09");
			$arr_key = array('id','name','price','quantity','order','Total');
			$arr_value = array();
			$total = 0;
			for ($i=0; $i < $number ; $i++) { 
					$rand_name = $name[rand(0,8)];
					$add_array = array($i,$rand_name,rand(100,1000),rand(10,20),rand(10,500));	
					$total = $add_array[2]*$add_array[4];	
					$add_array[] = $total;
					$array_combine  = array_combine($arr_key, $add_array);
					array_push($arr_value, $array_combine );
				}
			return $arr_value;
		}
		function sort_ASC($array,$string) : array
		{
			$tg =array();
			$count = count($array);
			for ($i = 0; $i < ($count-1); $i++) { 
				for ($j = ($i+1); $j < $count ; $j ++) { 
					if($array[$i][$string] > $array[$j][$string])
					{
						$tg = $array[$j];
						$array[$j] = $array[$i];
						$array[$i] = $tg;
					}
				}
			}
			return $array;
		}
		function order_ASC($number,$array1,$string1,$string2) : array
		{
			for ($i = 0; $i < $number; $i ++) { 
				for ($j = $i+1; $j < $number; $j ++) { 
					
					if($array1[$i][$string1] == $array1[$j][$string1] && $array1[$i][$string2] > $array1[$j][$string2])
					{
						$tg = $array1[$j];
						$array1[$j] = $array1[$i];
						$array1[$i] = $tg;
					}
					
				}	
			}
			$array1 = sort_ASC($array1,$string1);
			return $array1;
		}
		// function edit_order($number,$array1,$array2,$string1) : array
		// {
		// 	for ($i = 0; $i < $number; $i ++) { 
		// 		if($array1[$i][$string1] != $array2[$i])
		// 		{
		// 			$array1[$i][$string1] = $array2[$i];
		// 		}	
		// 	}
		// 	return $array1;
		// }
		if(isset($_POST['btnsave']))
		{
			//$_SESSION['mang'] = edit_order($_SESSION['number'],$_SESSION['mang'],$_POST['txtorder'],'order');	
			echo "<pre>";
			$arr = array('id','order');
			$newarr = array_chunk($_POST['txtorder'],1);
			$arr_one = array();
			$arr_two = array();
			$arr_three = array();
			foreach ($_SESSION['mang'] as $key => $value) {
				array_push($arr_three, $value['id']);
			}
			for ($i=0; $i < $_SESSION['number']; $i++) {
				array_unshift($newarr[$i], $arr_three[$i]);
				$arr_one = array_combine($arr, $newarr[$i]);
				array_push($arr_two, $arr_one);
			}
			for ($j=0; $j < $_SESSION['number']; $j++) {
				if($_SESSION['mang'][$j]['id'] == $arr_two[$j]['id'])
				{
					$_SESSION['mang'][$j]['order'] = $arr_two[$j]['order'];
				}	
			}
		}
		if(isset($_POST['odtang'])){
			$_SESSION['mang'] = order_ASC($_SESSION['number'],$_SESSION['mang'],'order','id');
		}
	?>	
	<form action="" method="POST" accept-charset="utf-8">
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
				<?php if(isset($_SESSION['mang'])) foreach($_SESSION['mang'] as $value): ?>
					<tr>
						<td><?php echo $value['id']?></td>
						<td><?php echo $value['name']?></td>
						<td><?php echo $value['price']?></td>
						<td><?php echo $value['quantity']?></td>
						<td><input id="<?php echo $value['id']?>" type="text" name="txtorder[]" value="<?php echo $value['order']?>">
						</td>
						
						<td><?php echo $value['Total']?></td>	
					</tr>
				<?php endforeach; ?>
					<tr>
						<td colspan="6"><input type="submit" style="width: 100px" name="btnsave" value="Save"></td>
					</tr>
			</tbody>
		</table>
	</form>
	<?php 
		
	?>
</body>
</html>
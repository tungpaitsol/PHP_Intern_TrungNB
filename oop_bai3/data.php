<?php
$Food = array(
	array(
		'code_food' => 'f001',
		'name' => 'vịt quay',
		'price' => 100000
	),
	array(
		'code_food' => 'f002',
		'name' => 'gà luộc',
		'price' => 2000
	),
	array(
		'code_food' => 'f003',
		'name' => 'mực khô',
		'price' => 50000
	)
);
$Drink = array(
	array(
		'code_drink' => 'd001',
		'name' => 'bia',
		'price' => 20000,
		'minus_money' => 0.4,
	),
	array(
		'code_drink' => 'd002',
		'name' => 'rượu',
		'price' => 30000,
		'minus_money' => 0.6
	),
	array(
		'code_drink' => 'd003',
		'name' => 'cam ép',
		'price' => 10000,
		'minus_money' => 1
	),
	array(
		'code_drink' => 'd004',
		'name' => 'cocacola',
		'price' => 30000,
		'minus_money' => 1
	)
);
$tables = [
	array(
		'code_table' => 't001',
	),
	array(
		'code_table' => 't002',
	),
	array(
		'code_table' => 't003',
	),
	array(
		'code_table' => 't004',
	)
];
$Employee = array(
	array(
		'code_Employee' => 'a001',
		'full_name' => 'Nguyen Van A',
		'age' => 20,
		'gender' => 0,
		'marital_status' => 0,
		'salary' => 0,
	),
	array(
		'code_Employee' => 'a002',
		'full_name' => 'Nguyen Thi B',
		'age' => 30,
		'gender' => 1,
		'marital_status' => 0,
		'salary' => 0,
	),
	array(
		'code_Employee' => 's002',
		'full_name' => 'Nguyen Ngoc T',
		'age' => 21,
		'gender' => 1,
		'marital_status' => 0,
		'salary' => 0,
	)
); 
$bill = array(
	array(
		'code_bill' => 'b001',
		'code_table' => 't001',
		'checkin_datetime' => 8,
		'checkout_datetime' => 13,
		'vat' => 10,
		'number_employee' => 0,
		'total' => 0,
	),
	array(
		'code_bill' => 'b002',
		'code_table' => 't002',
		'checkin_datetime' => 5,
		'checkout_datetime' => 12,
		'vat' => 10,
		'number_employee' => 0,
		'total' => 0,
	)
);
$billfoodDrink= array(
	array(
		'code' => 'bf001',
		'code_bill' => 'b001',
		'code_foodDrink' => 'f001',
		'quantity' => 2,
		'price' => 0,
		'minus_money' => 1
	),
	array(
		'code' => 'bf002',
		'code_bill' => 'b001',
		'code_foodDrink' => 'f002',
		'quantity' => 1,
		'price' => 0,
		'minus_money' => 1
	),
	array(
		'code' => 'bf003',
		'code_bill' => 'b002',
		'code_foodDrink' => 'd002',
		'quantity' => 2,
		'price' => 0,
		'minus_money' => 0.6
	),
	
);
$billEmployee = array(
	array(
		'code_billEmployee' => 1,
		'code_bill' => 'b001',
		'code_Employee' => 's002',
		'start_datetime' => 8,
		'end_datetime' => 12,
		'type' => 0,
		'money' => 0
	),
	array(
		'code_billEmployee' => 2,
		'code_bill' => 'b001',
		'code_Employee' => 'a002',
		'start_datetime' => 8,
		'end_datetime' => 9,
		'type' => 0,
		'money' => 0
	),
	array(
		'code_billEmployee' => 3,
		'code_bill' => 'b002',
		'code_Employee' => 'a001',
		'start_datetime' => 6,
		'end_datetime' => 10,
		'type' => 1,
		'money' => 0
	),
);
$money_Employees = array(
	1=>array(
		1=>100000, 
		2=>80000, 
		3=>50000
	),
	2=>array(
		1=>80000, 
		2=>60000, 
		3=>40000
	)
); 
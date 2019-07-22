<?php
require 'data.php';

/**
 * 
 */
class Food
{
	private $_code;
	private $_name;
	private $_price;

	function __construct($code,$name,$price)
	{
		$this->_code = $code;
		$this->_name = $name;
		$this->_price = $price;
	}

	public function setcode($code)
	{
		$this->_code = $code;
	}
	public function getcode()
	{
		return $this->_code;
	}
	public function setName($name)
	{
		$this->_name = $name;
	}
	public function getName()
	{
		return $this->_name;
	}
	public function setPrice($price)
	{
		$this->_price = $price;
	}
	public function getPrice()
	{
		return $this->_price;
	}
}

class Drink extends Food
{	
	private $_minusMoney;

	function __construct($code,$name,$price,$minusMoney)
	{
		parent::__construct($code,$name,$price);
		$this->_minusMoney = $minusMoney;

	}

	public function setminusMoney($minusMoney)
	{
		$this->_minusMoney = $minusMoney;
	}
	public function getminusMoney()
	{
		return $this->_minusMoney;
	}
}

class Employee
{
	private $_codeEmployee;
	private $_fullName;
	private $_age;
	private $_gender;
	private $_maritalStatus;
	private $_salary;

	public function __construct($codeemployee,$fullName,$age,$gender,$maritalStatus,$salary){
		$this->_codeEmployee = $codeemployee;
		$this->_fullName = $fullName;
		$this->_age = $age;
		$this->_gender = $gender;
		$this->_maritalStatus = $maritalStatus;
		$this->_salary = $salary;
	}
	public function setcode($codeemployee)
	{
		$this->_codeEmployee = $codeemployee;
	}
	public function getcode()
	{
		return $this->_codeEmployee;
	}
	public function setName($fullName)
	{
		$this->_fullName = $fullName;
	}
	public function getName()
	{
		return $this->_fullName;
	}
	public function setAge($age)
	{
		$this->_age = $age;
	}
	public function getAge()
	{
		return $this->_age;
	}
	public function setGender($gender)
	{
		$this->_gender = $gender;
	}
	public function getGender()
	{
		return $this->_gender;
	}
	public function setMarriage($maritalStatus)
	{
		$this->_maritalStatus = $maritalStatus;
	}
	public function getMarriage()
	{
		return $this->_maritalStatus;
	}
	public function setSalary($salary)
	{
		$this->_salary = $salary;
	}
	public function getSalary()
	{
		return $this->_salary;
	}
}

/**
 * 
 */
class Table
{
	private $_codeTable;

	function __construct($codetable)
	{
		$this->_codeTable = $codetable;
	}

	public function setcode($codetable)
	{
		$this->_codeTable = $codetable;
	}
	public function getcode()
	{
		return $this->_codeTable;
	}

}
/**
 * 
 */
class billfoodDrink 
{
	private $_code;
	private $_codeBill;
	private $_codefoodDrink;
	private $_quantity;
	private $_price;
	private $_minusMoney;

	function __construct($code,$codeBill,$codefoodDrink,$quantity,$price,$minusMoney)
	{
		$this->_code = $code;
		$this->_codeBill = $codeBill;
		$this->_codefoodDrink = $codefoodDrink;
		$this->_quantity = $quantity;
		$this->_price = $price;
		$this->_minusMoney = $minusMoney;
	}

	public function setCode($code)
	{
		$this->_code = $code;
	}
	public function getCode()
	{
		return $this->_code;
	}
	public function setcodeBill($codeBill)
	{
		$this->_codeBill = $codeBill;
	}
	public function getcodeBill()
	{
		return $this->_codeBill;
	}
	public function setcodefoodDrink($codefoodDrink)
	{
		$this->_codefoodDrink = $codefoodDrink;
	}
	public function getcodefoodDrink()
	{
		return $this->_codefoodDrink;
	}
	public function setQuantity($Quantity)
	{
		$this->_quantity = $Quantity;
	}
	public function getQuantity()
	{
		return $this->_quantity;
	}
	public function setPrice($Price)
	{
		$this->_price = $Price;
	}
	public function getPrice()
	{
		return $this->_price;
	}
	public function setminusMoney($minusMoney)
	{
		$this->_minusMoney = $minusMoney;
	}
	public function getminusMoney()
	{
		return $this->_minusMoney;
	}
}
/**
 * 
 */
class billEmployee
{
	private $_codebillEmployee;
	private $_codeBill;
	private $_codeEmployee;
	private $_startDatetime;
	private $_endDatetime;
	private $_type;
	private $_money;

	function __construct($codebillEmployee,$codeBill,$codeEmployee,$startDatetime,$endDatetime,$type,$money)
	{
		$this->_codebillEmployee = $codebillEmployee;
		$this->_codeBill = $codeBill;
		$this->_codeEmployee = $codeEmployee;
		$this->_startDatetime = $startDatetime;
		$this->_endDatetime = $endDatetime;
		$this->_type = $type;
		$this->_money = $money;	
	}
	public function setcodebillEmployee($codebillEmployee)
	{
		$this->_codebillEmployee = $codebillEmployee;
	}
	public function getcodebillEmployee()
	{
		return $this->_codebillEmployee;
	}
	public function setcodeBill($codeBill)
	{
		$this->_codeBill = $codeBill;
	}
	public function getcodeBill()
	{
		return $this->_codeBill;
	}
	public function setcodeEmployee($codeEmployee)
	{
		$this->_codeEmployee = $codeEmployee;
	}
	public function getcodeEmployee()
	{
		return $this->_codeEmployee;
	}
	public function setstartDatetime($startDatetime)
	{
		$this->_startDatetime = $startDatetime;
	}
	public function getstartDatetime()
	{
		return $this->_startDatetime;
	}
	public function setendDatetime($endDatetime)
	{
		$this->_endDatetime = $endDatetime;
	}
	public function getendDatetime()
	{
		return $this->_endDatetime;
	}
	public function setType($type)
	{
		$this->_type = $type;
	}
	public function getType()
	{
		return $this->_type;
	}
	public function setMoney($money)
	{
		$this->_money = $money;
	}
	public function getMoney()
	{
		return $this->_money;
	}

}
/**
 * 
 */
class Bill
{
	private $_codeBill;
	private $_codeTable;
	private $_checkinDatetime;
	private $_checkoutDatetime;
	private $_Vat;
	private $_numberEmployee;
	private $_Total;
	function __construct($codeBill,$codeTable,$checkinDatetime,$checkoutDatetime,$Vat,$numberEmployee,$total)
	{
		$this->_codeBill = $codeBill;
		$this->_codeTable = $codeTable;
		$this->_checkinDatetime = $checkinDatetime;
		$this->_checkoutDatetime = $checkoutDatetime;
		$this->_Vat = $Vat;
		$this->_numberEmployee = $numberEmployee;
		$this->_Total = $total;
	}

	public function setCodeBill($codeBill)
	{
		$this->_codeBill = $codeBill;
	}
	public function getCodeBill()
	{
		return $this->_codeBill;
	}
	public function setcodeTable($codeTable)
	{
		$this->_codeTable = $codeTable;
	}
	public function getcodeTable()
	{
		return $this->_codeTable;
	}
	public function setcheckinDatetime($checkinDatetime)
	{
		$this->_checkinDatetime = $checkinDatetime;
	}
	public function getcheckinDatetime()
	{
		return $this->_checkinDatetime;
	}
	public function setcheckoutDatetime($checkoutDatetime)
	{
		$this->_checkoutDatetime = $checkoutDatetime;
	}
	public function getcheckoutDatetime()
	{
		return $this->_checkoutDatetime;
	}
	public function setVat($vat)
	{
		$this->_Vat = $vat;
	}
	public function getVat()
	{
		return $this->_Vat;
	}
	public function setnumberEmployee($numberEmployee)
	{
		$this->_numberEmployee = $numberEmployee;
	}
	public function getnumberEmployee()
	{
		return $this->_numberEmployee;
	}
	public function setTotal($total)
	{
		$this->_Total = $total;
	}
	public function getTotal()
	{
		return $this->_Total;
	}

}
/**
 * 
 */
class Context 
{
	public static function setnumberEmployees($listBill,$billEmployees)
	{
		foreach ($listBill as $bill) {
			$numberEmployee = 0;
			foreach ($billEmployees as $billEmployee) {
				if($billEmployee->getcodeBill() == $bill->getCodeBill()){
					$numberEmployee ++;
				}
			}
			$bill->setnumberEmployee($numberEmployee);
		}
		return $listBill;
	}

	public static function totalFooddrink($listBill,$billEmployee)
	{
		foreach ($listBill as $bills) {
			$moneyFood = 0;
			foreach ($billEmployee as $billfoodDrinks) {
				
				if($bills->getCodeBill() == $billfoodDrinks->getCodeBill()){

					$moneyFood += $billfoodDrinks->getPrice()*$billfoodDrinks->getQuantity()*$billfoodDrinks->getminusMoney();		
				}
			}
			$list[$bills->getCodeBill()] = $moneyFood;		
		}
		return $list;
	}

	public static function totalEmployees($listBill,$billEmployee,$money_Employees)
	{
		foreach ($listBill as $bills) {
			$dateCheckInByBill = $bills->getcheckinDatetime();
			$dateCheckOutByBill = $bills->getcheckoutDatetime();

			$currentWorkingTime = 0;
			for ($i = $dateCheckInByBill; $i < $dateCheckOutByBill; $i++) {
				$contents = [];
				foreach ($billEmployee as $billEmployees) {
					if ($bills->getCodeBill() != $billEmployees->getCodeBill())
						continue;
					if ($billEmployees->getstartDatetime() <= $i && $billEmployees->getendDatetime() > $i) {
						$contents[] = array(
							'code_billEmployee' => $billEmployees->getcodebillEmployee(),
							'code_bill' => $bills->getCodeBill()
						);
					}
				}
				if (empty($contents))
					continue;
				$currentWorkingTime++;
				$currentMember = count($contents);
				$key = min($currentMember, count($money_Employees));
				$value = min($currentWorkingTime, count($money_Employees[1]));
				foreach ($billEmployee as $m=>$billEmployees) {
					foreach ($contents as $content) {
						if ($content['code_billEmployee'] != $billEmployees->getcodebillEmployee())
							continue;
						$serviceMoney = $billEmployees->getMoney();
						$billEmployees->setMoney($serviceMoney + $money_Employees[$key][$value]);
					}
				}
			}
		}
		foreach ($listBill as $key => $bills) {
			$totalemployee = 0;
			foreach ($billEmployee as  $billEmployees) {
				if($bills->getCodeBill() == $billEmployees->getCodeBill()){
					$totalemployee += $billEmployees->getMoney();
				}
			}
			$listTotalEmployee[$bills->getCodeBill()] = $totalemployee;
		}
		return $listTotalEmployee;
	}

	public static function setTotalBill($listBill,$listTotalFood,$listTotalEmployee)
	{
		foreach ($listBill as $bill) {
			foreach ($listTotalFood as $codebill => $food) {
				foreach ($listTotalEmployee as $employee) {
					if($bill->getCodeBill() == $codebill){
						$bill->setTotal(($listTotalFood[$codebill]+$listTotalEmployee[$codebill])*($bill->getVat()/100)+($listTotalFood[$codebill]+$listTotalEmployee[$codebill]));
					}
				}
			}
		}
		return $listBill;
	}
	public static function setsalaryEmployee($listEmployees,$listbillEmployees,$listBills)
	{
		foreach ($listEmployees as $employee) {
			foreach ($listbillEmployees as $billEmployee) {
				$moneyRose = $billEmployee->getMoney()*0.4;
				if($employee->getcode() != $billEmployee->getcodeEmployee())
					continue;
				foreach ($listBills as $bills) {
					if($bills->getCodeBill() == $billEmployee->getCodeBill()){
						if($billEmployee->getType() == 1){
							$moneyBill = $bills->getTotal()*0.015;
						}
						else{
							$moneyBill= $bills->getTotal()*0.01;
						}
					}

				}

				$employee->setSalary($moneyRose+$moneyBill);
			}

		}
		return $listEmployees;
	}
}

echo "<pre>";
foreach ($Food as $food) {
	$listFood [] = new Food($food['code_food'],$food['name'],$food['price']);
}
foreach ($Drink as $drink) {
	$listDrink [] = new Drink($drink['code_drink'],$drink['name'],$drink['price'],$drink['minus_money']);
}
foreach ($Employee as $employees) {
	$listEmployee []= new Employee($employees['code_Employee'],$employees['full_name'],$employees['age'],$employees['gender'],$employees['marital_status'],$employees['salary']);
}
foreach ($bill as $bills) {
	$listBill [] = new Bill($bills['code_bill'],$bills['code_table'],$bills['checkin_datetime'],$bills['checkout_datetime'],$bills['vat'],$bills['number_employee'],$bills['total']);
}
foreach ($billEmployee as $billEmployees) {
	$listbillEmployee [] = new billEmployee($billEmployees['code_billEmployee'],$billEmployees['code_bill'],$billEmployees['code_Employee'],$billEmployees['start_datetime'],$billEmployees['end_datetime'],$billEmployees['type'],$billEmployees['money']);
}
foreach ($billfoodDrink as $billfoodDrinks) {
	$listbillfoodDrink [] = new billfoodDrink($billfoodDrinks['code'],$billfoodDrinks['code_bill'],$billfoodDrinks['code_foodDrink'],$billfoodDrinks['quantity'],$billfoodDrinks['price'],$billfoodDrinks['minus_money']);
}

foreach ($listbillfoodDrink as  $foodDrink) {
	foreach ($listFood as $food) {
		if($foodDrink->getcodefoodDrink() == $food->getcode()){
			$foodDrink->setPrice($food->getPrice());
		}
	}
	foreach ($listDrink as $drink) {
		if($foodDrink->getcodefoodDrink() == $drink->getcode()){
			$foodDrink->setPrice($drink->getPrice());
		}
	}
}
echo "<br>";

Context::setnumberEmployees($listBill,$listbillEmployee);
$listBillEmployee = Context::totalEmployees($listBill,$listbillEmployee,$money_Employees);
$listBillFood = Context::totalFooddrink($listBill,$listbillfoodDrink);
$listBills = Context::setTotalBill($listBill,$listBillFood,$listBillEmployee);
Context::setsalaryEmployee($listEmployee,$listbillEmployee,$listBills);

foreach ($listBills as $bill) {
	echo "---------------------------------"."Bill:".$bill->getCodeBill()."------------------------------"."<br>";
	echo "------- DANH SÁCH ĐỒ ĂN -------: "."<br>";
	foreach ($listbillfoodDrink as  $billFoodDrink) {
		foreach ($listFood as $food) {

			if($bill->getcodeBill() == $billFoodDrink->getcodeBill()){
				if($billFoodDrink->getcodefoodDrink()  == $food->getcode()){
					echo "Tên :".$food->getName()." -- ";
					echo "Số Lượng: ".$billFoodDrink->getQuantity() ." -- ";
					echo "Đơn Giá: ".$food->getPrice()." -- ";
					echo "Phụ Phí: 0"." -- ";
					echo "Tổng Tiền: ".$billFoodDrink->getQuantity()*$food->getPrice()."<br>";
				}
			}	
		}

		foreach ($listDrink as $drink) {
			if($bill->getcodeBill() == $billFoodDrink->getcodeBill()){
				if($billFoodDrink->getcodefoodDrink() == $drink->getcode()){
					echo "Tên: ".$drink->getName()." -- ";
					echo "Số Lượng: ".$billFoodDrink->getQuantity()." -- ";
					echo "Đơn Giá: ".$billFoodDrink->getPrice()." -- ";
					echo "Phụ Phí: ".$drink->getminusMoney()." -- ";
					echo "Tổng Tiền: ".$billFoodDrink->getQuantity()*$drink->getPrice()."<br>";
				}
			}
		}
	}
	foreach ($listBillFood as $codebill => $billFood) {
		if($bill->getCodeBill() == $codebill){
			echo "- Tổng Tiền Ăn: ".$billFood."<br>";
		}
	}
	echo "------- DANH SÁCH NHÂN VIÊN ------:"."<br>";
	foreach ($listbillEmployee as $billemployee) {
		foreach ($listEmployee as  $employee) {
			if($bill->getcodeBill() == $billemployee->getcodeBill()){
				if($employee->getcode() == $billemployee->getcodeEmployee()){
					echo "Tên: ".$employee->getName()." -- ";
					echo "Giờ Vào: ".$billemployee->getstartDatetime()." -- ";
					echo "Giờ Ra: ".$billemployee->getendDatetime()." -- ";
					echo "Tổng Tiền: ".$billemployee->getMoney()."<br>";
				}
			}
		}
	}
	foreach ($listBillEmployee as $codebill => $billEmployee) {
		if($bill->getCodeBill() == $codebill){
			echo "- Tổng Tiền Gọi Nhân Viên: ".$billEmployee."<br>";
		}
	}
	echo "Thuế: ".$bill->getVat()." %"."<br>";
	echo "Tổng Hóa Đơn = ".$bill->getTotal();
	echo "<br><br>";
}

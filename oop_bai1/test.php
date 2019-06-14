<?php 
	require 'data.php';
 ?>
<?php 
	
	class Employee
	{	
		private $code;
		private $full_name;
		private $age;
		private $gender;
		private $marital_status;
		private $total_work_time;
		private $salary;
		private $workdays;
		private $start_work_time;
		private $work_hour;
		private $has_lunch_break;

		function __construct($code,$full_name,$age,$gender,$marital_status,$total_work_time,$salary,$workdays,$start_work_time,$work_hour,$has_lunch_break){
			$this->code = $code;
			$this->full_name = $full_name;
			$this->age = $age;
			$this->gender = $gender;
			$this->marital_status = $marital_status;
			$this->total_work_time = $total_work_time;
			$this->salary = $salary;
			$this->workdays = $workdays;
			$this->start_work_time = $start_work_time;
			$this->work_hour = $work_hour;
			$this->has_lunch_break = $has_lunch_break;
		}

		
		public function getCode()
		{
			return $this->code;
		}

		public function getName()
		{
			return $this->full_name;
		}

		public function getAge()
		{
			return $this->age;
		}

		public function getGender()
		{
			return $this->gender;
		}

		public function getMarriage()
		{
			return $this->marital_status;
		}
		public function getTotal_work_time()
		{
			return $this->total_work_time;
		}
		public function getSalary()
		{
			return $this->salary;
		}

		public function getWorkdays()
		{
			return $this->workdays;
		}
		public function getStart_work_time()
		{
			return $this->start_work_time;
		}

		public function getWork_hour()
		{
			return $this->work_hour;
		}

		public function getHas_lunch_break()
		{
			return $this->has_lunch_break;
		}
		
		public function create_arr($arr1,$arr2,$str1,$str2)
		{
			$cc = array(array(),array(),array());
			foreach ($arr1 as $k => $val) {
				foreach ($arr2 as $key => $value) {
					if($value[$str1] == $val[$str2])
					{
						array_push($cc[$k], $arr2[$key]);
					}
				}
			}
			return $cc;
		}

		public function workDay($type,$arr1,$arr2,$str1,$str2,$str3,$str4,$str5)
		{
			$array = array();
			if($type == 0)
			{
				foreach ($arr1 as  $val) {
					$total = 0;
					foreach ($arr2 as $k => $value) {
						foreach ($value as $key => $v) {
						$a = strtotime($arr1[$k][$str1]);
						$b = strtotime($value[$key][$str2]);
						
						$c = date('H:i:s',strtotime('+8 hour + 90 minutes',$a));

						$d = strtotime($value[$key][$str3]);
						if($value[$key][$str4] == $val[$str5])
						{
							
							if(date("H:i:s",$a) >= date("H:i:s",$b) && date("H:i:s",$d) >= $c)
							{
								$total = $total + 1;
							}
							else{
									$total = $total + 0.5;
								}
							}	
						}
					}
					array_push($array, $total);
				}
			}
			if($type == 1)
			{
				foreach ($arr1 as  $val) {
					$total = 0;
					foreach ($arr2 as $k => $value) {
						foreach ($value as $key => $v) {
						$a = strtotime($arr1[$k][$str1]);
						$b = strtotime($value[$key][$str2]);

						$c = date('H:i:s',strtotime('+8 hour',$a));

						$d = strtotime($value[$key][$str3]);

						if($value[$key][$str4] == $val[$str5])
						{
							
							if(date("H:i:s",$a) >= date("H:i:s",$b) && date("H:i:s",$d) >= $c)
							{
								$total = $total + 1;
							}
							else{
									$total = $total + 0.5;
								}
							}	
						}
					}
					array_push($array, $total);
				}
			}
			
			return $array;
		}

	}
	
	echo "<br>";

	foreach ($listMemberFullTime as $key => $value) {
			$m = new Employee($value['code'],$value['full_name'],$value['age'],$value['gender'],$value['marital_status'],$value['total_work_time'],$value['salary'],$value['workdays'],$value['start_work_time'],$value['work_hour'],$value['has_lunch_break']);
			
			$cc = Employee::workDay(0,$listMemberFullTime,$m->create_arr($listMemberFullTime,$listWorkTime,'member_code','code'),'start_work_time','start_datetime','end_datetime','member_code','code');

			$a = new Employee($value['code'],$value['full_name'],$value['age'],$value['gender'],$value['marital_status'],$value['total_work_time'],$value['salary'],$cc[$key],$value['start_work_time'],$value['work_hour'],$value['has_lunch_break']);
			$arr[]=$a;
			//print_r($a);
			
	}
	print_r($arr);

	echo "Nhan Vien Passtime"."<br>";

	foreach ($listMemberPartTime as $key => $value) {

			$m = new Employee($value['code'],$value['full_name'],$value['age'],$value['gender'],$value['marital_status'],$value['total_work_time'],$value['salary'],$value['workdays'],$value['start_work_time'],$value['work_hour'],$value['has_lunch_break']);

			$cc = $m->workDay(1,$listMemberPartTime,$m->create_arr($listMemberPartTime,$listWorkTime,'member_code','code'),'start_work_time','start_datetime','end_datetime','member_code','code');

			$a = new Employee($value['code'],$value['full_name'],$value['age'],$value['gender'],$value['marital_status'],$value['total_work_time'],$value['salary'],$cc[$key],$value['start_work_time'],$value['work_hour'],$value['has_lunch_break']);
			$arr[]=$a;
			//print_r($a);
		
			
	}
	print_r($arr);

	class listWorkTime
	{
		private $member_code;
		private $start_datetime;
		private $end_datetime;

		// function __construct($member_code,$start_datetime,$end_datetime)
		// {
		// 	$this->member_code = $member_code;
		// 	$this->start_datetime = $start_datetime;
		// 	$this->end_datetime = $end_datetime;
		// }

		public function getMember_code()
		{
			return $this->member_code;
		}
		public function getStart_datetime()
		{
			return $this->start_datetime;
		}
		public function getEnd_datetime()
		{
			return $this->end_datetime;
		}

	}


	// arr1 = listMemberFullTime, arr2 = cc, str1 = start_work_time, str2 = start_datetime,str3 = end_datetime,str4 = member_code,str5 = code
	
	
	// print_r($listWorkTime);
	echo "<br>";
	echo "<pre>";

	
	//print_r($cc);
	
	

	
	
?>
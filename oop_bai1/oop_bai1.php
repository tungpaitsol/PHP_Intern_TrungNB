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
	}
	
	echo "<br>";
	//print_r($listMemberFullTime);
	foreach ($listMemberFullTime as $key => $value) {
		$a = new Employee($value['code'],$value['full_name'],$value['age'],$value['gender'],$value['marital_status'],$value['total_work_time'],$value['salary'],$value['workdays'],$value['start_work_time'],$value['work_hour'],$value['has_lunch_break']);
		//print_r($a);
		echo $a->getName();
	}

	class listWorkTime
	{
		private $member_code;
		private $start_datetime;
		private $end_datetime;

		function __construct($member_code,$start_datetime,$end_datetime)
		{
			$this->member_code = $member_code;
			$this->start_datetime = $start_datetime;
			$this->end_datetime = $end_datetime;
		}

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

	// print_r($listWorkTime);
	$a = strtotime($listMemberFullTime[0]['start_work_time']);
	$b = strtotime($listWorkTime[0]['start_datetime']);

	echo "<br>";
	echo "<pre>";

	$cc = array(array(),array(),array());

	foreach ($listMemberFullTime as $k => $val) {
		foreach ($listWorkTime as $key => $value) {
			if($value['member_code'] == $val['code'])
			{
				array_push($cc[$k], $listWorkTime[$key]);

			}
		}
	}
	print_r($cc);
	
	foreach ($listMemberFullTime as $k => $val) {
		$total = 0;
		foreach ($cc as $k => $value) {
			foreach ($value as $key => $v) {
			$a = strtotime($listMemberFullTime[$k]['start_work_time']);
			$b = strtotime($value[$key]['start_datetime']);
			$c = date('H:i:s',strtotime('+8 hour + 90 minutes',$a));
			$d = strtotime($value[$key]['end_datetime']);

			if($value[$key]['member_code'] == $val['code'])
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
	echo $total;
	echo "<br>";
	}

	
	
?>
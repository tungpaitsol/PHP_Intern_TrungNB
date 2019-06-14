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


		public function setCode($code)
		{
			$this->code = $code;
		}
		public function getCode()
		{
			return $this->code;
		}

		public function setName($full_name)
		{
			$this->full_name = $full_name;
		}
		public function getName()
		{
			return $this->full_name;
		}

		public function setAge($age)
		{
			$this->age = $age;
		}
		public function getAge()
		{
			return $this->age;
		}

		public function setGender($gender)
		{
			$this->gender = $gender;
		}
		public function getGender()
		{
			return $this->gender;
		}

		public function setMarriage($marital_status)
		{
			$this->marital_status = $marital_status;
		}
		public function getMarriage()
		{
			return $this->marital_status;
		}

		public function setTotal_work_time($total_work_time)
		{
			$this->total_work_time = $total_work_time;
		}
		public function getTotal_work_time()
		{
			return $this->total_work_time;
		}

		public function setSalary($salary)
		{
			$this->salary = $salary;
		}
		public function getSalary()
		{
			return $this->salary;
		}

		public function setWorkdays($workdays)
		{
			$this->workdays = $workdays;
		}
		public function getWorkdays()
		{
			return $this->workdays;
		}

		public function setStart_work_time($start_work_time)
		{
			$this->start_work_time = $start_work_time;
		}
		public function getStart_work_time()
		{
			return $this->start_work_time;
		}

		public function setWork_hour($work_hour)
		{
			$this->work_hour = $work_hour;
		}
		public function getWork_hour()
		{
			return $this->work_hour;
		}

		public function setHas_lunch_break($has_lunch_break)
		{
			$this->has_lunch_break = $has_lunch_break;
		}
		public function getHas_lunch_break()
		{
			return $this->has_lunch_break;
		}

		public function getData($listMember)
		{
			foreach ($listMember as $key => $value) {

				$a = new Employee;
				
				$a->setCode($value['code']);
				$a->setName($value['full_name']);
				$a->setAge($value['age']);
				$a->setGender($value['gender']);
				$a->setMarriage($value['marital_status']);
				$a->setTotal_work_time($value['total_work_time']);
				$a->setSalary($value['salary']);
				$a->setWorkdays($value['workdays']);
				$a->setStart_work_time($value['start_work_time']);
				$a->setWork_hour($value['work_hour']);
				$a->setHas_lunch_break($value['work_hour']);
			
				$array[] = $a;
			}
			return $array;
		}

	}

	/**
	 * 
	 */
	class listWorkTime
	{
		private $member_code;
		private $start_datetime;
		private $end_datetime;

		public function setMember_code($member_code)
		{
			$this->member_code = $member_code;
		}
		public function getMember_code()
		{
			return $this->member_code;
		}

		public function setStart_datetime($start_datetime)
		{
			$this->start_datetime = $start_datetime;
		}
		public function getStart_datetime()
		{
			return $this->start_datetime;
		}

		public function setEnd_datetime($end_datetime)
		{
			$this->end_datetime = $end_datetime;
		}
		public function getEnd_datetime()
		{
			return $this->end_datetime;
		}
		
		public function getListTime($listTime)
		{
			foreach ($listTime as $key => $value) {
				$arrayList = new listWorkTime;

				$arrayList->setMember_code($value['member_code']);
				$arrayList->setStart_datetime($value['start_datetime']);
				$arrayList->setEnd_datetime($value['end_datetime']);
				
				$newListTime[] = $arrayList;
			}
			return $newListTime;
		}
		public function getWork_days($listMember,$newListTime,$type)
		{
			foreach ($listMember as $key => $value) {
				$total = 0;
				foreach ($newListTime as $k => $val) {
					$q = strtotime($value->getStart_work_time());
					$w = strtotime($val->getStart_datetime());
					$r = strtotime($val->getEnd_datetime());
					if($type == 0)
					{
						$e = date('H:i:s',strtotime('+8 hour + 90 minutes',$q));
					}
					if($type == 1){
						$e = date('H:i:s',strtotime('+8 hour',$q));
					}

					if ($value->getCode() == $val->getMember_code()) {

						if(date("H:i:s",$q) >= date("H:i:s",$w) || date("H:i:s",strtotime($e)) >= $r)
						{
							$total = $total + 1;
						}
						else{
							$total = $total + 0.5;
						}
					}
				}
				$value->setWorkdays($total);	
			}
		}
		
	}

	
	echo "<pre>";
	
	$MemberFull = Employee::getData($listMemberFullTime);
	$MemberPart = Employee::getData($listMemberPartTime);

	$array_ListWorktime = listWorkTime::getListTime($listWorkTime);

	listWorkTime::getWork_days($MemberFull,$array_ListWorktime,0);
	listWorkTime::getWork_days($MemberPart,$array_ListWorktime,1);


	print_r($MemberFull);
	print_r($MemberPart);
	
	
	
?>
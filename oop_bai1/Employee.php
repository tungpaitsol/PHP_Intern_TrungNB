<?php 
require 'data.php';


/**
 * Class Employee manage employee
 * Employee Fulltime (code, full name, age, gender, marital status, working time, salary, number of working days, time to register for work, number of hours worked, excluding lunch break)
 * Employee Parttime (code, full name, age, gender, marital status, working time, salary, number of working days, time to register for work, number of hours worked, excluding lunch break)
 */
class Employee
{	
	private $_code;
	private $_fullName;
	private $_age;
	private $_gender;
	private $_maritalStatus;
	private $_salary;
	private $_totalWorkTime;
	private $_workdays;
	private $_startWorkTime;
	private $_workHour;
	private $_hasLunchBreak;
	private $_TotalSalary;

	public function __construct($code,$fullName,$age,$gender,$maritalStatus,$salary,$totalWorktime,$workDays,$startWorktime,$workHour,$hasLunchbreak){
		$this->_code = $code;
		$this->_fullName = $fullName;
		$this->_age = $age;
		$this->_gender = $gender;
		$this->_maritalStatus = $maritalStatus;
		$this->_totalWorkTime = $totalWorktime;
		$this->_salary = $salary;
		$this->_workdays = $workDays;
		$this->_startWorkTime = $startWorktime;
		$this->_workHour = $workHour;
		$this->_hasLunchBreak = $hasLunchbreak;
		// $this->_TotalSalary = $totalSalary;
	}
	public function setCode($code)
	{
		$this->_code = $code;
	}
	public function getCode()
	{
		return $this->_code;
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
	public function setTotalWorkTime($totalWorktime)
	{
		$this->_totalWorkTime = $totalWorktime;
	}
	public function getTotalWorkTime()
	{
		return $this->_totalWorkTime;
	}
	public function setSalary($salary)
	{
		$this->_salary = $salary;
	}
	public function getSalary()
	{
		return $this->_salary;
	}
	public function setWorkdays($workDays)
	{
		$this->_workdays = $workDays;
	}
	public function getWorkdays()
	{
		return $this->_workdays;
	}
	public function setStartWorkTime($startWorktime)
	{
		$this->_startWorkTime = $startWorktime;
	}
	public function getStartWorkTime()
	{
		return $this->_startWorkTime;
	}
	public function setWorkHour($workHour)
	{
		$this->_workHour = $workHour;
	}
	public function getWorkHour()
	{
		return $this->_workHour;
	}
	public function setHasLunchBreak($hasLunchbreak)
	{
		$this->_hasLunchBreak = $hasLunchbreak;
	}
	public function getHaslunchbreak()
	{
		return $this->_hasLunchBreak;
	}
	public function setTotalSalary($totalSalary)
	{
		$this->_TotalSalary = $totalSalary;
	}
	public function getTotalSalary()
	{
		return $this->_TotalSalary;
	}
}

/**
 * Class manage the working time of each employee (_memberCode,_startDatetime,_endDatetime)
 */
class workTime
{
	private $_memberCode;
	private $_startDatetime;
	private $_endDatetime;
	
	public function __construct($memberCode,$startDatetime,$endDatetime){
		$this->_memberCode = $memberCode;
		$this->_startDatetime = $startDatetime;
		$this->_endDatetime = $endDatetime;
	}
	public function setMemberCode($memberCode)
	{
		$this->_memberCode = $memberCode;
	}
	public function getMemberCode()
	{
		return $this->_memberCode;
	}
	public function setStartDatetime($startDatetime)
	{
		$this->_startDatetime = $startDatetime;
	}
	public function getStartDatetime()
	{
		return $this->_startDatetime;
	}
	public function setEndDatetime($endDatetime)
	{
		$this->_endDatetime = $endDatetime;
	}
	public function getEndDatetime()
	{
		return $this->_endDatetime;
	}
	
}

/**
 * 
 */
class Intermediary
{
	// list of days of the year
	public static $listHolidays = [
		'2019-09-02',
		'2019-04-30',
		'2019-05-01',
		'2019-03-26',
		'2019-01-01',
		'2019-05-19'
	];

	/**
	 * [setWorkDay void]
	 * @param [object] $listEmployees  [object truyền vào Employee]
	 * @param [object] $newListTimes [object truyền vào là listWorkTime]
	 */
	public static function setWorkDay($listEmployees,$newListTimes)
	{
		foreach ($listEmployees as $employee) {
			$workDay = 0;
			foreach ($newListTimes as $listime) {
				if ($employee->getCode() !== $listime->getMemberCode()) 
					continue;
				$startTime = $employee->getStartWorkTime();
				$startDateWork = strtotime($listime->getStartDatetime());
				$endDateWork = strtotime($listime->getEndDatetime());
				if($employee->getHaslunchbreak())
				{
					$totalTimeWork = strtotime('+8 hour + 90 minutes',strtotime($startTime));
				}
				else{
					$totalTimeWork = strtotime('+8 hour',strtotime($startTime));
				}
				if($startTime >= date("H:i:s",$startDateWork) || date("H:i:s",$totalTimeWork) >= date("H:i:s",$endDateWork)){
					$workDay = $workDay + 1;
				}
				else{
					$workDay = $workDay + 0.5;
				}
			}
			$employee->setWorkdays($workDay);	
		}
	}

	/**
	 * [getDayMonth total number of days of the month]
	 * @param  [object] $listtime [object truyền vào là listWorkTime]
	 * @return [number]
	 */
	public static function getDayMonth($listtime)
	{
		$dayWordtime = strtotime($listtime[0]['start_datetime']);
		$month = date('m',$dayWordtime);
		$year = date('Y',$dayWordtime);
		$numberDayRest = 0;
		$dayOfMonth = date('t',strtotime($listtime[0]['start_datetime']));
		
		for ($i=1; $i <= $dayOfMonth; $i++) { 
			$Saturday = 'Sat';
			$Sunday  = 'Sun';

			$dayRest = $year.'-'.$month.'-'.$i;
			$checkDayRest = date('D',strtotime($dayRest));
			foreach (self::$listHolidays as $dayHoliday) {
				if((strtotime($dayHoliday) == strtotime($dayRest))){
					$numberDayRest++;
				}
			}
			if($checkDayRest == $Saturday || $checkDayRest == $Sunday){
				$numberDayRest++;
			}
		}
		return $dayOfMonth - $numberDayRest;
	}

	/**
	 * [totalSalarys Total salary of each employee]
	 * @param  [object] $listEmployees [object truyền vào là listWorkTime ]
	 * @param  [Int] $totalDay    [total day number of days to go to must work]
	 * @return [Void]              [Set value totalSalary of Employee]
	 */
	public static function totalSalarys($listEmployees,$totalDay)
	{
		foreach ($listEmployees as $employee) {
			$employee->setTotalSalary($employee->getSalary()*($employee->getWorkdays()/$totalDay)); 
		}
	}
}
foreach ($listMemberFullTime as $MemberFullTime) {
	$memberFulltimes[] = new Employee($MemberFullTime['code'],$MemberFullTime['full_name'],$MemberFullTime['age'],$MemberFullTime['gender'],$MemberFullTime['marital_status'],$MemberFullTime['salary'],$MemberFullTime['total_work_time'],$MemberFullTime['workdays'],$MemberFullTime['start_work_time'],$MemberFullTime['work_hour'],$MemberFullTime['has_lunch_break']); 
}
foreach ($listMemberPartTime as $MemberPartTime ) {
	$memberParttimes[] = new Employee($MemberPartTime ['code'],$MemberPartTime ['full_name'],$MemberPartTime ['age'],$MemberPartTime ['gender'],$MemberPartTime ['marital_status'],$MemberPartTime ['salary'],$MemberPartTime ['total_work_time'],$MemberPartTime ['workdays'],$MemberPartTime ['start_work_time'],$MemberPartTime ['work_hour'],$MemberPartTime ['has_lunch_break']);
}
foreach ($listWorkTime as $WorkTime) {
	$Timeworks[] = new workTime($WorkTime['member_code'],$WorkTime['start_datetime'],$WorkTime['end_datetime']); 
}
echo "<pre>";
Intermediary::setWorkDay($memberFulltimes,$Timeworks);
Intermediary::setWorkDay($memberParttimes,$Timeworks);

$workdayOfMonth = Intermediary::getDayMonth($listWorkTime);

Intermediary::totalSalarys($memberFulltimes,$workdayOfMonth);
Intermediary::totalSalarys($memberParttimes,$workdayOfMonth);

print_r($memberFulltimes);
print_r($memberParttimes);

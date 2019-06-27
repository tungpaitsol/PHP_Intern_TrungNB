<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.content{
			width: 540px;
			height: 620px;
			background: #63738a;
			margin: auto;
			position: relative;
		}
		.content .register{
			width: 400px;
			height: 520px;
			background: #f2f3f7;
			position:absolute;
			margin: 35px 70px;
		}
		p{
			text-align: center;
			margin-top: 578px;
    		margin-left: 145px;
    		position: absolute;
    		color: white;
		}
		.top{
			text-align: center;    
			margin-top: 30px;
		}
		hr{
			width: 90px;
			margin-top: 18px
		}
		span{
			color: black;
			font-size: 30px;
		}
		div{
			margin: 20px;
			color: #6E6E6E;
			position: relative;
		}
		input{
			height: 25px;
			margin-left: 12px;
		}
		.text{
			position: relative;

		}
		.text i{
			/* position: absolute; */
			padding-left: 12px;
		}
		.in{
			width: 334px;
		}
		strong{
			position: absolute;
			padding-top: 5px;
			padding-left: 17px;
		}
		.btn{
			background: #49a149;
		    width: 334px;
		    height: 40px;
		    color: white;
		    font-size: 15px;
		    border-radius: 5px;
		    border: 0px;
		}
		a{
			color: white;
		}
	</style>
</head>
<body>
	<form action="" method="get" accept-charset="utf-8">
		<a  href="index.php?language=vi" title="">Tiếng Việt</a>
		<br>
		<a  href="index.php?language=en" title="">English</a>
	</form>
</body>
</html>
<?php
	
	class Language 
	{
		private $_code;
		private $_value;

		public function __construct($code,$value)
		{
			$this->_code = $code;
			$this->_value = $value;
		}
		public function setCode($code)
		{
			$this->_code = $code;
		}
		public function getCode()
		{
			return $this->_code;
		}
		public function setValue($value)
		{
			$this->_value = $value;
		}
		public function getValue()
		{
			return $this->_value;
		}		
	}

	class ClassName 
	{
		public static function getText($lang)
		{
			$content = file($lang);
			foreach ($content as $text) {
				$cutString = explode("=", $text);
				$valueLanguage[] = str_replace(['"',"\n"],'', $cutString[1]);
				$keyLanguage[] = $cutString[0];
			}
			$language = array_combine($keyLanguage, $valueLanguage);
			return $language;
		}	
	}
	class Instance
	{
		private static $instance = null;
		public function getInstance($code,$name)
		{
			if(!self::$instance)
			{
				self::$instance = new Language($code,ClassName::getText($name));
			}
			return self::$instance;
		}
	}

	if(isset($_GET['language']))
	{

		$newInstance = new Instance;
		if($_GET['language'] == 'vi')
		{
			$code = 'vi';
			$name = 'vi.txt';
			$languages = $newInstance->getInstance($code,$name);
		}
		else{
			$name = 'en.txt';
			$code = 'en';
			$languages = $newInstance->getInstance($code,$name);
		}
	}
	
?>

<form id="display" method="get" accept-charset="utf-8">
	<div class="content">
		<div class="register">
			<div class="top">
				<hr style="float: left;margin-left: 30px;"> <span>Register</span> <hr style="width: 90px;float: right;margin-right: 30px;margin-top: 18px">
			</div>
			<div class="text">
				<i>Create your account. It's free and only take a minute</i>
			</div>
			<div class="input1">
				<input type="text" name="" value="" placeholder="<?php echo $languages->getValue()['firtname']?>">
				<input type="text" name="" value="" placeholder="<?php echo $languages->getValue()['lastname']?>">
			</div>
			<div>
				<input class="in" type="text" name="" value="" placeholder="<?php echo $languages->getValue()['name']?>">
			</div>
			<div>
				<input class="in" type="text" name="" value="" placeholder="<?php echo $languages->getValue()['email']?>">
			</div>
			<div>
				<input class="in" type="text" name="" value="" placeholder="<?php echo $languages->getValue()['password']?>">
			</div>
			<div>
				<input class="in" type="text" name="" value="" placeholder="<?php echo $languages->getValue()['confrim_password']?>">
			</div>
			<div>
				<input type="checkbox" name="" value=""> <strong>I accept the Terms of Use & Privacy Policy</strong>
			</div>
			<div>
				<input class="btn btn-success" type="button" name="" value="Register Now">
			</div>
		</div>
		<p>Already have an account? <a href="" title="">Sign in</a></p>
	</div></form>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Оформление кредита (физическое лицо)</title>
</head>
<body>
	<div class="wrapper">
<div class="passport">
	<a href="index.php"><div class="arrow"></div></a>
	<h1>Оформление кредита (физическое лицо)</h1>
</div>

<h2>Данные клиента</h2>
<form method="POST">
<input type="text" name="surname" placeholder="Фамилия">
<input type="text" name="name" placeholder="Имя">
<input type="text" name="patronymic" placeholder="Отчество">
<input type="text" name="inn" placeholder="ИНН">
<div class="text">Дата рождения</div>
<input type="date" name="date_of_birth"><br>
<h4>Паспортные данные</h4>
	<div class="passport">
<input type="text" name="passport_series" placeholder="Серия">
&ensp;
<input type="text" name="passport_number" placeholder="Номер">
	</div>
<div class="text">Дата выдачи</div>
<input type="date" name="passport_date_of_issue"><br>



<h2>Данные продукта</h2>
<div class="text">Дата открытия / закрытия</div>
	<div class="passport">
<input type="date" name="date_of_opening"> <span>/</span> <input type="date" name="date_of_closing"></div>
<input type="number" name="term" placeholder="Срок (в месяцах)">
<input type="number" name="sum" placeholder="Сумма"><br>
<input type="submit" name="submit">
</form>
<?php 

class Credit
{

	public function __construct() {
        $this->surname = isset($_POST['surname']) ? $_POST['surname'] : null;
        $this->name = isset($_POST['name']) ? $_POST['name'] : null;
        $this->patronymic = isset($_POST['patronymic']) ? $_POST['patronymic'] : null;
        $this->inn = isset($_POST['inn']) ? $_POST['inn'] : null;
        $this->date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : null;
        $this->passport_series = isset($_POST['passport_series']) ? $_POST['passport_series'] : null;
        $this->passport_number = isset($_POST['passport_number']) ? $_POST['passport_number'] : null;
        $this->passport_date_of_issue = isset($_POST['passport_date_of_issue']) ? $_POST['passport_date_of_issue'] : null;
        $this->date_of_opening = isset($_POST['date_of_opening']) ? $_POST['date_of_opening'] : null;
        $this->date_of_closing = isset($_POST['date_of_closing']) ? $_POST['date_of_closing'] : null;
        $this->term = isset($_POST['term']) ? $_POST['term'] : null;
        $this->sum = isset($_POST['sum']) ? $_POST['sum'] : null;
        $this->submit = isset($_POST['submit']) ? $_POST['submit'] : null;
    }

    public function individual_credit($surname,$name,$patronymic,$inn,$date_of_birth,
$passport_series,$passport_number,$passport_date_of_issue,$date_of_opening,$date_of_closing,$term,$sum){
    	$connect = new mysqli('localhost', 'root', '', 'registration_of_applications');
    	$str_insert_application = "INSERT INTO `credit(individual)` (`surname`, `name`, `patronymic`, `inn`, `date_of_birth`, `passport (series)`, `passport (number)`, `passport (date of issue)`, `date_of_opening`,`date_of_closing`, `term (month)`, `sum`) 
    		VALUES ('$surname', '$name', '$patronymic', '$inn', '$date_of_birth', '$passport_series', '$passport_number', '$passport_date_of_issue', '$date_of_opening','$date_of_closing', '$term', '$sum')";

    		$insert_application = $connect->query($str_insert_application);

    		if ($insert_application) {
    			header("Location: success.php");
    		}
    		else
    		{
    			echo "<div class='text'>Что-то пошло не так...Возможно, дело в том,<br> что вы вместо чисел вводите буквы/символы?<div>";
    		}
    	return $insert_application;
    }
}

$credit = new Credit;


if ($credit->submit) {
	if (empty($credit->surname) or empty($credit->name) or empty($credit->patronymic) or empty($credit->inn) or empty($credit->date_of_birth) or 
empty($credit->passport_series) or empty($credit->passport_number) or empty($credit->passport_date_of_issue) or empty($credit->date_of_opening) or empty($credit->date_of_closing) or empty($credit->term) or empty($credit->sum)){
		echo "<div class='text'><font color='red'>Заполните все поля</font></div>";
	
		}
	else{
	$credit->individual_credit($credit->surname,$credit->name,$credit->patronymic,$credit->inn,$credit->date_of_birth,
$credit->passport_series,$credit->passport_number,$credit->passport_date_of_issue,$credit->date_of_opening,$credit->date_of_closing,$credit->term,$credit->sum);
}
}

?>
	</div>
</body>
</html>
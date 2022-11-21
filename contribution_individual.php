<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Открытие вклада (физическое лицо)</title>
</head>
<body>
	<div class="wrapper">
		<div class="passport">
            <a href="index.php"><div class="arrow"></div></a>
			<h1>Открытие вклада (физическое лицо)</h1>
		</div>



<h2>Данные клиента</h2>
<form method="POST">
<input type="text" name="surname" placeholder="Фамилия">
<input type="text" name="name" placeholder="Имя">
<input type="text" name="patronymic" placeholder="Отчество">
<input type="text" name="inn" placeholder="ИНН">
<div class="text">Дата рождения</div>
<input type="date" name="date_of_birth">
<h4>Паспортные данные</h4>
	<div class="passport">
<input type="text" name="passport_series" placeholder="Серия">
&ensp;
<input type="text" name="passport_number" placeholder="Номер">
	</div>
<div class="text">Дата выдачи</div>
<input type="date" name="date_of_issue">



<h2>Данные продукта</h2>
<div class="text">Дата открытия / закрытия</div>
<div class="passport">
<input type="date" name="date_of_opening"> <span>/</span> <input type="date" name="date_of_closing"></div>
<input type="number" name="term" placeholder="Срок (в месяцах)">
<input type="number" name="bid" placeholder="Ставка (%)">
<select name="periodicity_of_capitalization">
	<option>Периодичность капитализации</option>
	<option>В конце срока</option>
	<option>Ежемесячно</option>
</select>

<input type="submit" name="submit">
</form>
<?php 

class Contribution
{

	public function __construct() {
        $this->surname = isset($_POST['surname']) ? $_POST['surname'] : null;
        $this->name = isset($_POST['name']) ? $_POST['name'] : null;
        $this->patronymic = isset($_POST['patronymic']) ? $_POST['patronymic'] : null;
        $this->inn = isset($_POST['inn']) ? $_POST['inn'] : null;
        $this->date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : null;
        $this->passport_series = isset($_POST['passport_series']) ? $_POST['passport_series'] : null;
        $this->passport_number = isset($_POST['passport_number']) ? $_POST['passport_number'] : null;
        $this->date_of_issue = isset($_POST['date_of_issue']) ? $_POST['date_of_issue'] : null;
        $this->date_of_opening = isset($_POST['date_of_opening']) ? $_POST['date_of_opening'] : null;
        $this->date_of_closing = isset($_POST['date_of_closing']) ? $_POST['date_of_closing'] : null;
        $this->term = isset($_POST['term']) ? $_POST['term'] : null;
        $this->bid = isset($_POST['bid']) ? $_POST['bid'] : null;
        $this->periodicity_of_capitalization = isset($_POST['periodicity_of_capitalization']) ? $_POST['periodicity_of_capitalization'] : null;
        $this->submit = isset($_POST['submit']) ? $_POST['submit'] : null;
        
    }

    public function individual_contribution($surname,$name,$patronymic,$inn,$date_of_birth,$passport_series,
$passport_number,$date_of_issue,$date_of_opening,$date_of_closing,$term,$bid,$periodicity_of_capitalization){
    	$connect = new mysqli('localhost', 'root', '', 'registration_of_applications');
    	$str_insert_application = "INSERT INTO `contribution(individual)`(`surname`, `name`, `patronymic`, `inn`, `date_of_birth`, `passport (series)`, `passport (number)`,`passport (date of issue)`, `date_of_opening`, `date_of_closing`, `term (month)`, `bid (%)`, `periodicity of capitalization`)
    	 VALUES ('$surname','$name','$patronymic','$inn','$date_of_birth','$passport_series', '$passport_number', '$date_of_issue','$date_of_opening','$date_of_closing','$term','$bid','$periodicity_of_capitalization')";

    		$insert_application = $connect->query($str_insert_application);

    		if ($insert_application) {
    			header("Location: success.php");
    		}
    		else
    		{
    			echo "<div class='text'>Что-то пошло не так...Возможно, дело в том,<br> что вы вместо чисел вводите буквы/символы?</div>";
    		}
    	return $insert_application;
    }
}



$contribution = new Contribution;

if ($contribution->submit) {
	if (empty($contribution->surname) or empty($contribution->name) or empty($contribution->patronymic) or empty($contribution->inn) or empty($contribution->date_of_birth) or empty($contribution->passport_series) or 
empty($contribution->passport_number) or empty($contribution->date_of_issue) or empty($contribution->date_of_opening) or empty($contribution->date_of_closing) or empty($contribution->term) or empty($contribution->bid) or empty($contribution->periodicity_of_capitalization)) {
		echo "<div class='text'><font color='red'>Заполните все поля</font></div>";
	}
	else{
	$contribution->individual_contribution($contribution->surname,$contribution->name,$contribution->patronymic,$contribution->inn,$contribution->date_of_birth,$contribution->passport_series,
$contribution->passport_number,$contribution->date_of_issue,$contribution->date_of_opening,$contribution->date_of_closing,$contribution->term,$contribution->bid,$contribution->periodicity_of_capitalization);
		}
}
?>
	</div>
</body>
</html>

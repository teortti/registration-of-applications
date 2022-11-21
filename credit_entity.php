<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Оформление кредита (юридическое лицо)</title>
</head>
<body>
    <div class="wrapper">
        <div class="passport">
            <a href="index.php"><div class="arrow"></div></a>
            <h1>Оформление кредита (юридическое лицо)</h1>
        </div>

<h2>Данные клиента</h2>
<form method="POST">
<div class="text">Данные руководителя</div>
<input type="text" name="surname" placeholder="Фамилия">
<input type="text" name="name" placeholder="Имя">
<input type="text" name="patronymic" placeholder="Отчество">
<input type="text" name="inn" placeholder="ИНН">
<div class="text">Данные организации</div>
<input type="text" name="org_name" placeholder="Наименование организации">
<input type="text" name="address" placeholder="Адрес">
<input type="text" name="orgn" placeholder="ОРГН">
<input type="text" name="org_inn" placeholder="ИНН орагнизации">
<input type="text" name="kpp" placeholder="КПП">


<h2>Данные продукта</h2>
<div class="text">Дата открытия / закрытия</div>
<div class="passport">
<input type="date" name="date_of_opening"> <span>/</span> <input type="date" name="date_of_closing"></div>
<input type="number" name="term" placeholder="Срок (в месяцах)">
<input type="number" name="sum" placeholder="Сумма">
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
        $this->org_name = isset($_POST['org_name']) ? $_POST['org_name'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->orgn = isset($_POST['orgn']) ? $_POST['orgn'] : null;
        $this->org_inn = isset($_POST['org_inn']) ? $_POST['org_inn'] : null;
        $this->kpp = isset($_POST['kpp']) ? $_POST['kpp'] : null;
        $this->date_of_opening = isset($_POST['date_of_opening']) ? $_POST['date_of_opening'] : null;
        $this->date_of_closing = isset($_POST['date_of_closing']) ? $_POST['date_of_closing'] : null;
        $this->term = isset($_POST['term']) ? $_POST['term'] : null;
        $this->sum = isset($_POST['sum']) ? $_POST['sum'] : null;
        
        $this->submit = isset($_POST['submit']) ? $_POST['submit'] : null;
    }

    public function entity_credit($surname,$name,$patronymic,$inn,$org_name,
$address,$orgn,$org_inn,$kpp,$date_of_opening,$date_of_closing,$term,$sum){
    	$connect = new mysqli('localhost', 'root', '', 'registration_of_applications');
    	$str_insert_application = "INSERT INTO `credit(entity)`(`surname`, `name`, `patronymic`, `inn`, `name_of_company`, `address`, `OGRN`, `inn(organization)`, `kpp`, `date_of_opening`, `date_of_closing`, `term(in_month)`, `sum`) 
        VALUES ('$surname','$name','$patronymic','$inn','$org_name','$address','$orgn','$org_inn','$kpp','$date_of_opening','$date_of_closing','$term','$sum')";

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



$credit = new Credit;

if ($credit->submit) {
    if (empty($credit->surname) or empty($credit->name) or empty($credit->patronymic) or empty($credit->inn) or empty($credit->org_name) or 
empty($credit->address) or empty($credit->orgn) or empty($credit->org_inn) or empty($credit->kpp) or empty($credit->date_of_opening) or empty($credit->date_of_closing) or empty($credit->term) or empty($credit->sum)) {
        echo "<div class='text'><font color='red'>Заполните все поля</font></div>";
    }
    else{
	$credit->entity_credit($credit->surname,$credit->name,$credit->patronymic,$credit->inn,$credit->org_name,
$credit->address,$credit->orgn,$credit->org_inn,$credit->kpp,$credit->date_of_opening,$credit->date_of_closing,$credit->term,$credit->sum);
}
}


?>
    </div>
</body>
</html>
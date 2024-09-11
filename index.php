<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заявка</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class="form-container">
    <h2>Заявка</h2>
    <form method="get">
        <input type="text" name="lastName" id="lastName" placeholder="Фамилия" required>
        <input type="text" name="firstName" id="firstName"  placeholder="Имя" required> 
        <input type="text" id="partName" id="partName" name="partName" placeholder="Отчество" required>
        <input type="date" id="dob" id="dob" name="dob" required>
        <input type="text" id="snils" id="snils" name="snils" placeholder="СНИЛС" required>
        <input type="text" id="inn" id="inn" name="inn" placeholder="ИНН" required>
        <input type="tel" id="phone" id="phone" name="phone" placeholder="Номер телефона" required>
        <input type="email" id="email" id="email" name="email" placeholder="Email" required>
        <textarea id="comment" id="comment" name="comment" placeholder="Комментарий" rows="4"></textarea>
        <input type="submit" id="otpravka" name="formSubmit" value="Отправить" >
    </form>
    </div>
<?php 
    
    if (isset($_GET['formSubmit'])) 
    {
        $mysqli = new mysqli("localhost", "root", "root", "forma");
        if ($mysqli->connect_errno) 
        {
            echo "Извините, возникла проблема на сайте";
            exit;
        }

        $lastName = $mysqli->real_escape_string($_GET['lastName']);
        $firstName = $mysqli->real_escape_string($_GET['firstName']);
        $partName = $mysqli->real_escape_string($_GET['partName']);
        $dob = $mysqli->real_escape_string($_GET['dob']);
        $snils = $mysqli->real_escape_string($_GET['snils']);
        $inn = $mysqli->real_escape_string($_GET['inn']);
        $phone = $mysqli->real_escape_string($_GET['phone']);
        $email = $mysqli->real_escape_string($_GET['email']);
        $comment = $mysqli->real_escape_string($_GET['comment']);

    // // Проверка на наличие только цифр
    if ($_GET['inn']!=[1,2,3,4,5,6,7,8,9,0])
    {
        exit;
    }

    // // Проверка длины ИНН (должно быть 10 или 12 цифр)
    // $len = strlen($inn);
    //     if ($len !== 10 && $len !== 12) {
    //     return false;
    // }

    // // Расчет контрольного числа
    // $check_digit = function($inn, $coefficients) {
    //     $n = 0;
    //     foreach ($coefficients as $i => $k) {
    //         $n += $k * (int) $inn{$i};
    //     }
    //     return $n % 11 % 10;
    // };
    // switch ($inn_length) {
    //     case 10:
    //         $n10 = $check_digit($inn, [2, 4, 10, 3, 5, 9, 4, 6, 8]);
    //         if ($n10 === (int) $inn{9}) {
    //             $result = true;
    //         }
    //         break;
    //     case 12:
    //         $n11 = $check_digit($inn, [7, 2, 4, 10, 3, 5, 9, 4, 6, 8]);
    //         $n12 = $check_digit($inn, [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8]);
    //         if (($n11 === (int) $inn{10}) && ($n12 === (int) $inn{11})) {
    //             $result = true;
    //         }
    //         break;
    //     }

    // // Проверка на наличие только цифр
    // if (!preg_match('/^\d+$/', $snils)) { 
    //     return false; 
    // }
    // // Проверка длины СНИЛСа (должно быть 11 цифр)
    // $len = strlen($snils);
    //     if ($len !== 11) {
    //     return false;
    // }

    // $sum = 0;
	// 		for ($i = 0; $i < 9; $i++) {
	// 			$sum += (int) $snils{$i} * (9 - $i);
	// 		}
	// 		$check_digit = 0;
	// 		if ($sum < 100) {
	// 			$check_digit = $sum;
	// 		} elseif ($sum > 101) {
	// 			$check_digit = $sum % 101;
	// 			if ($check_digit === 100) {
	// 				$check_digit = 0;
	// 			}
	// 		}
	// 		if ($check_digit === (int) substr($snils, -2)) {
	// 			$result = true;
	// 		// } else {
	// 		// 	$error_code = 4;
	// 		// 	$error_message = 'Неправильное контрольное число';
	// 		}

$query = "INSERT INTO user (lastName, firstName, partName, dob, snils, inn, phone, email, comment) VALUES ('$lastName', '$firstName', '$partName', '$dob', '$snils', '$inn', '$phone', '$email', '$comment')";
        
        if ($mysqli->query($query)) 
        {
            echo '' . '<br>';
        } 
        else
        {
            echo "Ошибка при выполнении запроса: " . $mysqli->error;
        }

        $mysqli->close();
    } 
?>
<script src="code.js"></script>
</body>
</html>

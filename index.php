<?php
//Настройки
//----------------------------------------------------------------------------------------------------------------
	ini_set('max_execution_time', 900); //Таймаут

	$confirmationToken = 'e2c3cbf7'; //подтверждение

   //Ключ доступа сообщества
   	$token = '130ec8fd49ee55fc7c69a0015f9677bb75180edd9ca6f9bd3703a141391b68a3e19cde596fae8fc72359d';
   
   //Secret key
   $secretKey = 'kostyapidor';
   //Версия апи
   $v = 5.103;

//----------------------------------------------------------------------------------------------------------------
   //Методы
	function Say ($array) { //Вывод сообщений
	   file_get_contents('https://api.vk.com/method/messages.send?' . $array = http_build_query($array));
	  }

	 function CreateTab ($mysqli){//Cоздание таблицы
	  		$mysqli->query("CREATE TABLE IF NOT EXISTS `dz` ( 
					`day` VarChar( 8 ) CHARACTER SET utf8 NOT NULL,
					`message` MediumText CHARACTER SET utf8 NOT NULL,
					`attachment` MediumText CHARACTER SET utf8 NULL,
					CONSTRAINT `unique_day` UNIQUE( `day` ) )");
	  }

	  function DateGenerate($text){
	  	//https://www.php.net/manual/ru/function.date.php
	  	//Получаешь дату, тебе нужно получить: день месяца, месяц, определить високосный ли год и денб недели
	  	//Дальше ты должен в каждой проверке сделать проверку на день недели и прибавить сколько-то чтобы получить дату нужного тебе дня, так же нужно проверять
	  	//сколько дней в месяце, вот тебе константы

	  	define(Jan ,31);    //1
    	define(Feb, 28);    //2
    	define(Mar, 31);    //3
	    define(Apr, 30);    //4
	    define(May, 31);    //5
	    define(Jun, 30);    //6
	    define(Jul, 31);    //7
	    define(Aug, 31);    //8
	    define(Sep, 30);    //9
	    define(Oct, 31);    //10
	    define(Nov, 30);    //11
	    define(Dec, 31);    //12
	    define(FebVesok, 29);

	    //Тебе нужно будет проверять каждый месяц в каждом дне, ну кроме завтра ты там просто прибавляешь +1 к текущему дню и проверяешь чтобы не выходило за лимит дней, и сегодня там ты просто форматируешь текущую дату в формат дд:мм:гг, else это значит написали рандомную хухню либо же дату если хочешь можешь сделать проверку но можешь просто записать 
			$dateValues = array(date("j"), date("N"), date("n"), date("y"), date("L"));
			$i = 0;
			$tempYear = $dateValues[3];
			$typeDate = true;

		  	if($text == "завтра"){
		  		$i = 1;

      		}elseif($text == "понедельник"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 7;
      					break;
      				
			      	case 2:
      					$i = 6;
      					break;

  					case 3:
      					$i = 5;
      					break;

  					case 4:
      					$i = 4;
      					break;

  					case 5:
      					$i = 3;
      					break;

  					case 6:
      					$i = 2;
      					break;

  					case 7:
      					$i = 1;
      					break;
      							}

      		}elseif($text == "вторник"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 1;
      					break;
      				
  				      case 2:
      					$i = 7;
      					break;

					case 3:
      					$i = 6;
      					break;

  					case 4:
      					$i = 5;
      					break;

  					case 5:
      					$i = 4;
      					break;

  					case 6:
      					$i = 3;
      					break;

  					case 7:
      					$i = 2;
      					break;
      							}

      		}elseif($text == "среду"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 2;
      					break;
      				
				      case 2:
      					$i = 1;
      					break;

  					case 3:
      					$i = 7;
      					break;

  					case 4:
      					$i = 6;
      					break;

  					case 5:
      					$i = 5;
      					break;

  					case 6:
      					$i = 4;
      					break;

  					case 7:
      					$i = 3;
      					break;
      							}
      			
      		}elseif($text == "четверг"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 3;
      					break;
      				
  				      case 2:
      					$i = 2;
      					break;

  					case 3:
      					$i = 1;
      					break;

  					case 4:
      					$i = 7;
      					break;

  					case 5:
      					$i = 6;
      					break;

  					case 6:
      					$i = 5;
      					break;

  					case 7:
      					$i = 4;
      					break;
      							}
      			
      		}elseif($text == "пятницу"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 4;
      					break;
      				
  				      case 2:
      					$i = 3;
      					break;

  					case 3:
      					$i = 2;
      					break;

  					case 4:
      					$i = 1;
      					break;

  					case 5:
      					$i = 7;
      					break;

  					case 6:
      					$i = 6;
      					break;

  					case 7:
      					$i = 5;
      					break;
      							}
      			
      		}elseif($text == "субботу"){
      			switch ($dateValues[1]) {
      				case 1:
      					$i = 5;
      					break;
      				
  				      case 2:
      					$i = 4;
      					break;

  					case 3:
      					$i = 3;
      					break;

  					case 4:
      					$i = 2;
      					break;

  					case 5:
      					$i = 1;
      					break;

  					case 6:
      					$i = 7;
      					break;

  					case 7:
      					$i = 6;
      					break;
      							}
      			
      		}elseif($text == "сегодня"){
      			$i = 0;

      		}else{
      			$typeDate = false;
      			$valueDate = explode(".", $text);
      			$temp = $valueDate[0];
      			$tempMount = $valueDate[1];
      			$tempYear = $valueDate[2];
      		} 


      		if($typeDate){
	      		$temp = $dateValues [0] + $i;
	      		$tempMount;
	      		switch ($dateValues [2]) {
	      			case 1:
	      				if($temp <= Jan){
	      					$tempMount=1;
	      				}else{
	      					$temp = $temp - Jan;
	      					$tempMount = 2;
	      				}
	      				break;

	      			case 2:
	      				if((($dateValues[3] + 2000) % 2 == 0) && (($dateValues[3] + 2000) % 100 != 0) || (($dateValues[3] + 2000) % 400 == 0))
	      					$dayFeb = FebVesok;
	      				else
	      					$dayFeb = Feb;

	      				if($temp <= $dayFeb){
	      					$tempMount=2;
	      				}else{
	      					$temp = $temp - $dayFeb;
	      					$tempMount = 3;
	      				}
	      				break;

					case 3:
	      				if($temp <= Mar){
	      					$tempMount=3;
	      				}else{
	      					$temp=$temp-Mar;
	      					$tempMount=4;
	      				}
	      				break;

					case 4:
	      				if($temp <= Apr){
	      					$tempMount=4;
	      				}else{
	      					$temp=$temp-Apr;
	      					$tempMount=5;
	      				}
	      				break;

					case 5:
	      				if($temp <= May){
	      					$tempMount=5;
	      				}else{
	      					$temp=$temp-May;
	      					$tempMount=6;
	      				}
	      				break;

					case 6:
	      				if($temp <= Jun){
	      					$tempMount=6;
	      				}else{
	      					$temp=$temp-Jun;
	      					$tempMount=7;
	      				}
	      				break;

					case 7:
	      				if($temp <= Jul){
	      					$tempMount=7;
	      				}else{
	      					$temp=$temp-Jul;
	      					$tempMount=8;
	      				}
	      				break;

					case 8:
	      				if($temp <= Aug){
	      					$tempMount=8;
	      				}else{
	      					$temp=$temp- Aug;
	      					$tempMount=9;
	      				}
	      				break;

	  				case 9:
	      				if($temp <= Sep){
	      					$tempMount=9;
	      				}else{
	      					$temp=$temp-Sep;
	      					$tempMount=9;
	      				}
	      				break;

	  				case 10:
	      				if($temp <= Oct){
	      					$tempMount=10;
	      				}else{
	      					$temp=$temp-Oct;
	      					$tempMount=11;
	      				}
	      				break;

	  				case 11:
	      				if($temp <= Nov){
	      					$tempMount=11;
	      				}else{
	      					$temp=$temp-Nov;
	      					$tempMount=12;
	      				}
	      				break;

	  				case 12:
	      				if($temp <= Dec){
	      					$tempMount=12;
	      				}else{
	      					$temp=$temp-Dec;
	      					$tempMount=1;
	      					$tempYear = $dateValues[3] + 1;
	      				}
	      				break;
	      			
	      		}
      		}

      		$day_write = $temp . "." . $tempMount . "." . $tempYear;

      		//Вот тебе пример как я делал почти такую же проверку но только на java https://github.com/kos234/Student-s-diary/blob/test/app/src/main/java/com/example/kos/DnewnikFragment.java начало на 1262 конец на 2512, да у тебя будет тут пизда коду но это нормально
      		//Дату нужно записать в переменную $data
      		return $day_write;
	  }
//----------------------------------------------------------------------------------------------------------------
//Начало работы

 if (!isset($_REQUEST)) //проверяем получили ли мы запрос
  return;

  	//Подключение к БД ---------------------------------------------------------------------------------------------------------
  $url=parse_url(getenv("CLEARDB_DATABASE_URL")); //Подключаемся к бд

   $server = $url["host"];
   $username = $url["user"];
   $password = $url["pass"];
   $db = substr($url["path"],1); //база данных
 // echo $server.' <- сервер '.$username.' <- имя пользователя '.$password.' <- пароль '.$db.' <- база данных'; //Если нужно узнать данные бд
   $mysqli = new mysqli($server, $username, $password,$db); //Подключаемся
   
  if ($mysqli->connect_error) {//проверка подключились ли мы
   die('Ошибка подключения (' . $mysqli->connect_errno . ') '. $mysqli->connect_error); //если нет выводим ошибку и выходим из кода
  }
   $mysqli->query("SET NAMES 'utf8'");//Устанавливаем кодировку 
//------------------------------------------------------------------------------------------------------------------------------------------------
  

   //Получаем и декодируем запрос
   $data = json_decode(file_get_contents('php://input'));

  //Проверяем secretKey
  if(strcmp($data->secret, $secretKey) !== 0 && strcmp($data->type, 'confirmation') !== 0)
  return;//Если не наш, выдаем ошибку серверу vk
	
	//Проверка события запроса
	switch ($data->type) {

    //Подтверждения адреса сервера
    case 'confirmation':
       //Отправляем код
       echo $confirmationToken;
       //Создаем таблицу 
       CreateTab($mysqli);
      break;

      //Новое сообщение
      case 'message_new':

      		//создаем  массив с сообщением
      		$request_params = array(
		      'message' => "" , //сообщение
		      'access_token' => $token, //токен для отправки от имени сообщества
		      'peer_id' => $data->object->message->peer_id, //айди чата
		      'random_id' => 0, //0 - не рассылка 
		      'read_state' => 1,
		      'user_ids' => 0, // Нет конкретного пользователя кому адресованно сообщение
		      'v' => $v, //Версия API Vk
		      'attachment' => '' //Вложение
		      );
      		
      		//Получаем текст сообщения и разбиваем его на массив слов
      		$text = explode(' ', $data->object->message->text);

      	//Проверяем массив слов
      	if(($text[0] == 'Запиши') || ($text[0] == 'запиши') && ($text[1] == 'на')){
      		if(isset($text[3]) && isset($text[2])){
	      		$date = DateGenerate($text[2]);

	      		$i = 3;
	      		while (isset($text[$i])) {
	      			$writeDz = $writeDz . " " . $text[$i];
	      			$i ++;
	      		}
	      		$l = 0;

	      		$attachmentDz = "";

	      		while (isset($data->object->message->attachments[$l])) {
	      			$attachmentsValues = $data->object->message->attachments[$l];

	      			 $access_key_value = json_decode(file_get_contents("https://api.vk.com/method/messages.getById?access_token=".$token."&message_ids=".$data->object->message->id."&preview_length=0&group_id=".$data->group_id."&v=".$v));

	      			if($attachmentsValues ->type == "photo" )
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->photo->owner_id . "_" . $attachmentsValues->photo->id . "_" . $access_key_value->response->items[0]->attachments[$l]->photo->access_key . ","; 
	      			elseif($attachmentsValues ->type == "audio")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->audio->owner_id . "_" . $attachmentsValues->audio->id . "_" . $access_key_value->response->items[0]->attachments[$l]->audio->access_key . ",";
      				elseif($attachmentsValues ->type == "video")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->video->owner_id . "_" . $attachmentsValues->video->id . "_" . $access_key_value->response->items[0]->attachments[$l]->video->access_key . ",";
	      			elseif($attachmentsValues ->type == "doc")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->doc->owner_id . "_" . $attachmentsValues->doc->id . "_" . $access_key_value->response->items[0]->attachments[$l]->doc->access_key . ",";
	      		
	      			$l ++;
	      		}
	      	
	      		$attachmentDz = substr($attachmentDz,0, -1);
	      		$mysqli->query("INSERT INTO `dz` (`day`,`message`,`attachment`) VALUES ('$date' , '$writeDz' , '$attachmentDz')
	      		 ON DUPLICATE KEY UPDATE `day` = '$date', `message` = '$writeDz', `attachment` = '$attachmentDz'");


	      		$request_params['message'] = "Записано на " . $text[2] . ": " . $writeDz;
	      		$request_params['attachment'] = $attachmentDz;
      		}else $request_params['message'] = "Не написано домашнее задание или не указана дата!";
      	}
      	elseif (($text[0] == 'Покажи') || ($text[0] == 'покажи') && ($text[1] == 'на')){
      		if(isset($text[2])){

			$date = DateGenerate($text[2]);

			$result_set = $mysqli->query("SELECT * FROM `dz` WHERE `day` = '$date'");
			$data = $result_set->fetch_assoc();


      		
      		$request_params['message'] = "Домашнее задание на " . $text[2] .": " . $data["message"];
      		$request_params['attachment'] = $data["attachment"];
      	}
      	else $request_params['message'] = "Не написана дата или день!";
      	}elseif(($text[0] == 'Добавь' || $text[0] == 'добавь') && ($text[1] == 'на')){
      		if(isset($text[3]) && isset($text[2])){
			$date = DateGenerate($text[2]);
			$result_set = $mysqli->query("SELECT * FROM `dz` WHERE `day` = '$date'");
			$data = $result_set->fetch_assoc();

			$i = 3;
			$writeDz = $data['message'];
	      		while (isset($text[$i])) {
	      			$writeDz = $writeDz . " " . $text[$i];
	      			$i ++;
	      		}


			$mysqli->query("INSERT INTO `dz` (`day`,`message`,`attachment`) VALUES ('$date' , '$writeDz' , '$attachmentDz')
	      		 ON DUPLICATE KEY UPDATE `day` = '$date', `message` = '$writeDz', `attachment` = '$attachmentDz'");

			$l = 0;

	      		$attachmentDz = $data['attachment'];

	      		while (isset($data->object->message->attachments[$l])) {
	      			$attachmentsValues = $data->object->message->attachments[$l];
	      			if($attachmentsValues ->type == "photo" )
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->photo->owner_id . "_" . $attachmentsValues->photo->id . "_" . $attachmentsValues->photo->access_key . ","; 
	      			elseif($attachmentsValues ->type == "audio")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->audio->owner_id . "_" . $attachmentsValues->audio->id . "_" . $attachmentsValues->audio->access_key . ",";
      				elseif($attachmentsValues ->type == "video")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->video->owner_id . "_" . $attachmentsValues->video->id . "_" . $attachmentsValues->video->access_key . ",";  
	      			elseif($attachmentsValues ->type == "doc")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->doc->owner_id . "_" . $attachmentsValues->doc->id . "_" . $attachmentsValues->doc->access_key . ",";
	      			elseif($attachmentsValues ->type == "graffiti")
	      				$attachmentDz = $attachmentDz . $attachmentsValues->type . $attachmentsValues->graffiti->owner_id . "_" . $attachmentsValues->graffiti->id . "_" . $attachmentsValues->graffiti->access_key . ",";
	      			$l ++;
	      		}
	      	
	      		$attachmentDz = substr($attachmentDz,0, -1);

      		$request_params['message'] = "Обновленно";
      		$request_params['attachment'] = $attachmentDz;
      		}else $request_params['message'] = "Не написано домашнее задание или не указана дата!";
      	}elseif(($text[0] == 'Создать') || ($text[0] == 'создать') && ($text[0] == 'таблицу')){
      		CreateTab($mysqli);
      		$request_params['message'] = "Таблица успешно создана";
      		}
      		file_get_contents('https://api.vk.com/method/messages.send?' . $request_params = http_build_query($request_params));
 
      		exit('ok');
      		die('ok');
      		break;
  }


  	
  	$mysqli->close();  
?>

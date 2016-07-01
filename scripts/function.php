<?php
/**
 *  Функция для получения перечня производителей автомобилей
 */
function getProducers() {
	
	// Подключаемся к СУБД MySQL
	connect();
	
	// Выбираем всех производителей из таблицы
	$sql = "SELECT * FROM marka ORDER BY mark";
	
	// Выполняем запрос
	$query = mysql_query( $sql ) or die ( mysql_error() );
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();
	
	// Инициализируем счетчик
	$i = 0;
	
	while ( $row = mysql_fetch_assoc( $query ) ) {
		
		$array[ $i ][ 'id' ] = $row[ 'id' ];				// Идентификатор производителя
		$array[ $i ][ 'mark' ] = $row[ 'mark' ];	        // Имя производителя
		
		// После каждой итерации цикла увеличиваем счетчик
		$i++;
		
	}
	
	// Возвращаем вызову функции массив с данными
	return $array;
	
}

// Функция, которая выбирает модели автомодилей по переданному
// ей идентификатору производителя
function getModels( array $array ) {
	
	// Сохраняем идентификатор производителя из переданного массива
	$sProducerId = htmlspecialchars( trim ( $array[ 'producer_id' ] ) );
    
	// Подключаемся к MySQL
	connect();
	
	// Строка запроса из базы данных
	$sql = "SELECT mark_id, model FROM model WHERE mark_id = '" . $sProducerId . "' ORDER BY model";
	
	// Выполняем запрос
	$query = mysql_query( $sql ) or die ( mysql_error() );
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();
	
	// Инициализируем счетчик
	$i = 0;
	
	while ( $row = mysql_fetch_assoc( $query ) ) {
		
		$array[ $i ][ 'mark_id' ] = $row[ 'mark_id' ];		// Идентификатор модели
		$array[ $i ][ 'model' ] = $row[ 'model' ];	// Наименование модели
		
		// После каждой итерации цикла увеличиваем счетчик
		$i++;
		
	}
	
	// Возвращаем вызову функции массив с данными
	return $array;
	
}


// Функция, которая выбирает модели автомодилей по переданному
// ей идентификатору производителя
function getTable( array $array ) {
	
	// Сохраняем идентификатор производителя из переданного массива
	$mark = htmlspecialchars( trim ( $array[ 'mark' ] ) );
	$model = htmlspecialchars( trim ( $array[ 'model' ] ) );
	$type = htmlspecialchars( trim ( $array[ 'type' ] ) );
    
	// Подключаемся к MySQL
	connect();
	
	// Строка запроса из базы данных
	$sql = "SELECT Mark, Class, Number_kitl, Mark_origin, Number_origin, Name 
            FROM pads 
            WHERE name LIKE '%" . $mark . "%' 
              AND name LIKE '%" . $model . "%'
              AND Class ='" . $type . "'"; 
	
	// Выполняем запрос
	$query = mysql_query( $sql ) or die ( mysql_error() );
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();
	
	// Инициализируем счетчик
	$i = 0;
	
	while ( $row = mysql_fetch_assoc( $query ) ) {
		
		$array[ $i ][ 'Mark' ] = $row[ 'Mark' ];		
		$array[ $i ][ 'Class' ] = $row[ 'Class' ];	
		$array[ $i ][ 'Number_kitl' ] = $row[ 'Number_kitl' ];		
		$array[ $i ][ 'Mark_origin' ] = $row[ 'Mark_origin' ];	
		$array[ $i ][ 'Number_origin' ] = $row[ 'Number_origin' ];
		$array[ $i ][ 'Name' ] =  str_replace(',' , ', ', $row[ 'Name' ] );
		
		// После каждой итерации цикла увеличиваем счетчик
		$i++;
		
	}
	
	// Возвращаем вызову функции массив с данными
	return $array;
	
}

// Функция, которая выбирает модели автомодилей по переданному
// ей идентификатору производителя
function getCodeTable( array $array ) {
	
	// Сохраняем идентификатор производителя из переданного массива
	$code = htmlspecialchars( trim ( $array[ 'code' ] ) );
    
	// Подключаемся к MySQL
	connect();
	
	// Строка запроса из базы данных
	$sql = "SELECT Mark, Class, Number_kitl, Mark_origin, Number_origin, Name 
            FROM pads 
            WHERE Number_kitl   ='" . $code . "' 
              OR Number_origin = '" . $code . "'"; 
	
	// Выполняем запрос
	$query = mysql_query( $sql ) or die ( mysql_error() );
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();
	
	// Инициализируем счетчик
	$i = 0;
	
	while ( $row = mysql_fetch_assoc( $query ) ) {
		
		$array[ $i ][ 'Mark' ] = $row[ 'Mark' ];		
		$array[ $i ][ 'Class' ] = $row[ 'Class' ];	
		$array[ $i ][ 'Number_kitl' ] = $row[ 'Number_kitl' ];		
		$array[ $i ][ 'Mark_origin' ] = $row[ 'Mark_origin' ];	
		$array[ $i ][ 'Number_origin' ] =  $row[ 'Number_origin' ];
		$array[ $i ][ 'Name' ] =  str_replace(',' , ', ', $row[ 'Name' ] );
		
		// После каждой итерации цикла увеличиваем счетчик
		$i++;
		
	}
	
	// Возвращаем вызову функции массив с данными
	return $array;
	
}
?>
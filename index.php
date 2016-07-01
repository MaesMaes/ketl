    <?php
// Подключаем файл для соединения с СУБД MySQL
require_once( 'scripts/database.php' );
// Подключаем файл, в котором будем объявлять пользовательские функции
require_once( 'scripts/function.php' );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Кетл</title>
    <link rel="stylesheet" href="stylesheet/style_i.css">
    <script src="scripts/jquery-2.2.0.min.js" language="javascript"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/scripts.js"></script>
</head>
<body>
    <header class="head">
        <div class="container">
            <div class="search">
                 <p>Введите код колодки</p>
                 <input placeholder="Пример: 1515KT" type="text" name="code" id="code">
                 <div class="show_code">Показать</div>
            </div>
            <br/><br/><br/>
            <h1> </h1>
            <form name="car_producers" id="car_producers" >
                <div class="row">
                    <label for="type">Класс:</label>
                    <select id="type">
                        <option value="легковой">Легковой</option>
                        <option value="коммерческий">Коммерческий</option>
                    </select>
                </div>
                <div class="row">
                    <label for="producer">Марка:</label>
                    <select id="producer">
                        <option value="0">Выберите из списка</option>
                        <?php					
                        $aProducers = getProducers();
                        foreach ( $aProducers as $aProducer ) {
                            print '<option value="' . $aProducer[ 'id' ] . '">' . $aProducer[ 'mark' ] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <label for="model">Модель:</label>
                    <select id="model" disabled >
                        <option value="0">Выберите из списка</option>
                    </select>
                </div>
		    </form>
           
            <div class="show_pads">Показать</div>
            <table class="pads_tab">
                <thead>
                    <tr>
                        <td>Производитель</td>
                        <td>Номер по Кетл</td>
                        <td>Оригинал</td>
                        <td>Номер оригинала</td>
                        <td>Описание</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="no">По вашему запросу ничего не найдено</div>
        </div>
    </header>
</body>
</html>

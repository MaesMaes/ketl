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
    <link rel="stylesheet" href="stylesheet/pads.min.css">
</head>
<body>
    <header class="head">
        <div class="container">
            <div class="block_search">
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
                <div class="clear"></div>
            </div>
            <div class="pads_tab"></div>
            <div class="no">По вашему запросу ничего не найдено</div>
        </div>
    </header>

    <!-- BEGIN: Underscore Template Definition. -->
    <script type="text/template" class="template">
        <% _.each( rc.listItems, function( listItem ){ %>
            <div class="pads_block">
               <div class="pads_block-left">
                   <div class="pads_block-left-img" style="background: url(images/<%- listItem.image %>) center center no-repeat, url(images/no_photo.jpg) center center no-repeat; background-size:cover;"></div>
                   <div class="pads_block-left-desc">
                       <div class="pads_block-left-desc-title">Номер Кетл:</div>
                       <div class="pads_block-left-desc-value"><%- listItem.numKetl %></div>
                       <div class="pads_block-left-desc-title">Оригинал:</div>
                       <div class="pads_block-left-desc-value"><%- listItem.original %></div>
                   </div>
               </div>
               <div class="pads_block-right">
                   <div class="pads_block-right-tbl">
                       <div class="pads_block-right-tbl-title">Номер оригинала</div>
                       <div class="pads_block-right-tbl-val"><%- listItem.numOriginal %></div>
                   </div>
                   <div class="pads_block-right-tbl">
                       <div class="pads_block-right-tbl-title">Номер TRW</div>
                       <div class="pads_block-right-tbl-val"><%- listItem.numTRW %></div>
                   </div>
                   <div class="pads_block-right-desc">
                       <%- listItem.desc %>
                   </div>
               </div>
            </div>
         <% }); %>
    </script>
    <!-- END: Underscore Template Definition. -->

    <script src="scripts/jquery-2.2.0.min.js" language="javascript"></script>
    <script src="node_modules/underscore/underscore-min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/scripts.js"></script>
</body>
</html>

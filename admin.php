<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Кетл</title>
    <link rel="stylesheet" href="stylesheet/style.css">
    <script src="scripts/jquery-2.2.0.min.js" language="javascript"></script>
    <script src="scripts/script.js"></script>
</head>
<body>
    <header class="head">
        <div class="container">
            <div class="box">
                <h1>Обновление каталога</h1>
                <h2>Выберите файл в формате .csv и нажмите Добавить в базу</h2>
                <form action="javascript:void(null);" method='POST' enctype="multipart/form-data" id="add" onsubmit="call_add();">
                    <div class="fileform">
                       <div id="fileformlabel"></div>
                        <div class="selectbutton">Обзор</div>
                        <input type="file" name="sel_file" id="upload" onchange="getName(this.value);" required>
                    </div>
                    <input type="submit" name="submit" value="Добавить в базу" id="sub">
                </form>
                <form action="javascript:void(null);" method='POST' enctype="multipart/form-data" onsubmit="call_delete();" id="delete">
                    <input type="submit" name="delete" value="Очистить базу" id="del">
                </form>
                <div class="clear"></div>
                <div class="delim"></div>
                <div class="success"></div>
            </div>
        </div>
    </header>
</body>
</html>
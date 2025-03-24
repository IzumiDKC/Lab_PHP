<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên kết Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        #lienketwebsite {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h2 {
            color: #333;
            margin-bottom: 15px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            cursor: pointer;
        }
        select:hover {
            border-color: #007BFF;
        }
    </style>
</head>
<body>
    <?php
    $links = [
        ['http://google.com', 'Google' ],
        ['http://w3schools.com', 'W3Schools' ],
        ['https://longnv.name.vn', 'Thầy Long Web' ],
        ['http://vnexpress.net', 'VnExpress' ],
        ['http://tuoitre.vn', 'Tuổi trẻ' ],
        ['http://thanhnien.vn', 'Thanh niên' ],
        ['http://youtube.com', 'Youtube' ],
    ];
    ?>
    <div id="lienketwebsite">
        <h2>Liên kết website</h2>
        <select onchange="window.open(this.value)">
        <?php foreach($links as $link) { ?>
        <option value="<?=$link[0]; ?>" <?= $link[1] == 'W3Schools' ? 'selected' : ''; ?>> <?=$link[1]; ?> </option>
        <?php } ?>
        </select>
    </div>
</body>
</html>
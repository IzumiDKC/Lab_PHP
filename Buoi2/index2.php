<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin xem nhiều</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        #tinxemnhieu {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            max-width: 400px;
            text-align: left;
        }
        h2 {
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }
        p {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $listtin = [
        ['https://longnv.name.vn/featured/su-dung-sse-trong-php', 'Sử dụng SSE trong PHP' ],
        ['https://longnv.name.vn/featured/phalcon-la-gi', 'Phalcon là gì' ],
        ['http://songdep.xitrum.net/trenon/547.html', 'Bạn có bao nhiêu người bạn?' ],
        ['http://songdep.xitrum.net/nghethuatsong/876.html', 'Bài học từ loài ngỗng' ],
        ['http://songdep.xitrum.net/nghethuatsong/872.html', 'Đường hầm xuyên qua trái đất'
        ],
        ['http://songdep.xitrum.net/ngungon/673.html', 'Tham ăn' ],
    ];
    ?>
    <div id="tinxemnhieu">
    <h2>Tin xem nhiều</h2>
    <?php $i=0; ?>
    <?php while ( $i <count($listtin) ) { ?>
    <?php $tin = $listtin[$i]; ?>
    <p> <a href="<?=$tin[0]; ?>"> <?=$tin[1]; ?> </a></p>
    <?php $i++; ?>
    <?php } ?>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xếp loại tuyển sinh</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 420px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 6px 0;
            background: #f9f9f9;
        }
        .input-group i {
            margin-right: 10px;
            color: #007bff;
        }
        input, select {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 16px;
        }
        button {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        .result, .error {
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }
        .result {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
    <script>
        function validateScore(input) {
            let value = parseFloat(input.value);
            if (value < 0 || value > 10) {
                alert("Điểm phải nằm trong khoảng từ 0 đến 10!");
                input.value = "";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="title">Xếp loại kết quả tuyển sinh</div>
        <form method="POST">
            <div class="input-group">
                <i class="fas fa-calculator"></i>
                <input type="number" name="toan" placeholder="Điểm môn Toán" required oninput="validateScore(this)">
            </div>
            <div class="input-group">
                <i class="fas fa-flask"></i>
                <input type="number" name="ly" placeholder="Điểm môn Lý" required oninput="validateScore(this)">
            </div>
            <div class="input-group">
                <i class="fas fa-vial"></i>
                <input type="number" name="hoa" placeholder="Điểm môn Hóa" required oninput="validateScore(this)">
            </div>
            <div class="input-group">
                <i class="fas fa-map-marker-alt"></i>
                <select name="khuvuc">
                    <option value="KV1">KV1 & KV2 </option>
                    <option value="KV3">KV3</option>
                    <option value="KV4">KV4</option>
                </select>
            </div>
            <button type="submit" name="submit"><i class="fas fa-check-circle"></i> Xếp loại</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $toan = $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $khuvuc = $_POST['khuvuc'];

            if ($toan < 0 || $toan > 10 || $ly < 0 || $ly > 10 || $hoa < 0 || $hoa > 10) {
                echo "<div class='error'>Điểm nhập vào phải từ 0 đến 10!</div>";
            } else {
                $tongdiem = $toan + $ly + $hoa;
                $diemcong = ($khuvuc == "KV1") ? 5 : ($khuvuc == "KV3" ? 3 : 0);
                $tongdiem += $diemcong;

                if ($tongdiem >= 24) {
                    $xeploai = "Giỏi";
                } elseif ($tongdiem >= 18) {
                    $xeploai = "Khá";
                } elseif ($tongdiem >= 15) {
                    $xeploai = "Trung Bình";
                } else {
                    $xeploai = "Yếu";
                }

                echo "<div class='result'>Tổng điểm: $tongdiem</div>";
                echo "<div class='result'>Xếp loại: $xeploai</div>";
                echo "<div class='result'>Điểm ưu tiên: $diemcong</div>";
            }
        }
        ?>
    </div>
</body>
</html>

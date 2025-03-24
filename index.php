<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        form {
            padding: 15px;
            border: 2px dashed #0084ff;
            border-radius: 10px;
            background: #f9f9f9;
        }
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button {
            background: #0084ff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        button:hover {
            background: #005bb5;
        }
        .file-list {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
        }
        .file-item {
            padding: 10px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s;
        }
        .file-item:hover {
            transform: scale(1.05);
        }
        img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            color: #0084ff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Upload File</h2>
        <form id="uploadForm">
            <input type="file" name="files[]" id="fileInput" multiple required>
            <button type="submit">Upload</button>
        </form>

        <h2>Danh sách file đã upload</h2>
        <div class="file-list" id="fileList">
            <?php include 'list_files.php'; ?>
        </div>
    </div>

    <script>
        document.getElementById("uploadForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Ngăn chặn reload trang

            let formData = new FormData();
            let files = document.getElementById("fileInput").files;
            
            if (files.length === 0) {
                alert("Vui lòng chọn ít nhất một file!");
                return;
            }

            for (let i = 0; i < files.length; i++) {
                formData.append("files[]", files[i]);
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "upload.php", true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Hiển thị thông báo từ server
                    loadFiles(); // Cập nhật danh sách file
                } else {
                    alert("Lỗi upload file!");
                }
            };

            xhr.send(formData);
        });

        function loadFiles() {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "list_files.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("fileList").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>

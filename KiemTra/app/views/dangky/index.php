
<h2>Đăng Kí Học Phần</h2>
<table border="1">
    <tr>
        <th>MaHP</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th>Hành Động</th>
    </tr>
    <?php
    $tongSoChi = 0;
    foreach ($hocPhans as $hocPhan) {
        $tongSoChi += $hocPhan["SoChi"];
        echo "<tr>
                <td>{$hocPhan['MaHP']}</td>
                <td>{$hocPhan['TenHP']}</td>
                <td>{$hocPhan['SoChi']}</td>
                <td>
                    <form method='POST' action='/php/Buoi6/public/DangKyController/remove'>
                        <input type='hidden' name='MaHP' value='{$hocPhan['MaHP']}'>
                        <button type='submit'>Xóa</button>
                    </form>
                </td>
              </tr>";
    }
    ?>
</table>
<p style="color: red;">Số học phần: <?= count($hocPhans) ?></p>
<p style="color: red;">Tổng số tín chỉ: <?= $tongSoChi ?></p>

<a href="/php/Buoi6/public/DangKyController/clear">Xóa Đăng Kí</a>
<a href="/php/Buoi6/public/">Lưu đăng ký</a>


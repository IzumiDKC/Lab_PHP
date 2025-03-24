<?php

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [
        ['id' => 1, 'name' => 'Nguyen Huu Dien', 'email' => 'nguyendien@hotmail.com'],
        ['id' => 2, 'name' => 'Dien Nguyen Huu', 'email' => 'diennguyen@gmail.com'],
    ];
}

function getStudents() {
    return $_SESSION['students'];
}

function saveStudent($id, $name, $email) {
    if ($id == 0) { // Thêm
        $newId = count($_SESSION['students']) + 1;
        $_SESSION['students'][] = ['id' => $newId, 'name' => $name, 'email' => $email];
    } else { // Sửa
        foreach ($_SESSION['students'] as &$student) {
            if ($student['id'] == $id) {
                $student['name'] = $name;
                $student['email'] = $email;
                break;
            }
        }
    }
}

function deleteStudent($id) {
    $_SESSION['students'] = array_filter($_SESSION['students'], fn($student) => $student['id'] != $id);
}
?>

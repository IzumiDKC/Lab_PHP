<?php
require_once(__DIR__ . '/../config/database.php');
require_once(__DIR__ . '/../models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        include __DIR__ . '/../views/categories/list.php';
    }

    public function show($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include __DIR__ . '/../views/categories/show.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    public function add()
    {
        include __DIR__ . '/../views/categories/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory($name, $description);

            if ($result) {
                header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/categories/');
            } else {
                echo "Lỗi khi thêm danh mục.";
            }
        }
    }

    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include __DIR__ . '/../views/categories/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $result = $this->categoryModel->updateCategory($id, $name, $description);
            if ($result) {
                header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/categories/');
            } else {
                echo "Lỗi khi cập nhật danh mục.";
            }
        }
    }

    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: ' . dirname($_SERVER['SCRIPT_NAME']) . '/categories/');
        } else {
            echo "Lỗi khi xóa danh mục.";
        }
    }
}
?>

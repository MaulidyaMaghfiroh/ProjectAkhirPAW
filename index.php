<?php


// Jika sudah login, lanjutkan dengan pemrosesan action
include 'controller/ProductController.php';
include 'controller/UserController.php';



session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'login':
            $userController = new UserController();
            $userController->login();
            break;

        case 'register':
                $userController = new UserController();
                $userController->register();
                break;
            
        case 'home':
            $productController = new ProductController($conn);
            $productController->home();
            break;

        case 'detail':
            $productController = new ProductController($conn);
            $productController->detail($_GET['id']);
            break;

        case 'addProduct':
            $productController = new ProductController($conn);
            $productController->addProduct();
            break;

        case 'editProduct':
            $productController = new ProductController($conn);
            $productController->editProduct($_GET['id']);
            break;

        case 'deleteProduct':
            $productController = new ProductController($conn);
            $productController->deleteProduct($_GET['id']);
            break;
    

        case 'logout':
            $userController = new UserController();
            $userController->logout();
            break;
    }
} else {
   
    // Tidak mendapatkan nilai dari 'action'
    $productController = new ProductController($conn);
    $productController->home();

}
?>
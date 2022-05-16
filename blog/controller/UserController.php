<?php
include_once '../model/UserModel.php';
include_once '../model/AuthenticationModel.php';

class UserController
{
  public $UserModel;

  public function __construct()
  {
    $this->UserModel = new UserModel();
  }

  public function create()
  {
    $requestData = $_POST;
    $fileData = $_FILES;
    $result = $this->UserModel->create($requestData, $fileData);

    if ($result) {
      header("Location: ../view/authentication/login.php");
      die;
    }
  }

  public function insertBlog()
  {
    $requestData = $_POST;
    $fileData = $_FILES;
    $result = $this->UserModel->addBlog($requestData, $fileData);

    if ($result) {
      header("Location: ../view/home.php");
      die;
    }
  }

  public function getUserById()
  {
    header("Location: ../view/user/edit.php?update&id={$_GET['id']}");
    die;
  }

  public function getBlogById()
  {
    header("Location: ../view/blogDetail/updateBlog.php?getBlog&id={$_GET['id']}");
    die;
  }

  public function showBlogById()
  {
    header("Location: ../view/blogDetail/blogDescription.php?showBlog&id={$_GET['id']}");
    die;
  }

  public function deleteUser()
  {
    $result = $this->UserModel->deleteUserById($_GET['id']);

    if ($result) {
      header("Location:../view/user/create.php");
      die;
    }
  }

  public function deleteUserList()
  {
    $result = $this->UserModel->deleteUserById($_GET['id']);

    if ($result) {
      header("Location:../view/blogDetail/userList.php");
      die;
    }
  }

  public function deleteBlog()
  {
    $result = $this->UserModel->deleteBlogById($_GET['id']);

    if ($result) {
      // echo '<script type="text/javascript"> alert("Blog Deleted Successfully")</script>';
      header("Location:../view/admin/activeBlog.php");
      die;
    }
  }

  public function updateUser()
  {
    $result = $this->UserModel->updateUser($_GET['id']);
    if ($result) {
      header("Location:../view/user/create.php");
      die;
    }
  }

  public function updateBlog()
  {
    $result = $this->UserModel->updateBlog($_GET['id']);
    if ($result) {
      header("Location:../view/admin/activeBlog.php");
      die;
    }
  }

  public function updateUserProfile()
  {
    $result = $this->UserModel->updateUsers($_SESSION['email']);
    if ($result) {
      header("Location:../view/home.php");
      die;
    }
  }

  public function userLogin()
  {
   
    $result = $this->UserModel->updateUsers($_SESSION['email']);

    $result1 = $this->UserModel->userLogin($_POST['email'], $_POST['password']);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result1);
    if ($_POST['email'] == 'admin@gmail.com' && $_POST['password'] == 'admin') {
      header("location: ../admin/index.php");
    } elseif ($count != 0) { 
      $_SESSION['email'] = $_POST['email'];
      header("Location:../view/home.php");
    } else {
      header("Location:../view/error.php");
    }
  }

  public function emailVerify()
  {
    $result = $this->UserModel->verifyEmail($_POST['email']);
    $row = mysqli_fetch_assoc($result);

    if ($row > 0) {
      $email = $_POST['email'];
      $to_mail = 'jasmin.arsenaltech@gmail.com';
      $subject = "Forgot Password";
      $body = "Thank you for registering to " . $email . "asdasd";
      $email = $row['email'];
      $body = '<p>Please click the following link to proceed to the Questionnaire <a href =\"http://localhost/Kuldip_Nimavat/MVC/View/forgot.html?email=' . $email . '>Reset Password</a></p>';
      $headers = "From:kuldip.arsenaltech@gmail.com";
      if (mail($to_mail, $subject, $body, $headers)) {
        echo "email successfully sent to $to_mail";
      } else {
        echo "email sending failed";
      }
    } else {
      echo "Email not found";
    }
  }
}

$userController = new UserController();

$action = $_SERVER['QUERY_STRING'];

if (!empty(strpos($action, '&'))) {
  $action = substr($action, 0, strpos($action, '&'));
}

switch ($action) {
  case 'create':
    $userController->create();
    break;

  case 'delete':
    $userController->deleteUser();
    break;

  case 'deleteUser':
    $userController->deleteUserList();
    break;

  case 'edit':
    $userController->getUserById();
    break;

  case 'update':
    $userController->updateUser();
    break;

  case 'login':
    $userController->userLogin();
    break;

  case 'userProfile':
    $userController->updateUserProfile();
    break;

  case 'email':
    $userController->emailVerify();
    break;

  case 'addBlog':
    $userController->insertBlog();
    break;

  case 'deleteBlog':
    $userController->deleteBlog();
    break;

  case 'getBlog':
    $userController->getBlogById();
    break;

  case 'updateBlog':
    $userController->updateBlog();
    break;

  case 'showBlog':
    $userController->showBlogById();
    break;

  default:
    # code...
    break;
}

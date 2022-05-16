<?php

include "BaseModel.php";
include 'AuthenticationModel.php';

class UserModel extends BaseModel
{
  public $baseModel;
  public $authenticationModel;
  public $table = "users";
  public $table1 = "detail_blog";

  public function __construct()
  {
    $this->baseModel = new BaseModel();
    $this->authenticationModel = new AuthenticationModel();
  }

  public function create($request)
  {
    $img = $_FILES['image']['name'];
    $img_tmp = $_FILES['image'];
    $img_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($img_tmp, "../assets/images/" . $img);

    $data = array(
      'first_name' => $request['fname'],
      'last_name' => $request['lname'],
      'email' => $request['email'],
      'mobile_no' => $request['mobile'],
      'password' => md5($request['password']),
      'image' => $img
    );

    return $this->baseModel->insert('users', $data);
  }

  public function addBlog($request)
  {
    $email = $_SESSION['email'];
    $id = $this->getUserId($email);

    $fields = 'articleTitle, articleCategory, articleDescrip, articleImage, user_id';
    $values = "'" . implode("','", array_values($request)) . "'";
    $img = $_FILES['articleImage']['name'];
    $values .= ",'" . $img . "'";
    $values .= ",'$id'";
    $img_tmp = $_FILES['articleImage'];
    $img_tmp = $_FILES['articleImage']['tmp_name'];
    move_uploaded_file($img_tmp, "../assets/images/" . $img);

    return $this->baseModel->insertBlog($this->table1, $fields, $values);
  }

  public function getUser($id)
  {
    return $this->baseModel->select($this->table, $id);
  }

  public function getData()
  {
    return $this->baseModel->selectEmail($this->table);
  }

  public function getUsers()
  {
    return $this->baseModel->selectAll($this->table);
  }

  public function getEmail()
  {
    return $this->baseModel->selectEmail($this->table);
  }

  public function getBlogs()
  {
    return $this->baseModel->selectAll($this->table1);
  }

  public function activeBlog()
  {
    $email = $_SESSION['email'];
    $userId = $this->baseModel->selectUserId('users', $email);
    return $this->baseModel->statusBlog($this->table1, $userId);
  }

  public function getBlog($id)
  {
    return $this->baseModel->selectBlog($this->table1, $id);
  }
  public function deleteUserById($id)
  {
    return $this->baseModel->delete($this->table, 'id', $id);
  }

  public function deleteBlogById($id)
  {
    return $this->baseModel->delete($this->table1, 'articleId', $id);
  }

  public function updateUser($id)
  {
    $updatedFields = "name = '{$_POST['name']}', surname = '{$_POST['surname']}', email = '{$_POST['email']}'";
    return $this->baseModel->update($this->table, $updatedFields, $id);
  }

  public function   updateBlog($id)
  {
    $img = $_FILES['articleImage']['name'];
    $img_tmp = $_FILES['articleImage'];
    $img_tmp = $_FILES['articleImage']['tmp_name'];
    move_uploaded_file($img_tmp, "../assets/images/" . $img);
    
    $updatedFields = "articleTitle = '{$_POST['articleTitle']}', articleCategory = '{$_POST['articleCategory']}', articleDescrip = '{$_POST['articleDescrip']}', articleImage = '{$img}'";
    
    return $this->baseModel->updateBlogData($this->table1, $updatedFields, $id);
  }

  public function updateUsers($email)
  {
    $updatedFields = "first_name = '{$_POST['first_name']}', last_name = '{$_POST['last_name']}', email = '{$_POST['email']}', mobile_no = '{$_POST['mobile_no']}'";
    return $this->baseModel->updateProfile($this->table, $updatedFields, $email);
  }

  public function userLogin($email, $password)
  {
    return $this->authenticationModel->login($this->table, $email, $password);
  }

  public function verifyEmail()
  {
    return $this->baseModel->emailSelect($this->table);
  }

  public function catagoryByBlog()
  {
    return $this->baseModel->selectBlogByCatagory($this->table1);
  }

  public function catagoryByBlogLifestyle()
  {
    return $this->baseModel->selectLifestyleByCatagory($this->table1);
  }

  public function getUserId($email)
  {
    return $this->baseModel->selectUserId($this->table, $email);
  }

  public function liveSearch()
  {
    return $this->baseModel->liveSearchData($this->table1);
  }

  public function userSearch()
  {
    return $this->baseModel->userSearchData($this->table);
  }
}

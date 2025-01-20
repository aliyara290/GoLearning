<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';
use PDOException;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Auth;

class UserController
{

    public function userRole(
        string $firstName,
        string $lastName,
        string $email,
        string $username,
        string $password,
        string $role
    ) {
        $roleOption = $role;
        switch ($roleOption) {
            case "teacher":
                $teacher = new Teacher();
                $teacher->setFirstName($firstName);
                $teacher->setLastName($lastName);
                $teacher->setEmail($email);
                $teacher->setUsername($username);
                $teacher->setPassword($password);
                $teacher->setRole($role);
                return $teacher->register();
                break;
            case "student":
                $student = new Student();
                $student->setFirstName($firstName);
                $student->setLastName($lastName);
                $student->setEmail($email);
                $student->setUsername($username);
                $student->setPassword($password);
                $student->setRole($role);
                return $student->register();
                break;
        }
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["u_role"])) {
            $firstName = $_POST["u_firstName"];
            $lastName = $_POST["u_lastName"];
            $email = $_POST["u_email"];
            $username = $_POST["u_username"];
            $password = $_POST["u_password"];
            $role = $_POST["u_role"];
            
            try {
                $user = $this->userRole($firstName, $lastName, $email,$username, $password, $role);
                header("location: /app/views/front/login.php");
                exit();
                if($user) {
                    echo "yes";
                    var_dump($user);
                } else echo "no";

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        } else echo "\n" . "failed to register" . "\n";
    }

    public function login() {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login_identifier"])) {
            $identifier = $_POST["login_identifier"];
            $password = $_POST["login_password"];

            try {
                $auth = new Auth();
                $check = $auth->login($identifier, $password);
                if($check) {
                    session_start();
                    $_SESSION["user"] = [
                        "userId" => $check["id"],
                        "fullName" => $check["firstName"] . " " . $check["lastName"],
                        "username" => $check["username"],
                        "role" => $check["role"],
                        "picture" => $check["picture"]
                    ];
                }
                if($check["role"] === "admin") {
                    header("location: /app/views/admin/dashboard.php");
                    exit();
                } else {
                    header("location: /app/views/front/coursesList.php");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Error two: " . $e->getMessage();
            }

        } else echo "failed to login";
    }

    public function getAllUers() {
        $adminModel = new Admin();
        $users = $adminModel->viewAllUsers();
        if($users) {
            return $users;
        } else echo "failed to fetch users 2";
    }

    public function activeUser() {
        if(isset($_GET["action"]) == "activeUser" && isset($_GET["identifier"])) {
            $adminModel = new Admin();
            $id = $_GET["identifier"];
            $check = $adminModel->activeUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

    public function suspendUser() {
        if(isset($_GET["action"]) == "suspendUser" && isset($_GET["usrId"])) {
            $adminModel = new Admin();
            $id = $_GET["usrId"];
            $check = $adminModel->suspendUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

    public function deleteUser() {
        if(isset($_GET["action"]) == "deleteUser" && isset($_GET["userID"])) {
            $adminModel = new Admin();
            $id = $_GET["userID"];
            $check = $adminModel->deleteUser($id);
            if($check) {
                header("location: /app/views/admin/users.php");
                exit();
            }
        }
    }

}

<?php
namespace App\Controllers;
use App\Models\UserProfile;

class UserProfileController {
    private $profileModel;

    public function __construct() {
        $this->profileModel = new UserProfile();
    }

    public function displayUserPortfolio() {
        $id = $_SESSION["user"]["userId"];
        return $this->profileModel->viewProfile($id);
       
    }

    public function updataProfileData() {
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user__username"])) {
            $id = $_SESSION["user"]["userId"];
            $firstName = htmlspecialchars(trim($_POST["user__firstname"]));
            $lastName = htmlspecialchars(trim($_POST["user__lastname"]));
            $bio = htmlspecialchars(trim($_POST["user__bio"]));
            $website = htmlspecialchars(trim($_POST["user__website"]));
            $work = htmlspecialchars(trim($_POST["user__work"]));
            $username = htmlspecialchars(trim($_POST["user__username"]));
            $email = htmlspecialchars(trim($_POST["user__email"]));
            $pic = "userPicture";
            if (isset($_FILES[$pic])) {
                $uploadDir = "../../../../uploads/";
                $fileName = uniqid();
                $filePath = $uploadDir . $fileName;
            
                if (move_uploaded_file($_FILES[$pic]['tmp_name'], $filePath)) {
                    $picture = $filePath;
                    echo "File successfully uploaded to: " . $picture;
                }
            } 

            $result = $this->profileModel->updateUserProfile($id, $firstName, $lastName, $username, $email, $picture, $bio, $website, $work);
            if($result) {
                header("location: /app/views/front/profile/user.php");
                exit();
            }
        }
    }
    
}
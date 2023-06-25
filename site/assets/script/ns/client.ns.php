<?php

/**
 * Client namespace
 * @author Emanuel Tin Rukavina, rukavinaet
 * 
 * This namespace deals with everything related to user (client) - db / sys relationships
 */

namespace Client;

class RegisterClient
{
    function CheckUsername($usernameToCheck)
    {
        include "../../../config.php";
        if (strlen($usernameToCheck) < 5) {
            echo '<span style="color:#ff4747;">codesave.cloud/' . $usernameToCheck . ' <br><i class="bi bi-info-circle"></i> Too short</span>';
            exit();
        }
        if (strlen($usernameToCheck) > 25) {
            echo '<span style="color:#ff4747;">codesave.cloud/' . $usernameToCheck . ' <br><i class="bi bi-info-circle"></i> Too long</span>';
            exit();
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $usernameToCheck)) {
            echo '<span style="color:#ff4747;">codesave.cloud/' . $usernameToCheck . '  <br><i class="bi bi-info-circle"></i> Do not include special characters</span>';
            exit();
        }
        $reserve = array("explore", "privacy", "support", "uncuni", "codesave", "codesavecloud", "collection", "collections");
        if (in_array($usernameToCheck, $reserve)) {
            echo '<span style="color:#ff4747;">codesave.cloud/' . $usernameToCheck . '  <br><i class="bi bi-dash-circle"></i> Username not avaliable</span>';
            exit();
        } 
        if ($stmt = $conn->prepare('SELECT Username FROM `Users` WHERE Username = ?')) {
            $stmt->bind_param('s', $usernameToCheck);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            $stmt->bind_result($usernameToCheck);
            $stmt->fetch();
            $numberofrows = $stmt->num_rows;
            if ($numberofrows != 0) {
                echo '<span style="color:#ff4747;">codesave.cloud/' . $usernameToCheck . '  <br><i class="bi bi-dash-circle"></i> Username not avaliable</span>';
                exit();
            } else {
                echo '<span style="color:green;">codesave.cloud/' . $usernameToCheck . '  <br><i class="bi bi-check-circle"></i> Username avaliable</span>';
                exit();
            }
        }
    }
    function signup($Email, $Password)
    {
        /*
        include "db.php";
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $email = strtolower($this->email);
        if ($stmt = $conn->prepare('SELECT * FROM `Users` WHERE Email = ? and Password = ?')) {
            $stmt->bind_param('ss', $email, $pass);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            $stmt->bind_result($AccountID, $Email, $Password, $MetaData);
            $stmt->fetch();
            $numberofrows = $stmt->num_rows;
            if ($numberofrows != 0) {
                self::RESPOND("EXISTS");
            } else {
                self::CreateUser($email, $pass);
            }
        }*/
    }
}
class Auth
{
    public $email;
    public $pass;

    function login()
    {
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $email = strtolower($this->email);

        include "db.php";
        if ($stmt = $conn->prepare('SELECT * FROM `Users` WHERE Email = ? and Password = ?')) {
            $stmt->bind_param('ss', $email, $pass);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            $stmt->bind_result($AccountID, $Email, $Password, $Settings);
            $stmt->fetch();
            $numberofrows = $stmt->num_rows;
            if ($numberofrows != 0) {
                self::CreateLogin($AccountID, $Email, $Settings);
            } else {
                self::RESPOND("0");
            }
        }
    }

    private function CreateLogin($AccountID, $Email, $Settings)
    {
        session_start();
        $_SESSION["AccountID"] = $AccountID;
        $_SESSION["Email"] = $Email;
        $_SESSION["Settings"] = json_decode($Settings, true);
        $_SESSION["login"] = true;
        clearstatcache();
        self::RESPOND("1");
    }

    private function CreateUser($Email, $Password)
    {
        include "db.php";
        $date = date("d.m.Y.");
        $userId = sha1(time());
        $jsonArray = [
            [
                "id" => "$date",
                "title" => "Shazam!",
                "poster" => "https://image.tmdb.org/t/p/w500/xnopI5Xtky18MPhK40cZAGAOVeV.jpg",
                "overview" => "A boy is given the ability to become an adult superhero in times of need with a single magic word.",
                "release_date" => "1553299200",
                "genres" => [
                    "id" => "299537",
                    "title" => "Captain Marvel",
                    "poster" => "https://image.tmdb.org/t/p/w500/AtsgWhDnHTq68L0lLsUrCnM7TjG.jpg",
                    "overview" => "The story follows Carol Danvers as she becomes one of the universe’s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races. Set in the 1990s, Captain Marvel is an all-new adventure from a previously unseen period in the history of the Marvel Cinematic Universe.",
                    "release_date" => "1551830400",
                    "genres" => ["Action", "Adventure", "Science Fiction"]
                ]
            ]

        ];
        // compact format
        $compactJsonString = json_encode($jsonArray);

        $sql = "INSERT INTO `Users` (`UserID`, `Email`, `Password`, `MetaData`) 
                VALUES ('$userId','$Email', '$Password', '$compactJsonString');";
        $conn->query($sql);
    }

    private function RESPOND($TLR)
    {
        return $TLR;
    }
}

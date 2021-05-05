<?php 

function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)
{
    $result;
    if(empty($name)|| empty($email) || empty($username) ||
        empty($pwd) || empty($pwdrepeat))
    {
       $result = true;
    } 
    else
    {
        $result = false;
    } 
    return $result;
} 

function invalidUid($username )
{
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
} 

function invalidEmail($email)
{
    $result;
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
} 

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if($pwd !== $pwdRepeat)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
}  

function uidExists( $conn,$username, $email )
{
    $sql = "SELECT * FROM USERS WHERE USER_UID = ? OR USER_EMAIL = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=staetment-failed1");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result(); 
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    } 
    mysqli_stmt_close($stmt);
} 


function createUser($conn, $name, $email,$username, $pwd, $pwdRepeat)
{
    $sql = "INSERT INTO users (USER_NAME, USER_EMAIL, USER_UID, USER_PWD) VALUES(?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=staetment-failed2");
        exit();
    }  

    $hasherPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss",$name,$email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../signup.php?error=signup-succesful");
    exit();
} 



<?php

function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'pw2024_tubes_230002041');
}
function query($query) 
{
    $conn = koneksi(); 
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1)
    {
        return mysqli_fetch_assoc($result);
    }
    $row = [];
    while ($row = mysqli_fetch_assoc($result))
    {
        $row[] = $row;
    }
    return $row;
}

function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    if ($user = query("SELECT * FROM user WHERE username = '$username'"))
    {
        if(password_verify($password, $user['password']))
        {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            if ($user['id_role'] == 1)
            {
                $_SESSION ['id'] - 'admin';
            }
            else
            {
                $_SESSION['role'] = 'user';
            }
            header ("Location: index.php");
            exit;
        }
    }
}
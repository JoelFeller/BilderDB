<?php
/**
 * Created by PhpStorm.
 * User: bfellj
 * Date: 20.04.2018
 * Time: 13:08
 */

class Security
{
    public static function checkLogin() {
      if(!isset($_SESSION['username']))
       {
           header('Location: /user/login');
       }
    }

    public static function checkAdmin() {
       if($_SESSION['username'] !== "admin")
        {
            header('Location: /user/login');
       }
    }
}
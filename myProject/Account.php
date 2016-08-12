<?php
namespace myProject;
use PDO;

class Account
{
    public $db;

    /**
     * 建立資料庫連線
     */
    public function __construct()
    {
        $dbConnect = 'mysql:host=localhost;dbname=payment;port=3306';
        $dbUser = 'root';
        $dbPw = '';

        // 連接資料庫伺服器
        $this->db = new PDO($dbConnect, $dbUser, $dbPw);
        $this->db->exec("set names utf8");
    }

    /**
     * 關閉資料庫連線
     */
    public function __destruct()
    {
        $this->db = null;
    }

    /**
     * 確認是否有此帳戶
     */
    public function checkAccount($account)
    {
        $sql = 'SELECT * FROM `account` WHERE `account` = :account';
        $result = $this->db->prepare($sql);
        $result->bindParam('account', $account);
        $result->execute();
        $row = $result->fetchAll();

        if (!count($row)) {
            return false;
        }

        return true;
    }
}

<?php

require_once "BaseModel.php";
class UserModel extends BaseModel
{

    public function __construct()
    {
        $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }

    public function getLogin($username, $password)
    {
        //$username = $this->db->real_escape_string($username);
        //$password = $this->db->real_escape_string($password);

        if ($result = mysqli_query($this->db, "SELECT *
        FROM tb_user
        WHERE user_username = '$username'
        AND user_password = '$password' ", MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                $data[] = $row;
            }
            $result->close();
            return $data;
        }

    }
/*     public function getLogin($username, $password)
{
if ($result = mysqli_query($this->db, "SELECT *
FROM tb_user LEFT JOIN tb_license ON tb_user.license_id = tb_license.license_id
WHERE user_username = '$username'
AND user_password = '$password' ", MYSQLI_USE_RESULT)) {
$data = [];
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
$data[] = $row;
}
$result->close();
return $data;
}

} */
    public function getUserBy($name = '', $position = '', $email = '', $mobile = '')
    {
        $sql = " SELECT user_id, user_code , CONCAT(tb_user.user_name,' ',tb_user.user_lastname) as name , user_mobile, user_email,user_division_name, user_position_name, user_status_name
        FROM tb_user LEFT JOIN tb_user_position ON tb_user.user_position_id = tb_user_position.user_position_id
        LEFT JOIN tb_user_status ON tb_user.user_status_id = tb_user_status.user_status_id
        LEFT JOIN tb_user_division ON tb_user.user_division_id = tb_user_division.user_division_id
        WHERE CONCAT(tb_user.user_name,' ',tb_user.user_lastname) LIKE ('%$name%')
        OR user_position_name LIKE ('%$position%')
        OR user_email LIKE ('%$email%')
        OR user_mobile LIKE ('%$mobile%')
        ORDER BY CONCAT(tb_user.user_name,' ',tb_user.user_lastname)
        ";
        if ($result = mysqli_query($this->db, $sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
            $result->close();
            return $data;
        }

    }

    public function getUserByID($id)
    {
        $sql = " SELECT *
        FROM tb_user
        WHERE user_id = '$id'
        ";

        if ($result = mysqli_query($this->db, $sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data = $row;
            }
            $result->close();
            return $data;
        }

    }

    public function updateUserByID($id, $data = [])
    {
        $sql = " UPDATE tb_user SET
        user_code = '" . $data['user_code'] . "',
        user_prefix = '" . $data['user_prefix'] . "',
        user_name = '" . $data['user_name'] . "',
        user_lastname = '" . $data['user_lastname'] . "',
        user_mobile = '" . $data['user_mobile'] . "',
        user_email = '" . $data['user_email'] . "',
        user_username = '" . $data['user_username'] . "',
        user_password = '" . $data['user_password'] . "',
        user_address = '" . $data['user_address'] . "',
        user_province = '" . $data['user_province'] . "',
        user_amphur = '" . $data['user_amphur'] . "',
        user_district = '" . $data['user_district'] . "',
        user_zipcode = '" . $data['user_zipcode'] . "',
        user_division_id = '" . $data['user_division_id'] . "',
        user_position_id = '" . $data['user_position_id'] . "',
        license_id = '" . $data['license_id'] . "',
        user_status_id = '" . $data['user_status_id'] . "'
        WHERE user_id = $id
        ";

        if (mysqli_query($this->db, $sql, MYSQLI_USE_RESULT)) {
            return true;
        } else {
            return false;
        }

    }

    public function insertUser($data = [])
    {
        $sql = "INSERT INTO `tb_user`(
            `user_username`,
            `user_password`,
            `user_code`,
            `user_prefix`,
            `user_name`,
            `user_lastname`,
            `user_mobile`,
            `user_email`,
            `user_address`,
            `user_province`,
            `user_amphur`,
            `user_district`,
            `user_zipcode`,
            `license_id`,
            `user_status_id`,
            `user_division_id`,
            `user_position_id`         
            ) VALUES ('" .
            $data['user_username'] . "','" .
            $data['user_password'] . "','" .
            $data['user_code'] . "','" .
            $data['user_prefix'] . "','" .
            $data['user_name'] . "','" .
            $data['user_lastname'] . "','" .
            $data['user_mobile'] . "','" .
            $data['user_email'] . "','" .
            $data['user_address'] . "','" .
            $data['user_province'] . "','" .
            $data['user_amphur'] . "','" .
            $data['user_district'] . "','" .
            $data['user_zipcode'] . "','" .
            $data['license_id'] . "','" .
            $data['user_status_id'] . "','" .
            $data['user_division_id'] . "','" .
            $data['user_position_id'] . "'" .
            ");
        ";

        if (mysqli_query($this->db, $sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id($this->db);
        } else {
            return 0;
        }

    }

    public function deleteUserByID($id)
    {
        $sql = " DELETE FROM tb_user WHERE user_id = '$id' ";
        mysqli_query($this->db, $sql, MYSQLI_USE_RESULT);

    }
    public function get_Action_date()
    {
        date_default_timezone_set("Asia/Bangkok");
        $d1 = date("d");
        $d2 = date("m");
        $d3 = date("Y");
        $d4 = date("H");
        $d5 = date("i");
        $d6 = date("s");
        $date[0] = "$d1$d2$d3$d4$d5$d6";
        $date[1] = "$d1-$d2-$d3 $d4:$d5:$d6";
        return $date;
    }
}

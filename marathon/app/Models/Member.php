<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function has_access($raceID, $memberKey)
    {
        try {
            $db = db_connect();
            //$sql = "select R.raceID from race R inner join member_race MR on R.raceID = MR.raceID inner join memberLogin ML on MR.memberID = ML.memberID where ML.memberKey = ? and MR.roleID = '2' and MR.raceID = ?;";

            $sql = "select ML.memberName,ML.memberEmail,ML.memberID,MR.roleID
                from member_race MR
                inner join memberLogin ML on MR.memberID = ML.memberID
                where ML.memberKey = ?
                and MR.raceID = ?
                and MR.roleID = '2';";


            $query = $db->query($sql, [$memberKey, $raceID]);
            $row = $query->getFirstRow();

            if ($row == null) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public function user_login($email, $passwd)
    {
        $db = db_connect();
        $sql = "Select * from memberLogin where memberEmail = ? and roleID = 2";
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            $DBPass = $row->memberPassword;
            $MemberKey = $row->memberKey;
            $passwd = md5($passwd . $MemberKey);

            if ($passwd == $DBPass) {
                $this->session = service('session');
                $this->session->start();

                $this->session->set("roleID", $row->roleID);
                $this->session->set("memberKey", $row->memberKey);
                $this->session->set("memberName", $row->memberName);
                $this->session->set("memberID", $row->memberID);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function create_user($name, $email, $passwd)
    {
        try {

            $MemberKey = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X',
                mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535),
                mt_rand(16384, 20479), mt_rand(32768, 49151),
                mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

            $db = db_connect();
            $sql = "INSERT INTO memberLogin (memberName,memberEmail, memberPassword,roleID,memberKey) VALUES (?, ?,?,?)";
            $db->query($sql, [$name, $email, $passwd, "3", $MemberKey]);

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function delete_user($memberID, $raceID)
    {
        try {
            $db = db_connect();
            $sql = "DELETE FROM member_race WHERE memberID = ? and raceID = ? and roleID = '3'";
            $db->query($sql, [$memberID, $raceID]);

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function add_user($memberID, $raceID)
    {
        try {
            $db = db_connect();
            $sql = "insert into member_race(memberID,raceID,roleID) values(?,?,'3')";
            $db->query($sql, [$memberID, $raceID]);

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}
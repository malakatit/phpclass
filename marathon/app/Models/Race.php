<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
    public function get_races($memberKey)
    {
        $db = db_connect();
        $sql = "select R.raceID, raceName, raceLocation, raceDescription, raceDateTime
                from race R
                inner join member_race MR on R.raceID = MR.raceID
                inner join memberLogin ML on MR.memberID = ML.memberID
                where ML.memberKey = '$memberKey'
                and MR.roleID = '2';";
        $query = $db->query($sql);
        return $query->getResultArray();
    }

    public function get_runners($memberKey, $RaceID)
    {
        $db = db_connect();
        $sql = "SELECT MR.memberID, MR.raceID, MR.roleID
            FROM member_race MR
            INNER JOIN member_race MR2 ON MR.raceID = MR2.raceID
            INNER JOIN memberLogin ML2 ON MR2.memberID = ML2.memberID
            WHERE ML2.memberKey = ?
            AND MR.raceID = ?
            AND MR2.roleID = '2'
            AND MR.roleID = '3';";
        $query = $db->query($sql, [$memberKey, $RaceID]);
        return $query->getResultArray();
    }

    public function get_race($id)
    {
        $db = db_connect();
        $sql = "Select * from race where raceID = ?";
        $query = $db->query($sql, [$id]);
        return $query->getResultArray();
    }

    public function add_race($name,$location,$description,$date)
    {
        $this->session = service('session');
        $this->session->start();
        $memberID =  $this->session->get("memberID");
        try {

            //Insert My Race
            $db = db_connect();
            $sql = "insert into race (raceName,raceLocation,raceDescription,raceDateTime) values(?,?,?,?)";
            $db->query($sql,[$name,$location,$description,$date]);

            //Get Auto ID
            $sql = "Select LAST_INSERT_ID()";
            $query = $db->query($sql);
            $row = $query->getResultArray();
            $LastID = $row[0]["LAST_INSERT_ID()"];

            //Insert into my member_race Table
            $sql = "insert into member_race (memberID,raceID,roleID) values(?,?,2)";
            $db->query($sql,[$memberID,$LastID]);

            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function delete_race($id)
    {
        try {
            $db = db_connect();
            $sql = "delete from race where raceID = ?";
            $db->query($sql, [$id]);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }

    public function update_race($name,$location,$description,$date, $txtID)
    {
        try {
            $db = db_connect();
            $sql = "update race set raceName = ?, raceLocation=?, raceDescription=?, raceDateTime=? where raceID =?";
            $db->query($sql, [$name,$location,$description,$date,$txtID]);
            return true;
        }catch (Exception $ex){
            return false;
        }
    }


}
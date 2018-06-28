<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 6/26/2018
 * Time: 11:12 PM
 */
class Database
{
    public  $host       =   DB_HOST;
    public  $user       =   DB_USER;
    public  $pass       =   DB_PASS;
    public  $db_name    =   DB_NAME;

    //Connecting database connection

    public $link;

    //Magic

    public  function  __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->link = new mysqli($this->host , $this->user, $this->pass, $this->db_name);

    }

    //Method or function

    public function  select($query)
    {
        $result = $this->link->query($query);
        if( $result ->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function  insert($query)
    {
        $insert = $this->link->query($query);
        if($insert){

            header('Location: index.php?insert= Post inserted ..');

        }else{
            echo "Post didn't insert";
        }
    }

    public function  update($query)
    {
        $update = $this->link->query($query);
        if($update){
            header('location: index.php?insert= Post update ..');
        }else{
            echo "Post didn't update";
        }
    }


    public function  delete($query)
    {
        $insert = $this->link->query($query);
        if($insert){
            header('location: index.php?insert= Post deleted..');
        }else{
            echo "Post didn't deleted";
        }
    }

}


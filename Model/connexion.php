<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 09/08/2018
 * Time: 21:52
 */

class Connexion extends PDO{
    private static $instance;
    private $user;
    private $mdp;
    private $db_name;
    private $hote;
    /**
     *
     * @param string $user     (default "root")
     * @param string $mdp      (default "")
     * @param string $db_name  (default "groupcorner")
     * @param string $hote     (default "localhost")
     */
    function __construct($user = "root", $mdp ="", $db_name = "groupcorner", $hote = "localhost") {

        $this->user = $user;
        $this->mdp = $mdp;
        $this->db_name = $db_name;
        $this->hote = $hote;
        parent::__construct("mysql:dbname=$db_name;host=$hote;charset=utf8", $user, $mdp);
    }
    /**
     *
     * @return Connexion objet de la classe connexion qui hérite de PDO
     */
    public static function getInstance(){
        if (self::$instance == NULL) {
            $db_name = "GroupCorner";
            $hote = "localhost";
            self::$instance = new Connexion("root", "", $db_name, $hote);
        }
        return self::$instance;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 09/08/2018
 * Time: 22:17
 */
require_once("./connexion.php");

class article {

    public function __construct()
    {
    }
    public static function getArticles($search, $target) {
        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id 
                WHERE :target LIKE :search 
                GROUP BY gcv2contents.id";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindParam("target", $target);
        $statement->bindParam("search", $search);
        if ($statement->execute() && $inj === 0) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

//    public static function getByTitle($title)
//    {
//        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
//                WHERE h1_title LIKE :title
//                GROUP BY gcv2contents.id";
//        $statement = Connexion::getInstance()->prepare($sql);
//        // On enleve des caractères
//        $inj = preg_match('[{}#/^+=<>*-$/]', $title);
//        if($inj === 0) {
//            $title = implode("%", explode(" ", $title));
//        }
//        $statement->bindParam("title", $title);
//        if ($statement->execute() && $inj === 0) {
//            return ($statement->fetchAll(PDO::FETCH_ASSOC));
//        } else {
//            return($statement->errorInfo());
//        }
//    }
//    public static function getByKeyWord($key_word)
//    {
//        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
//                WHERE meta_keywords LIKE :keyword
//                GROUP BY gcv2contents.id";
//        $statement = Connexion::getInstance()->prepare($sql);
//        // On enleve des caractères
//        $inj = preg_match('[{}#/^+=<>*-$/]', $key_word);
//        if($inj === 0) {
//            $key_word = implode("%", explode(" ", $key_word));
//        }
//        $statement->bindParam("keyword", $key_word);
//        if ($statement->execute() && $inj === 0) {
//            return ($statement->fetchAll(PDO::FETCH_ASSOC));
//        } else {
//            return($statement->errorInfo());
//        }
//    }
//    public static function getByContent($content)
//    {
//        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
//                WHERE content LIKE :content
//                GROUP BY gcv2contents.id";
//        $statement = Connexion::getInstance()->prepare($sql);
//        // On enleve des caractères
//        $inj = preg_match('[{}#/^+=<>*-$/]', $content);
//        if($inj === 0) {
//            $content = implode("%", explode(" ", $content));
//        }
//        $statement->bindParam("keyword", $key_word);
//        if ($statement->execute() && $inj === 0) {
//            return ($statement->fetchAll(PDO::FETCH_ASSOC));
//        } else {
//            return($statement->errorInfo());
//        }
//    }
}
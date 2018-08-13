<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 09/08/2018
 * Time: 22:17
 */
require_once("../Model/connexion.php");

class article {

    public function __construct()
    {
    }

    public static function getByTitle($title)
    {
        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
                WHERE h1_title LIKE :title
                GROUP BY gcv2contents.id";
        $statement = Connexion::getInstance()->prepare($sql);


        $statement->bindParam("title", $title);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }
    public static function getByKeyWord($key_word)
    {
        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
                WHERE meta_keywords LIKE :keyword
                GROUP BY gcv2contents.id";
        $statement = Connexion::getInstance()->prepare($sql);

        $statement->bindParam("keyword", $key_word);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }
    public static function getByContent($content)
    {
        $sql = "SELECT * FROM gcv2contents INNER JOIN gcv2contents_i18n ON gcv2contents.id = gcv2contents_i18n.content_id
                WHERE meta_description LIKE :content
                GROUP BY gcv2contents.id";
        $statement = Connexion::getInstance()->prepare($sql);

        $statement->bindParam("content", $content);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }
}
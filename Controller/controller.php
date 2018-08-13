<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 09/08/2018
 * Time: 22:16
 */

require_once("../Model/article.php");

function searchArticle() {
    $get = "";
    $err = array();
    if (isset($_GET["title"]) && !empty($_GET["title"]) && $_GET["title"] != "") {
        $title = checked($_GET["title"]);
        if($title) {
            $get = article::getByTitle($title);
        } else {
            $err[] = "erreur sur le titre";
        }

    } elseif (isset($_GET["keyword"]) && !empty($_GET["keyword"]) && $_GET["keyword"] != "") {
        $keyword = checked($_GET["keyword"]);
        if($keyword) {
            $get = article::getByKeyWord($keyword);
        } else {
            $err[] = "erreur sur les mots clés";
        }
    } elseif (isset($_GET["content"]) && !empty($_GET["content"]) && $_GET["content"] != "") {
        $content = checked($_GET["content"]);
        if($content) {
            $get = article::getByContent($content);
        } else {
            $err[] = "erreur sur les content";
        }
    }
    if (sizeof($err)>0) {
        return $err;
    }
    if($get == "") {
        return "L'article demandé n'existe pas.";
    }
    return json_encode($get);

}
function checked($search) {
    $res = false;

    $inj = preg_match('/[{}#\/+=<>*$]/', $search);
    if($inj === 0) {
        $res = "%".implode("%", explode(" ", $search))."%";
    }
    return $res;
}
echo searchArticle();
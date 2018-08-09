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
    if(isset($_GET["title"]) && !empty($_GET["title"])) {
        $title = checked($_GET["title"]);
        if($title) {
            $get = article::getArticles($title, "h1_title");
        }

    }
    if (isset($_GET["keyword"]) && !empty($_GET["keyword"])) {
        $keyword = checked($_GET["keyword"]);
        if($keyword) {
            $get = article::getArticles($keyword, "meta_keywords");
        }
    }
    if (isset($_GET["content"]) && !empty($_GET["content"])) {
        $content = checked($_GET["content"]);
        if($content) {
            $get = article::getArticles($content, "content");
        }
    }
// mettre dans une vue la variable $get


}
function checked($search) {
    $res = false;
    // On enleve des caractères
    $inj = preg_match('[{}#/^+=<>*-$/]', $search);
    if($inj === 0) {
        $res = implode("%", explode(" ", $search));
    }
    return $res;
}

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Recherche documentaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="formulaire container">
            <h1>
                Moteur de recherche documentaire
            </h1>
            <h2>
                Faites une recherche documentaire sur les titres des articles
            </h2>
            <h2>
                Faites une recherche documentaire sur les mots clés des articles
            </h2>
            <h2>
                Faites une recherche documentaire sur le contenu des articles
            </h2>
            <h3>
                Souhaitez vous le renommer ?
            </h3>
            <div class="fonctions clearfix"></div>
        </div>
        <?php
        $_GET["title"] = "test";
        require_once '../Controller/controller.php';
//        var_dump(article::getArticles("test", "h1_title"));
        echo $_GET["title"];
        ?>
    </body>
</html>
<script type="text/javascript">

</script>

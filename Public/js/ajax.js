
$(document).ready(function(){
    //
    $(".bouton_ajax").click(function() {

        var titre = $('input[name=title]').val();
        var content = $('input[name=content]').val();
        var keyword = $('input[name=keyword]').val();
        console.log(titre);
        console.log(content);
        console.log(keyword);
        var databind;
        if(titre != null && titre != "") {
            databind = "title="+ titre;
        } else if(content != null && content != "") {
            databind = "content=" + content;
        } else if (keyword != null && keyword != "") {
            databind = "keyword=" + keyword;
        } else {
            databind = null;
        }
        $.ajax({
            url : 'http://localhost/groupCornerTestAlexV2/Controller/controller.php',
            type : 'GET',
            data : databind,
            dataType : 'json',
            success : function(code_json, statut){ // success est toujours en place, bien sûr !
                $(".ajax_added").remove();
                $.each(code_json, function (index, value) {
                    var div = $('<div></div>')
                        .attr('class', 'ajax_added');
                    var h3 = $('<h3></h3>')
                        .text("Article : " + value.h1_title);
                    var p = $('<p></p>')
                        .text(value.meta_description);
                    div.append(h3);
                    div.append(p);
                    $(".appendto").append(div);
                })
console.log("success");
console.log(databind);
console.log(code_json);
$(".appendto").append(code_json);
            },
            error : function(resultat, statut, erreur){
                $(".ajax_added").remove();
                $(".appendto").append(resultat);
                
console.log("error");
            }

        });

    })
});
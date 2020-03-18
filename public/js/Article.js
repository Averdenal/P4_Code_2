class Article
{
    constructor(){
        this.newArticle();
        this.deleteArticle();
        this.editArticle();
    }
    newArticle(){
        var formAddArticle = document.querySelector('#add_Article');
        if(formAddArticle !== null){
            formAddArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        location.replace('/P4_Code_2/Administration/editArticle/'+ HttpRequest.responseText);
                    }
                }
                let data = new FormData(formAddArticle);
                data.append('content',tinyMCE.get('Form_content').getContent());
                HttpRequest.open('POST','/P4_Code_2/Administration/createArticle',true);
                HttpRequest.send(data);
            });
        }
    }
    
    deleteArticle(){
        $('.btn_Delete_Article').on('click',function(){
            var btn = $(this);
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Administration/deleteArticle/"+$(this).data('id'),
                success:((reponse) => {
                    btn.parents('.article').remove(); //delete la ligne
                })
             })
        })
    }

    editArticle()
    {
        $('#edit_Article').on('submit',(e) =>{
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/P4_Code_2/Administration/majArticle",
                data: {
                    id: $(this).data('id'),
                    title: $('input[name="title"]').val(),
                    content: tinyMCE.get('Form_content').getContent()
                },
                success: function (response) {
                    $('#msg').html('maj OK');
                }
            });
            
        });
    }

    createListArticle(article){
        return $("<tr class='article'>"+
        "<td>"+article.id+"</td>"+
        "<td>"+article.date+"</td>"+
        "<td>"+article.title+"</td>"+
        "<td>"+article.content+"</td>"+
        "<td>"+article.lastname+" "+article.firstname+"</td>"+
        "<td><a class='btn btn_Edit_Article btn-warning' href='"+app.basepath+"/Administration/editArticle/"+article.id+"'></a>"+
        "<a class='btn btn_Delete_Article btn-danger' href='"+app.basepath+"/Administration/deleteArticle/"+article.id+"'></a></td>"+
        "</tr>");
    }

    create_Alert(msg){
        return $("<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
        "<strong>"+msg+"</strong>"+
        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
          "<span aria-hidden='true'>&times;</span>"+
        "</button>"+
      "</div>")[0];
    }
}
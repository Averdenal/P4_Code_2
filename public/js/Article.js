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

    deleteArticle()
    {
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_Delete_Article btn-danger') {
                evt.preventDefault();
                let infomsg  = document.querySelector('#info');
                let infoArticle = document.querySelector('#list_Articles')
                $.ajax({
                    type: "DELETE",
                    url: evt.target.pathname,
                    success:((reponse) => {
                        infomsg.appendChild(this.create_Alert('Article Supprimé'));
                        infoArticle.innerHTML =" ";
                        let articles = JSON.parse(reponse);
                        articles.forEach(article => {
                            infoArticle.appendChild(this.createListArticle(article));
                        });
                })
            });
        }});
    }

    editArticle()
    {
        var formEditArticle = document.getElementById('edit_Article');
        var msg = document.querySelector('#msg');
        if(formEditArticle !== null){
            formEditArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        msg.innerHTML = 'maj OK'
                    }
                }
                let data = new FormData(formEditArticle)
                data.append('content',tinyMCE.get('Form_content').getContent());
                HttpRequest.open('POST','/P4_Code_2/Administration/majArticle',true);
                HttpRequest.send(data);
            });
        }
    }

    createListArticle(article){
        var articleHtml = $("<tr>"+
        "<td>"+article.id+"</td>"+
        "<td>"+article.date+"</td>"+
        "<td>"+article.title+"</td>"+
        "<td>"+article.content+"</td>"+
        "<td>"+article.lastname+" "+article.firstname+"</td>"+
        "<td><a class='btn btn_Edit_Article btn-warning' href='"+app.basepath+"/Administration/editArticle/"+article.id+"'></a>"+
        "<a class='btn btn_Delete_Article btn-danger' href='"+app.basepath+"/Administration/deleteArticle/"+article.id+"'></a></td>"+
        "</tr>")
        return articleHtml[0];    
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
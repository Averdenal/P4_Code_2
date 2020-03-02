class Article
{
    constructor(){
        this.newArticle();
        this.deleteArticle();
        this.editArticle();
        this.basepath = "/P4_Code_2";
    }
    newArticle(){
        var formAddArticle = document.getElementById('add_Article');
        var info = document.getElementById('container_Article');
        var msg = document.getElementById('info');
        if(formAddArticle !== null){
            formAddArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        msg.innerHTML = 'Article est bien créé';
                        info.innerHTML = HttpRequest.responseText;
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
            if (evt.target.className === 'btn btn_Delete_Article') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let infomsg  = document.querySelector('#info');
                let infoArticle = document.querySelector('#list_Articles')
                HttpRequest.onreadystatechange = () => {
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Article Supprimé';
                        infoArticle.innerHTML =" ";
                        let articles = JSON.parse(HttpRequest.responseText);
                        articles.forEach(article => {
                            infoArticle.appendChild(this.createListArticle(article));
                        });

                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }
        });
    }

    editArticle()
    {
        var formEditArticle = document.getElementById('edit_Article');
        let infoArticle = document.querySelector('#container_Article')
        var msg = document.querySelector('#msg');
        if(formEditArticle !== null){
            formEditArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        msg.innerHTML = 'maj OK'
                        infoArticle.innerHTML =HttpRequest.responseText;
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
        console.log(article);
        let elementHtml_tr = document.createElement('tr');

            let elementHtml_Td_Id = document.createElement('td');
            elementHtml_Td_Id.innerHTML = article.id;
            elementHtml_tr.appendChild(elementHtml_Td_Id);

            let elementHtml_Td_Date = document.createElement('td');
            elementHtml_Td_Date.innerHTML = article.date;
            elementHtml_tr.appendChild(elementHtml_Td_Date);

            let elementHtml_Td_Title = document.createElement('td');
            elementHtml_Td_Title.innerHTML = article.title;
            elementHtml_tr.appendChild(elementHtml_Td_Title);

            let elementHtml_Td_Content = document.createElement('td');
            elementHtml_Td_Content.innerHTML = article.content;
            elementHtml_tr.appendChild(elementHtml_Td_Content);

            let elementHtml_Td_Autor = document.createElement('td');
            elementHtml_Td_Autor.innerHTML = article.lastname+' '+article.firstname;
            elementHtml_tr.appendChild(elementHtml_Td_Autor);

            let elementHtml_Td_Action = document.createElement('td');
            let elementHtml_A_Edit = document.createElement('a');
            elementHtml_A_Edit.classList.add("btn");
            elementHtml_A_Edit.classList.add("btn_Edit_Article");
            elementHtml_A_Edit.href = this.basepath+"/Administration/editArticle/"+article.id;
            elementHtml_A_Edit.innerHTML = "Editer"
            elementHtml_Td_Action.appendChild(elementHtml_A_Edit);

            let elementHtml_A_Delete = document.createElement('a');
            elementHtml_A_Delete.classList.add("btn");
            elementHtml_A_Delete.classList.add("btn_Delete_Article");
            elementHtml_A_Delete.href = this.basepath+"/Administration/deleteArticle/"+article.id;
            elementHtml_A_Delete.innerHTML = "Supprimer";
            elementHtml_Td_Action.appendChild(elementHtml_A_Delete);

            elementHtml_tr.appendChild(elementHtml_Td_Action);
        return elementHtml_tr;    
    }
}
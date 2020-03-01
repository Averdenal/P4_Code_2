class Comments
{
    
    constructor()
    {
        this.delete_com();
        this.add_Comment();
        this.basepath = "/P4_Code_2";
    }

    delete_com()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Delete') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Commentaire Supprimé'
                        let comments = JSON.parse(HttpRequest.responseText);
                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }else if(evt.target.className === 'btn btn_Delete_Admin'){
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();

                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        alert('Commentaire Supprimé')
                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
                location.reload();
            }
        }, false);
    }
    add_Comment(){
        
        var formv = document.getElementById('form_Comment');
        if(formv !== null){
            formv.addEventListener('submit',function(e){
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        let info = document.getElementById('container_Comment');
                        let infomsg = document.querySelector('#info');
                        let textarea = document.getElementById('textComs');
                        textarea.value = "";
                        infomsg.innerHTML = 'Commentaire Ajouté '
                        let comments = JSON.parse(HttpRequest.responseText);
                        comments.forEach(element => {
                            create_Comment(element.comment,element.autorIsConnect,element,warningByConnnect);
                        });
                    }
                }
                let data = new FormData(formv)
                HttpRequest.open('POST','/P4_Code_2/Articles/addComment',false);
                HttpRequest.send(data);
                e.preventDefault();
                //location.reload();
            });
        }
    }
    create_Comment(comment,autor,warning){
        let item_Comment = document.createElement('div');
        item_Comment.item_Comment.classList.add("item_Comment");

            let comment_Content = document.createElement('p');
            comment_Content.innerHTML = comment.content;
        item_Comment.appendChild(comment_Content);

        let comment_Info = document.createElement('div');
            let comment_Date = document.createElement('p');
            comment_Date.innerHTML = comment.date;
            comment_Info.appendChild(comment_Date);

            let comment_Autor = document.createElement('p');
            comment_Autor.innerHTML = comment.firstname+' '+comment.lastname;
            comment_Info.appendChild(comment_Autor);
        item_Comment.appendChild(comment_Info);

            let action = document.createElement('div');
            if(autor == 1){
                let action_A_Delete = document.createElement('a');
                action_A_Delete.classList.add('btn');
                action_A_Delete.classList.add('btn_Delete');
                action_A_Delete.href = this.basepath+'/Articles/deleteComment/'+comment.id+'/'+comment.article;
                action.appendChild(action_A_Delete);
            }
            if(warning != 1){
                let action_A_Warning = document.createElement('a');
                action_A_Warning.classList.add('btn');
                action_A_Warning.classList.add('btn_Warning');
                action_A_Warning.href = this.basepath+'/Articles/addWarning/'+comment.id+'/'+comment.article;
                action.appendChild(action_A_Warning);
            }
                
        item_Comment.appendChild(action);
        return item_Comment;
    }
    
}
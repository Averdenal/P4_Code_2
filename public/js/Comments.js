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
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_Delete') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                HttpRequest.onreadystatechange = () => {
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Commentaire Supprimé'
                        
                            let comments = JSON.parse(HttpRequest.responseText);
                            info.innerHTML ="";
                            comments.forEach(element => {
                                info.appendChild(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                            });
                        
                        
                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }else if(evt.target.className === 'btn btn_Delete_Admin'){
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let zone_Comments = document.getElementById('zone_Comments');

                HttpRequest.onreadystatechange = () => {
                    if(HttpRequest.readyState === 4){
                        zone_Comments.innerHTML ="";
                        let comments = JSON.parse(HttpRequest.responseText);
                        comments.forEach(element => {
                            zone_Comments.appendChild(this.create_Admin_Liste_Comment(element));
                        });
                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }
        }, false);
    }
    add_Comment(){
        
        var formv = document.getElementById('form_Comment');
        if(formv !== null){
            formv.addEventListener('submit',(evt)=>{
                debugger
                console.log('info');
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = ()=>{
                    if(HttpRequest.readyState === 4){
                        console.log('demo');
                        let info = document.getElementById('container_Comment');
                        let infomsg = document.querySelector('#info');
                        let textarea = document.getElementById('textComs');
                        textarea.value = "";
                        infomsg.innerHTML = 'Commentaire Ajouté'
                        let comments = JSON.parse(HttpRequest.responseText);
                        info.innerHTML ="";
                        comments.forEach(element => {
                            info.appendChild(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                        });
                    }
                }
                
                let data = new FormData(formv)
                HttpRequest.open('POST','/P4_Code_2/Articles/addComment',false);
                HttpRequest.send(data);
                
            });
        }
    }
    create_Comment(comment,user,warning){
        let item_Comment = document.createElement('div');
        item_Comment.classList.add("item_Comment");

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
            if(user.id == comment.user || user.rang == 'admin'){
                let action_A_Delete = document.createElement('a');
                action_A_Delete.classList.add('btn');
                action_A_Delete.classList.add('btn_Delete');
                action_A_Delete.href = this.basepath+'/Articles/deleteComment/'+comment.id+'/'+comment.article;
                action_A_Delete.innerHTML = "Supprimer";
                action.appendChild(action_A_Delete);
            }
            let action_A_Warning = document.createElement('a');
            action_A_Warning.classList.add('btn');
            if(warning != 1 && comment.user != user.id /*&& user.rang != 'admin'*/){
                action_A_Warning.classList.add('btn_Warning');
                action_A_Warning.href = this.basepath+'/Articles/addWarning/'+comment.id+'/'+comment.article;
                action_A_Warning.innerHTML ="Signaler";
                action.appendChild(action_A_Warning);
                
            }else if(warning == 1){
                action_A_Warning.classList.add('btn_Warning_Ok');
                action_A_Warning.innerHTML ="Déjà Signalé"
                action.appendChild(action_A_Warning);
            }
                
        item_Comment.appendChild(action);
        return item_Comment;
    }

    create_Admin_Liste_Comment(comment){

        console.log(comment);
        let tr = document.createElement('tr');

        let td_Id = document.createElement('td');
        td_Id.innerHTML = comment.id;
        tr.appendChild(td_Id);

        let td_Date = document.createElement('td');
        td_Date.innerHTML = comment.date;
        tr.appendChild(td_Date);

        let td_Content = document.createElement('td');
        td_Content.innerHTML = comment.content;
        tr.appendChild(td_Content);

        let td_Autor = document.createElement('td');
        td_Autor.innerHTML = comment.firstname+' '+comment.lastname;
        tr.appendChild(td_Autor);

        let td_Action = document.createElement('td');
            let a_Action = document.createElement('a');
            a_Action.href = this.basepath+'/Administration/deleteComment/'+comment.id;
            a_Action.innerHTML = "Supprimer";
            a_Action.classList.add('btn');
            a_Action.classList.add('btn_Delete_Admin')
            td_Action.appendChild(a_Action);
        tr.appendChild(td_Action);

        return tr;
    }
    
}
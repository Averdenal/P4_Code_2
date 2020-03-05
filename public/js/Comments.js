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
        var add_Comment_Form = $('#form_Comment');
        add_Comment_Form.submit( (e) =>{ 
            e.preventDefault();
            let info = document.getElementById('container_Comment');
            $.ajax({
                url : add_Comment_Form.attr("action"),
                type: add_Comment_Form.attr("method"),
                data : add_Comment_Form.serialize()
            }).done((response)=>{ 
                var zone_Comments = ''
                var comments = JSON.parse(response);
                comments.forEach(element => {
                    zone_Comments += this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect);
                });
                info.innerHTML = zone_Comments;
            });
        });
    }
    create_Comment(comment,user,warning){

        
        var btn_Delete = "<a class='btn btn_Delete' href='"+this.basepath+'/Articles/deleteComment/'+comment.id+'/'+comment.article+"'>Supprimer</a>";
        var btn_Warning = "<a class='btn btn_Warning' href='"+this.basepath+'/Articles/addWarning/'+comment.id+'/'+comment.article+"'>Signaler</a>";
        var warning_Ok ="<p class='btn btn_Warning_Ok'>Déjà Signalé</p>";

        var action ='';
        if(user.id == comment.user || user.rang == 'admin'){
            action += btn_Delete;
        }

        if(warning != 1 && comment.user != user.id && user.rang != 'admin')
        {
            action += btn_Warning;
        } 
        else if(warning == 1)
        {
            action += warning_Ok ;
        }

        var comment = "<div class='item_Comment'>"+
        "<p>"+comment.content+"</p>"+
        "<div>"+
        "<p>"+comment.date+"</p>"+
        "<p>"+comment.firstname+" "+comment.lastname+"</p>"+
        "</div>"+
        "<div>"+action+"</div>"+
        "</div>";
        return comment;
    }

    create_Admin_Liste_Comment(comment){
        return create_Admin_Comment = 
            "<tr>"+
                "<td>"+comment.id+"</td>"+
                "<td>"+comment.date+"</td>"+
                "<td>"+comment.content+"</td>"+
                "<td>"+comment.firstname+" "+comment.lastname+"</td>"+
                "<td>"+
                    "<a class='btn btn_Delete_Admin' href='"+this.basepath+"/Administration/deleteComment/"+comment.id+"'></a>"+
                "</td>"+
            "</tr>";
    }
    
}
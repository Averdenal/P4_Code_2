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
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                $.ajax({
                    url:evt.target.pathname,
                    type:"DELETE"
                }).done((reponse) => {
                    infomsg.innerHTML = 'Commentaire Supprimé';
                    let comments = JSON.parse(reponse);
                        info.innerHTML ="";
                        comments.forEach(element => {
                            info.appendChild(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                        });  
                })                            
            }else if(evt.target.className === 'btn btn_Delete_Admin'){
                evt.preventDefault();
                let zone_Comments = document.getElementById('zone_Comments');
                $.ajax({
                    url:evt.target.pathname,
                    type:"DELETE"
                }).done((response)=>{
                    zone_Comments.innerHTML ="";
                    let comments = JSON.parse(response);
                    comments.forEach(element => {
                        zone_Comments.appendChild(this.create_Admin_Liste_Comment(element));
                    });
                })
            }
        });
    }

    add_Comment(){
        var add_Comment_Form = $('#form_Comment');
        add_Comment_Form.submit((e) =>{ 
            e.preventDefault();
            let info = document.getElementById('container_Comment');
            $.ajax({
                url : add_Comment_Form.attr("action"),
                type: add_Comment_Form.attr("method"),
                data : add_Comment_Form.serialize()
            }).done((response)=>{ 
                info.innerHTML = ''
                var comments = JSON.parse(response);
                comments.forEach(element => {
                    info.appendChild(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                });
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

        var comment = $("<div class='item_Comment'>"+
        "<p>"+comment.content+"</p>"+
        "<div>"+
        "<p>"+comment.date+"</p>"+
        "<p>"+comment.firstname+" "+comment.lastname+"</p>"+
        "</div>"+
        "<div>"+action+"</div>"+
        "</div>");
        return comment[0];
    }

    create_Admin_Liste_Comment(comment){
        var comment = $("<tr>"+
                "<td>"+comment.id+"</td>"+
                "<td>"+comment.date+"</td>"+
                "<td>"+comment.content+"</td>"+
                "<td>"+comment.firstname+" "+comment.lastname+"</td>"+
                "<td>"+
                    "<a class='btn btn_Delete_Admin' href='"+this.basepath+"/Administration/deleteComment/"+comment.id+"'>Supprimer</a>"+
                "</td>"+
            "</tr>");
        return comment[0];
    }
    
}
class Comments
{
    
    constructor()
    {
        this.delete_com();
        this.add_Comment();
        this.delete_com_admin();
        this.className = {'admin':'btn btn_Delete_Admin btn-danger','defaut':'btn btn_Delete btn-danger'}
    }

    delete_com()
    {
        $('.btn_Delete_Comments').on('click',function(e){
            e.preventDefault();
            var btn = $(this);
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Articles/deleteComment/"+$(this).data('idcomment')+"/"+$(this).data('idarticle'),
                success:((reponse) => {
                    btn.parents('.comment_Item').remove(); //delete la ligne
                })
             })
        });
    }

    delete_com_admin(){
        $('.btn_Delete_Comments_Admin').on('click', function(e){
            e.preventDefault();
            var btn = $(this);
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Administration/deleteComment/"+$(this).data('id'),
                success: function (response) {
                    btn.parents('.comment_Item_Admin').remove(); //delete la ligne
                }
            });
        })
    }

    add_Comment(){
        var add_Comment_Form = $('#form_Comment');
        add_Comment_Form.submit((e) =>{ 
            e.preventDefault();
            let info = document.getElementById('container_Comment');
            $.ajax({
                url : add_Comment_Form.attr("action"),
                type: add_Comment_Form.attr("method"),
                data : add_Comment_Form.serialize(),
                success:((response)=>{ 
                    info.innerHTML = ''
                    var comments = JSON.parse(response);
                    comments.forEach(element => {
                        info.appendChild(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                    });
                })
            })
        });
    }
    create_Comment(comment,user,warning){

        
        var btn_Delete = "<a class='btn btn_Delete_Comments btn-danger' data-idArticle='"+comment.article+"' data-idComment='"+comment.id+"'>Supprimer</a>";
        var btn_Warning = "<a class='btn btn_Warning btn-warning' href='"+app.basepath+'/Articles/addWarning/'+comment.id+'/'+comment.article+"'>Signaler</a>";
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
        var comment = $("<article class='card'><div class='card-body'><p class='card-text'>"+comment.content+"</p>"+
        "</div><div class='card-footer text-muted justify-content-between flex'><div><p>"+comment.date+"</p></div>"+
        "<div>"+action+"</div>"+
        "<div>"+comment.firstname+" "+comment.lastname+"</div>")
        return comment[0];
    }

    create_Admin_Liste_Comment(comment){
        var comment = $("<tr>"+
                "<td>"+comment.id+"</td>"+
                "<td>"+comment.date+"</td>"+
                "<td>"+comment.content+"</td>"+
                "<td>"+comment.firstname+" "+comment.lastname+"</td>"+
                "<td>"+
                    "<a class='btn btn_Delete_Admin btn-danger' title='Supprimer' href='"+app.basepath+"/Administration/deleteComment/"+comment.id+"'></a>"+
                "</td>"+
            "</tr>");
        return comment[0];
    }

    create_Alert(msg){
        return $("<div id='alert' class='alert alert-warning alert-dismissible fade show' role='alert'>"+
        "<strong>"+msg+"</strong>"+
        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
          "<span aria-hidden='true'>&times;</span>"+
        "</button>"+
      "</div>")[0];
    }
    
}
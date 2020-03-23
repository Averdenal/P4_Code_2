class Comments
{
    
    constructor()
    {
        this.delete_com();
        this.add_Comment();
        this.delete_com_admin();
    }

    delete_com()
    {
        $('#container_Comment').on('click','.btn_Delete_Comments',function(e){
            e.preventDefault();
            var btn = $(this);
            var info = $("#info")
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Articles/deleteComment/"+$(this).data('idcomment')+"/"+$(this).data('idarticle'),
                success:(() => {
                    btn.parents('.comment_Item').remove();
                    info.append(app.create_Alert('Commentaire supprimé'))
                })
             })
             setTimeout(() => {
                info.html('');
            }, 2000);
        });
    }

    delete_com_admin(){
        $('.btn_Delete_Comments_Admin').on('click',function(e){
            e.preventDefault();
            var info = $('#info');
            var btn = $(this);
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Administration/deleteComment/"+$(this).data('id'),
                success:  (response) => {
                    btn.parents('.comment_Item_Admin').remove();
                    info.append(app.create_Alert('Commentaire supprimé'))
                }
            });
            setTimeout(() => {
                info.html('');
            }, 2000);
        })
    }

    add_Comment(){
        $('#form_Comment').on('submit',(e) => { 
            if($('textarea[name="content"]').val() != null){
                var info = $('#info');
                e.preventDefault();
                $.ajax({
                    url : app.basepath+"/Articles/addComment",
                    type: "POST",
                    data : {
                        idArticle: $('#form_Comment').data('id'),
                        content: $('textarea[name="content"]').val()
                    },
                    success:((response)=>{ 
                        info.append(app.create_Alert('Commentaire ajouté'))
                        $('#textComs').val('');
                        $('#container_Comment').html(' ');
                        JSON.parse(response).forEach(element => {
                            $('#container_Comment').append(this.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                        });
                    })
                })
                setTimeout(() => {
                    info.html('');
                }, 2000);
            }
        });
    }
    create_Comment(comment,user,warning){

        
        var btn_Delete = "<buttom class='btn btn_Delete_Comments btn-danger' data-idarticle='"+comment.article+"' data-idcomment='"+comment.id+"'>Supprimer</buttom>";
        var btn_Warning = "<buttom class='btn btn_Warning btn-warning' data-idcomment='"+comment.id+"' data-idarticle= '"+comment.article+"'>Signaler</buttom>";
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
        return $("<article class='card comment_Item'><div class='card-body'><p class='card-text'>"+comment.content+"</p>"+
        "</div><div class='card-footer text-muted justify-content-between flex'><div><p>"+comment.date+"</p></div>"+
        "<div>"+action+"</div>"+
        "<div>"+comment.firstname+" "+comment.lastname+"</div>");
    }

    create_Admin_Liste_Comment(comment){
        var comment = $("<tr>"+
                "<td>"+comment.id+"</td>"+
                "<td>"+comment.date+"</td>"+
                "<td>"+comment.content+"</td>"+
                "<td>"+comment.firstname+" "+comment.lastname+"</td>"+
                "<td>"+
                    "<button class='btn btn_Delete_Admin btn-danger' title='Supprimer' data-id='"+comment.id+"'></button>"+
                "</td>"+
            "</tr>");
        return comment;
    }
    
}
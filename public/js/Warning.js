class Warning
{
    constructor(){
        this.addWarning();
        this.valide_warning();
        this.delete_Warning();
    }

    addWarning(){
        $(".btn_Warning").on('click',function (e){
            e.preventDefault();
            var btn = $(this);
            $.ajax({
                type: "GET",
                url: app.basepath+"/Articles/addWarning/"+btn.data('idcomment')+"/"+btn.data('idarticle'),
                success: function (response) {
                    $('#container_Comment').html("");
                    JSON.parse(response).forEach(element => {
                        $('#container_Comment').append(app.coms.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                    });
                }
            });
        })
    }
    valide_warning()
    {
        $('.btn_Valide_Warning').on('click',function(e) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Administration/deleteComment/"+$(this).data('id'),
                success: function (response) {
                    location.reload();
                }
            });
        })
    }
    delete_Warning()
    {
        $('.btn_Delete_Warning').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: app.basepath+"/Administration/deleteWarning/"+ $(this).data('id'),
                success: function (response) {
                    location.reload();
                }
            });   
        })
    }
}
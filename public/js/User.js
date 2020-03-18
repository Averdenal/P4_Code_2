class User{
    constructor()
    {
        this.deleteUser();
        this.register();
        this.classDelete = 'btn btn_Delete_User btn-danger';
    }

    deleteUser(){
        $('.btn_Delete_User').on('click', (evt) => {
            evt.preventDefault();
            $.ajax({
                type: "DELETE",
                url: evt.target.pathname,
                success:((reponse)=>{
                    if(reponse != "impossible"){
                        $('#container_user').html(" ");
                        JSON.parse(reponse).forEach(user => {
                            $('#container_user').append(this.create_Admin_Liste_User(user));
                        });
                    }else{
                        console.log(reponse);
                    }
                })
            })
        })
    }
    
    create_Admin_Liste_User(users){
        var user = $("<tr>"+
        "<td>"+users.id+"</td>"+
        "<td>"+users.firstname+" "+users.lastname+"</td>"+
        "<td>"+users.login+"</td>"+
        "<td>"+users.email+"</td>"+
        "<td><a class='btn btn_Delete_User btn-danger' href='"+app.basepath+"/Administration/deleteUser/"+users.id+"'></a></td></tr>");
        return user;
    }

    register()
    {
        var formv = $('#register');
        if(formv !== null){
            $('#register').on('submit',(e) => { 
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: app.basepath+'/Authentification/register',
                    data: formv.serialize(),
                    success: function (response) {
                        $("#info_Register").html(response);
                    }
                });
            });
        }
    }
}
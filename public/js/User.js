class User{
    constructor()
    {
        this.deleteUser();
        this.register();
        this.classDelete = 'btn btn_Delete_User btn-danger';
    }

    deleteUser(){
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === this.classDelete) {
                evt.preventDefault();
                var container_User = document.querySelector('#container_user')
                $.ajax({
                    type: "DELETE",
                    url: evt.target.pathname,
                    success:((reponse)=>{
                        if(reponse != "impossible"){
                            container_User.innerHTML ="";
                            console.log(reponse);
                            JSON.parse(reponse).forEach(user => {
                                container_User.appendChild(this.create_Admin_Liste_User(user));
                            });
                        }else{
                            console.log(reponse);
                        }
                    })
                })
            }
        });
    }
    
    create_Admin_Liste_User(users){
        var user = $("<tr>"+
        "<td>"+users.id+"</td>"+
        "<td>"+users.firstname+" "+users.lastname+"</td>"+
        "<td>"+users.login+"</td>"+
        "<td>"+users.email+"</td>"+
        "<td><a class='btn btn_Delete_User btn-danger' href='"+app.basepath+"/Administration/deleteUser/"+users.id+"'></a></td></tr>");
        return user[0];
    }

    register()
    {
        var formv = $('#register');
        if(formv !== null){
            formv.submit((e) => { 
                e.preventDefault();
                let info_Register = document.getElementById('info_Register');
                $.ajax({
                    type: "POST",
                    url: app.basepath+'/Authentification/register',
                    data: formv.serialize(),
                    success: function (response) {
                        info_Register.innerHTML = response;
                    }
                });
            });
        }
    }

}
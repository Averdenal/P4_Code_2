class User{
    constructor()
    {
        this.deleteUser();
        this.register();
        this.classDelete = 'btn btn_Delete_User btn-danger';
        this.btn_Modif_Rang();
        this.modif_user();
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

    modif_user(){
        debugger
        var form_modif_user = $('#form_Modif_User')
        if(form_modif_user != null){
            form_modif_user.submit((e) => { 
                console.log(form_modif_user.serialize());
                e.preventDefault();
                $.ajax({
                    type: "PUT",
                    url: "url",
                    data: form_modif_user.serialize(),
                    success: function (response) {
                        
                    }
                });
                
            });
        }
    }

    btn_Modif_Rang(){
        var zone_Rang = $('#modif_rang');
        var btn_Modif_Rang = $('#btn_modif_rang');
        var zone_Select_Rang = $('#selet_Rang');

        zone_Rang.css('display', 'flex');
        zone_Select_Rang.css('display', 'none');
        btn_Modif_Rang.click( (e) => { 
            e.preventDefault();
            this.modif_Rang();
        });
    }

    modif_Rang(){
        var zone_Rang = $('#modif_rang');
        var zone_Select_Rang = $('#selet_Rang');

        zone_Select_Rang.css('display', 'block');
        zone_Rang.css('display','none');
    }
}
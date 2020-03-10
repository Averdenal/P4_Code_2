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
                $.ajax({
                    type: "DELETE",
                    url: evt.target.pathname
                }).done((reponse)=>{
                    if(reponse != "impossible"){
                        JSON.parse(reponse).forEach(user => {
                            console.log(this.create_Admin_Liste_User(user));
                        });
                    }else{
                        console.log(reponse);
                    }
                    
                });
            }
        });
    }
    
    create_Admin_Liste_User(users){
        var user = $("<tr>"+
        "<td>"+users.id+"</td>"+
        "<td>"+users.firstname+" "+users.lastname+"</td>"+
        "<td>"+users.login+"</td>"+
        "<td>"+users.email+"</td>"+
        "<td><a class='btn btn_Delete_User btn-danger' href='"+info+"'>Supprimer</a></td></tr>");
        return user;
    }

    register()
    {
        var formv = document.getElementById('register');
        if(formv !== null){
            formv.addEventListener('submit',(e) =>{
                e.preventDefault();
                let info_Register = document.getElementById('info_Register');
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = ()=>{
                    if(HttpRequest.readyState === 4){
                        info_Register.innerHTML = HttpRequest.responseText;
                    }
                }
                let data = new FormData(formv)
                HttpRequest.open('POST',app.basepath+'/Authentification/register',true);
                HttpRequest.send(data);
            });
        }
    }

}
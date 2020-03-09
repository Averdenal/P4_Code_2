class User{
    constructor()
    {
        this.deleteUser();
    }

    deleteUser(){
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_User_Delete') {
                $.ajax({
                    type: "DELETE",
                    url: evt.target.pathname,
                    success: function (response) {
                        location.reload();
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
        "<td><a class='btn btn_User_Delete' href='"+info+"'>Supprimer</a></td></tr>");
        return user;
    }


}
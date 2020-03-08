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
        
    }


}
class User{
    constructor()
    {
        this.deleteUser();
    }

    deleteUser(){
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_User_Delete') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = () => {
                    if(HttpRequest.readyState === 4){
                        let rep = HttpRequest.responseText;
                        location.reload();
                        

                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();

            }
        });
    }
}
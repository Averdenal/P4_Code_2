class Comments
{
    
    constructor()
    {
        this.delete_com();
    }

    delete_com()
    {
        document.body.addEventListener('click', function (evt) {
            console.log(evt.target.className)
            if (evt.target.className === 'btn btn_Delete') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Commentaire Supprimé'
                        info.innerHTML =HttpRequest.responseText;
                    }
                }
                console.log(evt.target.pathname);
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }
        }, false);
    }
}
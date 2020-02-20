class Comments
{
    
    constructor()
    {
        this.delete_com();
    }

    delete_com()
    {
        document.body.addEventListener('click', function (evt) {
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
            }else if(evt.target.className === 'btn btn_Delete_Admin'){
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();

                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        alert('Commentaire Supprimé')
                    }
                }
                console.log(evt.target.pathname);
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
                location.reload();
            }
        }, false);
    }
}
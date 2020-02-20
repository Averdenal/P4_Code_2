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
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        alert('Commentaire Supprimé');
                    }
                }
                console.log(evt.target.pathname);
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
                location.reload();
            }else if(evt.target.className === 'btn btn_Delete_Admin'){
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();

                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        alert('Commentaire Supprimé');
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
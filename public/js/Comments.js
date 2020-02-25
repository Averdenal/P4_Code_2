class Comments
{
    
    constructor()
    {
        this.delete_com();
        this.add_Comment();
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
    add_Comment(){
        
        var formv = document.getElementById('form_Comment');
        if(formv !== null){
            formv.addEventListener('submit',function(e){
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        let info = document.getElementById('container_Comment');
                        let infomsg = document.querySelector('#info');
                        let textarea = document.getElementById('textComs');
                        textarea.value = "";
                        infomsg.innerHTML = 'Commentaire Ajouté '
                        info.innerHTML =HttpRequest.responseText;
                    }
                }
                let data = new FormData(formv)
                HttpRequest.open('POST','/P4_Code_2/Articles/addComment',false);
                HttpRequest.send(data);
                e.preventDefault();
            });
        }
    }
    
}
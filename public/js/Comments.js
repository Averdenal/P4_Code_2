class Comments
{
    
    constructor()
    {

    }
    gestionDeleteComments(e)
    {
        e.preventDefault();
        console.log("Clicked " + info);
    }

    deleteComment(pathname)
    {   
        let HttpRequest = new XMLHttpRequest();
        HttpRequest.onreadystatechange = function(){
            if(HttpRequest.readyState === 4){
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                let textarea = document.getElementById('textComs');
                textarea.value = "";
                infomsg.innerHTML = 'Commentaire Supprimé '
                info.innerHTML =HttpRequest.responseText;
            }
        }
        HttpRequest.open('GET',pathname,true);
        HttpRequest.send();
        
    }
}
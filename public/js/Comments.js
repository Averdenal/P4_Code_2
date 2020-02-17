class Comments
{
    
    constructor()
    {
        this.btn_Delete = document.getElementsByClassName('btn_Delete');  
        this.gestionDeleteComments(); 
    }

    gestionDeleteComments(){
        for (var i = 0; i < this.btn_Delete.length; i++) {
            var info = this.btn_Delete[i].pathname;
            console.log(info)
            this.btn_Delete[i].addEventListener('click',(e)=>{
                e.preventDefault();
                console.log("Clicked " + this.btn_Delete[i].pathname);
            });
           
        }
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
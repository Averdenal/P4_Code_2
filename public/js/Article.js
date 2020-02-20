class Article
{
    constructor(){
        this.newArticle();
        this.deleteArticle();
        this.editArticle();
    }
    newArticle(){
        var formAddArticle = document.getElementById('add_Article');
        var info = document.querySelector('container_Article');
        var msg = document.querySelector('#info');
        console.log(formAddArticle);
        if(formAddArticle !== null){
            formAddArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        msg.innerHTML = 'Article est bien créé'
                        info.innerHTML =HttpRequest.responseText;
                    }
                }
                let data = new FormData(formAddArticle)
                HttpRequest.open('POST','/P4_Code_2/Administration/createArticle',true);
                HttpRequest.send(data);
            });
        }
    }

    deleteArticle()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Delete_Article') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let infomsg  = document.querySelector('#info');
                let infoArticle = document.querySelector('#container_Article')
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Article Supprimé'
                        infoArticle.innerHTML = HttpRequest.responseText;

                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }
        });
    }

    editArticle()
    {
        var formEditArticle = document.getElementById('edit_Article');
        let infoArticle = document.querySelector('#container_Article')
        var msg = document.querySelector('#msg');
        if(formEditArticle !== null){
            formEditArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        msg.innerHTML = 'maj OK'
                        infoArticle.innerHTML =HttpRequest.responseText;
                    }
                }
                let data = new FormData(formEditArticle)
                HttpRequest.open('POST','/P4_Code_2/Administration/majArticle',true);
                HttpRequest.send(data);
                setInterval(function(){
                    location.reload();
                },1000)
                
            });
        }
    }
}
class Article
{
    constructor(){
        this.newArticle();
        this.deleteArticle();
    }
    newArticle(){
        var formAddArticle = document.getElementById('add_Article');
        var info = document.getElementById('infoAddArticle');
        console.log(formAddArticle);
        if(formAddArticle !== null){
            formAddArticle.addEventListener('submit',function(e){
                e.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
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
            console.log(evt.target.className)
            if (evt.target.className === 'btn btn_Delete_Article') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let infomsg = document.querySelector('#msg');
                let infoArticle = document.querySelector('#info')
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Article Supprimé'
                        infoArticle.innerHTML = HttpRequest.responseText;

                    }
                }
                console.log(evt.target.pathname);
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
            }
        });
    }
}
class Article
{
    constructor(){
        this.newArticle();
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
}
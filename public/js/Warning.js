class Warning
{
    constructor(){
        this.addWarning();
        this.delete_Warning();
        this.valide_warning();
        this.coms = new Comments();
    }

    addWarning(){
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_Warning') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                HttpRequest.onreadystatechange = () => {
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Commentaire signalé';
                        console.log(HttpRequest.responseText);
                        let comments = JSON.parse(HttpRequest.responseText);
                        console.log(HttpRequest.responseText);
                        info.innerHTML ="";
                        comments.forEach(element => {
                            info.appendChild(this.coms.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                        });

                    }
                }
                console.log(evt.target.pathname);
                HttpRequest.open('GET',evt.target.pathname,true);
                HttpRequest.send();
            }
        }, false);
    }
    valide_warning()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Valide_Warning') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let infomsg = document.querySelector('#info_msg');
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Commentaire Supprimé'
                    }
                }
                HttpRequest.open('DELETE',evt.target.pathname,true);
                HttpRequest.send();
                location.reload();
            }
        });
    }
    delete_Warning()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Delete_Warning') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                let infomsg = document.querySelector('#info_msg');
                HttpRequest.onreadystatechange = function(){
                    if(HttpRequest.readyState === 4){
                        infomsg.innerHTML = 'Warning Supprimé'
                    }
                }
                HttpRequest.open('GET',evt.target.pathname,true);
                HttpRequest.send();
                location.reload();
            }
        });
    }
}
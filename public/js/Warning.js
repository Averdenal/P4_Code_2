class Warning
{
    constructor(){
        this.addWarning();
        this.valideWarning();
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

    valideWarning()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Warning_Valide') {
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
                setInterval(() => {
                    location.reload();
                }, 2000);
            }
        }, false);
    }
}
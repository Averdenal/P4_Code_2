class Warning
{
    constructor(){
        this.addWarning();
        this.delete_Warning();
        this.valide_warning();
    }

    addWarning(){
        document.body.addEventListener('click', (evt) => {
            if (evt.target.className === 'btn btn_Warning') {
                evt.preventDefault();
                let info = document.getElementById('container_Comment');
                let infomsg = document.querySelector('#info');
                $.ajax({
                    type: "GET",
                    url: evt.target.pathname,
                    success: function (response) {
                        infomsg.innerHTML = 'Commentaire signalé';
                        let comments = JSON.parse(response);
                        info.innerHTML ="";
                        comments.forEach(element => {
                            info.appendChild(app.coms.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                        });
                    }
                });
            }
        }, false);
    }
    valide_warning()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Valide_Warning') {
                evt.preventDefault();
                let infomsg = document.querySelector('#info_msg');
                $.ajax({
                    type: "DELETE",
                    url: evt.target.pathname,
                    success: function (response) {
                        infomsg.innerHTML = 'Commentaire Supprimé'
                        location.reload();
                    }
                });
            }
        });
    }
    delete_Warning()
    {
        document.body.addEventListener('click', function (evt) {
            if (evt.target.className === 'btn btn_Delete_Warning') {
                evt.preventDefault();
                let infomsg = document.querySelector('#info_msg');
                $.ajax({
                    type: "GET",
                    url: evt.target.pathname,
                    success: function (response) {
                        infomsg.innerHTML = 'Warning Supprimé';
                        location.reload();
                    }
                });                
            }
        });
    }
}
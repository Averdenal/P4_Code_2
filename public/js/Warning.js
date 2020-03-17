class Warning
{
    constructor(){
        this.init();
    }
    init(){
        document.body.addEventListener('click', (evt) => {
            console.log(evt.target.className);
                switch (evt.target.className) {
                    case 'btn btn_Warning btn-warning':
                        this.addWarning(evt);
                        break;
                    case 'btn btn_Valide_Warning btn-danger':
                        this.valide_warning(evt);
                        break;
                    case 'btn btn_Delete_Warning btn-success':
                        this.delete_Warning(evt);
                        break;
                }
            });
    }

    addWarning(evt){
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
                debugger
                comments.forEach(element => {
                    info.appendChild(app.coms.create_Comment(element.comment,element.autorIsConnect,element.warningByConnect));
                });
            }
        });
    }
    valide_warning(evt)
    {
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
    delete_Warning(evt)
    {
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
}
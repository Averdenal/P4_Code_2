class App{
    constructor(){
        this.init();
        //this.tiny();
        this.delete_com();
    }
    delete_com()
    {
        document.body.addEventListener('click', function (evt) {
            console.log(evt.target.className)
            if (evt.target.className === 'btn btn_Delete') {
                evt.preventDefault();
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = function(){
                if(HttpRequest.readyState === 4){
                    let info = document.getElementById('container_Comment');
                    let infomsg = document.querySelector('#info');
                    infomsg.innerHTML = 'Commentaire Supprimé'
                    info.innerHTML =HttpRequest.responseText;
                }
            }
            HttpRequest.open('DELETE',evt.target.pathname,false);
            HttpRequest.send();
            }
        }, false);
    }
    init(){
        let form_Connection = document.getElementById('form_Connection');
        let form_Register = document.getElementById('form_Register');
        let closeConnexionBtn = document.getElementById('closeConnexionBtn');
        let zoneConnexion = document.getElementById('connection');

        let btConnexion = document.getElementById('connexionBtn');
        if(btConnexion !== null){
            btConnexion.addEventListener('click',function(){
                zoneConnexion.style.display = 'block';
            });
        }
        closeConnexionBtn.addEventListener('click',function(){
            zoneConnexion.style.display = 'none';
        });

        let btActionRegister = document.getElementById('action_Register');
        btActionRegister.addEventListener('click',function(){
            form_Connection.style.display = 'none';
            form_Register.style.display = 'block'
        });
        let btActionConnection = document.getElementById('action_Connection');
        btActionConnection.addEventListener('click',function(){
            form_Connection.style.display = 'block';
            form_Register.style.display = 'none'
        });
        var formv = document.getElementById('form_Comment');
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
            HttpRequest.open('POST','/P4_Code_2/Comment/addComment',false);
            HttpRequest.send(data);
            e.preventDefault();
        });
    }

    tiny() {
        tinymce.init({
            selector: 'textarea',
            height: 200,
            menubar: false,
            plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
            ' bold italic backcolor | alignleft aligncenter ' +
            ' alignright alignjustify | bullist numlist outdent indent |' +
            ' removeformat | help'
        });
          
    }
}
/**
 * jquery
 * bootstrap
 * dellcomment vérif user
 */

class App{
    constructor(){
        this.init();
        this.tiny();
        this.register();
        this.coms = new Comments();
        new Article();
        new Warning();
        new User();
        this.basepath = "/P4_Code_2";
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
        if(closeConnexionBtn !== null){
            closeConnexionBtn.addEventListener('click',function(){
                zoneConnexion.style.display = 'none';
            });
        }

        let btActionRegister = document.getElementById('action_Register');
        if(btActionRegister !== null){
            btActionRegister.addEventListener('click',function(){
                form_Connection.style.display = 'none';
                form_Register.style.display = 'block'
            });
        }
        let btActionConnection = document.getElementById('action_Connection');
        if(btActionConnection !== null){
            btActionConnection.addEventListener('click',function(){
                form_Connection.style.display = 'block';
                form_Register.style.display = 'none'
            });
        }
    }

    tiny() {
        return tinymce.init({
            selector: '#Form_content',
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

    register()
    {
        var formv = document.getElementById('register');
        if(formv !== null){
            formv.addEventListener('submit',(e) =>{
                e.preventDefault();
                let info_Register = document.getElementById('info_Register');
                let HttpRequest = new XMLHttpRequest();
                HttpRequest.onreadystatechange = ()=>{
                    if(HttpRequest.readyState === 4){
                        info_Register.innerHTML = HttpRequest.responseText;
                    }
                }
                let data = new FormData(formv)
                HttpRequest.open('POST',this.basepath+'/Authentification/register',true);
                HttpRequest.send(data);
            });
        }
    }
}
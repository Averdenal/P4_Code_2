class App{
    constructor(){
        this.init();
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
            e.preventDefault();
            let HttpRequest = new XMLHttpRequest();
            HttpRequest.onreadystatechange = function(){
                if(HttpRequest.readyState === 4){
                    let info = document.querySelector('#info');

                    info.innerHTML =HttpRequest.responseText;
                }
            }
            let data = new FormData(formv)
            console.log(data);
            HttpRequest.open('POST','/P4_Code_2/Comment/addComment',true);
            HttpRequest.send(data);
        });

        
    }
}
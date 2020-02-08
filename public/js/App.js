class App{
    constructor(){
        this.init();
    }

    init(){
        let form_Connection = document.getElementById('form_Connection');
        let form_Register = document.getElementById('form_Register');
        let zoneConnexion = document.getElementById('connection');
        if(document.getElementById('connexionBtn') !== null){
            let btConnexion = document.getElementById('connexionBtn');
            btConnexion.addEventListener('click',function(){
                zoneConnexion.style.display = 'block';
            });
        }

        let closeConnexionBtn = document.getElementById('closeConnexionBtn');
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
    }
}
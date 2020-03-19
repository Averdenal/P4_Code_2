
class App{
    constructor(){
        
        this.init();
        this.tiny();
        this.coms = new Comments();
        new Article();
        new Warning();
        new User();
        this.basepath = "/P4_Code_2";
    }

    init(){
        //console.log($.getJSON( "../../environement.dev.json"));

        let form_Connection = document.getElementById('form_Connection');
        let form_Register = document.getElementById('form_Register');
        let zoneConnexion = document.getElementById('connection');

        $('#connexionBtn').on('click',function () { 
            zoneConnexion.classList.add('active');
        });

        $('#closeConnexionBtn').on('click', function () { 
            zoneConnexion.classList.remove('active');
        });

        $('#action_Register').on('click', function () { 
            form_Connection.classList.add('deactivated');
            form_Register.classList.add('active');
        });

        $('#action_Connection').on('click',function () { 
            form_Connection.classList.remove('deactivated');
            form_Register.classList.remove('active');
         });

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
}
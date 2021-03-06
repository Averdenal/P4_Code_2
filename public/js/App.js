
class App{
    constructor(){
        
        this.init();
        this.tiny();
        this.coms = new Comments();
        new Article();
        new Warning();
        new User();
        this.basepath = "";
        this.form_Register = document.getElementById('form_Register');
        this.form_Connection = document.getElementById('form_Connection');
    }

    init(){
        let zoneConnexion = document.getElementById('connection');

        $('#connexionBtn').on('click',function () { 
            zoneConnexion.classList.add('active');
        });

        $('#closeConnexionBtn').on('click', function () { 
            zoneConnexion.classList.remove('active');
        });

        $('#action_Register').on('click',  () => { 
            this.open_Register();
        });

        $('#action_Connection').on('click', ()=> { 
            this.close_Register();
         });

    }
    open_Register(){
        this.form_Connection.classList.add('deactivated');
        this.form_Register.classList.add('active');
    }
    close_Register(){
        this.form_Connection.classList.remove('deactivated');
        this.form_Register.classList.remove('active');
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
    create_Alert(msg, style = null){
        console.log(style);
        if(style == null){style = "Warning"};
        return $("<div id='alert' class='alert alert-"+style+" alert-dismissible fade show' role='alert'>"+
        "<strong>"+msg+"</strong>"+
        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
          "<span aria-hidden='true'>&times;</span>"+
        "</button>"+
      "</div>");
    }
}
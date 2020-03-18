class Article
{
    constructor(){
        this.newArticle();
        this.deleteArticle();
        this.editArticle();
    }
    newArticle(){
        $('#add_Article').on('submit', (e) => {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: app.basepath+"/Administration/createArticle",
                data: {
                    title: $('input[name="title"]').val(),
                    content: tinyMCE.get('Form_content').getContent()
                },
                success: function (response) {
                    location.replace('/P4_Code_2/Administration/editArticle/'+ response);
                }
            });
        })
    }

    deleteArticle(){
        $('.btn_Delete_Article').on('click',function(){
            var btn = $(this);
            $.ajax({
                type: "DELETE",
                url: app.basepath+"/Administration/deleteArticle/"+$(this).data('id'),
                success:((reponse) => {
                    btn.parents('.article').remove(); //delete la ligne
                })
             })
        })
    }

    editArticle()
    {
        $('#edit_Article').on('submit',(e) =>{
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: app.basepath+"/Administration/majArticle",
                data: {
                    id: $(this).data('id'),
                    title: $('input[name="title"]').val(),
                    content: tinyMCE.get('Form_content').getContent()
                },
                success: function (response) {
                    $('#msg').html('maj OK');
                }
            });
            
        });
    }
    create_Alert(msg){
        return $("<div class='alert alert-warning alert-dismissible fade show' role='alert'>"+
        "<strong>"+msg+"</strong>"+
        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
          "<span aria-hidden='true'>&times;</span>"+
        "</button>"+
      "</div>")[0];
    }
}
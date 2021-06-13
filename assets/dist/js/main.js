$(document).ready(function(){
    $('#images').on('change',function(){ // Ketika melakukan pengambilan gambar
        $('#multiple_upload_form').ajaxForm({ // Memproses kiriman pengambilan gambar
            target:'#images_preview', // Target penampilan gambar
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit(); // Melakukan submit automatis
    });
});
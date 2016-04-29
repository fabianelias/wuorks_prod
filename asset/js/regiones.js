
$(function() {
    $("#region").change(function() {
        
        $("#region option:selected").each(function() {
            
            txtRegion = $('#region').val();
            var url_base = $('#url_base').val();
            $.post(url_base+"profile/getComunas", {
                idregion : txtRegion
            }, function(data) {
                $("#comuna").html(data);
           });
        });
    });
});

function commune(idregion){
    alert(idregion);
}
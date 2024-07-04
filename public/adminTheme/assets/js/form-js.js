var addProgram = {
    success: function(response) {
        $('.error-text').text('');
        $(".save-btn").attr("disabled", false);
        $(".save-btn").html('<i class="fa fa-save fs-6"></i> Save');
        if($.isEmptyObject(response.error)){
            window.location.href = response.redirectUrl;
        }else{
            $.each( response.error, function( key, value ) {
                $.each( value, function( skey, svalue ) {
                    keyNew = key.replace(/\./g,'_');
                    $('.'+keyNew+'_err').text(svalue);
                });
            });
        }
    },
    error: function(xhr, status, error) {
        console.log("AJAX error:", error);
        $(".save-btn").attr("disabled", false);
        $(".save-btn").html('<i class="fa fa-save fs-6"></i> Sign Up Now');
    }
};

$(document).on("click",".save-btn",function(e){
    e.preventDefault();
    $(this).attr("disabled", true);
    $(this).html('<i class="fa fa-spinner fa-spin"></i> Save');
    $(this).parents("form").ajaxSubmit(addProgram);
});

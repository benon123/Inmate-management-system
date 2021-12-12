    function extractFilename(path) {
        if (path.substr(0, 12) === "C:\\fakepath\\")
            return path.substr(12); // modern browser
        var x;
        x = path.lastIndexOf('/');
        if (x >= 0) // Unix-based path
            return path.substr(x+1);
        x = path.lastIndexOf('\\');
        if (x >= 0) // Windows-based path
            return path.substr(x+1);
        return path; // just the filename
    }
    jQuery(function(){
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove(); 
            });
        }, 5000);

        $("#inmate").on('blur', function(){
            let inmate_id = $(this).val();
            $.ajax({
                url: $(this).data('req-url'),
                type: 'GET',
                data: {p_id: inmate_id}
            }).done(function(response) {
                if(response.status !== 200)
                {
                    $("#inmate-error").html(response.message);
                    $("#register-btn").attr('disabled', true);
                    return;
                }
                $("#register-btn").attr('disabled', false);
            })
        });
    });
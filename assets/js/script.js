(function($){

    $(document).ready(function(){

        //  Show Modal if click in the view button
        $(document).on('click','#view_info',function(e){
            e.preventDefault();
            $('#show_data_modal').modal('show');
        });

    });

})(jQuery)

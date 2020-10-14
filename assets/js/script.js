(function($){

    $(document).ready(function(){

        //  Show Modal if click in the view button
        $(document).on('click','#view_info',function(e){
            e.preventDefault();
            $('#show_data_modal').modal('show');
        });


        //  Search Box
        var submitIcon = $('.searchbox-icon');
        var inputBox = $('.searchbox-input');
        var searchBox = $('.searchbox');
        var isOpen = false;
        submitIcon.click(function(){
            if(isOpen == false){
                searchBox.addClass('searchbox-open');
                inputBox.focus();
                isOpen = true;
            } else {
                searchBox.removeClass('searchbox-open');
                inputBox.focusout();
                isOpen = false;
            }
        });
        submitIcon.mouseup(function(){
            return false;
        });

        searchBox.mouseup(function(){
            return false;
        });

        $(document).mouseup(function(){
            if(isOpen == true){
                $('.searchbox-icon').css('display','block');
                submitIcon.click();
            }
        });

    });

    // Serach box Function

    function buttonUp(){
        var inputVal = $('.searchbox-input').val();
        inputVal = $.trim(inputVal).length;
        if( inputVal !== 0){
            $('.searchbox-icon').css('display','none');
        } else {
            $('.searchbox-input').val('');
            $('.searchbox-icon').css('display','block');
        }
    }

})(jQuery)

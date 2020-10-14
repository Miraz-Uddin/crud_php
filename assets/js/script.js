(function($){

    $(document).ready(function(){
        //  Show Modal if click in the view button
        $(document).on('click','#view_info',function(e){
            e.preventDefault();
            let id = $(this).attr('data_id');
            // alert('id = '+id);
            // $('#show_data_modal').modal('show');
            $.ajax({
              url:'show.php',
              method:'POST',
              data:{id:id},
              success:function(data){
                let str = JSON.parse(data);
                // let id = ;
                $('#show_data_modal_id').text(str.id);
                $('#show_data_modal_name').text(str.name);
                $('#show_data_modal_email').text(str.email);
                $('#show_data_modal_cell').text(str.cell);
                $('#show_data_modal_location').text(str.location);
                $('#show_data_modal_gender').text(str.gender);
                $('#show_data_modal_status').text(str.status);
                $('#show_data_modal_age').text(str.age);
                let location = 'assets/uploads/img/students/';
                $('#show_data_modal_photo').attr('src',location+str.photo);
              }
            });
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

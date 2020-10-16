(function($){

    $(document).ready(function(){

        // View All Students Info
        view_all_Students();

        //  All Data Show
        $(document).on('click','#show_all_datas',function(e){
          e.preventDefault();
          view_all_Students();
        });

        //  All Data Show by Search Button
        $(document).on('submit','#search_form',function(e){
          e.preventDefault();
          let search_key = $('#search_field').val();
          // console.log(search_key);
          $.ajax({
            url:'filterData.php',
            method:'POST',
            data:{search_key:search_key},
            success:function(data){
              getALLDATAS(data);
            }
          });
        });

        //  If click in the view button
        $(document).on('click','#view_info',function(e){
            e.preventDefault();
            let id = $(this).attr('data_id');
            $.ajax({
              url:'show.php',
              method:'POST',
              data:{id:id},
              success:function(data){
                let str = JSON.parse(data);
                $('#show_data_modal_id').text(str.id);
                $('#show_data_modal_name').text(str.name);
                $('#show_data_modal_email').text(str.email);
                $('#show_data_modal_cell').text(str.cell);
                $('#show_data_modal_location').text(str.location);
                $('#show_data_modal_gender').text(str.gender);
                $('#show_data_modal_status').text(str.status);

                //  Age Calculating using getAge() Function
                let string = str.age;
                let string_piece = string.split("-");
                let year = string_piece['0'];
                let month = string_piece['1'];
                let day = string_piece['2'];
                string = day+'-'+month+'-'+year;
                let date = getAge(string)+" Yrs.";
                $('#show_data_modal_age').text(date);

                let location = 'assets/uploads/img/students/';
                $('#show_data_modal_photo').attr('src',location+str.photo);
              }
            });
            $('#show_data_modal').modal('show');
        });

        //  If click in the delete button
        $(document).on('click','#delete_info',function(e){
            e.preventDefault();
            let id = $(this).attr('data_id');
            let conf = confirm('Are You Sure to Delete this ?');
            if(conf){
              $.ajax({
                url:'delete.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                  $('#delete_message').html(data);
                }
              });
            }
            view_all_Students();
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

    //  Age Calculator Function
    function getAge(dateString) {
        var dates = dateString.split("-");
        var d = new Date();
        var userday = dates[0];
        var usermonth = dates[1];
        var useryear = dates[2];
        var curday = d.getDate();
        var curmonth = d.getMonth()+1;
        var curyear = d.getFullYear();
        var age = curyear - useryear;
        if((curmonth < usermonth) || ( (curmonth == usermonth) && curday < userday   )){
            age--;
        }

        return age;
    }

    // View All Datas Function
    function view_all_Students(){
      $.ajax({
        url: 'allData.php',
        method: 'POST',
        success:function(data){
          let sql = data;
          getALLDATAS(sql);
        }
      });
    }

    // Get All Data By Passing Query
    function getALLDATAS(sql){
      $.ajax({
        url: 'showAll.php',
        method: 'GET',
        data: {sql:sql} ,
        success:function(data){
          $('#all_students_information').html(data);
        }
      });
    }
})(jQuery)

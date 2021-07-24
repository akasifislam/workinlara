<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dynamically</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        body {
        background-color: #edf2f7;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel Dynamically Add or Remove</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form name="add_name" id="add_name">
                        <div class="alert alert-danger show-error-message" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success show-success-message" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td><input type="text" name="title[]" placeholder="Enter title" class="form-control name_list" / id="title"></td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
                            <input type="button" name="submit" id="submit" class="btn btn-primary" value="Submit" />  
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){      
        var url = "{{ url('add-remove-input-fields') }}";
        var i=1;  
        $('#add').click(function(){  
        var title = $("#title").val();
        i++;  
        $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="title[]" placeholder="Enter title" class="form-control name_list" value="'+title+'" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });  
        $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
        });  
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#submit').click(function(){            
        $.ajax({  
        url:"{{ url('add-remove-input-fields') }}",  
        method:"POST",  
        data:$('#add_name').serialize(),
        type:'json',
        success:function(data)  
            {
                if(data.error){
                    display_error_messages(data.error);
                }else{
                i=1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    $(".show-success-message").find("ul").html('');
                    $(".show-success-message").css('display','block');
                    $(".show-error-message").css('display','none');
                    $(".show-success-message").find("ul").append('<li>Todos Has Been Successfully Inserted.</li>');
                }
            }  
            });  
        });  
            function display_error_messages(msg) {
            $(".show-error-message").find("ul").html('');
            $(".show-error-message").css('display','block');
            $(".show-success-message").css('display','none');
            $.each( msg, function( key, value ) {
            $(".show-error-message").find("ul").append('<li>'+value+'</li>');
        });
        }
    });  
    </script>
</body>
</html> 
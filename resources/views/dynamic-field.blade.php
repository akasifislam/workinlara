@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dynamically Add</h1>
                <form  method="POST" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table">
                        <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                                <td>
                                    @csrf
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="save">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            var count = 1;
            dynamic_field(count);

            function dynamic_field(number)
            {
                var html = '<tr>';
                html += '<td><input type="text" name="first_name[]" class="form-control" ></td>';
                html += '<td><input type="text" name="last_name[]" class="form-control" ></td>';

                if(number > 1)
                {
                    html += '<td> <button type="button" name="remove" id="remove" class="btn btn-danger">Remove</button> </td></tr>';
                    $('tbody').append(html);
                }else{
                    html += '<td> <button type="button" name="add" id="add" class="btn btn-success">Add</button> </td></tr>'
                    $('tbody').append(html);
                }
            }

            $('#add').click(function() {
                count++;
                dynamic_field(count);
            });
            $(document).on('click',"#remove", function() {
                count --;
                dynamic_field(count);
            });
            $('#dynamic_form').on('submit',function() {
                event.preventDefault();
                $.ajaxI({
                    url: '{{ route('dynamic-field.indert') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $('#save').attr('disabled','disabled');
                    },
                    success: function(data) {
                        if (data.error) {
                            var error_html = '';
                            for (var count =0; count.error.length; count++) {
                                error_html+= '<p>' + data.error[count] + '</p>'                                
                            }
                            $('$result').html('<div class="alert alert-danger">' + error_htnl +' </div>');
                        }else{
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                        }

                        $('#save').attr('disabled',false);
                    }
                })
            });
        });
    </script>
@endpush
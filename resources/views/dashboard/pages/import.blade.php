<!DOCTYPE html>
<html>

<head>
    <title>Import les la liste des membre</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container box">
        <h3 align="center">Import les la liste des membre</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">Sample Data</div>
            <div class="panel-body">
                <div id="message"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>PRENOM</th>
                                <th>NOM</th>
                                <th>LONGITUDE</th>
                                <th>LATITUDE</th>
                                <th>EAMIL</th>
                                <th>TÉLEPHON</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        fetch_data();

        function fetch_data() {
            $.ajax({
                url: "import-membre/fetch_data",
                dataType: "json",
                success: function(data) {
                    var html = '';
                    html += '<tr>';
                    html += '<td contenteditable id="prenom_francais"></td>';
                    html += '<td contenteditable id="nom_francais"></td>';
                    html += '<td contenteditable id="longitude"></td>';
                    html += '<td contenteditable id="latitude"></td>';
                    html += '<td contenteditable id="email"></td>';
                    html += '<td contenteditable id="tel"></td>';
                    html +=
                        '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="prenom_francais" data-id="' +
                            data[count].id + '">' + data[count].prenom_francais + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="nom_francais" data-id="' +
                            data[count].id + '">' + data[count].nom_francais + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="longitude" data-id="' +
                            data[count].id + '">' + data[count].longitude + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="latitude" data-id="' +
                            data[count].id + '">' + data[count].latitude + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="email" data-id="' +
                            data[count].id + '">' + data[count].email + '</td>';
                        html +=
                            '<td contenteditable class="column_name" data-column_name="tel" data-id="' +
                            data[count].id + '">' + data[count].tel + '</td>';
                        html +=
                            '<td><button type="button" class="btn btn-danger btn-xs delete" id="' +
                            data[count].id + '">Delete</button></td></tr>';
                    }
                    $('tbody').html(html);
                }
            });
        }

        var _token = $('input[name="_token"]').val();

        $(document).on('click', '#add', function() {
            var prenom_francais = $('#prenom_francais').text();
            var nom_francais = $('#nom_francais').text();
            var longitude = $('#longitude').text();
            var latitude = $('#latitude').text();
            var email = $('#email').text();
            var tel = $('#tel').text();
            if (prenom_francais != '' && nom_francais != '' && longitude != '' &&
                longitude != '' && email != '' && tel != '') {
                $.ajax({
                    url: "{{ route('membre.add_data') }}",
                    method: "POST",
                    data: {
                        prenom_francais: prenom_francais,
                        nom_francais: nom_francais,
                        longitude: longitude,
                        latitude: latitude,
                        email: email,
                        tel: tel,
                        _token: _token
                    },
                    success: function(data) {
                        $('#message').html(data);
                        fetch_data();
                    }
                });
            } else {
                $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
            }
        });

        $(document).on('blur', '.column_name', function() {
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            var id = $(this).data("id");

            if (column_value != '') {
                $.ajax({
                    url: "{{ route('membre.update_data') }}",
                    method: "POST",
                    data: {
                        column_name: column_name,
                        column_value: column_value,
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#message').html(data);
                    }
                })
            } else {
                $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
            }
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this records?")) {
                $.ajax({
                    url: "{{ route('membre.delete_data') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#message').html(data);
                        fetch_data();
                    }
                });
            }
        });


    });
</script>

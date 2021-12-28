$(document).ready(function () {

    fetch_data();

    function fetch_data() {
        $.ajax({
            url: "import-membre/fetch_data",
            dataType: "json",
            success: function (data) {
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

    $(document).on('click', '#add', function () {
        var prenom_francais = $('#prenom_francais').text();
        var nom_francais = $('#nom_francais').text();
        var longitude = $('#longitude').text();
        var latitude = $('#latitude').text();
        var email = $('#email').text();
        var tel = $('#tel').text();
        if (prenom_francais != '' && nom_francais != '' && longitude != '' &&
            longitude != '' && email != '' && tel != '') {
            $.ajax({
                url: addLinke,
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
                success: function (data) {
                    $('#message').html(data);
                    $(".alert-message").alert();
                    window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
                    fetch_data();
                }
            });
        } else {
            $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
        }
    });

    $(document).on('blur', '.column_name', function () {
        var column_name = $(this).data("column_name");
        var column_value = $(this).text();
        var id = $(this).data("id");

        if (column_value != '') {
            $.ajax({
                url: updateLinke,
                method: "POST",
                data: {
                    column_name: column_name,
                    column_value: column_value,
                    id: id,
                    _token: _token
                },
                success: function (data) {
                    $('#message').html(data);
                    $(".alert-message").alert();
                    window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
                }
            })
        } else {
            $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
        }
    });

    $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this records?")) {
            $.ajax({
                url: deleteLinke,
                method: "POST",
                data: {
                    id: id,
                    _token: _token
                },
                success: function (data) {
                    $('#message').html(data);
                    $(".alert-message").alert();
                    window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
                    fetch_data();
                }
            });
        }
    });


});
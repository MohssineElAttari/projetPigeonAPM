// const { result } = require("lodash");

$(document).ready(function () {
    let result = [];
    // let newArray=
    // fetch_data();
    // if (membres!="") {
    //     console.log(members);
    // }
    function parseArrayToArrayObject(data) {

        //https://stackoverflow.com/questions/66982431/convert-a-2d-array-with-first-rows-a-headers-to-object-javascript

        const fn = ([keys, ...values]) =>
            values.map(vs => Object.fromEntries(vs.map((v, i) => [keys[i], v])))

        const array = data

        const result = fn(array)

        return result;
    }
    if (members.length === 0) {
        console.log("Array is empty!");
    }
    else {
        console.log("====>", members);
        result = parseArrayToArrayObject(members[0]);
        console.log(result);
        show_data(result);
        // console.log("yes!")
    }
    function show_data(result) {
        console.log("===>", result);
        if (result.length != 0) {

            var html = '';
            html += '<tr>';
            html += '<td contenteditable id="prenom francais"></td>';
            html += '<td contenteditable id="prenom arabe"></td>';
            html += '<td contenteditable id="nom francais"></td>';
            html += '<td contenteditable id="nom arabe"></td>';
            html += '<td contenteditable id="longitude"></td>';
            html += '<td contenteditable id="latitude"></td>';
            html += '<td contenteditable id="email"></td>';
            html += '<td contenteditable id="tel"></td>';
            html += '<td contenteditable id="asso"></td>';

            html +=
                '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
            for (var count = 0; count < result.length; count++) {
                // if (result[count]) {

                // }
                console.log(result[count]);
                html += `<tr ${result[count]?.exist == 1 ? 'style="background-color:#ea5455a6;"' : ''}>`;
                html +=
                    '<td contenteditable class="column_name" data-column_name="prenom francais" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count]['prenom francais'] + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="prenom arabe" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count]['prenom arabe'] + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="nom arabe" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count]['nom francais'] + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="nom francais" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count]['nom arabe'] + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="longitude" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count].longitude + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="latitude" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count].latitude + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="email" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count].email + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="tel" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count].tel + '</td>';
                html +=
                    '<td contenteditable class="column_name" data-column_name="asso" data-id="' +
                    result[count].id + '" data-index="' + count + '">' + result[count]['nom association'] + '</td>';
                html +=
                    '<td><button type="button" class="btn btn-danger btn-xs delete" id="' +
                    result[count].id + '">Delete</button></td></tr>';
            }
            $('tbody').html(html);
        } else {
            $('#messageImport').html("<div class='alert-message alert alert-danger p-1'>Le fichier que vous souhaitez importer est vide</div>");
            $(".alert-message").alert();
            window.setTimeout(function () { $(".alert-message").alert('close'); }, 5000);
        }
    }

    // function fetch_data() {
    //     $.ajax({
    //         url: "import-membre/fetch_data",
    //         dataType: "json",
    //         success: function (data) {
    //             console.log(data);
    //             var html = '';
    //             html += '<tr>';
    //             html += '<td contenteditable id="prenom_francais"></td>';
    //             html += '<td contenteditable id="nom_francais"></td>';
    //             html += '<td contenteditable id="longitude"></td>';
    //             html += '<td contenteditable id="latitude"></td>';
    //             html += '<td contenteditable id="email"></td>';
    //             html += '<td contenteditable id="tel"></td>';
    //             html +=
    //                 '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
    //             for (var count = 0; count < data.length; count++) {
    //                 console.log(data[count]);
    //                 html += '<tr>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="prenom_francais" data-id="' +
    //                     data[count].id + '">' + data[count].prenom_francais + '</td>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="nom_francais" data-id="' +
    //                     data[count].id + '">' + data[count].nom_francais + '</td>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="longitude" data-id="' +
    //                     data[count].id + '">' + data[count].longitude + '</td>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="latitude" data-id="' +
    //                     data[count].id + '">' + data[count].latitude + '</td>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="email" data-id="' +
    //                     data[count].id + '">' + data[count].email + '</td>';
    //                 html +=
    //                     '<td contenteditable class="column_name" data-column_name="tel" data-id="' +
    //                     data[count].id + '">' + data[count].tel + '</td>';
    //                 html +=
    //                     '<td><button type="button" class="btn btn-danger btn-xs delete" id="' +
    //                     data[count].id + '">Delete</button></td></tr>';
    //             }
    //             $('tbody').html(html);
    //         }
    //     });
    // }

    var _token = $('input[name="_token"]').val();


    $(document).on('click', '#analiser', function () {
        // console.log('done ');
        console.log(result);
        if (result.length != 0) {
            console.log("Full of");
            $.ajax({
                url: analiseData,
                dataType: "json",
                method: "POST",
                data: {
                    result: result,
                    _token: _token,
                },
                success: function (data) {
                    // $('#message').html(data);
                    // $(".alert-message").alert();
                    // window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
                    // fetch_data();
                    // data = JSON.parse(data);
                    console.log(data);
                    result = data;
                    show_data(result);
                }
            });
        } else {
            $('#message').html("<div class='alert-message alert alert-danger p-1'>Il n\'y a pas de données, faites une importation des données</div>");
            $(".alert-message").alert();
            window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
            // show_data();
            console.log("Empty");
        }
    });

    // $(document).on('click', '#add', function () {
    //     var prenom_francais = $('#prenom_francais').text();
    //     var nom_francais = $('#nom_francais').text();
    //     var longitude = $('#longitude').text();
    //     var latitude = $('#latitude').text();
    //     var email = $('#email').text();
    //     var tel = $('#tel').text();
    //     if (prenom_francais != '' && nom_francais != '' && longitude != '' &&
    //         longitude != '' && email != '' && tel != '') {
    //         $.ajax({
    //             url: addLinke,
    //             method: "POST",
    //             data: {
    //                 prenom_francais: prenom_francais,
    //                 nom_francais: nom_francais,
    //                 longitude: longitude,
    //                 latitude: latitude,
    //                 email: email,
    //                 tel: tel,
    //                 _token: _token
    //             },
    //             success: function (data) {
    //                 $('#message').html(data);
    //                 $(".alert-message").alert();
    //                 window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
    //                 fetch_data();
    //             }
    //         });
    //     } else {
    //         $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
    //     }
    // });

    $(document).on('blur', '.column_name', function () {
        var column_name = $(this).data("column_name");
        var column_value = $(this).text();
        var index = $(this).data("index")
        var id = $(this).data("id");

        if (column_value != '') {
            // result[id];
            console.log(result[index]);
            result[index][column_name] = column_value;
            // obj[column_name] = column_value;
            $('#message').html("<div class='alert-message alert alert-success p-1'>Modifié avec succès</div>");
            $(".alert-message").alert();
            window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
        } else {
            $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
        }
    });

    $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this records?")) {
            result = result.filter(item => item.id != id);
            $('#message').html("<div class='alert-message alert alert-success p-1'>Supprimé avec succès</div>");
            $(".alert-message").alert();
            window.setTimeout(function () { $(".alert-message").alert('close'); }, 3000);
            show_data(result);

        }
    });


});
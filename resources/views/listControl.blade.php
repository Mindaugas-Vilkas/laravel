@extends('base')

@section('content')
    <section>
        <input type="text" id="createUsername" name="username"> <br>
        <button id="createUser">Create</button>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <button id="readList">Read</button>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <input type="text" id="oldUsername" name="oldUsername"> <br>
        <input type="text" id="newUsername" name="newUsername"> <br>
        <button id="changeUser">Update</button>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <section>
        <input type="text" id="deleteUsername" name="username"> <br>
        <button id="deleteUser">Delete</button>
        <br>
        <p>--------------------------------------------</p>
    </section>

    <script>

        var valueArray = [];

        jQuery('#createUser').bind('click', function (e) {
            valueArray['user'] = jQuery('#createUsername').val();
            valueArray['action'] = 'POST';
            requestToRest(valueArray);
            valueArray = [];
        });

        jQuery('#readList').bind('click', function (e) {
            valueArray['action'] = 'GET';
            requestToRest(valueArray);
            valueArray = [];
        });

        jQuery('#changeUser').bind('click', function (e) {
            valueArray['user'] = jQuery('#oldUsername').val();
            valueArray['newUser'] = jQuery('#newUsername').val();
            valueArray['action'] = 'PUT';
            requestToRest(valueArray);
            valueArray = [];
        });

        jQuery('#deleteUser').bind('click', function (e) {
            valueArray['user'] = jQuery('#deleteUsername').val();
            valueArray['action'] = 'DELETE';
            requestToRest(valueArray);
            valueArray = [];
        });

        function requestToRest (valueArray) {

            console.log(valueArray);

            $.ajax({
                url: 'wherever',
                data : valueArray,
                type: valueArray['action'],
                success: function (response) {
                    console.log('this is jumping the gun a bit');
                },
                failure: function (response) {
                    alert('something went horribly wrong here');
                }
            });
        }

    </script>
@stop
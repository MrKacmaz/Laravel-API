<x-app-layout>
    <x-slot name="header">

        <head>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
                crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
                        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
                        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
                crossorigin="anonymous">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <!-- Sweet alert src -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="style.css">
        </head>
        <h2 class="font-semibold w3-xlarge w3-text-dark-grey w3-hover-text-deep-orange leading-tight">
            {{ __('WEB CLIENT CREATOR') }}
        </h2>
    </x-slot>


    <div class="container" style="margin-top: 75px;">
        <!-- Button trigger modal -->
        <div class="d-grid gap-2 col-6 mx-auto" style="margin-bottom: 25px;">
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" onclick="xApiKeyCreator()">
                ADD NEW CLIENT
            </button>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table id="refTable" class="table table-sm text-center">

                    <thead id="thead">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">x-api-key</th>
                            <th scope="col">Status</th>
                            <th scope="col">Active/Deactive</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>

                    <tbody id="tbody">

                        @foreach ($clients as $client)

                            <tr>
                                <td id="id{{ '-' . $client->id }}" scope="col">{{ $client->id }}</td>
                                <td id="name{{ '-' . $client->id }}" scope="col">{{ $client->name }}</td>
                                <td id="surname{{ '-' . $client->id }}" scope="col">{{ $client->surname }}</td>
                                <td id="email{{ '-' . $client->id }}" scope="col">{{ $client->email }}</td>
                                <td id="xapikey{{ '-' . $client->id }}" scope="col">{{ $client->xapikey }}</td>
                                <td id="status{{ '-' . $client->id }}" scope="col">{{ $client->status }}</td>
                                <td id="isActive{{ '-' . $client->id }}" scope="col">{{ $client->isActive }}</td>
                                <td id="buttons{{ '-' . $client->id }}" scope="col">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" data-bs-toggle="modal"
                                            onclick="updateBtn({{ $client->id }})" data-bs-target="#staticBackdrop"
                                            class="btn-outline-info"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                height="32" fill="currentColor" class="bi bi-arrow-up-square-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                                            </svg></button>
                                        <button type="button" class="btn-outline-danger" onclick="deleteBtn()"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                            </svg></button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>


    {{-- USER ADD MODAL --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <form action="{{ url('addUser') }}" class="was-validated" method="post">

                    @csrf {{ csrf_field() }}

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Client Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control is-valid" id="modalName" name="modalName"
                                placeholder="Name" required>
                            <label for="modalName">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control is-valid" id="modalSurname" name="modalSurname"
                                placeholder="Surname" required>
                            <label for="modalSurname">Surname</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control is-valid" id="modalEmail" name="modalEmail"
                                placeholder="name@example.com" required>
                            <label for="modalEmail">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control is-valid" id="modalxapikey" name="modalxapikey"
                                placeholder="modalxapikey" required>
                            <label for="modalxapikey">X-API-KEY</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select is-valid" id="modalStatus" name="modalStatus">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <label for="modalStatus">Client Status</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input is-valid" type="checkbox" value="" id="modalIsActive"
                                name="modalIsActive">
                            <label class="form-check-label" for="modalIsActive">
                                Active or Deactive
                            </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button id="closeBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="modalClearInput()">Close</button>
                        <button id="addBtn" name="submitButton" type="submit" value="userAdd" class="btn btn-success"
                            onclick="modalClearInput()">Add</button>
                        <button id="saveBtn" name="submitButton" type="submit" value="userUpdate"
                            class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <script>
        $("#modalIsActive").change(function() {
            if ($("#modalIsActive").prop("checked")) {
                $("#modalIsActive").val(1);
            } else {
                $("#modalIsActive").val(2);
            }
            console.log($("#modalIsActive").val());
        }).change();


        function xApiKeyCreator() {
            // Save button must be hidden
            $("#addBtn").show();
            $("#saveBtn").hide();

            var letters = "qwertyuopasdfghjklzxcvbnmiQWERTYUIOPASDFGHJKLZXCVBNM0123456789".split('');
            var xapikey = "";
            var rand;
            for (let i = 0; i < 16; i++) {
                rand = parseInt(Math.random() * 62);
                (i % 4 == 0 && i != 0) ? xapikey += "-": rand = parseInt(Math.random() * 62);
                xapikey += letters[rand];
            }
            $("#modalxapikey").val(xapikey);
        }

        function modalClearInput() {
            $("#modalName").val("");
            $("#modalSurname").val("");
            $("#modalEmail").val("");
            $("#modalxapikey").val("");
            $("#modalStatus").val("");
            $("#modalIsActive").val("");
        }

        function updateBtn(selectedRow) {
            // Add button must be hidden
            $("#addBtn").hide();
            $("#saveBtn").show();


            $("#modalName").val($("#name-" + selectedRow).text());
            $("#modalSurname").val($("#surname-" + selectedRow).text());
            $("#modalEmail").val($("#email-" + selectedRow).text());
            $("#modalxapikey").val($("#xapikey-" + selectedRow).text());
            $("#modalStatus").val($("#status-" + selectedRow).text());
            if ($("#isActive-" + selectedRow).text() == 1) {
                $("#modalIsActive").prop('checked', true);
                $("#modalIsActive").val(1);
                console.log($("#modalIsActive").val());
            } else {
                $("#modalIsActive").prop('checked', false);
                $("#modalIsActive").val(2);
                console.log($("#modalIsActive").val());

            }
        }

        function deleteBtn() {
            swal({
                    title: "Are you sure to delete the Client?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {


                        swal("Client has been deleted", {
                            icon: "success",
                        });
                    } else {
                        swal("Client is safe!");
                    }
                });
        }

        function modalSave() {
            alert("afskaygdalksd");
        }
    </script>

</x-app-layout>

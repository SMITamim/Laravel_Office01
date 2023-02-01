<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" herf="resources\css\app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            border-right:1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;

        }

        td, th {
            border: 1px solid #dddddd;
            text-align: auto;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }


    </style>
</head>
<body>
<ul>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-success me-2" id="ClientB" onclick="ClientDisplay()">Client Details</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-success me-2" id="BankB" onclick="BankDisplay()">Bank Details</button>
                    </li> <li class="nav-item">
                        <button class="btn btn-success me-2" id="DetailsB" onclick="DetailsDisplay()">Details</button>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</ul>
<div class="container" id="client" style="display: none">
    <button type="button" class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#clientaddeModal">
        Add Client
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Client Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Created By</th>
            <th scope="col">Created Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
            <td>{{$client->Client_name}}</td>
            <td>{{$client->Client_phone}}</td>
            <td>{{$client->Client_add}}</td>
            <td>{{$client->Created_By}}</td>
            <td>{{$client->Created_date}}</td>
            <td>
                <a class="btn btn-success me-2" id="cedit" href="javascript:void(0)" data-url="{{ route('ClientInfo', $client->id) }}">Edit</a>
                <a class="btn btn-danger " id="cid" href="javascript:void(0)" data-url="{{ route('ClientInfo', $client->id) }}">Delete</a>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="container" id="bank" style="display: none">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Bank Name</th>
            <th scope="col">Bank Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Created By</th>
            <th scope="col">Created Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banks as $bank)
            <tr>
                <th scope="row">1</th>
                <td>{{$bank->Bank_name}}</td>
                <td>{{$bank->Bank_phone}}</td>
                <td>{{$bank->Bank_add}}</td>
                <td>{{$bank->Created_By}}</td>
                <td>{{$bank->Created_date}}</td>
                <td>
                    <a class="btn btn-success me-2" href="#" role="button">Edit</a>
                    <a class="btn btn-danger " href="#" role="button">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="container" id="details" style="display: none">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client ID</th>
            <th scope="col">Bank Id</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $detail)
            <tr>
                <th scope="row">1</th>
                <td>{{$detail->Client_Id}}</td>
                <td>{{$detail->Bank_Id}}</td>
                <td>{{$detail->Amount}}</td>
                <td>
                    <a class="btn btn-success me-2" href="#" role="button">Edit</a>
                    <a class="btn btn-danger " href="#" role="button">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


{{--Client Delete Modal--}}
<div class="modal fade" id="clientDeleteModal" tabindex="-1" aria-labelledby="clientDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Client Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('ClientDelete')}}" class="form-group" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="cDelete-id" name="id">
                    <span class="text-dark">Are you sure to delete this client?</span>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger" id="yes" value="Yes">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>

                </form>

            </div>

        </div>
    </div>
</div>

{{--client update modal--}}
<div class="modal fade" id="clientUpdateeModal" tabindex="-1" aria-labelledby="clientUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="ClientHeader">Client Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('ClientUpdate')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input id="clientupdateid" name="id" type="hidden">
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="clientName" name="clientName">
                    </div>

                    <div class="mb-3">
                        <label for="clientPhone" class="form-label">Client Phone</label>
                        <input type="text" class="form-control" id="clientPhone" name="clientPhone">
                    </div>

                    <div class="mb-3">
                        <label for="clientAdd" class="form-label">Client Address</label>
                        <input type="text" class="form-control" id="clientAdd" name="clientAdd">
                    </div>





            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" id="update" value="Save Changes">
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >No</button>



            </div>

        </div>
    </div>
</div>

{{--client add modal--}}
<!-- Modal -->
<div class="modal fade" id="clientaddeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="ClientHeader">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('CreateClient')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" class="form-control" id="clientName" name="clientName">
                    </div>

                    <div class="mb-3">
                        <label for="clientPhone" class="form-label">Client Phone</label>
                        <input type="text" class="form-control" id="clientPhone" name="clientPhone">
                    </div>

                    <div class="mb-3">
                        <label for="clientAdd" class="form-label">Client Address</label>
                        <input type="text" class="form-control" id="clientAdd" name="clientAdd">
                    </div>





            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" id="update" value="ADD">
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >No</button>



            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function ClientDisplay()
    {
            console.log('a')
            document.getElementById('client').style.display='block'
            document.getElementById('bank').style.display='none'
            document.getElementById('details').style.display='none'

    }

    function BankDisplay()
    {
        console.log('b')
        document.getElementById('client').style.display='none'
        document.getElementById('bank').style.display='block'
        document.getElementById('details').style.display='none'

    }

    function DetailsDisplay()
    {
        console.log('a')
        document.getElementById('client').style.display='none'
        document.getElementById('bank').style.display='none'
        document.getElementById('details').style.display='block'

    }

//Client delete
    $(document).ready(function () {
        $('body').on('click', '#cid', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#clientDeleteModal').modal('show');
                $('#cDelete-id').val(data.id);
            })
        });
    });

    //Client edit
    $(document).ready(function () {
        $('body').on('click', '#cedit', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                $('#clientUpdateeModal').modal('show');
                $('#clientupdateid').val(data.id);
                $('#clientName').val(data.Client_name);
                $('#clientPhone').val(data.Client_phone);
                $('#clientAdd').val(data.Client_add);

            })
        });
    });


</script>

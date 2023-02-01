
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" herf="resources\css\app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<ul>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item" style="float: right">
                        <a class="nav-link" href="/adminlogin">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</ul>

<div class="dropdown">
    <button class="dropbtn">Client List</button>
    <div class="dropdown-content">
        @foreach($clients as $client)
            <a id="Client" title="details" href="javascript:void(0)" data-url="{{route('ClientDetails',$client->id)}}">
                {{$client->Client_name}}
            </a>
        @endforeach
    </div>
    <input type="text" id="search" class="form-control my-2" placeholder="Search" onkeyup="myFunction()">

    <table class="center" id="AmountTable">
        <tr id="head">
            <th>Bank Name</th>
            <th>Balance</th>
        </tr>
        <tbody id="body">

        </tbody>

    </table>
    <h1 id="demo" class="text-danger">

    </h1>
</div>

</body>
</html>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{--printing data from request id--}}

<script>
    $(document).ready(function () {

        $('body').on('click', '#Client', function () {
            var userURL = $(this).data('url');
            $.get(userURL, function (data) {
                console.log(data)
             //   $('#demo').val(data.Amount);
                //console.log(data.Amount)
                console.log(data.length)
                $("#body").empty();
                if (data.length === 0)
                {
                    $('#demo').text('No data found')
                }
                else {
                    var amount=parseInt(0)
                    for (var i = 0; i < data.length; i += 1) {
                        $("#body").append(
                            "<tr>" +
                            "<td>"
                            + data[i].bank_details.Bank_name +
                            "</td>" +
                            "<td>" +
                            data[i].Amount +
                            "</td>" +
                            "</tr>");

                        amount=amount+parseInt(data[i].Amount)

                    }
                    console.log(amount)
                    $("#body").append(
                        "<tr>"+
                        "<td>"+
                        "Total Balance "+
                        "</td>"+
                        "<td>"+
                        amount+"</td>"+
                        "</tr>"
                    )

                    $('#demo').text('')
                }
            })
        });

    });
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("AmountTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }



</script>

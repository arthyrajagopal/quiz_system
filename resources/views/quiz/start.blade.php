<!DOCTYPE html>
<html>
<head>
    <title>Start Quiz</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            width: 800px;
            margin: 80px auto;
            text-align: center;
        }

        .card {
            background: #4fa3f7;
            color: #fff;
            padding: 40px;
            width: 350px;
            margin: auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 15px 0;
            border: none;
            border-radius: 3px;
        }

        button {
            padding: 8px 25px;
            border: none;
            background: #777;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card">
        <h3>Enter your name</h3>

        <input type="text" id="name" placeholder="Enter your name">

        <br>

        <button id="startBtn">Start Quiz</button>
    </div>

</div>

<script>
$('#startBtn').click(function(){

    let name = $('#name').val().trim();

    if(name === ''){
        alert('Please enter your name');
        return;
    }

    $.ajax({
        url: '/start',
        type: 'POST',
        data: {
            name: name,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            window.location.href = '/quiz';
        }
    });
});
</script>

</body>
</html>

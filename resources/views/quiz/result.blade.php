<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
        }
        .result-card {
            background: #4fa3f7;
            width: 300px;
            margin: 100px auto;
            padding: 25px;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="result-card">
    <h3>Result Page</h3>
    <div id="result"></div>
</div>

<script>
$(document).ready(function(){
    $.get('/result', function(res){
        $('#result').html(`
            <strong>Correct Answers:</strong> ${res.correct}<br><br>
            <strong>Wrong Answers:</strong> ${res.wrong}<br><br>
            <strong>Skipped Questions:</strong> ${res.skipped}
        `);
    });
});
</script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .container {
            width: 800px;
            margin: 50px auto;
            text-align: center;
        }
        .card {
            background: #4fa3f7;
            color: #fff;
            padding: 30px;
            margin: 20px auto;
            width: 500px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.3);
        }
        .question-title {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .option {
            text-align: left;
            margin: 8px 0;
        }
        .buttons {
            margin-top: 20px;
        }
        button {
            padding: 8px 20px;
            border: none;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-skip { background: #777; color: #fff; }
        .btn-next { background: #555; color: #fff; }
    </style>
</head>
<body>

<div class="container">
    <h3>PHP 5Q/Ans &nbsp;&nbsp; AJAX 5Q/Ans &nbsp;&nbsp; JQUERY 5Q/Ans &nbsp;&nbsp; HTML 5Q/Ans</h3>
    <p><strong>Total 20Q/Ans</strong></p>

    <div class="card" id="questionBox">
        Loading question...
    </div>
</div>

<script>
     function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");
    }
    let questionId = 1;

    loadQuestion(questionId);

    function loadQuestion(id) {
        $.get('/question/' + id, function(res) {

            if (!res || Object.keys(res).length === 0) {
                window.location.href = '/result-page';
                return;
            }

            let html = `
                <div class="question-title">Question ${id}</div>
                <div>${escapeHtml(res.question)}</div>
            `;

            if (res.options && res.options.length > 0) {
                res.options.forEach(opt => {
                    html += `
                        <div class="option">
                            <input type="radio" name="option" value="${opt.id}">
                              ${escapeHtml(opt.option_text)}
                        </div>
                    `;
                });
            } else {
                html += `<div>No options available for this question.</div>`;
            }

            html += `
                <div class="buttons">
                    <button class="btn-skip" onclick="skipQuestion(${res.id})">Skip</button>
                    <button class="btn-next" onclick="submitAnswer(${res.id})">Next</button>
                </div>
            `;

            $('#questionBox').html(html);

        }).fail(function() {
            $('#questionBox').html('<div>Error loading question. Please refresh.</div>');
        });
    }

    function submitAnswer(qid){
        let optionId = $('input[name=option]:checked').val() || null;

        $.post('/answer', {
            question_id: qid,
            option_id: optionId,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function() {
            questionId++;             
            loadQuestion(questionId); 
        }).fail(function() {
            alert('Error submitting answer. Please try again.');
        });
    }

    function skipQuestion(qid) {
        $.post('/answer', {
            question_id: qid,
            option_id: null,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function() {
            questionId++;
            loadQuestion(questionId);
        }).fail(function() {
            alert('Error skipping question. Please try again.');
        });
    }
</script>

</body>
</html>

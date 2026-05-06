<!DOCTYPE html>
<html>
<head>
    <title>Ultimate Quiz</title>

    <!-- ✅ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #fff;
        }

        .container {
            max-width: 700px;
            margin: 60px auto;
            padding: 35px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.6s ease;
        }

        h1 {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            opacity: 0.7;
        }

        .progress-bar {
            height: 8px;
            background: #334155;
            border-radius: 10px;
            overflow: hidden;
            margin: 25px 0;
        }

        .progress {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #22c55e, #3b82f6);
            transition: width 0.4s ease;
        }

        .question-card {
            display: none;
            animation: slideFade 0.4s ease;
        }

        .active {
            display: block;
        }

        .question-text {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .question-count {
            font-size: 14px;
            opacity: 0.6;
            margin-bottom: 10px;
        }

        label {
            display: block;
            background: #1e293b;
            padding: 12px;
            border-radius: 12px;
            margin: 8px 0;
            cursor: pointer;
            transition: 0.3s;
        }

        label:hover {
            background: #334155;
        }

        input {
            margin-right: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            margin-top: 10px;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: linear-gradient(90deg, #22c55e, #3b82f6);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .result {
            text-align: center;
            font-size: 30px;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
            animation: fadeIn 0.5s ease;
        }

        @keyframes slideFade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🚀 Ultimate Programming Quiz</h1>
    <p>{{ $quiz->description }}</p>

    <div class="progress-bar">
        <div class="progress" id="progress"></div>
    </div>

    <form id="quizForm">

        @foreach($quiz->questions as $index => $question)
            <div class="question-card {{ $index == 0 ? 'active' : '' }}">

                <div class="question-count">
                    Question {{ $index + 1 }} / {{ count($quiz->questions) }}
                </div>

                <div class="question-text">
                    {{ $question->question_text }}
                </div>

                @if($question->question_type == 'binary' || $question->question_type == 'single_choice')
                    @foreach($question->options as $option)
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                            {{ $option->option_text }}
                        </label>
                    @endforeach

                @elseif($question->question_type == 'multiple_choice')
                    @foreach($question->options as $option)
                        <label>
                            <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}">
                            {{ $option->option_text }}
                        </label>
                    @endforeach

                @elseif($question->question_type == 'text')
                    <input type="text" name="answers[{{ $question->id }}]" placeholder="Type your answer">

                @elseif($question->question_type == 'number')
                    <input type="number" name="answers[{{ $question->id }}]" placeholder="Enter number">
                @endif

                <button type="button" class="btn nextBtn">Next ➡</button>
            </div>
        @endforeach

    </form>

</div>

<script>
let current = 0;
let questions = document.querySelectorAll('.question-card');
let total = questions.length;

function updateProgress() {
    let percent = ((current) / total) * 100;
    document.getElementById('progress').style.width = percent + "%";
}

document.querySelectorAll('.nextBtn').forEach(btn => {
    btn.addEventListener('click', () => {

        let inputs = questions[current].querySelectorAll("input");
        let answered = false;

        inputs.forEach(input => {
            if (input.type === "radio" && input.checked) answered = true;
            if (input.type === "checkbox" && input.checked) answered = true;
            if ((input.type === "text" || input.type === "number") && input.value.trim() !== "") answered = true;
        });

        if (!answered) {
            alert("⚠️ Please answer before proceeding!");
            return;
        }

        questions[current].classList.remove('active');
        current++;

        if (current < total) {
            questions[current].classList.add('active');
            updateProgress();
        } else {
            submitQuiz();
        }
    });
});

async function submitQuiz() {

    let formData = new FormData(document.getElementById('quizForm'));
    let answers = {};

    for (let [key, value] of formData.entries()) {
        let match = key.match(/answers\[(\d+)\]/);
        if (match) {
            if (!answers[match[1]]) {
                answers[match[1]] = value;
            } else {
                if (!Array.isArray(answers[match[1]])) {
                    answers[match[1]] = [answers[match[1]]];
                }
                answers[match[1]].push(value);
            }
        }
    }

    let response = await fetch('/api/quiz/{{ $quiz->id }}/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ answers })
    });

    let data = await response.json();

    document.querySelector('.container').innerHTML = `
        <h1>🎉 Quiz Completed</h1>
        <div class="result">Your Score: ${data.score ?? 'Error'}</div>
    `;
}
</script>

</body>
</html>
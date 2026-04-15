<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\QuizAttempt;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    // Start page
    public function index()
    {
        return view('quiz.start');
    }

    // Quiz page
    public function quiz()
    {
        return view('quiz.quiz');
    }

    // Result page 
    public function showResult()
    {
        return view('quiz.result');
    }

    // Start quiz (AJAX)
    public function start(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::create(['name' => $request->name]);
        session(['user_id' => $user->id]);

        $attempt = QuizAttempt::create(['user_id' => $user->id]);
        session(['attempt_id' => $attempt->id]);

        return response()->json(['status' => true]);
    }

    //  question (AJAX)
   public function getQuestion($id)
{
    $q = Question::with('options')->find($id);

    if (!$q) {
        return response()->json(null);
    }

    return response()->json([
        'id' => $q->id,
        'question' => $q->question,
        'options' => $q->options->map(function($opt) {
            return [
                'id' => $opt->id,
                'option_text' => $opt->option_text
            ];
        })
    ]);
}


    // Submit answer (AJAX)
    public function submitAnswer(Request $request)
    {
        Answer::updateOrCreate(
            [
                'quiz_attempt_id' => session('attempt_id'),
                'question_id' => $request->question_id
            ],
            [
                'option_id' => $request->option_id
            ]
        );

        return response()->json(['success' => true]);
    }

    // Result data (AJAX JSON)
    public function result()
    {
        $attemptId = session('attempt_id');

        if (!$attemptId) {
            return response()->json([
                'correct' => 0,
                'wrong' => 0,
                'skipped' => Question::count()
            ]);
        }

        $totalQuestions = Question::count();

        // Count correct 
        $correct = DB::table('answers')
            ->join('options', 'answers.option_id', '=', 'options.id')
            ->where('answers.quiz_attempt_id', $attemptId)
            ->where('options.is_correct', 1)
            ->count();

        // Count wrong 
        $wrong = DB::table('answers')
            ->join('options', 'answers.option_id', '=', 'options.id')
            ->where('answers.quiz_attempt_id', $attemptId)
            ->where('options.is_correct', 0)
            ->count();

        // Calculate skipped
        $answered = $correct + $wrong;
        $skipped = $totalQuestions - $answered;

        return response()->json([
            'correct' => $correct,
            'wrong' => $wrong,
            'skipped' => $skipped
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $questions = [

            // PHP 
            [
                'question' => 'What does PHP stand for?',
                'options' => [
                    ['text'=>'Hypertext Preprocessor', 'correct'=>1],
                    ['text'=>'Personal Home Page', 'correct'=>0],
                    ['text'=>'Private Hypertext Processor', 'correct'=>0],
                    ['text'=>'None of the above', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which symbol is used for variables in PHP?',
                'options' => [
                    ['text'=>'$', 'correct'=>1],
                    ['text'=>'#', 'correct'=>0],
                    ['text'=>'%', 'correct'=>0],
                    ['text'=>'&', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which function is used to output text in PHP?',
                'options' => [
                    ['text'=>'echo', 'correct'=>1],
                    ['text'=>'print()', 'correct'=>0],
                    ['text'=>'display()', 'correct'=>0],
                    ['text'=>'show()', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which PHP version introduced scalar type hints?',
                'options' => [
                    ['text'=>'PHP 7', 'correct'=>1],
                    ['text'=>'PHP 5.6', 'correct'=>0],
                    ['text'=>'PHP 8', 'correct'=>0],
                    ['text'=>'PHP 5.3', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which function counts array elements?',
                'options' => [
                    ['text'=>'count()', 'correct'=>1],
                    ['text'=>'size()', 'correct'=>0],
                    ['text'=>'length()', 'correct'=>0],
                    ['text'=>'total()', 'correct'=>0],
                ]
            ],

            //  HTML 
            [
                'question' => 'HTML stands for?',
                'options' => [
                    ['text'=>'Hyper Text Markup Language', 'correct'=>1],
                    ['text'=>'Home Tool Markup Language', 'correct'=>0],
                    ['text'=>'Hyperlinks Text Markup', 'correct'=>0],
                    ['text'=>'None', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which tag creates a hyperlink?',
                'options' => [
                    ['text'=>'<a>', 'correct'=>1],
                    ['text'=>'<link>', 'correct'=>0],
                    ['text'=>'<href>', 'correct'=>0],
                    ['text'=>'<url>', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which attribute specifies image path?',
                'options' => [
                    ['text'=>'src', 'correct'=>1],
                    ['text'=>'href', 'correct'=>0],
                    ['text'=>'link', 'correct'=>0],
                    ['text'=>'path', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which tag is used for ordered list?',
                'options' => [
                    ['text'=>'<ol>', 'correct'=>1],
                    ['text'=>'<ul>', 'correct'=>0],
                    ['text'=>'<li>', 'correct'=>0],
                    ['text'=>'<list>', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which HTML tag is self-closing?',
                'options' => [
                    ['text'=>'<br>', 'correct'=>1],
                    ['text'=>'<div>', 'correct'=>0],
                    ['text'=>'<p>', 'correct'=>0],
                    ['text'=>'<span>', 'correct'=>0],
                ]
            ],

            //  AJAX 
            [
                'question' => 'AJAX stands for?',
                'options' => [
                    ['text'=>'Asynchronous JavaScript and XML', 'correct'=>1],
                    ['text'=>'Advanced JavaScript', 'correct'=>0],
                    ['text'=>'Asynchronous JSON', 'correct'=>0],
                    ['text'=>'None', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which method sends data without reload?',
                'options' => [
                    ['text'=>'AJAX', 'correct'=>1],
                    ['text'=>'HTML', 'correct'=>0],
                    ['text'=>'PHP', 'correct'=>0],
                    ['text'=>'CSS', 'correct'=>0],
                ]
            ],
            [
                'question' => 'AJAX uses which object?',
                'options' => [
                    ['text'=>'XMLHttpRequest', 'correct'=>1],
                    ['text'=>'HttpRequest', 'correct'=>0],
                    ['text'=>'BrowserRequest', 'correct'=>0],
                    ['text'=>'ServerRequest', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which format is commonly used with AJAX?',
                'options' => [
                    ['text'=>'JSON', 'correct'=>1],
                    ['text'=>'TXT', 'correct'=>0],
                    ['text'=>'CSV', 'correct'=>0],
                    ['text'=>'DOC', 'correct'=>0],
                ]
            ],
            [
                'question' => 'AJAX is executed on which side?',
                'options' => [
                    ['text'=>'Client side', 'correct'=>1],
                    ['text'=>'Server side', 'correct'=>0],
                    ['text'=>'Database', 'correct'=>0],
                    ['text'=>'None', 'correct'=>0],
                ]
            ],

            //  jQuery 
            [
                'question' => 'jQuery is a?',
                'options' => [
                    ['text'=>'JavaScript library', 'correct'=>1],
                    ['text'=>'PHP framework', 'correct'=>0],
                    ['text'=>'CSS framework', 'correct'=>0],
                    ['text'=>'Language', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which symbol is used for jQuery?',
                'options' => [
                    ['text'=>'$', 'correct'=>1],
                    ['text'=>'@', 'correct'=>0],
                    ['text'=>'#', 'correct'=>0],
                    ['text'=>'%', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which method hides elements?',
                'options' => [
                    ['text'=>'hide()', 'correct'=>1],
                    ['text'=>'remove()', 'correct'=>0],
                    ['text'=>'delete()', 'correct'=>0],
                    ['text'=>'none()', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which jQuery method sends AJAX request?',
                'options' => [
                    ['text'=>'$.ajax()', 'correct'=>1],
                    ['text'=>'$.send()', 'correct'=>0],
                    ['text'=>'$.call()', 'correct'=>0],
                    ['text'=>'$.request()', 'correct'=>0],
                ]
            ],
            [
                'question' => 'Which event fires when page is ready?',
                'options' => [
                    ['text'=>'$(document).ready()', 'correct'=>1],
                    ['text'=>'page.load()', 'correct'=>0],
                    ['text'=>'onStart()', 'correct'=>0],
                    ['text'=>'window.load()', 'correct'=>0],
                ]
            ],

        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'question' => $q['question']
            ]);

            foreach ($q['options'] as $opt) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $opt['text'],
                    'is_correct' => $opt['correct']
                ]);
            }
        }
    }
}

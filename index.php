<?php

use App\Classes\Board\CsmbBoard;
use App\Classes\Board\CsmBoard;
use App\Classes\Factory\ResponseFactory;
use App\Classes\Factory\SchoolBoardFactory;
use App\Classes\Format\JsonFormatter;
use App\Classes\Format\XmlFormatter;
use App\Models\Student;;

require_once 'vendor/autoload.php';

require_once 'database.php';

try {
    $studentId = (int) $_GET['student'];
    $student = Student::find($studentId);

    $response = [];


    if (!$student) {
        header("HTTP/1.1 404 Not Found");
        echo 'Success: false; Record not found';
    } else {
        header("HTTP/1.1 200 OK");
        $response['success'] = true;

        $response['student'] = [
            'id'     => $student->id,
            'name'   => $student->name,
        ];

        $gradesModel = $student->grades;
        $grades = [];
        foreach ($gradesModel as $grade) {
            $grades[] = $grade->grade;
        }

        $response['student']['grades'] = $grades;

        $boardType = $student->board->type;

        # Get board and formatter
        $board = SchoolBoardFactory::createBoard($boardType);
        $formatter = ResponseFactory::createResponse($boardType);

        $response['student']['average'] = number_format($board->calculateAverage($grades), 2);
        $response['student']['finalResult'] = $board->calculateFinalResult($grades);

        $formatter->addHeader();
        $response = $formatter->formatData($response);

        echo $response;
    }
} catch (Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
}


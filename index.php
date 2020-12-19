<?php

use App\Models\Student;

require_once 'vendor/autoload.php';

require_once 'database.php';

$student = Student::find(1);

echo $student->board->type;

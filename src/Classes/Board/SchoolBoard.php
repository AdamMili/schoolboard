<?php namespace App\Classes\Board;

abstract class SchoolBoard {

    /**
     * Calculate average grade depending on type of board and student grades.
     *
     * @param array $grades
     * @return mixed
     */
    abstract public function calculateAverage($grades);

    /**
     * Calculate final result depending on type of board and student grades.
     *
     * @param array $grades
     * @return mixed
     */
    abstract public function calculateFinalResult($grades);
}
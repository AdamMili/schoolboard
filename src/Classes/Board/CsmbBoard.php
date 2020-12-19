<?php namespace App\Classes\Board;

class CsmbBoard extends SchoolBoard {


    /**
     * Calculate average grade by CSMB board rule.
     *
     * @param array $grades
     * @return bool|float|int
     */
    public function calculateAverage($grades)
    {
        if (count($grades) >= 3) {
            sort($grades, SORT_NUMERIC);
            array_shift($grades);

            return array_sum($grades) / count($grades);
        }

        return false;
    }

    /**
     * Calculate final result by CSMB board rule.
     *
     * @param array $grades
     * @return mixed|string
     */
    public function calculateFinalResult($grades)
    {
        return max($grades) > 8 ? 'Pass' : 'Fail';
    }
}
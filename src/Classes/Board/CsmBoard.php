<?php namespace App\Classes\Board;

class CsmBoard extends SchoolBoard {

    /**
     * Calculate average grade by CSM board rule.
     *
     * @param array $grades
     * @return float|int
     */
    public function calculateAverage($grades)
    {
        return array_sum($grades) / count($grades);
    }

    /**
     * Calculate final result by CSM board rule.
     *
     * @param array $grades
     * @return string
     */
    public function calculateFinalResult($grades)
    {
        $finalResult = (array_sum($grades) / count($grades)) >= 7 ? 'Pass' : 'Fail';

        return $finalResult;
    }
}
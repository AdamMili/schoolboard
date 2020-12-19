<?php namespace App\Classes\Factory;

use App\Classes\Board\CsmbBoard;
use App\Classes\Board\CsmBoard;
use Exception;

class SchoolBoardFactory {

    /**
     * @param $type
     * @return CsmBoard|CsmbBoard|Exception
     */
    public static function createBoard($type) {
        if ($type === 'CSM') {
            return new CsmBoard();
        } else if ($type === 'CSMB'){
            return new CsmbBoard();
        }

        return new Exception('Board do not exist');
    }
}
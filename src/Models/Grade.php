<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

    /**
     * Get the student associated with the grade.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
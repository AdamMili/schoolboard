<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model {

    /**
     * Get all students associated with the board.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
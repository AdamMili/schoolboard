<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * Get all grades associated with the student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get board associated with the student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
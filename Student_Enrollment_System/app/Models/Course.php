<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class,'courses_students','course_id','student_id');
    }


}

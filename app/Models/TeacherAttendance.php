<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherAttendance extends Model
{
    use HasFactory, HasUuids;

    public $guarded = ['id'];

    public function scheduleOfSubject(): BelongsTo
    {
        return $this->belongsTo(ScheduleOfSubject::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleOfSubject extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id'];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function studentAttendances(): HasMany
    {
        return $this->hasMany(StudentAttendance::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('year', 'like', '%' . $search . '%');
            });
        });
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    // Accessor for end_time
    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskController
 *
 * @author Martin Justin Medina <martin.justin04@gmail.com>
 */
class Task extends Model
{
    use HasFactory;

    /**
     * Fillable
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'completed'
    ];

    /**
     * cast
     * @var string[]
     */
    protected $casts = [
        'completed' => 'boolean'
    ];

    /**
     * Get date attribute
     * @param $value
     * @return string
     */
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * User / Task relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

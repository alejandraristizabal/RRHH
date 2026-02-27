<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id',
        'start_date',
        'end_date',
        'salary',
        'contract_type',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
}
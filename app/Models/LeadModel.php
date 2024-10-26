<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadModel extends Model
{
    use HasFactory;
    protected $table = 'leads'; 
    protected $fillable = [
        'property_for',
        'property_type',
        'budget',
        'city',
        'contact_type',
        'email',
        'name',
        'mobile_no',
        'agree_to_terms',
        'lead_action',
    ];
    
}

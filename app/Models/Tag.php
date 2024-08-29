<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
class Tag extends Model
{
    use HasFactory;

    Public function Jobs(){
        return $this->belongsToMany(Job::Class, relatedPivotKey: "Job_listing_id");
    }
}

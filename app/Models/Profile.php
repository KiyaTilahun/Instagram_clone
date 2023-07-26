<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded=[];

  public function ProfileImage(){
    $imagepath=($this->image)?$this->image:'profile/rYb3AV9Q8unVlZ6HSgtNlP7OQ4cxGqkacj3mfHtt.png';
    return '/storage/'.$imagepath;
  }
    
    public function user(){
      
        
        return $this->belongsTo(User::class);
    }

}
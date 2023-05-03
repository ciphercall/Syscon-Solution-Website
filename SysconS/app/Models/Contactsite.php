<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactsite extends Model{
	use HasFactory;
    public $fillable = ['c_name', 'c_email', 'c_details'];

}

<?php
/**
 * Created by PhpStorm.
 * User: vnilov
 * Date: 3/17/17
 * Time: 12:49 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Counter extends Model
{
    use CrudTrait;
    
    protected $table = 'counters';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['value', 'name'];
}
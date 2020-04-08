<?php
namespace Zngue\Category\Models;
use Illuminate\Database\Eloquent\Model;
/**
* @mixin \Eloquent
*@property $name
*@property $desc
*@property $pid
*@property $status

 */
class CateModel extends Model
{
    protected $table='category';
    protected $fillable = ['name','desc','pid','status'];
}

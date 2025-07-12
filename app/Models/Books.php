<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'jenis',
        'latitude',
        'longitude',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    // foreign key yang dititipkan pada tabel, akan menggunakan relasi belongsTo. Sedangkan tabel utama yang menitipkan, di modelsnya menggunakan relasi hasMany / hasOne!!!!
}

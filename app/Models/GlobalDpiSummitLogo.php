<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalDpiSummitLogo extends Model
{
    use HasFactory;
    protected $table = 'global_dpi_summit_logos';
     protected $fillable = ['summit_id', 'logo_name', 'logo_image'];

    public function summit()
    {
        return $this->belongsTo(GlobalDpiSummit::class, 'summit_id');
    }
}
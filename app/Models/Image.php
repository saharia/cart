<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'product_id' ];

    /**
     * Get the phone associated with the user.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

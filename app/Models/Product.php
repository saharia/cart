<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Sortable, SoftDeletes;

    protected $fillable = [ 'name', 'description', 'content', 'price', 'scale_price', 'quantity', 'weight', 'length', 'wide', 
    'height', 'with_storehouse', 'allow_checkout_when_out_of_stock', 'is_featured', 'added_by' ];

    public $sortable = ['name', 'price', 'quantity', 'created_at'];

    /**
     * Get the phone associated with the user.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

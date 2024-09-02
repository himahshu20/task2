<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    use HasFactory;
    protected $tabel = 'item_masters';
    protected $fillable = [
        'doc_id',
        'item_name',
        'qty'
    ];
}

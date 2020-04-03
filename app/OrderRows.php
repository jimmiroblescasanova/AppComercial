<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderRows
 *
 * @property int $id
 * @property int $order_id
 * @property string $product
 * @property string $unit
 * @property float $quantity
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderRows whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderRows extends Model
{
    //
    protected $table = 'order_rows';

    protected $guarded = [];
}

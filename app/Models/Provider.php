<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $endpoint
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'provider';
    protected $fillable
                     = [
            'id',
            'name',
            'endpoint',
        ];
}

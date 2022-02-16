<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Developer
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $level
 * @property int|null $weekly_work_limit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Developer extends Model
{
    use SoftDeletes;

    protected $table      = 'developer';
    protected $primaryKey = 'id';

    protected $fillable
        = [
            'id',
            'name',
            'level',
            'weekly_work_limit'
        ];
}

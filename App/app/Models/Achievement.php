<?php

namespace App\Models;

use App\Enums\Achievement\StatusEnum;
use App\Enums\Achievement\TypeEnum;
use Illuminate\Database\Eloquent\Model;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Achievement
 *
 * @property int $id
 * @property string $description
 * @property int $purpose
 * @property \BenSampo\Enum\Enum|null $type
 * @property string $tether
 * @property \BenSampo\Enum\Enum|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement wherePurpose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereTether($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Achievement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Achievement extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['type' => TypeEnum::class, 'status' => StatusEnum::class];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected static string $orderByColumn = 'id';

    /**
     * @var string
     */
    protected static string $orderByColumnDirection = 'desc';
}

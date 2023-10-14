<?php

namespace App\Models;

use App\Enums\Link\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;
use Throwable;

/**
 * App\Models\Link
 *
 * @property int $id
 * @property string $name
 * @property string $route
 * @property string $tether
 * @property int $limit_per_day
 * @property \BenSampo\Enum\Enum|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LinkPtc> $linkHasMany
 * @property-read int|null $link_has_many_count
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLimitPerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereTether($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Link extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['status' => StatusEnum::class];

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

    /**
     * @return HasMany
     */
    public function linkHasMany(): HasMany
    {
        return $this->hasMany(LinkPtc::class, 'link_id', 'id');
    }

    /**
     * @param string $url
     * @return string
     * @throws Throwable
     */
    public function createLinkViaApi(string $url): string
    {
        $r = str($this->route)->replace('{{url}}', $url)->value();

        try {
            $response = Http::timeout(10)->connectTimeout(10)->get($r)->body();
            $response = trim($response);

            throw_unless(filter_var($response, FILTER_VALIDATE_URL), 'FILTER_VALIDATE_URL');
        }
        catch (Throwable $exception) {
            Log::channel('guzzleHttp-error')->error('[ L ]:');
            Log::channel('guzzleHttp-error')->error('[ L ] - Payload:', ['r' => $r]);
            Log::channel('guzzleHttp-error')->error($exception);

            throw $exception;
        }

        return $response;
    }
}

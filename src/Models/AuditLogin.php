<?php

namespace FikriMastor\LaravelAuditLogin\Models;

use FikriMastor\LaravelAuditLogin\Enums\EventTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AuditLogin extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
        'event' => EventTypeEnum::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function auditable(): MorphTo
    {
        $morphPrefix = config('audit-login.user.morph_prefix', 'login_auditable');

        return $this->morphTo(__FUNCTION__, $morphPrefix.'_type', $morphPrefix.'_id');
    }
}

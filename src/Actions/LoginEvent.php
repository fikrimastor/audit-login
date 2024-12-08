<?php

namespace FikriMastor\AuditLogin\Actions;

use FikriMastor\AuditLogin\AuditLoginAttribute;
use FikriMastor\AuditLogin\Contracts\LoginEventContract;
use FikriMastor\AuditLogin\Enums\EventTypeEnum;

class LoginEvent extends BaseEvent implements LoginEventContract
{
    protected EventTypeEnum $eventType = EventTypeEnum::LOGIN;

    public function handle(object $event, AuditLoginAttribute $attributes): void
    {
        $this->attributes = $attributes->toArray();
        $this->event = $event;
        $this->execute();
    }
}

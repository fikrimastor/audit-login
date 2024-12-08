<?php

namespace FikriMastor\AuditLogin\Actions;

use FikriMastor\AuditLogin\AuditLoginAttribute;
use FikriMastor\AuditLogin\Contracts\OtherDeviceLogoutEventContract;

class OtherDeviceLogoutEvent extends BaseEvent implements OtherDeviceLogoutEventContract
{
    public function handle(object $event, AuditLoginAttribute $attributes): void
    {
        $this->event = $event;
        $this->attributes = $attributes;
        $this->execute();
    }
}

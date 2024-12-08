<?php

namespace FikriMastor\AuditLogin;

use FikriMastor\AuditLogin\Exceptions\BadRequestException;
use FikriMastor\AuditLogin\Models\AuditLogin as AuditLoginModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;

class AuditLogin
{
    /**
     * Audit an event.
     */
    public static function auditEvent(array $attributes, ?Authenticatable $user = null): void
    {
        try {
            DB::transaction(static function () use ($attributes, $user) {
                throw_if(! method_exists($user, 'auditLogin'), new BadRequestException('The user model must use the AuditableTrait trait.'));

                throw_if(! isset($attributes['event']), new BadRequestException('The event_type must not be empty.'));

                if (! $user instanceof Authenticatable) {
                    $morphPrefix = config('audit-login.user.morph_prefix', 'user');

                    $dataMissing = [
                        $morphPrefix.'_id' => null,
                        $morphPrefix.'_type' => $morphPrefix,
                    ];

                    return AuditLoginModel::create(array_merge($attributes, $dataMissing));
                }

                // Create an audit entry with a custom event (e.g., login, logout)
                return $user->auditLogin()->create($attributes);
            });
        } catch (\Throwable $e) {
            report($e);
        }
    }

    /**
     * Register a class / callback that should be used to record login event.
     */
    public static function recordLoginUsing(string $callback): void
    {
        app()->bind(\FikriMastor\AuditLogin\Contracts\LoginEventContract::class, $callback);
    }

    /**
     * Register a class / callback that should be used to record logout event.
     */
    public static function recordLogoutUsing(string $callback): void
    {
        app()->bind(\FikriMastor\AuditLogin\Contracts\LogoutEventContract::class, $callback);
    }

    /**
     * Register a class / callback that should be used to record forgot password event.
     */
    public static function recordForgotPasswordUsing(string $callback): void
    {
        app()->bind(\FikriMastor\AuditLogin\Contracts\PasswordResetEventContract::class, $callback);
    }

    /**
     * Register a class / callback that should be used to record failed login event.
     */
    public static function recordFailedLoginUsing(string $callback): void
    {
        app()->bind(\FikriMastor\AuditLogin\Contracts\FailedLoginEventContract::class, $callback);
    }

    /**
     * Register a class / callback that should be used to record registered event.
     */
    public static function recordRegisteredUsing(string $callback): void
    {
        app()->bind(\FikriMastor\AuditLogin\Contracts\RegisteredEventContract::class, $callback);
    }
}
<?php

namespace App\Support;

use App\Models\Setting;

class AdminNotificationRecipients
{
    /**
     * Resolve admin notification recipients.
     *
     * @return array{recipients: array<int, string>, source: 'settings'|'config'|'none'}
     */
    public static function resolve(): array
    {
        $fromSettings = self::fromSettings();
        if (! empty($fromSettings)) {
            return [
                'recipients' => $fromSettings,
                'source' => 'settings',
            ];
        }

        $fromConfig = self::fromConfig();
        if (! empty($fromConfig)) {
            return [
                'recipients' => $fromConfig,
                'source' => 'config',
            ];
        }

        return [
            'recipients' => [],
            'source' => 'none',
        ];
    }

    /**
     * @return array<int, string>
     */
    private static function fromSettings(): array
    {
        try {
            $raw = (string) Setting::getValue('admin_notification_emails', '');
        } catch (\Throwable) {
            return [];
        }

        return self::parseEmails($raw);
    }

    /**
     * @return array<int, string>
     */
    private static function fromConfig(): array
    {
        $emails = config('notifications.admin_emails', []);

        if (! is_array($emails)) {
            return [];
        }

        $emails = array_map(static fn ($email) => trim((string) $email), $emails);
        $emails = array_values(array_filter($emails, static fn (string $email): bool => $email !== ''));
        $emails = array_values(array_unique($emails));

        return $emails;
    }

    /**
     * @return array<int, string>
     */
    private static function parseEmails(string $raw): array
    {
        if ($raw === '') {
            return [];
        }

        $parts = preg_split('/[,\n;\x{060C}]+/u', $raw) ?: [];

        $emails = [];
        foreach ($parts as $part) {
            $email = trim((string) $part);
            if ($email === '') {
                continue;
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                continue;
            }

            $emails[] = $email;
        }

        $emails = array_values(array_unique($emails));

        return $emails;
    }
}


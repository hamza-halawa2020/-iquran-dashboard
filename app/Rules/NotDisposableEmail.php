<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotDisposableEmail implements ValidationRule
{
    /**
     * Common disposable/temporary email domains to block.
     * Add more as needed.
     */
    protected array $blockedDomains = [
        'mailinator.com', 'tempmail.com', 'throwam.com', 'guerrillamail.com',
        'sharklasers.com', 'guerrillamailblock.com', 'grr.la', 'guerrillamail.info',
        'guerrillamail.biz', 'guerrillamail.de', 'guerrillamail.net', 'guerrillamail.org',
        'spam4.me', 'yopmail.com', 'yopmail.fr', 'cool.fr.nf', 'jetable.fr.nf',
        'nospam.ze.tc', 'nomail.xl.cx', 'mega.zik.dj', 'speed.1s.fr',
        'courriel.fr.nf', 'moncourrier.fr.nf', 'monemail.fr.nf', 'monmail.fr.nf',
        'dispostable.com', 'maildrop.cc', 'trashmail.com', 'trashmail.at',
        'trashmail.io', 'trashmail.me', 'trashmail.net', 'discard.email',
        'fakeinbox.com', 'mailnull.com', 'spamgourmet.com', 'trashmail.org',
        'throwam.com', 'getairmail.com', 'filzmail.com', '10minutemail.com',
        '20minutemail.com', 'tempr.email', 'discard.email', 'spambog.com',
        'spambox.us', 'spamfree24.org', 'spamspot.com', 'spamthisplease.com',
        'tempinbox.com', 'tempemail.net', 'throwam.com', 'wegwerfmail.de',
        'wegwerfmail.net', 'wegwerfmail.org', 'mailismagic.com', 'mohmal.com',
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || ! str_contains($value, '@')) {
            return;
        }

        $domain = strtolower(substr($value, strpos($value, '@') + 1));

        if (in_array($domain, $this->blockedDomains, true)) {
            $fail('This email domain is not allowed. Please use a valid email address.');
        }
    }
}

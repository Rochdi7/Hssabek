<?php

namespace App\Traits;

/**
 * Stores chantier_name + chantier_location packed inside the notes column.
 * Format: {"__c":{"n":"...","l":"..."},"__notes":"real notes text"}
 * Plain notes (no __c key) are returned as-is so old data is unaffected.
 */
trait HasChantierField
{
    public function getChantierNameAttribute(): string
    {
        return $this->decodeChantier()['name'];
    }

    public function getChantierLocationAttribute(): string
    {
        return $this->decodeChantier()['location'];
    }

    public function getRealNotesAttribute(): ?string
    {
        $raw = $this->attributes['notes'] ?? null;
        if (! $raw) return null;
        $decoded = json_decode($raw, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($decoded['__c'])) {
            return $decoded['__notes'] ?? null;
        }
        return $raw;
    }

    private function decodeChantier(): array
    {
        $raw = $this->attributes['notes'] ?? null;
        if (! $raw) return ['name' => '', 'location' => ''];
        $decoded = json_decode($raw, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($decoded['__c'])) {
            return [
                'name'     => $decoded['__c']['n'] ?? '',
                'location' => $decoded['__c']['l'] ?? '',
            ];
        }
        return ['name' => '', 'location' => ''];
    }

    public static function packNotes(?string $chantierName, ?string $chantierLocation, ?string $notes): ?string
    {
        $name = trim($chantierName ?? '');
        $loc  = trim($chantierLocation ?? '');
        if ($name === '' && $loc === '') {
            return $notes ?: null;
        }
        return json_encode([
            '__c'      => ['n' => $name, 'l' => $loc],
            '__notes'  => $notes,
        ], JSON_UNESCAPED_UNICODE);
    }
}

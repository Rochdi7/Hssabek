<?php

namespace App\Notifications;

use App\Models\System\Announcement;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class AnnouncementNotification extends Notification
{
    public function __construct(
        public readonly Announcement $announcement,
    ) {}

    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    public function toArray(mixed $notifiable): array
    {
        $colorMap = [
            'info'    => 'info',
            'warning' => 'warning',
            'success' => 'success',
            'danger'  => 'danger',
        ];

        $iconMap = [
            'info'    => 'info-circle',
            'warning' => 'warning-2',
            'success' => 'tick-circle',
            'danger'  => 'danger',
        ];

        // Determine the user's preferred locale (stored on user or fall back to app locale)
        $locale = $notifiable->locale ?? app()->getLocale();

        return [
            'title'           => $this->announcement->localizedTitle($locale),
            'message'         => Str::limit(strip_tags($this->announcement->localizedContent($locale)), 150),
            'color'           => $colorMap[$this->announcement->type] ?? 'info',
            'icon'            => $iconMap[$this->announcement->type] ?? 'notification',
            'announcement_id' => $this->announcement->id,
            'attachment'      => $this->announcement->attachment,
            // Store all locales so the notification panel can switch on the fly
            'title_fr'        => $this->announcement->title_fr,
            'title_ar'        => $this->announcement->title_ar,
            'title_en'        => $this->announcement->title_en,
            'content_fr'      => Str::limit(strip_tags($this->announcement->content_fr ?? ''), 150),
            'content_ar'      => Str::limit(strip_tags($this->announcement->content_ar ?? ''), 150),
            'content_en'      => Str::limit(strip_tags($this->announcement->content_en ?? ''), 150),
        ];
    }
}

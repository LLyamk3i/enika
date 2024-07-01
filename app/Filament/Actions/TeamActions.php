<?php

namespace App\Filament\Actions;

use Carbon\Carbon;
use App\Models\Groupe;
use App\Models\Properties;
use App\Models\Notifications;
use App\Events\NotificationCreated;
use Filament\Notifications\Notification;

class TeamActions
{
    public static function handleStatusChange(Groupe $record)
    {
        // Les statuts possibles sont : 'pending', 'accepted', 'rejected'

        if ($record->status === 'accepted') {
            self::acceptProperty($record);
        } elseif ($record->status === 'rejected') {
            self::rejectProperty($record);
        } else {
            self::setPendingProperty($record);
        }
    }

    private static function acceptProperty(Groupe $record)
    {
        $record->update([
            'status' => 'accepted',
            'is_verified' => 'Approved',
            'accepted_at' => Carbon::now(),
            'rejected_at' => null, // Réinitialise rejected_at si la propriété est acceptée
        ]);

        Notification::make()
            ->title('Création de groupe acceptée avec succès')
            ->success()
            ->send();
    }

    private static function rejectProperty(Groupe $record)
    {
        $record->update([
            'status' => 'rejected',
            'is_verified' => 'Pending',
            'rejected_at' => Carbon::now(),
            'accepted_at' => null, // Réinitialise accepted_at si la propriété est rejetée
        ]);

        Notification::make()
            ->title('Création de groupe rejetée avec succès')
            ->danger()
            ->send();
    }

    private static function setPendingProperty(Groupe $record)
    {
        $record->update([
            'status' => 'pending',
            'is_verified' => 'Pending',
            'accepted_at' => null,
            'rejected_at' => null,
        ]);

        Notification::make()
            ->title('Création de groupe mise en attente avec succès')
            ->info()
            ->send();
    }
}

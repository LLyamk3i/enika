<?php

namespace App\Observers;

use App\Models\Actuality;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ActualityObserver
{
    /**
     * Handle the Actuality "created" event.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return void
     */
    public function created(Actuality $actuality)
    {
        Log::info('Actuality created: ' . $actuality->id);
        $this->handleAttachments($actuality);
    }

    /**
     * Handle the Actuality "updated" event.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return void
     */
    public function updated(Actuality $actuality)
    {
        Log::info('Actuality updated: ' . $actuality->id);
        $this->handleAttachments($actuality);
    }

    /**
     * Handle attachments for the Actuality.
     *
     * @param  \App\Models\Actuality  $actuality
     * @return void
     */

     protected function handleAttachments(Actuality $actuality)
{
    $attachments = $actuality->temporaryUrl; // Assurez-vous que 'attachments' est l'attribut correct

    if (!empty($attachments)) {
        foreach ($attachments as $attachment) {
            // Stockez le fichier et obtenez le chemin
            $path = Storage::disk('public')->put('attachment', Storage::disk('public')->get($attachment));
            // Créez une entrée dans la table attachments pour chaque fichier
            Attachment::create([
                'report_id' => $actuality->id,
                'file_path' =>  $attachment,
                'file_type' => $attachment,
                'collection' => 'default',
                'disk' => 'public',
                'categorie' => 'actualité',
            ]);
        }
    }
}

}

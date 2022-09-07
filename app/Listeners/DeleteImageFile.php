<?php

namespace App\Listeners;

use App\Events\CardDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteImageFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CardDeleted  $event
     * @return void
     */
    public function handle(CardDeleted $event)
    {
        // 実ファイル削除
        Storage::delete('public/' . $event->card->face_photo);
        Storage::delete('public/' . $event->card->organization_logo);
        Storage::delete('public/' . $event->card->image_photo);
    }
}

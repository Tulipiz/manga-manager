<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class LimparUploadTemporario implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        Storage::disk('r2')->deleteDirectory('livewire-tmp');
    }
}
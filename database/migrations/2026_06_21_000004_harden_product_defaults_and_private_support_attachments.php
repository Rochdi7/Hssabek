<?php

use App\Models\Support\SupportTicket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('products')) {
            DB::table('products')->whereNull('purchase_price')->update(['purchase_price' => 0]);
            DB::table('products')->whereNull('quantity')->update(['quantity' => 0]);
            DB::table('products')->whereNull('discount_value')->update(['discount_value' => 0]);

            Schema::table('products', function (Blueprint $table) {
                $table->decimal('purchase_price', 12, 2)->default(0)->change();
                $table->decimal('quantity', 14, 3)->default(0)->change();
                $table->decimal('discount_value', 12, 4)->default(0)->change();
            });
        }

        if (! Schema::hasTable('media')) {
            return;
        }

        Media::query()
            ->where('model_type', SupportTicket::class)
            ->where('collection_name', 'attachments')
            ->where('disk', 'public')
            ->orderBy('id')
            ->chunkById(100, function ($mediaItems): void {
                foreach ($mediaItems as $media) {
                    $this->moveMediaDirectory($media, 'public', 'local');
                }
            });
    }

    public function down(): void
    {
        if (! Schema::hasTable('media')) {
            return;
        }

        Media::query()
            ->where('model_type', SupportTicket::class)
            ->where('collection_name', 'attachments')
            ->where('disk', 'local')
            ->orderBy('id')
            ->chunkById(100, function ($mediaItems): void {
                foreach ($mediaItems as $media) {
                    $this->moveMediaDirectory($media, 'local', 'public');
                }
            });
    }

    private function moveMediaDirectory(Media $media, string $fromDisk, string $toDisk): void
    {
        $source = Storage::disk($fromDisk);
        $target = Storage::disk($toDisk);
        $relativePath = ltrim(str_replace('\\', '/', $media->getPathRelativeToRoot()), '/');
        $directory = trim(str_replace('\\', '/', dirname($relativePath)), '.\/');

        if ($directory !== '') {
            foreach ($source->allDirectories($directory) as $childDirectory) {
                $target->makeDirectory($childDirectory);
            }
        }

        $files = $directory !== '' ? $source->allFiles($directory) : [$relativePath];

        foreach ($files as $file) {
            if ($target->exists($file)) {
                continue;
            }

            $stream = $source->readStream($file);

            if ($stream === false) {
                continue;
            }

            try {
                $target->writeStream($file, $stream);
            } finally {
                if (is_resource($stream)) {
                    fclose($stream);
                }
            }
        }

        if (! $source->exists($relativePath) && ! $target->exists($relativePath)) {
            return;
        }

        Media::query()
            ->whereKey($media->getKey())
            ->update([
                'disk' => $toDisk,
                'conversions_disk' => $media->conversions_disk === $fromDisk ? $toDisk : $media->conversions_disk,
            ]);
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('organization_profiles')
            || Schema::hasColumn('organization_profiles', 'youtube_url')) {
            return;
        }

        Schema::table('organization_profiles', function (Blueprint $table) {
            $table->string('youtube_url')->nullable()->after('instagram_url');
        });
    }

    public function down(): void
    {
        // Kolom tidak dihapus otomatis agar data profil tetap aman.
    }
};

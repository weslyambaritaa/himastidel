<?php

namespace Database\Seeders;

use App\Helper\ConstHelper;
use App\Helper\ToolsHelper;
use App\Models\HakAksesModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use RuntimeException;

class Ifs23013AdminSeeder extends Seeder
{
    public function run(): void
    {
        $userId = config('sdi.admin_user_id');

        if (! is_string($userId) || ! Str::isUuid($userId)) {
            throw new RuntimeException(
                'Set HIMASTI_ADMIN_USER_ID ke ID UUID akun eksternal ifs23013 sebelum menjalankan seeder.'
            );
        }

        $akses = HakAksesModel::query()->firstOrNew(['user_id' => $userId]);
        $akses->id ??= ToolsHelper::generateId();
        $akses->akses = implode(',', ConstHelper::getOptionRoles());
        $akses->save();
    }
}

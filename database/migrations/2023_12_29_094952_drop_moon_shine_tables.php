<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('moonshine_change_logs');
        Schema::dropIfExists('moonshine_socialites');
        Schema::dropIfExists('moonshine_user_permissions');
        Schema::dropIfExists('moonshine_users');
        Schema::dropIfExists('moonshine_user_roles');
    }
};

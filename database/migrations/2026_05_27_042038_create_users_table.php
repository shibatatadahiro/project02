<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned, PK, auto_increment
            $table->string('name', 255); // 氏名
            $table->string('email', 255)->unique(); // メールアドレス（ログイン用）
            $table->timestamp('email_verified_at')->nullable(); // Breeze標準
            $table->string('password', 255); // ハッシュ化パスワード
            $table->string('remember_token', 100)->nullable(); // Breeze標準
            $table->string('role', 20); // user / admin
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

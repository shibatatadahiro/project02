<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); // bigint unsigned, PK, auto_increment

            // FK: users.id
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->tinyInteger('evaluation'); // 1〜5 の評価値
            $table->string('comment', 255); // コメント

            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at（論理削除）
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};

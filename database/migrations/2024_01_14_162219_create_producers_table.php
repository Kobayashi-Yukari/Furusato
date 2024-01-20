<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('生産者代表の名前');
            $table->string('email')->unique(); 
            $table->string('password');
            $table->string('tel')->comment('電話番号');
            $table->string('postcode')->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('company_name')->nullable()->comment('表示名または会社名');
            $table->boolean('is_display')->default(1)->comment('表示->1:非表示->0');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producers');
    }
};

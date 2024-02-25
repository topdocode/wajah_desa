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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->json("data");
            $table->timestamps();
        });

        DB::table("settings")->insert([
            "type" => "global",
            "data" => json_encode([
                "phone" => "",
                "title" => "",
                "description" => "",
                "address" => "",
                "email" => "",
                "map_link" => "",
                "logo" => [],
                "social_media" => [
                    "Google" => "",
                    "Facebook" => "",
                    "Instagram" => ""
                ]
            ])
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

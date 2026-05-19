<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationFieldsToWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->longText('clinic_address')->nullable()->after('whatsapp_number');
            $table->longText('map_embed_url')->nullable()->after('clinic_address');
            $table->longText('map_direction_url')->nullable()->after('map_embed_url');
        });
    }

    public function down()
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn([
                'clinic_address',
                'map_embed_url',
                'map_direction_url',
            ]);
        });
    }
}

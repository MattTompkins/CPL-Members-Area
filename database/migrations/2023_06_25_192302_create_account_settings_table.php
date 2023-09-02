<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->boolean('show_profile')->default(true);
            $table->boolean('show_contact_info')->default(false);
            $table->boolean('show_qualifications')->default(true);
            $table->boolean('show_my_events')->default(true);
            $table->boolean('show_my_training')->default(true);
            $table->boolean('receive_emails')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_settings');
    }
};

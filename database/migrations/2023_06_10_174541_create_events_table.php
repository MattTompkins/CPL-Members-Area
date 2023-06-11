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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('event_title');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status')->default('draft');
            $table->longText('description');
            $table->longText('location');
            $table->longText('banner_image')->nullable();
            $table->boolean('show_on_website')->default(FALSE);
            $table->boolean('members_only')->default(FALSE);
            $table->integer('managed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};

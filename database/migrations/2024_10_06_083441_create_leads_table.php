<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('property_for');
            $table->string('property_type');
            $table->decimal('budget', 15, 2);
            $table->string('city');
            $table->string('contact_type');
            $table->string('email');
            $table->string('name');
            $table->string('mobile_no');
            $table->boolean('agree_to_terms');
            $table->string('lead_action')->default('open');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
};

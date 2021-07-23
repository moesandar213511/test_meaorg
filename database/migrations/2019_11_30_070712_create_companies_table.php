<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_id');
            $table->string('logo');
            $table->string('name');
            $table->integer('category_id');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('web_url');
            $table->string('fb_link');
            $table->text('what_we_do');
            $table->text('why_join_us');
            $table->text('vision');
            $table->text('mission');
            $table->text('about_us');
            $table->string('company_type');
            $table->string('ad_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

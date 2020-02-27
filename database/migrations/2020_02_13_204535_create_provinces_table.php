<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

            $table->timestamps();
        });


        DB::table('provinces')->insert(
            [
                'id' => 1,
                'name' => "آذربایجان شرقی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 2,
                'name' => "آذربایجان غربی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 3,
                'name' => "اردبیل"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 4,
                'name' => "اصفهان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 5,
                'name' => "البرز"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 6,
                'name' => "ایلام"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 7,
                'name' => "بوشهر"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 8,
                'name' => "تهران"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 9,
                'name' => "چهارمحال وبختیاری"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 10,
                'name' => "خراسان جنوبی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 11,
                'name' => "خراسان رضوی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 12,
                'name' => "خراسان شمالی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 13,
                'name' => "خوزستان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 14,
                'name' => "زنجان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 15,
                'name' => "سمنان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 16,
                'name' => "سیستان وبلوچستان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 17,
                'name' => "فارس"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 18,
                'name' => "قزوین"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 19,
                'name' => "قم"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 20,
                'name' => "کردستان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 21,
                'name' => "کرمان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 22,
                'name' => "کرمانشاه"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 23,
                'name' => "کهگیلویه وبویراحمد"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 24,
                'name' => "گلستان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 25,
                'name' => "گیلان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 26,
                'name' => "لرستان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 27,
                'name' => "مازندران"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 28,
                'name' => "مرکزی"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 29,
                'name' => "هرمزگان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 30,
                'name' => "همدان"
            ]
        );
        DB::table('provinces')->insert(
            [
                'id' => 31,
                'name' => "یزد"
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}

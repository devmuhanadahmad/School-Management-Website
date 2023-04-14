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
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
              $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('schoolgrade_id')->constrained('schoolgrades')->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained('classrooms')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->string('meeting_id');
            $table->string('topic');//عنوان الخصة الدراسية الظاهر لطالب
            $table->integer('duration')->comment('minutes');//مدة حصة الزوم
            $table->dateTime('start_at');//وقت وتاريخ  حصة الزوم
            $table->string('password')->comment('meeting password');
            $table->text('start_url');//رابط دخول لزوم لطلاب
            $table->text('join_url');//رابط الزوم لمعلم لدخول قبل الطلاب
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
        Schema::dropIfExists('online_classes');
    }
};

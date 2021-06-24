<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('email')->nullable();
            $table->string('subject_code')->nullable();
            $table->timestamp('deadline');
            $table->text('description')->nullable();
            $table->integer('number_of_pages')->default(1);
            $table->integer('status')->default(2); // 1-completed, 2-pending, 0-canceled
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
        Schema::dropIfExists('assignment_requests');
    }
}

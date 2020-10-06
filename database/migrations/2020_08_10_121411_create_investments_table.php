<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('file_id');
            $table->string('investor_number');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('bname');
            $table->string('baccount');
            $table->string('aname');
            $table->string('phone');
            $table->unsignedInteger('iplan_id');
            $table->unsignedInteger('iduration_id');
            $table->unsignedInteger('branch_id');
            $table->string('percentage');
            $table->string('ainvested');
            $table->string('roi');
            $table->string('pdate');
            $table->string('adate');
            $table->string('num_of_payment')->nullable();
            $table->unsignedInteger('istatus_id')->defaukt('Inactive');
            $table->text('note')->default('No additional note.');
            $table->text('referee')->nullable();
            $table->text('ref_account_num')->nullable();
            $table->text('ref_account_name')->nullable();
            $table->text('ref_account_bank')->nullable();
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
        Schema::dropIfExists('investments');
    }
}

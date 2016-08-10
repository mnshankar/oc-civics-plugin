<?php
namespace serenitynow\civics\updates;

use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('serenitynow_civics_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->text('answer');
            $table->text('extra')->nullable();
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
        \Schema::dropIfExists('serenitynow_civics_questions');
    }

}

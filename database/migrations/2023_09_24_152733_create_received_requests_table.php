<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('received_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained();
            $table->string('method');
            $table->text('headers')->nullable();
            $table->text('body')->nullable();
            $table->text('query_params')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('timestamp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('received_requests');
    }
}

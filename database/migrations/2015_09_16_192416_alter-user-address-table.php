<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_addresses', function ($table) {
            $table->string('address_1', 100)->after('user_id');
            $table->string('address_2', 100)->nullable()->after('address_1');;
            $table->string('company', 100)->nullable()->after('address_2');;
            $table->string('phone_1', 10)->nullable()->after('company');;
            $table->string('phone_2', 10)->nullable()->after('phone_1');;
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

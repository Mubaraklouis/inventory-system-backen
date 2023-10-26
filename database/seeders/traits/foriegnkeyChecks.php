<?php
namespace Database\Seeders\traits;
use Illuminate\Support\Facades\DB;

 trait ForiegnKeyCheck{
/*
*  enableForiegnKey() => this function enables foriegn key checks
*  disableForiegnKey() => this function disables foriegn key checks
*  truncates() => this function truncates the database table
*/


public function enableForeignKey(){
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
}

public function disableForeignKey(){
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
}

public function truncateTable($table)
{
    DB::table($table)->truncate();

}
 }


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseTestController extends Controller
{
    public function testDatabase()
    {
        try {
             // Create a new table named 'test_table'
             DB::connection()->getPdo();
             return "Database connection established successfully!";
        } catch (\Exception $e) {
            return "Unable to connect to the database: " . $e->getMessage();
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddRoute extends Command {
    protected $signature = 'add:display {routename} {bladename} {--layout}';

    protected $description = 'Adds a new display';

    public function handle() {
        if (file_exists("resources/views/".$this->argument("bladename").".blade.php")) {
            die("File already exists");
        }

        $webphpcontent = file_get_contents("routes/web.php");
        $webphpcontent .= '
Route::get("'.$this->argument("routename").'", function () {
    return view("'.$this->argument("bladename").'");
});
        ';
        file_put_contents("routes/web.php", $webphpcontent);

        $basic = "
@extends('layouts.app')

@section('title', 'Rename me')

@section('content')
    <p>I am a new created blade file (".$this->argument("bladename").".blade.php)</p>
    <a href='{{ url('/') }}'>Link to main page (if neccesary)</a>
@endsection
        ";

        file_put_contents("resources/views/".$this->argument("bladename").".blade.php", $basic);

        echo "Please go to ".$this->argument("routename")." to see your view \n";
        echo "You are free to edit ".$this->argument("bladename").".blade.php (file located inside views folder)";

        // var_dump($this->arguments());
        // var_dump($this->options());
    }
}

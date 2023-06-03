<?php 
    require_once 'filesystem.php';
    class Laravel {
        public $relativeDir;
        public $templater;
        public $artisan;

        public function __construct($relativeDir, $templateMode = true) {
            if (!$relativeDir) {return "Error: relativeDir argument does not exist";}
            $this->relativeDir = $relativeDir;
            $this->templater = new Templates($templateMode);
            $this->artisan = new Artisan ($relativeDir);
        }

        public function createProject ($composerDir = "composer.phar") {
            FileSystem::createADirectory($this->relativeDir);

            shell_exec('php '.$composerDir.' create-project laravel/laravel '.$this->relativeDir);

            return;
        }

        public function makeMigration ($name, $content = "") {
            $filedir = $this->artisan->createMigration($name);

            if ($content != "") {
                $fullcontent = $this->templater->migration($name, $content);
                FileSystem::replaceFileContent($filedir, $fullcontent);
            }

            return;
        }

        public function makeModel ($name, $content = "") {
            $filedir = $this->artisan->createModel($name);

            if ($content != "") {
                $fullcontent = $this->templater->model($name, $content);
                FileSystem::replaceFileContent($filedir, $fullcontent);
            }

            return;
        }

        public function makeController ($name, $content = "") {
            $filedir = $this->artisan->createController($name);

            if ($content != "") {
                $fullcontent = $this->templater->controller($name, $content);
                FileSystem::replaceFileContent($filedir, $fullcontent);
            }

            return;
        }

        public function makeSeeder ($name, $content) {
            $filedir = $this->artisan->createSeeder($name);

            $fullcontent = $this->templater->seeder($name, $content);
            FileSystem::replaceFileContent($filedir, $fullcontent);
        }

        public function uploadViews ($viewsdir) {
            FileSystem::rrmdir($this->relativeDir."/resources/views");

            FileSystem::moveObject($viewsdir, $this->relativeDir."/resources/views");
        }

        public function uploadAssets ($assetsdir) {
            if (is_dir($assetsdir."/css")) {
                FileSystem::moveObject($assetsdir."/css", $this->relativeDir."/public");
            }

            if (is_dir($assetsdir."/js")) {
                FileSystem::moveObject($assetsdir."/js", $this->relativeDir."/public");
            }

            return;
        }

        public function overrideRoutes ($content) {
            $fullcontent = $this->templater->routes($content);
            FileSystem::replaceFileContent($this->relativeDir."/routes/web.php", $fullcontent);
        }

        public function createDatabase ($name) {
            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = new mysqli($servername, $username, $password);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "CREATE DATABASE ".$name;

            if ($conn->query($sql) === FALSE) {
                echo "Error creating database: " . $conn->error;
            }

            $conn->close();

            $envcontent = file_get_contents($this->relativeDir."/.env");

            FileSystem::replaceFileContent($this->relativeDir."/.env", str_replace('DB_DATABASE=laravel', 'DB_DATABASE='.$name, $envcontent));
        }

        public function prepare () {
            $this->artisan->runMigrations();
            $this->artisan->seedDatabase();
        }

        public function serve () {
            $this->artisan->serve("8080");

            return;
        }
    }

    class Templates {
        public $templateMode;

        function __construct($templateMode = true) {
            $this->templateMode = $templateMode;
        }

        function controller ($name, $content) {
            if (!$this->templateMode) return $content;

            return '<?php namespace App\Http\Controllers;use Illuminate\Http\Request;class '.$name.' extends Controller{'.$content.'} ?>';
        }

        function routes ($content) {
            return $content;
        }

        function model ($name, $content) {
            if (!$this->templateMode) return $content;

            return "<?php namespace App\Models;use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;class ".$name." extends Model{use HasFactory;".$content."} ?>";
        }

        function migration ($name, $content) {
            if (!$this->templateMode) return $content;

            return '<?php use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;return new class extends Migration{public function up():void{Schema::create("'.$name.'",function(Blueprint $table){'.$content.'});}public function down():void{Schema::dropIfExists("'.$name.'");}}; ?>';
        }

        function seeder ($name, $content) {
            return $content;
        }
    }

    class Artisan {
        public $relativeDir;
        public $seeders = [];
        public $migrations = [];
        public $models = [];
        public $controllers = [];

        function __construct($relativeDir) {
            $this->relativeDir = $relativeDir;
        }

        public function runCommand ($command) {
            return shell_exec("php ".$this->relativeDir."/artisan ".$command);
        }

        public function serve ($port) {
            echo $this->runCommand("serve --port=".$port);
            return;
        }

        public function createMigration ($name) {
            $output = $this->runCommand("make:migration create_".$name."_table");

            $relativeFiledir = "/database/".explode("]", explode("\database\\",$output)[1])[0];

            $this->migrations[] = ["dir" => $relativeFiledir];

            return $this->relativeDir.$relativeFiledir;
        }

        public function createModel ($name) {
            $output = $this->runCommand("make:model ".$name);

            $relativeFiledir = "/app/".explode("]", explode("\app/", $output)[1])[0];

            $this->models[] = ["dir" => $relativeFiledir];

            return $this->relativeDir.$relativeFiledir;
        }

        public function createController ($name) {
            $output = $this->runCommand("make:controller ".$name);

            $relativeFiledir = "/app/".explode("]", explode("\app/", $output)[1])[0];

            $this->controllers[] = ["dir" => $relativeFiledir];

            return $this->relativeDir.$relativeFiledir;
        }

        public function createSeeder ($name) {
            $output = $this->runCommand("make:seeder ".$name);

            $relativeFiledir = "/database".explode("]", explode("\database",$output)[1])[0];

            $this->seeders[] = ["dir" => $relativeFiledir, "name" => $name];

            return $this->relativeDir.$relativeFiledir;
        }

        public function runMigrations () {
            $this->runCommand("migrate");

            return;
        }

        public function seedDatabase () {
            for ($i = 0; $i < count($this->seeders); $i++) { 
                $this->runCommand("db:seed --class=".$this->seeders[$i]["name"]);   
            }

            return;
        }
    }
?>
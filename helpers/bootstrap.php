<?php 
    require_once 'filesystem.php';
    class Bootstrap {
        public $relativeDir;
        public $targetFile;

        public function __construct($relativeDir) {
            if (!$relativeDir) {return "Error: relativeDir argument does not exist";}
            $this->relativeDir = $relativeDir;
        }

        public function createDesign ($designContent) {
            mkdir ($this->relativeDir);

            $designContent = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Document</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script></head><body>'.$designContent.'</body></html>';

            FileSystem::replaceFileContent($this->relativeDir.'/index.html', $designContent);

            return $this;
        }

        public function serveFile ($port = 3000) {
            shell_exec("php -S localhost:".$port." -t ".$this->relativeDir);
            return;
        }
    }
?>
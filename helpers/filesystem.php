<?php 
    class FileSystem {
        public static function replaceFileContent ($dir, $newcontent) {
            $file = fopen($dir, "w") or die("Unable to open file!");

            fwrite($file, $newcontent);

            fclose($file);
        }

        public static function createADirectory ($path) {
            mkdir($path);

            return;
        }

        public static function moveObject ($from, $to) {
            shell_exec("move ".$from." ".$to);

            return;
        }

        public static function rrmdir($dir) {
            if (is_dir($dir)) {
                $objects = scandir($dir);

                foreach ($objects as $object) {
                    if ($object != '.' && $object != '..'){
                        if (filetype($dir.'/'.$object) == 'dir') {FileSystem::rrmdir($dir.'/'.$object);}
                        else {unlink($dir.'/'.$object);}
                    }
                }

                reset($objects);
                rmdir($dir);
            }
        }
    }
?>
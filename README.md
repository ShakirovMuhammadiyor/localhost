# Transcend the constraints of time  

**Let's get right to the topic (you might have already understood what this repository is all about) 💡**

_This repo was designed to work with PHP-staff, but you may do the same with any other language as well._

_Here's the basic representation of the whole process._

![My First Board (1)](https://github.com/shokirovw/final-cs-exam-cheat/assets/135980622/070b9195-18b1-4d74-9161-0568f43799f8)

1. Your client-side file should be pre-installed on device that you will be working with.
2. All you have to do is to run the file.
3. Then the programm clones the repo (Git required)
4. After cloning it installs required packages, creates databases, etc.. (if neccesary)
5. Then after everything is done, driver deletes itself.

## Example client driver
```php
<?php 
    function getNumber ($argument) {
        $hash = [
            "q" => 1,
            "w" => 2,
            "e" => 3,
            "r" => 4,
            "t" => 5,
            "y" => 6,
            "u" => 7,
            "i" => 8,
            "o" => 9,
            "p" => 10,
            "[" => 11,
            "]" => 12
        ];

        if (!$argument || !isset($argument)) {
            die("Please specify the command");
        }

        if ($argument[0] != "-") {
            die("Invalid command");
        } 

        if (!array_key_exists($argument[1], $hash)) {
            die("Invalid command");
        }

        return $hash[$argument[1]];
    }

    $number = getNumber($argv[1]);

    $output = shell_exec('"C:\Program Files\Git\bin\git.exe" clone https://github.com/your_git_prfile/git_repo_name.git --branch '.$number.'v .');
    
    include 'main.php'; // Main php handles installing packages and creting databases

    mainRun(); // main.php

    unlink(__FILE__);
?>
```

_A few comments about the code:_ :card_file_box:
1. Exactly this code should be pre-installed on machine
2. It's been decided to indicate the paper numbers in letters (q, w, e...) to make the process even more secure
3. mainRun() comes from main.php, and basically handles all those paper-specific operations (package-installation, databases, migrations, etc..)
4. At the end, the file deletes itself.

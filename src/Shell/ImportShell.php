<?php

/**
 * Description of ImportShell
 *
 * @author HienBV 
 */

namespace App\Shell;

use Cake\Console\Shell;

class ImportShell extends Shell
{

    // Found in src/Shell/Task/ImportFileTask.php
    public $tasks = ['ImportFile'];
    
    public function main()
    {
        $this->ImportFile->main();
    }

}

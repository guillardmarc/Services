<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;

class FolderService
{    
    public function __construct(
        private Filesystem $filesystem,
    )
    {}

    public function createdFolder($path, $folderName)
    {
        if (!$this->filesystem->exists($path)) { 
            $this->filesystem->mkdir($path, 0700);
            return '"'.$folderName.'" folder created';
        } 
        elseif ($this->filesystem->exists($path)) {
            return 'Folder already exists';
        }
        else {
            return 'Error while trying to verify existence and create desired folder' ;
        }
    }

    public function renameFolder ($oldPath, $OldFolderName, $path, $folderName)
    {
        if ($this->filesystem->exists($oldPath) && !$this->filesystem->exists($path)) {
            $this->filesystem->rename($oldPath,$path);
            return 'The "'.$oldFolderName.'" folder has been renamed to "'.$folderName';
        }
    }

    public function deletedFolder($path, $folderName)
    {
        if (!file_exists($path)) { 
            return false; 
        }
        if (!is_dir($path)) { 
            return unlink($path); 
        } 
        foreach (scandir($path) as $item) { 
            if ($item == '.' || $item == '..') { 
                continue; 
            }
            else {
                unlink( $path.'/'.$item );
            }
        }
        rmdir($path);
        return 'The "'.$folderName.'" folder has been deleted';
    }
}

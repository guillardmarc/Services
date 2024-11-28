# Services
## Table of Contents
[FolderService](#FolderService)
## FolderService
###### Testing with Symfony 7.1 and PHP 8.3
#### Setup
1. Download the file "FolderService.php"
2. In your "Symfony" project
- Create a folder "Service" in the "src" folder
- Copy the file "FolderService.php" in the "Service" folder
#### Calling functions
1. The folder creation function
```php
$folderName = "folder name";
$path = $this->getParameter('kernel.project_dir') . '/public/'.$folderName;
$message = $this->folderService->createdFolder($path, $folderName);
$this->addFlash('notice', $message);
```
2. The folder rename function
```php
$oldFolderName = "old folder name";
$folderName = "folder name"
$oldDirectory = $this->getParameter('kernel.project_dir') . '/public/'.$oldFolderName;
$directory = $this->getParameter('kernel.project_dir') . '/public/'.$folderName;
$message = $this->folderService->renameFolder($oldDirectory, $oldFolderName, $directory, $folderName);
$this->addFlash('notice', $message);
3. The folder delet function
```php
$oldFolderName = "old folder name";
$oldDirectory = $this->getParameter('kernel.project_dir') . '/public/'.$oldFolderName;
$message = $this->folderService->deletedFolder($oldDirectory, $oldFolderName);
$this->addFlash('notice', $message);

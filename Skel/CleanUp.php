<?php
/**
 * @author Christoph Bessei
 */

namespace BIT\Skel;

use Composer\Script\Event;

class CleanUp
{
    public static function postCreateProjectCmd(Event $event)
    {
        $rootDir = rtrim(dirname(__DIR__, 1), '/');
        static::deleteUnusedFiles($rootDir);
    }

    /**
     * Delete unused files:<br>
     * - .gitignore which were needed to preserve empty directories<br>
     * - README.md
     * - The current script and the Skel/ directory
     * <br>
     * For security reasons we do not use `rm -R`, but delete all files explicitly
     * @param string $rootDir
     */
    protected static function deleteUnusedFiles(string $rootDir)
    {
        // Delete .gitignore
        unlink($rootDir . '/Classes/ContentElements/.gitignore');
        unlink($rootDir . '/Classes/Controller/.gitignore');
        unlink($rootDir . '/Classes/ViewHelpers/.gitignore');

        unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Layouts/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Partials/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Templates/.gitignore');

        unlink($rootDir . '/Resources/Private/Fluid/GridElements/Templates/.gitignore');

        unlink($rootDir . '/Resources/Private/Fluid/Pages/Layouts/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/Pages/Partials/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/Pages/Templates/.gitignore');


        unlink($rootDir . '/README.md');

        // Finally delete the current script
        unlink($rootDir . '/Skel/CleanUp.php');
        rmdir($rootDir . '/Skel');
    }
}

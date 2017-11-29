<?php
/**
 * @author Christoph Bessei
 */

namespace BIT\Skel;

use Composer\Script\Event;

class Composer
{
    public static function postCreateProjectCmd(Event $event)
    {
        $rootDir = rtrim(dirname(__DIR__, 1), '/');
        static::replaceComposerJsonWithCleanVersion($rootDir);
        static::deleteUnusedFiles($rootDir);
    }

    /**
     * Delete unused files:
     * * .gitignore files which were needed to preserve empty directories
     * * README.md
     * * The current script and the Skel/ directory
     * <br><br>
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

        unlink($rootDir . '/Resources/Private/Fluid/Form/Layouts/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/Form/Templates/.gitignore');
        unlink($rootDir . '/Resources/Private/Fluid/Form/Partials/.gitignore');

        unlink($rootDir . '/Resources/Private/Fluid/GridElements/Templates/.gitignore');

        unlink($rootDir . '/Resources/Private/Fluid/Pages/Partials/.gitignore');

        // Remove GitHub README
        unlink($rootDir . '/README.md');

        // Remove LICENSE since the full project has probably another license than this skeleton
        unlink($rootDir . '/LICENSE.md');

        // Remove .git directory
        static::rrmdir($rootDir . '/.git/');

        // Remove .idea directory
        static::rrmdir($rootDir . '/.idea/');

        // Finally delete the current script
        unlink($rootDir . '/Skel/Composer.php');
        rmdir($rootDir . '/Skel');
    }

    protected static function replaceComposerJsonWithCleanVersion(string $rootDir)
    {
        rename($rootDir . '/Skel/.composer.json', $rootDir . '/composer.json');
    }


    protected static function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        static::rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }
}
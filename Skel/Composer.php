<?php
/**
 * @author Christoph Bessei
 */

namespace BIT\Skel;

use Composer\Script\Event;

class Composer
{
    /**
     * @var Event
     */
    protected static $event;

    /**
     * @var \Composer\IO\ConsoleIO
     */
    protected static $io;


    public static function postCreateProjectCmd(Event $event)
    {
        static::$event = $event;
        static::$io = $event->getIO();

        $rootDir = rtrim(dirname(__DIR__, 1), '/');
        static::addTemplateExtensionToTypo3($rootDir);
        static::replaceComposerJsonWithCleanVersion($rootDir);
        static::deleteUnusedFiles($rootDir);
    }

    protected static function addTemplateExtensionToTypo3($rootDir)
    {
        $typo3RootDir = rtrim(dirname($rootDir, 4), '/');
        if (is_readable($typo3RootDir . '/composer.json')) {
            $phpBinary = PHP_BINARY;
            $composerBinary = trim($_SERVER['SCRIPT_FILENAME']);

            $templateRepository = trim($_SERVER['EXT_TEMPLATE_REPOSITORY'] ?? '');
            if (!empty($templateRepository)) {
                // Add repository for bit/template
                $addRepositoryCommand = 'config repositories.ext-template vcs "' . $templateRepository . '"';
                $command = 'cd ' . $typo3RootDir . ' && ' . $phpBinary . ' ' . $composerBinary . ' ' . $addRepositoryCommand;
                $output = static::exec($command);
                static::$io->info('Added repostiory for bit/template', $output);

                // composer require bit/template:dev-master
                $command = 'cd ' . $typo3RootDir . ' && ' . $phpBinary . ' ' . $composerBinary . ' require bit/template:dev-master';
                $output = static::exec($command);
                static::$io->info('Added dependency bit/template', $output);

                // Update git remote for bit/template
                static::exec('cd ' . $rootDir . ' && git remote set-url origin "' . $templateRepository . '"');
            } else {
                static::$io->warning("Couldn't find template repository, do nothing");
            }
        }
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
        static::unlink($rootDir . '/Classes/ContentElements/.gitignore');
        static::unlink($rootDir . '/Classes/Controller/.gitignore');
        static::unlink($rootDir . '/Classes/ViewHelpers/.gitignore');

        static::unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Layouts/.gitignore');
        static::unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Partials/.gitignore');
        static::unlink($rootDir . '/Resources/Private/Fluid/ContentElements/Templates/.gitignore');

        static::unlink($rootDir . '/Resources/Private/Fluid/Form/Layouts/.gitignore');
        static::unlink($rootDir . '/Resources/Private/Fluid/Form/Templates/.gitignore');
        static::unlink($rootDir . '/Resources/Private/Fluid/Form/Partials/.gitignore');

        static::unlink($rootDir . '/Resources/Private/Fluid/GridElements/Templates/.gitignore');

        static::unlink($rootDir . '/Resources/Private/Fluid/Pages/Partials/.gitignore');

        // Remove GitHub README
        static::unlink($rootDir . '/README.md');

        // Remove LICENSE since the full project has probably another license than this skeleton
        static::unlink($rootDir . '/LICENSE.md');

        // Remove .git directory
        static::rrmdir($rootDir . '/.git/');

        // Remove .idea directory
        static::rrmdir($rootDir . '/.idea/');

        // Finally delete the current script
        static::unlink($rootDir . '/Skel/Composer.php');
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

    protected static function exec($command)
    {
        exec($command, $output);
        static::$io->info('Executed ' . $command);
        if (!is_array($output)) {
            $output = [$output];
        }
        static::$io->debug('Executed ' . $command . ' Output:', $output);
        return $output;
    }

    protected static function unlink($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}

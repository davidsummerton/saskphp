<?php

/**
 * The bootstrap contains the initialization for unit tests.
 *
 * @author Stefanie Janine Stoelting <mail@stefanie-stoelting.de>
 * @link http://saskphp.com/ Sask website
 * @license http://opensource.org/licenses/MIT MIT
 */
require_once(__DIR__ . '/../Components/AutoLoader.php');

$ignore = array(
    realpath(__DIR__ . '/../Cache'),
    realpath(__DIR__ . '/../_Tests'),
    realpath(__DIR__ . '/../nbproject'),
    realpath(__DIR__ . '/../.git'),
);

AutoLoader::registerDirectory(realpath(__DIR__ . '/..'), $ignore);


define('TESTFOLDER', __DIR__ . '/TestResults');

if (!file_exists(TESTFOLDER)) {
    mkdir(TESTFOLDER);
}

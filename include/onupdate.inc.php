<?php
    /**
     * File containing onUpdate and onInstall functions for the module
     *
     * This file is included by the core in order to trigger onInstall or onUpdate functions when needed.
     * Of course, onUpdate function will be triggered when the module is updated, and onInstall when
     * the module is originally installed. The name of this file needs to be defined in the
     * icms_version.php
     *
     * <code>
     * $modversion['onInstall'] = "include/onupdate.inc.php";
     * $modversion['onUpdate'] = "include/onupdate.inc.php";
     * </code>
     *
     * @copyright    (c) 2011 David Janssens
     * @license        http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
     * @since        1.0
     * @author        David Janssens (fiammybe) <david.j@impresscms.org>
     * @package        billboard
     * @version        $Id$
     */

    defined("ICMS_ROOT_PATH") or die("ICMS root path not defined");

// this needs to be the latest db version
    define('BILLBOARD_DB_VERSION', 2);

    /**
     * it is possible to define custom functions which will be call when the module is updating at the
     * correct time in update incrementation. Simpy define a function named <direname_db_upgrade_db_version>
     */
    /*
    function billboard_db_upgrade_1() {
    }
    function billboard_db_upgrade_2() {
    }
    */

function billboard_db_upgrade_2() {
    $table = new icms_db_legacy_updater_Table('billboard');
    if ($table->exists()) {
        echo '<code><b>Upgrading Database Table Design to version 2 ...</b></code><br />';
        $sql = "ALTER TABLE " . icms::$xoopsDB->prefix('billboard') . " ADD slideshow_id VARCHAR(60) FIRST";
        $result = icms::$xoopsDB->query($sql);
        echo '<code>' . $result . '</code>';
    }

    function icms_module_update_billboard($module)
    {
        return TRUE;
    }

    function icms_module_install_billboard($module)
    {
        return TRUE;
    }
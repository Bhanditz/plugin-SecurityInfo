<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\SecurityInfo;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

/**
 *
 */
class SecurityInfo extends \Piwik\Plugin
{
    public function getListHooksRegistered()
    {
        return array(
            'Menu.Admin.addItems' => 'addMenu',
        );
    }

    function addMenu()
    {
        MenuAdmin::getInstance()->add('CoreAdminHome_MenuDiagnostic', 'SecurityInfo_Security',
            array('module' => 'SecurityInfo', 'action' => 'index'),
            Piwik::hasUserSuperUserAccess(),
            $order = 10);
    }
}

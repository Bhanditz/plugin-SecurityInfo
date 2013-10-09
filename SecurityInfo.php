<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package SecurityInfo
 */
namespace Piwik\Plugins\SecurityInfo;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

/**
 *
 * @package SecurityInfo
 */
class SecurityInfo extends \Piwik\Plugin
{
    /**
     * @see Piwik_Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'Menu.MenuAdmin.addItems' => 'addMenu',
        );
    }

    function addMenu()
    {
        MenuAdmin::getInstance()->add('CoreAdminHome_MenuDiagnostic', 'SecurityInfo_Security',
            array('module' => 'SecurityInfo', 'action' => 'index'),
            Piwik::isUserIsSuperUser(),
            $order = 10);
    }
}

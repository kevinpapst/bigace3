<?php
/**
 * Bigace - a PHP and MySQL based Web CMS.
 *
 * LICENSE
 *
 * This source file is subject to the new GNU General Public License
 * that is bundled with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://www.bigace.de/license.html
 *
 * Bigace is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @category   Bigace
 * @package    Bigace_Admin
 * @subpackage Portlet
 * @copyright  Copyright (c) 2009-2010 Keleo (http://www.keleo.de)
 * @license    http://www.bigace.de/license.html     GNU Public License
 * @version    $Id$
 */

/**
 * An example portlet for new developer.
 *
 * @category   Bigace
 * @package    Bigace_Admin
 * @subpackage Portlet
 * @copyright  Copyright (c) 2009-2010 Keleo (http://www.keleo.de)
 * @license    http://www.bigace.de/license.html     GNU Public License
 */
class Bigace_Admin_Portlet_Example extends Bigace_Admin_Portlet_Default
{
    private $title = 'Example Portlet';

    public function getFilename()
    {
        return 'portlets/example.phtml';
    }

    public function getParameter()
    {
        return array(
            'TITLE' => $this->title,
            'ACTION_URL' => $this->createLink('example')
        );
    }

    public function exampleAction()
    {
        $this->title = "Example Portlet - executed Action";
        $this->getController()->_forward('index');
    }

}
<?php
/**
 * BIGACE - a PHP and MySQL based Web CMS.
 * Copyright (C) Kevin Papst.
 *
 * BIGACE is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * BIGACE is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * For further information visit {@link http://www.bigace.de http://www.bigace.de}.
 *
 * @package bigace.classes
 * @subpackage category
 */

import('classes.category.DBCategory');

/**
 * The CategoryTreeWalker fetches all Children of a Category.
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author Kevin Papst
 * @copyright Copyright (C) Kevin Papst
 * @version $Id$
 * @package bigace.classes
 * @subpackage category
 */
class CategoryTreeWalker
{
    private $categorys;

    /**
     * Create an instance for a known Category ID.
     */
    function CategoryTreeWalker($id)
    {
        $sql = 'SELECT * FROM {DB_PREFIX}category WHERE parentid={CATEGORY} and cid={CID}';
        $sql = $GLOBALS['_BIGACE']['SQL_HELPER']->prepareStatement($sql, array('CATEGORY' => $id), true);
        $this->categorys = $GLOBALS['_BIGACE']['SQL_HELPER']->execute($sql);
    }

    /**
     * Counts the amount of Results.
     *
     * @return int the amount of children for this Category
     */
    public function count()
    {
        return $this->categorys->count();
    }

    /**
     * Return the next Category.
     *
     * @return Category the next children
     */
    public function next()
    {
        $temp = $this->categorys->next();
        return new DBCategory($temp);
    }

}


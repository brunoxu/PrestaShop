<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author 	PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2015 PrestaShop SA
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
namespace PrestaShopBundle\Entity;

/**
 * Class AdminFilter
 * @package PrestaShopBundle\Entity
 */
class AdminFilter
{
    protected $id;
    protected $employee;
    protected $shop;
    protected $controller;
    protected $action;
    protected $filter;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set employee
     *
     * @param integer $employee
     *
     * @return AdminFilter
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return integer
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set shop
     *
     * @param integer $shop
     *
     * @return AdminFilter
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return integer
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set controller
     *
     * @param string $controller
     *
     * @return AdminFilter
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return AdminFilter
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set filter
     *
     * @param string $filter
     *
     * @return AdminFilter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Gets an array with each filter key needed by Product catalog page.
     *
     * Values are filled with empty strings.
     *
     * @return array
     */
    public static function getProductCatalogEmptyFilter()
    {
        return array(
            'filter_category' => '',
            'filter_column_id_product' => '',
            'filter_column_name' => '',
            'filter_column_reference' => '',
            'filter_column_name_category' => '',
            'filter_column_price' => '',
            'filter_column_sav_quantity' => '',
            'filter_column_active' => ''
        );
    }

    /**
     * Gets an array with filters needed by Product catalog page.
     *
     * The data is decoded and filled with empty strings if there is no value on each entry
     * .
     * @return array
     */
    public function getProductCatalogFilter()
    {
        $decoded = json_decode($this->getFilter(), true);
        return array_merge(
            $this->getProductCatalogEmptyFilter(),
            $decoded
        );
    }

    /**
     * Set the filters for Product catalog page into $this->filter.
     *
     * Filters input data to keep only Product catalog filters, and encode it.
     *
     * @param $filter
     * @return AdminFilter tis object for fluent chaining.
     */
    public function setProductCatalogFilter($filter)
    {
        $filter = array_intersect_key(
            $filter,
            $this->getProductCatalogEmptyFilter()
        );
        return $this->setFilter(json_encode($filter));
    }
}

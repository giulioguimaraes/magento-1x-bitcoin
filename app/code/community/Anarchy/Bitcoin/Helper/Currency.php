<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Anarchy
 * @package     Anarchy_Bitcoin
 * @copyright   Fuck the system _|_
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Anarchy_Bitcoin_Helper_Currency extends Mage_Core_Helper_Abstract{


    public function getCurrencyCode(){
       return Mage::app()->getStore()->getCurrentCurrencyCode();
    }    

}
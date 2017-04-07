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
class Anarchy_Bitcoin_Helper_Ticker extends Mage_Core_Helper_Abstract{

    const PAYMENT_ANARCHY_BITCOIN_APIBITCOINAVERAGE = 'payment/anarchy_bitcoin/apibitcoinaverage';
    
    public function getApi(){
        return Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_APIBITCOINAVERAGE);
    
    }

    public function getTicker(){
    
        $url = Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_APIBITCOINAVERAGE);
        
        $uri = Mage::helper("anarchy_bitcoin/currency")->getCurrencyCode();

        $client = new Zend_Http_Client($url."ticker/".$uri."/last");
        $client->setMethod(Zend_Http_Client::GET);

        try
        {
            
            $response = $client->request();

            if($response->getStatus() == 500){
                Mage::throwException($this->__('Gateway request error: %s', 'ticker not supported'));
            }

        }
        catch (Exception $e) 
        {
            Mage::throwException($this->__('Gateway request error: %s', $e->getMessage()));
        }
        return $response->getBody();
        
    }   
    
}
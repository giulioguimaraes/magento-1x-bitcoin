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
class Anarchy_Bitcoin_Helper_Wallet extends Mage_Core_Helper_Abstract{

    const PAYMENT_ANARCHY_BITCOIN_WALLET        = 'payment/anarchy_bitcoin/wallet';
    const PAYMENT_ANARCHY_BITCOIN_QRCODESIZE    = 'payment/anarchy_bitcoin/qrcodesize';
    const API_QR_CODE                           = "https://api.qrserver.com/v1/create-qr-code/";


    protected function generateUrlQrCodeApi(){
        
        $urlQrCode = self::API_QR_CODE;
        $urlQrCode .= "?";
        if(Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_QRCODESIZE) 
        && is_numeric(Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_QRCODESIZE))){
            
            $urlQrCode .= "size=";
            $urlQrCode .= Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_QRCODESIZE).
                          "x".
                          Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_QRCODESIZE);

            $urlQrCode .= "&data=";
            $urlQrCode .= Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_WALLET);

            return $urlQrCode;
        }

        else{
                $urlQrCode .= "data=";
                $urlQrCode .= Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_WALLET);

                return $urlQrCode;
            }
    }

    

    public function createQrCodeWallet(){
         return $this->generateUrlQrCodeApi();
        
    }

    public function getWallet(){
         return Mage::getStoreConfig(self::PAYMENT_ANARCHY_BITCOIN_WALLET);
    }

}
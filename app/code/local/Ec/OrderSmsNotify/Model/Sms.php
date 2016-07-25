<?php
/**
 * DisableCart Observer class
 *
 * @category   Ec
 * @package    Ec_OrderSmsNotify
 */
class Ec_OrderSmsNotify_Model_Sms extends Mage_Core_Model_Abstract
{
    /**
     * Login
     *
     * @var string|null
     */
    protected $_login;

    /**
     * Password
     *
     * @var string|null
     */
    protected $_password;

    /**
     * Sender
     *
     * @var string|null
     */
    protected $_sender;

    /**
     * Phones
     *
     * @var string|null
     */
    protected $_phones;

    /**
     * Message
     *
     * @var string|null
     */
    protected $_message;


    /**
     *  Constructor
     *
     *
     */
    protected function _construct()
    {
        parent::_construct();
        $this->initConfig();
    }

    /**
     * Init config values
     *
     * @return string
     */
    public function initConfig()
    {
        $configHelper = Mage::helper('ec_ordersmsnotify/config');
        $this->setLogin($configHelper->getLogin());
        $this->setPassword($configHelper->getPassword());
        $this->setSender($configHelper->getSender());
        $this->setPhones($configHelper->getPhones());

        return $this->_login;
    }


    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->_login = $login;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->_password = $password;

        return $this;
    }

    /**
     * Get Sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->_sender;
    }

    /**
     * Set Sender
     *
     * @param string $sender
     * @return $this
     */
    public function setSender($sender)
    {
        $this->_sender = $sender;

        return $this;
    }

    /**
     * Get phones
     *
     * @return string
     */
    public function getPhones()
    {
        return $this->_phones;
    }

    /**
     * Set phones
     *
     * @param string $phones
     * @return $this
     */
    public function setPhones($phones)
    {
        $this->_phones = $phones;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->_message = $message;

        return $this;
    }

    /**
     * Send sms
     *
     * @return $this
     */
    public function send()
    {
        try {
            $params['login'] = $this->getLogin();
            $params['psw'] = $this->getPassword();
            $params['sender'] = $this->getSender();
            $params['phones'] = $this->getPhones();
            $params['mes'] = $this->getMessage();
            $params['time'] = 0;
            $wsdlFilePath = Mage::getModuleDir('etc', 'Ec_OrderSmsNotify') . DS . '/smsc_wsdl.xml';
            $client = new SoapClient($wsdlFilePath);
            $res = $client->send_sms($params);
        } catch (Exception $e) {
            Mage::logException($e);
        }

        return $this;
    }
}

<?php
namespace Magento\Taskthird\Block;

class Pokemon extends \Magento\Framework\View\Element\Template
{
    //protected $_alumnoFactory;
    private static $_type;
    private static $_id;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Taskthird\Controller\Third\Api $api
    ) {
        //$this->_alumnoFactory = $alumnoFactory;
        //$data = $this->getRequest()->getPostValue();
        $this->callApi = $api;
        //$this->getInfo();
        parent::__construct($context);
    }
    public function setDataCollection($data)
    {
        /*$this->dataCol = $data;
        print_r($data);*/
        self::$_type = $data['type'];
        self::$_id = $data['id'];
    }

    public function getInfo()
    {
        $id = self::$_id;
        $type = self::$_type;
        $res = $this->callApi->callAPI($type,$id);
        $result = json_decode(json_encode($res),true);
        return $result;
    }
}
<?php
namespace Magento\Taskthird\Block;

class Types extends \Magento\Framework\View\Element\Template
{
    //protected $_alumnoFactory;
    private static $_type;
    private static $_id;
    private static $dataCol;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Taskthird\Controller\Third\Api $api
    ) {
        //$this->_alumnoFactory = $alumnoFactory;
        //$data = $this->getRequest()->getPostValue();
        $this->callApi = $api;
        parent::__construct($context);
    }

    public function setDataCollection($data)
    {
        /*$this->dataCol = $data;
        print_r($data);*/
        self::$_type = $data['type'];
        self::$_id = $data['id'];
        self::$dataCol = $data;
        
    }

    public function getInfo()
    {
        $id = self::$_id;
        $type = self::$_type;
        $res = $this->callApi->callAPI($type,$id);
        $result = json_decode(json_encode($res),true);
        return $result;
    }

    public function getExtId($cadena){
        $cad = substr($cadena, 33, 8);
        return str_replace('/','',$cad);
    }
}
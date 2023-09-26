<?php
namespace Magento\Taskthird\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    //protected $_alumnoFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
        \Magento\Taskthird\Controller\Third\Api $api
	)
	{
		//$this->_alumnoFactory = $alumnoFactory;
        $this->callApi = $api;
		parent::__construct($context);
	}

    public function getAllFirstGeneration(){
       $data = $this->callApi->callAPI('generation','1');
       $result = json_decode(json_encode($data),true);
       return $result;
    }
    public function getAllTypes(){
       $data = $this->callApi->callAPI('generation','1');
       $result = json_decode(json_encode($data),true);
       return $result['types'];
    }

    public function getExtId($cadena){
        $cad = substr($cadena, -3, 2);
        return str_replace('/','',$cad);
    }
}
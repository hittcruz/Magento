<?php 
declare(strict_types=1);
namespace Magento\Taskthird\Controller\Third;
 
class Api extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $jsonHelper;
 
    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        $this->logger = $logger;
        parent::__construct($context);
    }
 
    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            //$params = $this->getRequest()->getParams();
            //$fieldOneValue = $params['field_one_v'];
            //$fieldTwoValue = $params['field_two_v'];
 
            // start api calling
            //$service_url = 'https://example.com/getlist?oneParam='.$fieldOneValue.'&twoParam='.$fieldTwoValue;
            $variable = 'pokemon';
            $paramOneValue = '1';
            $service_url = 'https://pokeapi.co/api/v2/'.$variable.'/'.$paramOneValue;
            $handle = curl_init();
 
            curl_setopt($handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($handle, CURLOPT_USERPWD, "user:pass"); // put username and password if required
            curl_setopt($handle, CURLOPT_URL, $service_url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
 
            $apiResult = curl_exec($handle);
            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            curl_close($handle);
 
            $resultObjts = json_decode($apiResult);
             
            //$dynamicValue = $resultObjts['dynamic_value'];
            // end api calling
             
            //return $this->jsonResponse($dynamicValue);
            return $this->jsonResponse($resultObjts);
             
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->jsonResponse($e->getMessage());
        }
    }
 
    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }
}
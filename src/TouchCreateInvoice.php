<?php

namespace Yfancc20\Pay2goInvoice;

class TouchCreateInvoice extends Pay2GoInvoice
{
    /*
     * 觸發開立發票的 class
     */

    // 設定串接的網址
    protected function setUrl()
    {
        if (!$this->debugMode) { // product mode, 串正式網址
            $this->pay2goUrl = config('pay2goinv.Url_Touch_Create');
        } else { // debug mode, 串測試網址
            $this->pay2goUrl = config('pay2goinv.Url_Touch_Create_Test');
        }
    }

    // 設定預設值，讀取 config
    protected function setDefault()
    {
        $this->postData = [
            'RespondType' => config('pay2goinv.RespondType'),
            'Version' => config('pay2goinv.Version_Touch_Create'),
            'TimeStamp' => time(), // 需要為 time() 格式
            'TransNum' => '',
            'InvoiceTransNo' => '',
            'MerchantOrderNo' => '',
            'TotalAmt' => 0
        ];
    }

    // 設定參數（overwrite原本的 setData()）
    public function setData($data)
    {
        // 可接受 array / object
        $this->setDataByFields($data);

        return $this->postData;
    }
}

?>

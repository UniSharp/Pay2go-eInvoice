<?php

namespace Yfancc20\Pay2goInvoice;

class TouchAllowInvoice extends Pay2GoInvoice
{
    /*
     * 觸發折讓發票的 class
     */

    // 設定串接的網址
    protected function setUrl()
    {
        if (!$this->debugMode) { // product mode, 串正式網址
            $this->pay2goUrl = config('pay2goinv.Url_Touch_Allow');
        } else { // debug mode, 串測試網址
            $this->pay2goUrl = config('pay2goinv.Url_Touch_Allow_Test');
        }
    }

    // 設定預設值，讀取 config
    protected function setDefault()
    {
        $this->postData = [
            'RespondType' => config('pay2goinv.RespondType'),
            'Version' => config('pay2goinv.Version_Touch_Allow'),
            'TimeStamp' => time(), // 需要為 time() 格式
            'AllowanceStatus' => '',
            'AllowanceNo' => '',
            'MerchantOrderNo' => '',
            'TotalAmt' => 0
        ];
    }

    // 設定參數（從訂單）
    public function setData($data)
    {
        $this->setDataByFields($data);

        return $this->postData;
    }
}

?>

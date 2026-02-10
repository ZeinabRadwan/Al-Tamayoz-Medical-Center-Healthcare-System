<?php


namespace App\Services\Zatca;


use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\Storage;

class Zatca extends AbstractRequestZatca
{
    public function reporting_invoice($data)
    {
        $cert = Zatca::getCsrOrCert('cert', true);
        $auth = base64_encode($cert->binarySecurityToken . ':' . $cert->secret);
        $this->setEndPoint('invoices/reporting/single');
        $this->setHeaders([
            'Clearance-Status' => '0',
            'Accept-Language' => 'en',
            'Authorization' => 'Basic ' . $auth
        ]);
        $this->setData($data);
        return $this->buildRequest();
    }

    public function compliance_check($data)
    {
        $csr = Zatca::getCsrOrCert('csr', true);
        $auth = base64_encode($csr->binarySecurityToken . ':' . $csr->secret);
        $this->setEndPoint('compliance/invoices');
        $this->setHeaders([
            'Accept-Language' => 'en',
            'Authorization' => 'Basic ' . $auth
        ]);
        $this->setData($data);
        return $this->buildRequest();
    }

    public function request_for_csr($otp, $data)
    {
        $this->setEndPoint('compliance');
        $this->setHeaders([
            'OTP' => $otp,
        ]);
        $this->setData($data);
        return $this->buildRequest();
    }

    public function get_certificate()
    {
        $csr = Zatca::getCsrOrCert('csr', true);
        $auth = base64_encode($csr->binarySecurityToken . ':' . $csr->secret);
        $this->setEndPoint('production/csids');
        $this->setHeaders([
            'Authorization' => 'Basic ' . $auth
        ]);
        $this->setData(['compliance_request_id' => $csr->requestID]);
        return $this->buildRequest();
    }

    public static function getCsrOrCert($type, $allData = false)
    {
        if (Storage::disk('zatca')->exists($type . '.json')) {
            $data = json_decode(Storage::disk('zatca')->get($type . '.json'));
            if ($allData)
                return $data;
            return base64_decode($data->binarySecurityToken);
        }
        throw new \Exception('File not found');
    }

    public static function renderQrCode($data)
    {
        $options = new QROptions();
        return (new QRCode($options))->render($data);
    }
}

<?php


namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\ZacatForm;
use App\Services\Zatca\GenerateCsr;
use App\Services\Zatca\GenerateXmlFile;
use App\Services\Zatca\Zatca;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZatcaController
{
    private $zatca;

    public function __construct()
    {
        $this->zatca = new Zatca();
    }

    public function reportingInvoice()
    {
        $billing = Billing::find(136);

        $xml = (new GenerateXmlFile())->loadXmlFile($billing);

        $response = $this->zatca->reporting_invoice($xml);

        if ($response->successful()) {
            $dom = new \DOMDocument();
            $dom->loadXML(base64_decode($xml['invoice']));
            $qr = $dom->getElementsByTagName('EmbeddedDocumentBinaryObject')->item(1)->textContent;
            $hash = $xml['invoiceHash'];
            $billing->update(['qr' => $qr, 'hash' => $hash,'zatca_status' => 1 ,'zatca_errors' => null]);
        }

        return $response->json();
    }

    private function handleStaticBilling()
    {
        return unserialize(file_get_contents(public_path('billing.txt')));
    }

    public function getCsr(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
            'tax_number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'organization_name' => 'required',
            'unit_name' => 'required',
        ]);
    
        $csr = (new GenerateCsr())->csr($request);
        $data = ['csr' => $csr];
        $response = $this->zatca->request_for_csr($request->otp, $data);
        $status_code = $response->status();
        $body = $response->json();
    
        if ($status_code == 200) {
            ZacatForm::truncate();
            ZacatForm::create($request->all());
    
            $firstForm = ZacatForm::first();
    
            $data_encode = json_encode($body);
            Storage::disk('zatca')->put('csr.json', $data_encode);
    
            // Arabic message with full data
            $message = "تم إنشاء شهادة CSR بنجاح بالمعلومات التالية:
            اسم المنشأة: {$firstForm->organization_name}
            الرقم الضريبي: {$firstForm->tax_number}
            البريد الإلكتروني: {$firstForm->email}
            العنوان: {$firstForm->address}
            اسم الوحدة: {$firstForm->unit_name}
            السجل التجاري: {$firstForm->commercial_num}
            رقم المبنى: {$firstForm->build_num}
            الرقم الإضافي: {$firstForm->additional_num}
            رقم التقسيم: {$firstForm->subdivision}
            الرمز البريدي: {$firstForm->zip}
            اسم المدينة: {$firstForm->city_name}";
    
            return redirect()->route('zacat-form.create')->with([
                'success_title' => 'تم إنشاء شهادة CSR بنجاح!',
                'form_data' => $firstForm
            ]);
                    }
    
        return redirect()->route('zacat-form.create')->with('error', 'حدث خطأ أثناء إنشاء شهادة CSR.');
    }
    
    public function complianceInvoice()
    {
        $xml = new GenerateXmlFile('csr');
        $billing = $this->handleStaticBilling();
        $billing->type_code = \request('type_code');
        $billing->type_tax = \request('type_tax');
        $billing = $xml->loadXmlFile($billing);
        $res = $this->zatca->compliance_check($billing);
        if ($res->successful()) {
            return redirect()->route('zacat-form.create')->with('success', '✅ تم إرسال الفاتورة بنجاح إلى هيئة الزكاة والضريبة والجمارك وتمت الموافقة عليها.');
        }
        return redirect()->route('zacat-form.create')->with('error', 'the Compliance Invoice Not Reported');
    }

    public function getCertificate()
    {
        $res = $this->zatca->get_certificate();
        $data = $res->json();
        $status_code = $res->status();
        if ($status_code == 200) {
            $data_encode = json_encode($data);
            Storage::disk('zatca')->put('cert.json', $data_encode);
            return redirect()->route('zacat-form.create')->with('success', '✅ تم إنشاء الشهادة بنجاح!');
        }
        return redirect()->route('zacat-form.create')->with('error', 'worrying');
    }

}

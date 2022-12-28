<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderModel;
use Twilio\Rest\Client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('logout');
    // }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $sliders = SliderModel::where('status', '0')->get();
        return view('frontend.index', compact(['sliders']));
    }



    public function allExchangeRates()
    {
        $curl = curl_init();
        $base = 'PKR';
        $symbols = 'GBPEUR%2CUSD%2CCAD%2CNZD';
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/fixer/latest?symbols=$symbols&base=$base",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: MCGCevHWS9OMl9BIB4jQmjX3tONshSwi"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $conver = json_decode($response, true);

        return $conver['rates'];
        curl_close($curl);
    }
    public function currencyConvert()
    {
        $from = "PKR";
        $to = "USD";
        $amount = 100;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=USD&from=PKR&amount=100",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: MCGCevHWS9OMl9BIB4jQmjX3tONshSwi"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);
        $conver = json_decode($response, true);
        // return $conver;
        return  $conver['result'];
        curl_close($curl);
    }
    public function storeMedia(Request $request)
    {
        // dd('umer');
        // return "hello";
        // Validates file size
        // if (request()->has('size')) {
        //     $this->validate(request(), [
        //         'file' => 'max:' . request()->input('size') * 1024,
        //     ]);
        // }
        // // If width or height is preset - we are validating it as an image
        // if (request()->has('width') || request()->has('height')) {
        //     $this->validate(request(), [
        //         'file' => sprintf(
        //             'image|dimensions:max_width=%s,max_height=%s',
        //             request()->input('width', 100000),
        //             request()->input('height', 100000)
        //         ),
        //     ]);
        // }

        // $path = storage_path('tmp/uploads');
        $path = public_path('upload/dropzone/');

        try {
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        } catch (\Exception $e) {
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function storeDropzone(Request $request)
    {

        return $request;
    }
    public function sendsms(){
//         TWILIO_ACCOUNT_SID=AC731e487020238e5cf850d44b2cb49cfa
// TWILIO_AUTH_TOKEN=694d482dbc4733ea735220551565c523
// TWILIO_PHONE_NUMBER=+13649003104
        $phone = '+13649003104';

        $account_token = "694d482dbc4733ea735220551565c523";
        $sid = "AC731e487020238e5cf850d44b2cb49cfa";
        // $account_token = "5b44683edceba34a02c7f056d044c332";
        // $sid = "ACd04ed70af36a594d7906e91331165130";

        $twilio = new \Twilio\Rest\Client($sid, $account_token);

        try {
            $message = $twilio->messages
                              ->create("+923407642743", [
                                  'body' => 'My Message',
                                  'from' => 'umer'
                               ]);
                            dd($message->sid);

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withError($e->getMessage());
        }
    }
    public function sendtwiliosms(){
        $sid    = "AC48c103af377e72a9e6c6fd8b2bef7d1a";
        $token  = "baece9568e7a46578b2ff9e2c01eda22";
        $twilio = new Client($sid, $token, null, 'au1');

        $message = $twilio->messages
                        ->create("+923407642743", // to
                                array(
                                    "from" => "+16293331109",
                                    "body" => "my message"
                                )
                        );

        dd($message->sid);
    }
}

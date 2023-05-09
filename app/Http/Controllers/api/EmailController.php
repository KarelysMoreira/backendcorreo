<?php
namespace App\Http\Controllers\api;
use Mail;
use App\Mail\EmailContacto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
  public function index(Request $request){
    $data['email']= $request->email;
    $data['asunto']= $request->asunto;
    $data['mensaje']= $request->mensaje;
    $data['archivo']=$request->file('archivo');
    

    Mail::send('emails.correo', $data, function ($message) use ($data) {
      $message->to($data['email'], $data['email'])
      ->subject($data['asunto']) ;
    });
    return response()->json([
      'Success' => 'Excelente email enviado..',
      'code' => '200',
    ],200);
  }
}

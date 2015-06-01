<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateConsultasRequest;
use App\User;
use App\Files;

use Illuminate\Http\Request;
use Auth;

class ConsultasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$files = Files::name($request->get('name'))->orderBy('id', 'DESC')->paginate();
		return view('files.index', compact('files'));
	}

	/**
	 * Send email from view
	 */

	public function send(CreateConsultasRequest $request)
	{
		// guarda el valor de los campos enviados desde el form en un array
		$data = $request->all();

		// se envía el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
		\Mail::send('emails.message', $data, function($message) use ($request)
		{
			// remitente
			$message->from($request->email, $request->user);

			// asunto
			$message->subject($request->subject);

			// receptor
			$message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));
		});

		return view('ask.success');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Files;

class FilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		// dd(Files::name($request->get('name')));

		$files = Files::name($request->get('name'))->orderBy('id', 'DESC')->paginate();
		/*$files = Files::filterAndPaginate($request->get('name'), $request->get('type'));*/

		return view('files.index', compact('files'));
	}
	public function photos(Request $request)
	{
		$files = Files::mime($request->all())->paginate();

		return view('files.photos', compact('files'));
	}

	/**
	 * PDF viewer
	 * @return Response
	 */
	public function pdfViewer($id)
	{
		/*$file = Files::find($id);

		if (!\File::isFile($file))
		{
		    $response = \Response::make($file, 200);
		    // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
		    $response->header('Content-Type', 'application/pdf');

		    return $response;
		}*/

		$file = Files::find($id);

		$pdf = \App::make('dompdf');
		$pdf->loadHTML('<h1>Test</h1>');
		return $pdf->stream();
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
		// dd(Files::findOrFail($id));

		$file = Files::findOrFail($id);
		return view('files.view')->with('file', $file);
		// return view('admin.files.edit', compact('file'));
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

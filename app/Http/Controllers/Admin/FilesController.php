<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateFilesRequest;
use App\Http\Requests\EditFilesRequest;
use App\Files;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class FilesController extends Controller {

	public function __construct() {
		$this->middleware('auth');
		$this->beforeFilter('@findFiles', ['only' => ['show', 'edit', 'update', 'destroy']]);
	}

	public function findFiles(Route $route)
	{
		// dd($route->getParameter('files'));
		$this->file = Files::findOrFail($route->getParameter('files'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		/*$doc = config('options.mime.doc');
		dd(Files::name($request->get('name'))->where('mime', $doc));*/

		$files = Files::name($request->get('name'))->orderBy('id', 'DESC')->paginate();

		// $files = Files::filterAndPaginate($request->get('name'));

		return view('admin.files.index', compact('files'));
	}
	
	public function photos(Request $request)
	{
		// dd(Files::mime($request->get('mime')));

		$files = Files::mime($request->all())->paginate();
		// $files = Files::filterAndPaginate($request->get('name'), $request->get('mime'));

		return view('admin.files.photos', compact('files'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.files.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateFilesRequest $request)
	{
		//obtenemos el campo file definido en el formulario
		$file = $request->file('file');

		// dd($request->file('file'));

		//obtenemos las propiedades del archivo
		$nombre		= $file->getClientOriginalName();
		$mimeType 	= $file->getClientMimeType();
		$size 		= $file->getClientSize();
		$extension 	= $file->guessClientExtension();
		// Obtener path del archivo temporal
		$path 		= $file->getRealPath();

		$message 	= 'El archivo ' . $nombre . ' se ha subido con éxito.';

		//indicamos que queremos guardar un nuevo archivo en el disco local
		// dd(storage_path());

		\Storage::disk('local')->put($nombre, \File::get($file));

		// $file = Files::create($request->all());

		$myfile = new Files;

		// asignamos las propiedades para guardarlas en la base
		$myfile->name 				= $request->name;
		$myfile->mime 				= $mimeType;
		$myfile->original_filename	= $nombre;
		$myfile->filepath			= 'files';
		$myfile->extension			= $extension;
		$myfile->size 				= $size;
		$myfile->description 		= $request->description;

		$myfile->save();

		Session::flash('message', $message);

		return redirect()->route('admin.files.create');
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
		// dd(Files::findOrFail($id));

		$file = Files::findOrFail($id);
		return view('admin.files.edit')->with('file', $file);
		// return view('admin.files.edit', compact('file'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditFilesRequest $request, $id)
	{
		// dd($this->file);

		$this->file->fill($request->all());
		$this->file->save();

		$message = $this->file->name . ' fue actualizado con éxito.';
		Session::flash('message', $message);

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		// dd($this->file->original_filename);
		// abort(500);

		// delete file from filesystem
		$original_filename = $this->file->original_filename;

		if (\Storage::exists($original_filename))
		{
			\Storage::delete($original_filename);
		}

		// delete file from database
		$this->file->delete();
		
		$message = $this->file->name . ' fue eliminado de nuestros registros.';

		if ($request->ajax()) {
			return response()->json([
				'id' => $this->file->id,
				'message' => $message
			]);
		}


		Session::flash('message', $message);

		return redirect()->route('admin.files.index');
	}

}

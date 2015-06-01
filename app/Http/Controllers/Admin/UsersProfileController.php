<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUsersProfileRequest;

use App\User;
use App\UserProfile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$profile = UserProfile::all()->orderBy('id', 'DESC')->paginate();
		
		$user = User::all();

		return view('admin.usersprofile.profile')->with([
			'profile' 	=> $profile,
			'user'		=> $user
		]);

		// return view('admin.usersprofile.profile')->with('profile', $profile);
	}

	public function picture(Request $request, $id)
	{
		/*$profile = User::findOrFail($id);*/

		$file = $request->file('picture');

		//obtenemos las propiedades del archivo
		$nombre	= $file->getClientOriginalName();

		$public_path = '/assets/images/profile_pictures/';
		$full_path	 = public_path().$public_path;

		\Storage::disk('profilepicture')->put($nombre, \File::get($file));

		$url = $full_path.$nombre;
		$img = \Image::make($url)->fit(200);
		$img->filename = 'otronombre';
		// save file as png with medium quality (0-100 range)
		$img->save($url, 60);

		$data = ['url'=>$url];

		\DB::transaction(function () use ($id, $data, $nombre, $public_path) {
			$user = User::find($id);

		    $user->fill($data);
		    $user->save();
		    
		    $profile = UserProfile::firstOrNew(['user_id' => $user->id]);
		    $profile->picture_path = $public_path.$nombre;
		    $profile->fill($data);
		    $profile->save();
		});

		return \Redirect::back()->with('message','Tu imagen se ha actualizado!');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.usersprofile.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = UserProfile::findOrFail($id);
		$user 	 = User::findOrFail($id);

		return view('admin.usersprofile.edit')->with([
			'profile' 	=> $profile,
			'user'		=> $user
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUsersProfileRequest $request, $id)
	{
		$data = $request->all();

		\DB::transaction(function () use ($id, $data) {
			$user = User::find($id);
		    $user->fill($data);
		    $user->save();
		    
		    $profile = UserProfile::firstOrNew(['user_id' => $user->id]);
		    $profile->fill($data);
		    $profile->save();
		});

		return redirect()->back()->with('message','Tu perfil se ha actualizado!');
	}

}

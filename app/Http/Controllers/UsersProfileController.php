<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUsersProfileRequest;

use Auth;
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

		return view('usersprofile.profile')->with([
			'profile' 	=> $profile,
			'user'		=> $user
		]);

		// return view('admin.usersprofile.profile')->with('profile', $profile);
	}

	public function picture(Request $request, $id)
	{
		$file = $request->file('picture');

		// get the file properties
		$filename	= $file->getClientOriginalName();
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		// dd(base64_encode(\Auth::user()->id));

		$folder = '/assets/images/profile_pictures/';
		$full_path	 = public_path().$folder;

		$newFileName = base64_encode(Auth::user()->id . 'new');
		$newFullFileName = $newFileName.'.'.$ext;

		\Storage::disk('profilepicture')->put($newFullFileName, \File::get($file));
		
		$url = $full_path.$newFullFileName;
		$img = \Image::make($url)->fit(200);

		// save file as png with medium quality (0-100 range)
		$saveImg = $full_path.$newFileName.'.png';
		$img->save($saveImg, 60);

		// delete original file
		// \Storage::delete($url);


		$data = ['url'=>$url];

		\DB::transaction(function () use ($id, $data, $newFileName, $folder) {
			$user = User::find($id);

		    $user->fill($data);
		    $user->save();
		    
		    $profile = UserProfile::firstOrNew(['user_id' => $user->id]);
		    $profile->picture_path = $folder.$newFileName.'.png';
		    $profile->fill($data);
		    $profile->save();
		});

		return redirect()->back()->with('message','Tu imagen se ha actualizado!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$profile = UserProfile::findOrFail($id);
		$user 	 = User::findOrFail($id);

		return view('usersprofile.profile')->with([
			'profile' 	=> $profile,
			'user'		=> $user
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user 	 = User::findOrFail($id);
		$profile = UserProfile::findOrFail($id);

		if (Auth::user() == $user) {
			return view('usersprofile.edit')->with([
				'profile' 	=> $profile,
				'user'		=> $user
			]);
			
		} else {
			return redirect()->back()->with('message', 'No tienes acceso a esta página.');
		}

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

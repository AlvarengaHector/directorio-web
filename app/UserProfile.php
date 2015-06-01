<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profiles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['bio', 'facebook', 'google', 'youtube', 'twitter', 'linkedin', 'website', 'picture_path', 'birthdate', 'user_id'];
	

	public function getAgeAttribute()
	{
		return \Carbon\Carbon::parse($this->birthdate)->age;
	}

	public function user()
    {
    	return $this->belongsTo('App\User');
    }

}

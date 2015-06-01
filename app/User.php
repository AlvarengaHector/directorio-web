<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\UserProfile;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	// Queries

	public static function filterAndPaginate($name, $type)
	{
		return User::name($name)
			->type($type)
			->orderBy('id', 'ASC')
			->paginate();
	}
	/**
	 * Get child attributes
	 * link: http://laravel.io/forum/06-11-2014-how-to-access-additional-user-information-stored-in-another-table?page=1
	 */
	
	public function getAttribute($key)
    {
    	$profile = UserProfile::where('user_id', '=', $this->attributes['id'])->first()->toArray();

        foreach ($profile as $attr => $value) {
            if (!array_key_exists($attr, $this->attributes)) {
                $this->attributes[$attr] = $value;
            }
        }
        return parent::getAttribute($key);
    }

	public function profile()
	{
		return $this->hasOne('App\UserProfile');
	}

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	/* Encriptar password */
	public function setPasswordAttribute($value)
	{
		if(!empty($value))
		{
			$this->attributes['password'] = bcrypt($value);
		}
	}

	public function scopeName($query, $name)
	{
		if (trim($name) != "") {
			$query->where('full_name', "LIKE", "%$name%");
		}

		// Ahora cada vez que queras editar o agregar usuario tenemos que concatenar la columna full_name
	}

	public function scopeType($query, $type)
	{
		$types = config('options.types');

		if ($type != "" && isset($types[$type])) {
			$query->where('type', $type);
		}
	}

	public function is($type)
	{
		return $this->type === $type;
	}

	public function isAdmin()
	{
		return $this->type === 'admin';
	}

	

}

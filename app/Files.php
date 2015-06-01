<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'files';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['mime', 'original_filename', 'filepath', 'extension', 'size'];



	// Queries

	public static function filterAndPaginate($name, $mime)
	{
		// dd(Files::name($name)->mime($mime));

		return Files::name($name)
			->mime($mime)
			->orderBy('id', 'ASC')
			->paginate();
	}

	public function scopeName($query, $name)
	{
		if (trim($name) != "") {
			$query->where('original_filename', "LIKE", "%$name%");
		}
	}

	public function scopeMime($query)
	{
		$query->where("mime", "LIKE", "image/%");
	}

}

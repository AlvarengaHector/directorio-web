<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'consultas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'subject', 'message'];

}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * 
 * @property Collection|Compte[] $comptes
 * @property Collection|Famille[] $familles
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	public $timestamps = false;

	protected $fillable = [
		'login',
		'password'
	];

	public function comptes()
	{
		return $this->hasMany(Compte::class, 'idUtilisateur');
	}

	public function familles()
	{
		return $this->hasMany(Famille::class, 'idUtilisateur');
	}
}

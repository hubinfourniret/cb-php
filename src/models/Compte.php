<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compte
 * 
 * @property int $id
 * @property float|null $solde
 * @property string|null $nom
 * @property int $idUtilisateur
 * 
 * @property Utilisateur $utilisateur
 * @property Collection|Operation[] $operations
 *
 * @package App\Models
 */
class Compte extends Model
{
	protected $table = 'compte';
	public $timestamps = false;

	protected $casts = [
		'solde' => 'float',
		'idUtilisateur' => 'int'
	];

	protected $fillable = [
		'solde',
		'nom',
		'idUtilisateur'
	];

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idUtilisateur');
	}

	public function operations()
	{
		return $this->hasMany(Operation::class, 'idCompte');
	}
}

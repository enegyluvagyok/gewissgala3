<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fighter extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'name',
        'gender',
        'mothers_name',
        'agegroup',
        'active',
        'date_of_birth',
        'birth_place',
        'city',
        'country',
        'trainer',
        'club',
        'weight',
        'fighting_style',
        'losses',
        'wins',
        'draws',
        'phone',
        'email',
        'photo',
    ];

    protected $table = 'fighters';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function getFlag($id){
        $country = Fighter::find($id)->country;
        $hungarian_flag = [
            'Magyarország' => 'hu',
            'Románia' => 'ro',
            'Szlovákia' => 'sk',
            'Szerbia' => 'rs',
            'Horvátország' => 'hr',
            'Szlovénia' => 'si',
            'Ausztria' => 'at',
            'Ukrajna' => 'ua',
            'Lengyelország' => 'pl',
            'Csehország' => 'cz',
            'Németország' => 'de',
            'Olaszország' => 'it',
            'Franciaország' => 'fr',
            'Spanyolország' => 'es',
            'Portugália' => 'pt',
            'Egyesült Királyság' => 'gb',
            'Írország' => 'ie',
            'Hollandia' => 'nl',
            'Belgium' => 'be',
            'Luxemburg' => 'lu',
            'Dánia' => 'dk',
            'Svédország' => 'se',
            'Norvégia' => 'no',
            'Finnország' => 'fi',
            'Észtország' => 'ee',
            'Lettország' => 'lv',
            'Litvánia' => 'lt',
            'Fehéroroszország' => 'by',
            'Oroszország' => 'ru',
            'Moldova' => 'md',
            'Bulgária' => 'bg',
            'Görögország' => 'gr',
            'Törökország' => 'tr',
            'Ciprus' => 'cy',
            'Málta' => 'mt',
            'Izland' => 'is',
            'Grönland' => 'gl',
            'Feröer-szigetek' => 'fo',
            'Monaco' => 'mc',
            'Liechtenstein' => 'li',
            'San Marino' => 'sm',
            'Vatikánváros' => 'va',
            'Andorra' => 'ad',
            'Gibraltár' => 'gi',
            'Albánia' => 'al',
            'Montenegró' => 'me',
            'Koszovó' => 'xk',
            'Észak-Macedónia' => 'mk',
            'Bosznia-Hercegovina' => 'ba',
            'Egyesült Államok' => 'us',
            'Kanada' => 'ca',
            'Mexikó' => 'mx',
            'Guatemala' => 'gt',
            'Belize' => 'bz',
            'Honduras' => 'hn',
            'Salvador' => 'sv',
            'Nicaragua' => 'ni',
            'Costa Rica' => 'cr',
            'Panama' => 'pa',
            'Kuba' => 'cu',
            'Egyesült Államok' => 'us',
            'Egyesült Királyság' => 'gb',
        ];
        return $hungarian_flag[$country].'.png';
    }
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function Fight(){
        return $this->belongsTo(Fight::class, 'fighter1_id', 'fighter2_id');
    }
}

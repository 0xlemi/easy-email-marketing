<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $fillable = [
		'name',
		'subject',
		'is_html',
		'path_thumbnail',
		'path_to_email',
	];

	public function save_content($content){
		try{
            $file_path = 'storage/emails/files/file_'.$this->id.'.html';
            $write_result = file_put_contents(public_path($file_path), $content);

            $img_path = 'storage/emails/images/image_'.$this->id.'.jpg';
            // Had to change ImageWrapper.php line 117 to anable the overwrite parameter
            $tn_result = \ImageHTML::loadHTML($content)->save(public_path($img_path), true);

            $this->path_to_email = $file_path;
            $this->path_thumbnail = $img_path;

            return ($this->save() && $tn_result && $write_result);
        }catch (Exception $e){
            $this->delete();
            flash()->error('Error', 'There was a fatal error');
            return false;
        }
	}
    
    public function transactions(){
		return $this->hasMany('App\Transaction');
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pdfProjects extends Model
{
    protected $fillable = [
        'generate_pdf_id','name','number','hours','description','updates','described_problems','described_solution','described_languages','technical_newness','created_at','updated_at'
    ];

    public function pdfProjectActivities(){
        return $this->hasMany('App\pdfProjectActivities', 'pdf_project_id');
    }
}

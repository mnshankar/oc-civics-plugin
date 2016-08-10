<?php namespace serenitynow\civics\models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['id', 'question', 'answer', 'extra'];
    protected $name='serenitynow_civics_questions';
}

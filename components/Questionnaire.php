<?php namespace Serenitynow\Civics\Components;

use Cms\Classes\ComponentBase;
use serenitynow\civics\models\Question;
use serenitynow\civics\services\QuestionService;

class Questionnaire extends ComponentBase
{
    private $questionService;
    private $randomizedQuestions;
    private $qid;
    //expose row in the component instance
    public $row;

    public function componentDetails()
    {
        return [
            'name'        => 'US Citizenship Questionnaire',
            'description' => 'Flashcards for US Citizenship Civics Test'
        ];
    }

    public function defineProperties()
    {
        return [
            'randomize' => [
                'title'       => 'Randomize Question Order',
                'description' => 'Do you want to randomize the order of questions?',
                'default'     => true,
                'type'        => 'checkbox',
            ]
        ];
    }

    public function init()
    {
        $this->questionService = new QuestionService();
        if (!(\Session::has('serenitynow.civics.qArray'))) {
            \Session::put('serenitynow.civics.qArray', $this->questionService->all($this->property('randomize')));
        }
        $this->randomizedQuestions = \Session::get('serenitynow.civics.qArray');
    }

    /**
     * Invoked via ajax on shuffle button click
     */
    public function onShuffle()
    {
        \Session::put('serenitynow.civics.qArray', $this->questionService->all($this->property('randomize')));
        $this->randomizedQuestions = \Session::get('serenitynow.civics.qArray');
        $this->qid = $this->randomizedQuestions[0];
        $this->row = Question::findOrFail($this->qid);
    }

    /**
     * invoked via ajax on next/prev button click
     */
    public function onChangeQuestion()
    {
        if (post('btnName') == 'next') {   //next button pressed
            $this->qid = $this->questionService->getNext($this->randomizedQuestions, post('qid'));
        } else    //previous
        {
            $this->qid = $this->questionService->getPrevious($this->randomizedQuestions, post('qid'));
        }
        $this->row = Question::findOrFail($this->qid);
    }

    public function onRun()
    {
        if ($this->qid === null) {
            $this->qid = $this->randomizedQuestions[0];
        }
        $this->row = Question::findOrFail($this->qid);
    }
}

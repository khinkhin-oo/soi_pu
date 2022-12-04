<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPointsTransactionModel extends Model
{
    protected $table = 'user_points_transaction';
    protected $fillable =  [
                                'user_id',
                                'client_question_id',
                                'answer_id',
                                'points'
                            ];

	public function get_question()
    {
       return $this->belongsTo('App\Models\ClientQuestionModel', 'client_question_id', '_id');
    }

    public function get_user()
    {
       return $this->belongsTo('App\Models\UsersModel', 'user_id', '_id');
    }

    public function get_answer()
    {
       return $this->belongsTo('App\Models\ClientQuestionAnswersModel', 'answer_id', '_id');
    }

}
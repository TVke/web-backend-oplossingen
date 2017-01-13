<?php

return [

	'article'=>[
		'add'=>'article &quot;:title&quot; was created succesfully',
		'edit'=>'article &quot;:title&quot; was edited succesfully',
		'confirm'=>'Are you sure you want to delete this article?',
		'delete'=>'article &quot;:title&quot; was deleted succesfully',
		'error'=>[
			'emoticons'=>'You can\'t use emoticons inside an article title',
			'edit'=>'You can\'t edit an article that is not yours or is deleted',
			'delete'=>'You can\'t delete an article that is not yours or is deleted'
		]
	],
	'comment'=>[
		'amount'=>'{0}comments|comment|[2,Inf]comments',
		'add'=>'the comment was created succesfully',
		'edit'=>'the comment was edited succesfully',
		'confirm'=>'Are you sure you want to delete this comment?',
		'delete'=>'your comment was deleted succesfully',
		'error'=>[
			'emoticons'=>'You can\'t use emoticons inside a comment',
			'edit'=>'You can\'t edit a comment that is not yours or is deleted',
			'delete'=>'You can\'t delete a comment that is not yours or is deleted'
		]
	],
	'vote'=>[
		'up'=>'you have upvoted &quot;:title&quot;',
		'down'=>'you have downvoted &quot;:title&quot;',
		'error'=>[
			'login'=>'You need to be logged in to vote',
			'access'=>'You can\'t vote on an article that is yours',
			'up'=>'You can only upvote once',
			'down'=>'You can only downvote once'
		]
	]
];
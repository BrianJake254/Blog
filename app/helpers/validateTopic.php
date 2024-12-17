<?php

function validateTopic($topic)
{

    $errors = array();
    
    if(empty($topic['title'])){
        array_push($errors,'Title is required');
    }

    $existingTopic = selectOne('topics', ['title' => $post['title']]);
    if ($existingTopic){
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']){
            array_push($errors,'Title already exists');
        }

        if (isset($post['save-topic']) ) {
            array_push($errors,'Title already exists');
        }
    }

    return $errors;
}


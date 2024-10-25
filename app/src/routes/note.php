<?php

$router->post('/addNote', 'NoteController@create');
$router->post('/deleteNote', 'NoteController@delete');
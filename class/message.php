<?php

function danger_message($exp,$msg){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
    echo '<strong>'.$exp.'! </strong> '.$msg.'';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '</div>';
}

function success_message($exp,$msg){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo '<strong>'.$exp.'! </strong> '.$msg.'';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '</div>';
}

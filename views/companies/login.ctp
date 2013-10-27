<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('Companies');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->submit('Login', array('class'=>'btn btn-lg btn-primary'));
    echo $this->Form->end();
?>
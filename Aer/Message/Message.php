<?php

namespace Aer\Message;


interface Message
{
    public function create();
    public function retrieve();
    public function send();
}
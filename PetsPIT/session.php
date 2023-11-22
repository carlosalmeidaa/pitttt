<?php

function iniciaSessao()
{
  if (!isset($_SESSION)) {
    session_start();
  }
}

?>
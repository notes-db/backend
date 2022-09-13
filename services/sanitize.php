<?php

  function san ($string) {
    return htmlentities(strip_tags($string));
  }
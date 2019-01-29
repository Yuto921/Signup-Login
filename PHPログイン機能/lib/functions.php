<?php

//データを表示する際のエスケープするための関数
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
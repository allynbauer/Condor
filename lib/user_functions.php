<?php
// all the functions in this file will eventually be removed. do not rely on them

function o($str) { echo "$str"; }
function t($str) { return htmlspecialchars($str); }
function h($str) { o(t($str)); }

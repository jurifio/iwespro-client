<?php
$page = $data->entity;

echo isset($page->text) ? $page->text : '<p>nothing to see here yet</p>';
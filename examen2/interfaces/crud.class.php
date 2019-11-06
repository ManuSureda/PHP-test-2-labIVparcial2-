<?php namespace interfaces;

/**
 *
 */
interface Crud
{
     function create($value);
     function read($value);
     function readAll();
     function update($value);
     function delete($value);
}
?>
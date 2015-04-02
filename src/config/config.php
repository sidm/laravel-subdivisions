<?php

return array(


 /*
  |--------------------------------------------------------------------------
  | Database settings
  |--------------------------------------------------------------------------
  |
  | The name of the table to create in the database
  |
  */
  'table_name' => 'subdivisions',

  /*
  |--------------------------------------------------------------------------
  | Country table settings
  |--------------------------------------------------------------------------
  |
  | If you have a table for countries, set the table name and the name of 
  | the row that contains the iso_3166_2 value for a given country, if you
  | just want subdivisions change these values to null (i.e, '')
  |
  | NOTE: If you're using Webpatser/laravel-countries the defaults should
  | 	  work fine
  |
  */
  'country_table_name' => 'countries',
  'iso_3166_2_row_name' => 'iso_3166_2',


);

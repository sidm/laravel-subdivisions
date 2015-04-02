<?php

namespace sidm\Subdivisions;

/**
 * CountryList
 *
 */
class Subdivisions extends \Eloquent {

	/**
	 * @var string
	 * Path to the directory containing subdivisions data.
	 */
	protected $subdivisions;

	/**
	 * @var string
	 * The table for the subdivisions in the database, is "subdivisions" by default.
	 */
	protected $table;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
       $this->table = \Config::get('laravel-subdivisions::table_name');
    }

    /**
     * Get the subdivisions from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getSubdivisions()
    {
        //Get the subdivisions from the JSON file
        if (sizeof($this->subdivisions) == 0){
            $this->subdivisions = json_decode(file_get_contents(__DIR__ . '/Models/subdivisions.json'), true);
        }

        //Return the subdivisions
        return $this->subdivisions;
    }

	/**
	 * Returns one country
	 * 
	 * @param string $id The country id
     *
	 * @return array
	 */
	public function getOne($id)
	{
        $subdivisions = $this->getSubdivisions();
		return $subdivisions[$id];
	}

	/**
	 * Returns a list of all subdivisions
	 * 
	 * @param string sort
	 * 
	 * @return array
	 */
	public function getList($sort = null)
	{
	    //Get the subdivisions list
	    $subdivisions = $this->getSubdivisions();
	    
	    //Sorting
	    $validSorts = array(
	        'country',
	        'country_name',
	        'iso_3166_2',
	        'region',
	        'region_alt'
        );
	    
	    if (!is_null($sort) && in_array($sort, $validSorts)){
	        uasort($subdivisions, function($a, $b) use ($sort) {
	            if (!isset($a[$sort]) && !isset($b[$sort])){
	                return 0;
	            } elseif (!isset($a[$sort])){
	                return -1;
	            } elseif (!isset($b[$sort])){
	                return 1;
	            } else {
	                return strcasecmp($a[$sort], $b[$sort]);
	            } 
	        });
	    }
	    
	    //Return the subdivisions
		return $subdivisions;
	}
}

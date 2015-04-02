use Illuminate\Database\Eloquent\Model as Eloquent;

class SubdivisionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country_id = array();
        //Empty the subdivisions table
        DB::table(\Config::get('laravel-subdivisions::table_name'))->delete();

        //Get all of the subdivisions
        $subdivisions = Subdivisions::getList();
        foreach ($subdivisions as $subdivisionId => $country){
            
            // Get the country ID for this subdivision
            if(\Config::get('laravel-subdivisions::country_table_name') && \Config::get('laravel-subdivisions::iso_3166_2_row_name'))
            {
                $country_id = DB::select('select id from '.\Config::get('laravel-subdivisions::country_table_name').' where '.\Config::get('laravel-subdivisions::iso_3166_2_row_name').' = \''.$country['country'].'\' LIMIT 1');
            }

            DB::table(\Config::get('laravel-subdivisions::table_name'))->insert(array(
                'id' => $subdivisionId,
                'country' => ((isset($country['country'])) ? $country['country'] : null),
                'country_name' => ((isset($country['country_name'])) ? $country['country_name'] : null),
                'country_id' => ((isset($country_id[0])) ? $country_id[0]->id : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'region' => ((isset($country['region'])) ? $country['region'] : null),
                'region_alt' => ((isset($country['region_alt'])) ? $country['region_alt'] : null)
            ));
        }
    }
}

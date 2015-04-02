use Illuminate\Database\Eloquent\Model as Eloquent;

class SubdivisionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the subdivisions table
        DB::table(\Config::get('laravel-subdivisions::table_name'))->delete();

        //Get all of the subdivisions
        $subdivisions = Subdivisions::getList();
        foreach ($subdivisions as $subdivisionId => $country){
            DB::table(\Config::get('laravel-subdivisions::table_name'))->insert(array(
                'id' => $subdivisionId,
                'country' => ((isset($country['country'])) ? $country['country'] : null),
                'country_name' => ((isset($country['country_name'])) ? $country['country_name'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'region' => ((isset($country['region'])) ? $country['region'] : null),
                'region_alt' => ((isset($country['region_alt'])) ? $country['region_alt'] : null)
            ));
        }
    }
}

use Illuminate\Database\Migrations\Migration;

class SetupSubdivisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Country	CountryName 	ISO2 	Region	 			RegionAlt
		// KG		Kyrgyzstan		KG-B	Баткенская область	Batken Province

		// Creates the users table
		Schema::create(\Config::get('laravel-subdivisions::table_name'), function($table)
		{
		    $table->integer('id')->index();

			$table->string('country', 2)->default('');
			$table->string('country_name', 255)->default('');
			$table->integer('country_id')->default('');
			$table->string('iso_3166_2', 6)->default('');
			$table->string('region', 255)->default('');
			$table->string('region_alt', 255)->nullable('');
		    
		    $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(\Config::get('laravel-subdivisions::table_name'));
	}

}

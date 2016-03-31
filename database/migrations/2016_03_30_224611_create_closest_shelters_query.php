<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosestSheltersQuery extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
$sqlExtensions = <<<SQL

 CREATE EXTENSION IF NOT EXISTS cube;
 CREATE EXTENSION IF NOT EXISTS earthdistance;

SQL;
    
        DB::unprepared($sqlExtensions);

$sql = <<<SQL

CREATE OR REPLACE FUNCTION sc_return_closest_shelters(
    IN _user_latitude numeric,
    IN _user_longitude numeric,
    IN _num_results integer)
  RETURNS TABLE(
    shelter_id integer,
    name character varying,
    address_2 character varying,
    address_1 character varying,
    city character varying,
    state character varying,
    zip_code character varying,
    phone_1 character varying,
    beds_available integer,
    latitude numeric,
    longitude numeric,
    distance numeric,
    updated_at timestamp(0) without time zone)
AS
\$BODY$

-- created to: return nearby shelters given a location
-- exec : 
-- select * from  sc_return_closest_shelters ( 34.123, -40.1233, 10 ) 

DECLARE
    ref refcursor;
BEGIN

  RETURN QUERY

select shelters.*
  from (
    select
        sh.id as shelter_id,
        sh.name,
        sh.address_2,
        sh.address_1,
        sh.city,
        sh.state,
        sh.zip_code,
        sh.phone_1,
        sh.beds_available,
        sh.latitude,
        sh.longitude,
        cast(earth_distance(
            ll_to_earth(_user_latitude , _user_longitude),
            ll_to_earth(sh.latitude, sh.longitude)) * .0006213712 as numeric(10,2)
        ) as "distance",    
        sh.updated_at
        from shelter as sh
        where sh.beds_available > 0                           
  ) as shelters
  order by shelters.distance asc
  limit _num_results;

END;
\$BODY$ LANGUAGE plpgsql VOLATILE COST 100 ROWS 1000;

SQL;


        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

$dropSQL = <<<SQL


DROP FUNCTION IF EXISTS sc_return_closest_shelters( numeric, numeric, integer); 

DROP EXTENSION IF EXISTS earthdistance;
DROP EXTENSION IF EXISTS cube;


SQL;

        DB::unprepared($dropSQL);
    }
}

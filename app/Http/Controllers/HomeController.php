<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sql_get_db = sprintf( "SHOW DATABASES;" );

        $temp = DB::select( DB::raw( $sql_get_db ) );

        $tables = array();

        if( !empty( $temp ) ){
            foreach ($temp as $key => $value) {
                $sql_get_db = sprintf( "SHOW TABLES FROM %s;", $temp[$key]->Database );

                $tables[ $temp[$key]->Database ]["name"] = $temp[$key]->Database;

                $tables_database = DB::select( DB::raw( $sql_get_db ) );

                $tables[ $temp[$key]->Database ]["tables"] = $tables_database;

                if( !empty( $tables_database ) ){

                    foreach ($tables_database as $key_dos => $value_dos) {
                        $attr_data = (Array)$tables_database[$key_dos];
                        
                        if ( !empty( array_values($attr_data) ) ) {
                            
                            $sql_get_db = sprintf( "DESCRIBE %s.%s;", $temp[$key]->Database, array_values($attr_data)[0] );
        
                            //dd( $sql_get_db )
        
                            $temp_describe = DB::select( DB::raw( $sql_get_db ) );
        
                            $tables[ $temp[$key]->Database ]["tables"][ array_values($attr_data)[0] ]["columnas"] = $temp_describe;
                            
                        }
    
                    }
                }else{

                }


            }
        }

        dd( $temp, $tables );

    }


    public function showDatabase()
    {
        $sql_get_db = sprintf( "SHOW DATABASES;" );

        $temp = DB::select( DB::raw( $sql_get_db ) );

        $a_databases = array( 'databases' => $temp );

        return view('main.showdatabase', $a_databases);
    }

    public function showTable( Request $request )
    {
        
        $sql_get_db = sprintf( "SHOW TABLES FROM %s;", $request->database );

        $tables = DB::select( DB::raw( $sql_get_db ) );

        $temp_tables = array();

        foreach ($tables as $key => $value) {
            $temp = (Array)$tables[$key];
            $temp = array_values( $temp );
            $temp_tables[] = $temp[0];
        }

        $a_databases = array( 
            'tables'   => $temp_tables,
            'database' => $request->database
        );

        return view('main.showtable', $a_databases);
    }

    public function showColumns( Request $request )
    {

        $sql_get_db = sprintf( "DESCRIBE %s.%s;", $request->database, $request->table );

        $columns = DB::select( DB::raw( $sql_get_db ) );

        //dd( $columns );

        $attr_txt_select = '';
        $attr_txt_insert = '';
        $attr_txt_in_cpm = '';
        $id_key_txt      = '';
        $attr_txt_update = '';
        $attr_txt_delete = '';

        $code_inputs = array();

        $tmp_bandera = false;

        if ( !empty( $columns ) ) {
            foreach ($columns as $key => $value) {

                if ( !$tmp_bandera ) {
                    $id_key_txt = $columns[$key]->Field;

                    $tmp_bandera = true;
                }else{
                    $attr_txt_update .= $columns[$key]->Field . ' = "%s", ';
                }

                $attr_txt_select .= $columns[$key]->Field . ', ';
                $attr_txt_insert .= $columns[$key]->Field . ', ';
                $attr_txt_in_cpm .= '%s, ';

                $code_inputs[] = $this->getHtmlInputCode( $columns[$key] );

            }

            //dd( $code_inputs );

            $attr_txt_select = substr( $attr_txt_select, 0, -2 );
            $attr_txt_insert = substr( $attr_txt_insert, 0, -2 );
            $attr_txt_update = substr( $attr_txt_update, 0, -2 );
            $attr_txt_in_cpm = substr( $attr_txt_in_cpm, 0, -2 );

            $id_txt = sprintf( ' %s = 1 ', $id_key_txt );

            $attr_txt_select = sprintf( 'SELECT %s FROM %s WHERE %s;', 
                                        $attr_txt_select, $request->table, $id_txt );

            $attr_txt_insert = sprintf( 'INSERT INTO  %s ( %s )
                                            VALUES (%s);', 
                                        $request->table, $attr_txt_insert, $attr_txt_in_cpm );
                                        
            $attr_txt_update = sprintf( 'UPDATE %s SET %s WHERE %s;',
                                        $request->table, $attr_txt_update, $id_txt );

            $attr_txt_delete = sprintf( 'DELETE FROM %s WHERE %s;',
                                        $request->table, $id_txt );
            
        }

        $data = array(
            "attr_txt_select" => $attr_txt_select,
            "id_key_txt"      => $id_key_txt,
            "attr_txt_update" => $attr_txt_update,
            "code_inputs"     => $code_inputs,
            "database"        => $request->database,
            "attr_txt_delete" => $attr_txt_delete,
            "attr_txt_insert" => $attr_txt_insert
        );

        return view('main.showcolumns', $data);
    }


    public function getHtmlInputCode( $attr )
    {
        $html = '';

        //dd( $attr->Field );

        $low_field = $attr->Field;
        $low_field = mb_strtolower( $low_field );

        
        $html = sprintf( '
                        <div class="form-group">
                            <label for="%1$s">%2$s</label>
                            <input type="text" id="%1$s" name="%1$s" class="form-control" value="%2$s" />
                        </div>', 
                            $low_field, $attr->Field );
        
        //$html = str_replace( "<", "&lt;", $html );
        //$html = str_replace( ">", "&gt;", $html );

        return $html;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

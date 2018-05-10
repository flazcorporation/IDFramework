<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_classlib extends id
{

    public $class_reg          = array(
                                "id"            => array(
                                                    "coba",
                                                    "classlib",
                                                    "secure",
                                                    "trans",
                                                    "error",
                                                    "config",
                                                    "crypt",
                                                    "core",
                                                    "uri",
                                                    "cont",
                                                    "mode",
                                                    "view",
                                                    "html",
                                                    "pdo",
                                                    "str",
                                                    "theme",
                                                    "validate",
                                                    "form",
                                                    "input",
                                                    "arr",
                                                    "run"
                                                ),
                                "id_classlib"   => array(
                                                    "__construct"
                                                ),
                                "id_secure"      => array(
                                                    "__construct",
                                                    "class_method",
                                                    "class_unreg",
                                                    "unregister"
                                                ),
                                "id_trans"      => array(
                                                    "__construct",
                                                    "to",
                                                    "from",
                                                    "from_to",
                                                    "lang"
                                                ),
                                "id_error"      => array(
                                                    "__construct",
                                                    "lib",
                                                    "code",
                                                    "message",
                                                    "solution",
                                                    "show"
                                                ),
                                "id_config"     => array(
                                                    "__construct"
                                                ),
                                "id_crypt"      => array(
                                                    "__construct",
                                                    "en",
                                                    "en_arr_key",
                                                    "en_arr_val",
                                                    "en_arr_key_val",
                                                    "de",
                                                    "de_arr_key",
                                                    "de_arr_val",
                                                    "de_arr_key_val"
                                                ),
                                "id_core"       => array(
                                                    "__construct",
                                                    "dir_list",
                                                    "check_class",
                                                    "check_method",
                                                    "execute"
                                                ),
                                "id_uri"        => array(
                                                    "__construct",
                                                    "controller",
                                                    "method",
                                                    "segment",
                                                    "all",
                                                    "last",
                                                    "except",
                                                    "link",
                                                    "file"                                    
                                                ),
                                "id_controller" => array(
                                                    "__construct",                                    
                                                ),
                                "id_model"      => array(
                                                    "__construct",                                    
                                                ),
                                "id_view"       => array(
                                                    "__construct",
                                                    "index",
                                                    "front",
                                                    "back"                                  
                                                ),
                                "database"      => array(
                                                    "__toString",
                                                    "__construct",
                                                    "db",
                                                    "query",
                                                    "bind",
                                                    "execute",
                                                    "closecursor",
                                                    "resultset",
                                                    "resultrow",
                                                    "single",
                                                    "column",
                                                    "count",
                                                    "lastid",
                                                    "begin",
                                                    "end",
                                                    "cancel",
                                                    "debug"
                                                ),
                                "id_pdo"        => array(
                                                    "__construct",
                                                    "array_key",
                                                    "array_prepare",
                                                    "data_update",
                                                    "array_field",
                                                    "connect",
                                                    "close",
                                                    "create",
                                                    "create_transaction",
                                                    "update",
                                                    "update_transaction",
                                                    "delete",
                                                    "delete_transaction",
                                                    "select_query",
                                                    "select_query_transaction",
                                                    "select_query_row",
                                                    "select_query_row_transaction",
                                                    "select_query_result",
                                                    "select_query_result_transaction",
                                                    "select_query_field_string_where",
                                                    "select_query_field_string_where_transaction",
                                                    "select_all",
                                                    "select_all_transaction",
                                                    "select_query_result_json",
                                                    "select_query_result_json_transaction",
                                                    "select_all_where_array_result",
                                                    "select_all_where_array_result_transaction",
                                                    "select_all_where_result",
                                                    "select_all_where_result_transaction",
                                                    "select_field_where_result",
                                                    "select_field_where_result_transaction",
                                                    "select_fields_where",
                                                    "select_fields_where_transaction",
                                                    "select_field_table",
                                                    "select_field_table_transaction",
                                                    "select_field_where_string",
                                                    "select_field_where_string_transaction",
                                                    "select_all_where",
                                                    "select_all_where_transaction",
                                                    "query",
                                                    "query_result",
                                                    "query_result_prepare",
                                                    "query_array",
                                                    "query_array_prepare",
                                                    "query_transaction",
                                                    "install_table",
                                                    "install_table_transaction"
                                                ),
                                "id_str"        => array(
                                                    "__construct",
                                                    "before",
                                                    "after",
                                                    "between"                                    
                                                ),
                                "id_theme"      => array(
                                                    "__construct",
                                                    "index",
                                                    "front_index",
                                                    "front_header",
                                                    "front_footer",
                                                    "back_index",
                                                    "back_header",
                                                    "back_navbar",
                                                    "back_footer"                                    
                                                ),
                                "id_validate"   => array(
                                                    "__construct",
                                                    "int",
                                                    "float",
                                                    "string",
                                                    "email",
                                                    "url",
                                                    "date",
                                                    "bool",
                                                    "ip",
                                                    "mac",
                                                    "arr_int",
                                                    "arr_float",
                                                    "arr_string",
                                                    "arr_email",
                                                    "arr_url",
                                                    "arr_date",
                                                    "arr_bool",
                                                    "arr_mac"                                    
                                                ),
                                "id_form"       => array(
                                                    "__construct",
                                                    "open",
                                                    "number",
                                                    "text",
                                                    "email",
                                                    "url",
                                                    "ip",
                                                    "checkbox",
                                                    "radio",
                                                    "date",
                                                    "mac",
                                                    "textarea",
                                                    "password",
                                                    "reset",
                                                    "button",
                                                    "color",
                                                    "range",
                                                    "datetime",
                                                    "month",
                                                    "search",
                                                    "tel",
                                                    "time",
                                                    "week",
                                                    "submit",
                                                    "close"
                                                ),
                                "id_input"      => array(
                                                    "__construct",
                                                    "init",
                                                    "int",
                                                    "float",
                                                    "text",
                                                    "email",
                                                    "url",
                                                    "date",
                                                    "checkbox",
                                                    "ip",
                                                    "mac",
                                                    "arr_int",
                                                    "arr_float",
                                                    "arr_text",
                                                    "arr_email",
                                                    "arr_url",
                                                    "arr_checkbox",
                                                    "arr_ip",
                                                    "arr_mac",
                                                    "result"                                    
                                                ),
                                "id_html"       => array(
                                                    "__construct",
                                                    "h1",
                                                    "h2",
                                                    "h3",
                                                    "h4",
                                                    "h5",
                                                    "h6",
                                                    "b",
                                                    "i",
                                                    "u",
                                                    "img"                                    
                                                ),
                                "idc_admin"     => array(
                                                    "__construct",
                                                    "index",
                                                    "model",
                                                    "tampilkan",
                                                    "encrypt",
                                                    "simpan"
                                                ),
                                "idm_admin"     => array(
                                                    "__construct",
                                                    "test",
                                                    "getdata",
                                                    "getall"
                                                ),
                                "idc_blog"     => array(
                                                    "__construct",
                                                    "index",
                                                    "model",
                                                    "tampilkan"
                                                ),
                                "idm_blog"     => array(
                                                    "__construct",
                                                    "test",
                                                    "getdata",
                                                    "getall"
                                                )
                                );
                                
    public function __construct()
    {

    }
}

?>
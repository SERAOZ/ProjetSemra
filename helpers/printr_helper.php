<?php
function printr ( $object , $name = '' ){
    print ( '\'' . $name . '\' : ' ) ;

    if ( is_array ( $object ) ) {
        print ( '<pre>' )  ;
        print_r ( $object ) ; 
        print ( '</pre>' ) ;
    } else {
        var_dump ( $object ) ;
    }
}
?>
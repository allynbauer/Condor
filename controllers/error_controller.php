<?php

class ErrorController {
    function _501($params) {
        echo 'See! The action gets called!';
        sys()->data->error = $params['error'];
        sys()->data->code = $params['code'];
    }
}

?>
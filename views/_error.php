<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Condor - <?php o(sys()->code) ?> Error</title>
        <style type='text/css'>
            body { background-color: #fff; color: #333; }
            
            body, p, ol, ul, td {
              font-family: verdana, arial, helvetica, sans-serif;
              font-size:   13px;
              line-height: 18px;
            }
            
            pre {
              background-color: #eee;
              padding: 10px;
              font-size: 11px;
            }
            
            a { color: #000; }
            a:visited { color: #666; }
            a:hover { color: #fff; background-color:#000; }
        </style>
    </head>
    <body>
        <h1><?php o($code) ?> - An Error Occurred</h1>
        <pre><?php o($error) ?></pre>

        <h2>Configuration</h2>
        <pre><?php $c = get_defined_constants(true); $c = $c['user']; print_r($c) ?></pre>
        
        <h2>Request</h2>
        <pre><?php print_r($_REQUEST) ?></pre>
        <strong>POST Parameters</strong>
        <pre><?php print_r($_POST) ?></pre>
        
        <strong>GET Parameters</strong>
        <pre><?php print_r($_GET) ?></pre>
        
        <strong>Headers</strong>
        <pre><?php print_r(headers_list()) ?></pre>
        
        <h2>Server</h2>
        <pre><?php 
                $s = $_SERVER;
                unset($s['HTTP_COOKIE']);
                print_r($s); ?>
        </pre>
</html>
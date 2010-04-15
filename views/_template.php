<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Condor</title>
        <?php o(include_stylesheet('app')) ?>
        <?php o(include_script('app')) ?>
        <?php echo custom_includes(sys()->view); ?>
    </head>
    <body>
    <div id='content'>
      <?php echo sys()->flash->render(); ?>
      <?php echo sys()->content; ?>
    </div>
    </body>
</html>
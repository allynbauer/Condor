<?php

class ExampleController {
    function test() {
       template('template.alt');
        // if you have no view for an action the content will just be outputted to screen
        sys()->content = 'do you see how excellent this thing is. its so handy! Also note this rendered with the alternative template.' .
                         '<br><a href="<?php echo $web_root ?>">home</a>';
    }
}
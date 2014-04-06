<?php
/**
 * Image config file
 * controlles all image sizes and manipulations
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 * @return array like: 
 *  array(
 *      'placeholder' => array('path' => '/images/public/', 'img' => 'placeholder.png'),
 *      'sizes' => array(
 *          'thumb' => array(
 *              'app' => 'simage',
 *              'actions' => array(
 *                  array('fit_to_width', 200),
 *                  array('rotate', 180)
 *              )
 *          )
 *      )
 *  );
 */

return array(
    'placeholder' => array('path' => '/images/public/', 'img' => 'placeholder.png'),
    'sizes' => array(
        'micro' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 50, 50)
            )
        ),
        'thumb' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 280, 140)
            )
        ),
        'med' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 400, 200)
            )
        ),
        'big' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 700, 300)
            )
        ),
        'home_slider' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 580, 270)
            )
        ),
        'home_avatar' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 129, 119)
            )
        ),
        'profile_avatar' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 180, 136)
            )
        ),
        
        'profile_cover' => array(
            'app' => 'simage',
            'actions' => array(
                array('fit_and_crop', 599, 250)
            )
        ),
    )
);

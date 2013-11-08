<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
		'child_routes' => array(
			'about' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => 'about',
			                'defaults' => array(
                        			'controller' => 'Application\Controller\Index',
		                        	'action' => 'about',
		                    	),
				),
			),
			'contact' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => 'contact',
                                        'defaults' => array(
                                        	'controller' => 'Application\Controller\Index',
                                        	'action' => 'contact',
					),
				),
			),
			'blog' => array(
                                'type' => 'Zend\Mvc\Router\Http\Literal',
                                'options' => array(
                                        'route' => 'blog',
                                        'defaults' => array(
                                                'controller' => 'Application\Controller\Index',
                                                'action' => 'blog',
                                        ),
                                ),
				'may_terminate' => true,
				'child_routes' => array(
					'category' => array(
				                'type' => 'Segment',
				                'options' => array(
				                    'route' => '/:category',
				                    'defaults' => array(
				                        'controller' => 'Application\Controller\Index',
				                        'action' => 'blogCategory'
				                    ),
				                ),
						'may_terminate' => true,
						'child_routes' => array(
							'post' => array(
								'type' => 'Segment',
                                                        	'options' => array(
                                                                	'route' => '/:slug',
                                                                	'defaults' => array(
                                                                        	'controller' => 'Application\Controller\Index',
                                                                        	'action' => 'blogPost'
                                                                	),
                                                        	),
							),
						),
				            ),
				),
                        ),
            	),
	   ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);

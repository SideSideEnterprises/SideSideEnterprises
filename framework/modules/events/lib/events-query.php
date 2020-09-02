<?php
namespace TopFit\Modules\Events\Lib;

class EventsQuery {
    /**
     * @var private instance of current class
     */
    private static $instance;

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {
    }

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {
    }

    /**
     * Private clone because of Singletone
     */
    private function __clone() {
    }

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if(self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    public function queryVCParams() {
        return array(
            array(
                'type'        => 'dropdown',
                'heading' => esc_html__( 'Order By', 'topfit' ),
                'param_name'  => 'order_by',
                'value'       => array(
                    'Menu Order' => 'menu_order',
                    'Title'      => 'title',
                    'Date'       => 'date'
                ),
                'admin_label' => true,
                'save_always' => true,
                'description' => '',
                'group' => esc_html__( 'Query Options', 'topfit' )
            ),
            array(
                'type'        => 'dropdown',
                'heading' => esc_html__( 'Order', 'topfit' ),
                'param_name'  => 'order',
                'value'       => array(
                    'ASC'  => 'ASC',
                    'DESC' => 'DESC',
                ),
                'admin_label' => true,
                'save_always' => true,
                'description' => '',
                'group' => esc_html__( 'Query Options', 'topfit' )
            ),
            array(
                'type'        => 'textfield',
                'heading' => esc_html__( 'Events Category', 'topfit' ),
                'param_name'  => 'category',
                'value'       => '',
                'admin_label' => true,
                'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'topfit' ),
                'group' => esc_html__( 'Query Options', 'topfit' )
            ),
            array(
                'type'        => 'textfield',
                'heading' => esc_html__( 'Number of Events', 'topfit' ),
                'param_name'  => 'number',
                'value'       => '-1',
                'admin_label' => true,
                'description' => esc_html__( '(enter -1 to show all)', 'topfit' ),
                'group' => esc_html__( 'Query Options', 'topfit' )
            ),
            array(
                'type'        => 'textfield',
                'heading' => esc_html__( 'Show Only Events with Listed IDs', 'topfit' ),
                'param_name'  => 'selected_events',
                'value'       => '',
                'admin_label' => true,
                'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'topfit' ),
                'group' => esc_html__( 'Query Options', 'topfit' )
            )
        );
    }

    public function getShortcodeAtts() {
        return array(
            'order_by'        => 'date',
            'order'           => 'ASC',
            'number'          => '-1',
            'category'        => '',
            'selected_events' => '',
            'next_page'       => ''
        );
    }

    public function buildQueryObject($params) {
        $queryArray = array(
            'post_type'      => 'tribe_events',
            'orderby'        => $params['order_by'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number']
        );

        if(!empty($params['category'])) {
            $queryArray['tribe_events_cat'] = $params['category'];
        }

        $projectIds = null;
        if(!empty($params['selected_events'])) {
            $projectIds             = explode(',', $params['selected_events']);
            $queryArray['post__in'] = $projectIds;
        }

        if(!empty($params['next_page'])) {
            $queryArray['paged'] = $params['next_page'];

        } else {
            $queryArray['paged'] = 1;
        }

        return new \WP_Query($queryArray);
    }
}
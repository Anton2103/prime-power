<?php


namespace Inc;

use Service\Singleton;

class ImagesSettings {

    use Singleton;

    protected function __construct()
    {
        add_action('after_setup_theme', [$this, 'initImageSizes']);
        add_filter( 'image_size_names_choose', [$this,'addNewImgSize'] );
        add_filter('wp_calculate_image_srcset', [$this, 'srcsetAttr'], 10 , 5);
        add_filter('wp_calculate_image_sizes', [$this, 'sizesAttr'], 10 , 4);
    }

    /**
     * registration new image sizes
     */
    public function initImageSizes()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', [
            'height' => 200,
            'width' => 50,
            'flex-width' => true,
            'flex-height' => true,
        ]);

        add_image_size( 'slider', 550, 550, TRUE );
        add_image_size( 'mobile-slider', 335, 180, TRUE );
        add_image_size( 'benefits', 280, 198, TRUE );
        add_image_size( 'rate', 440, 600, TRUE );
    }

    /**
     * added a new image size on Gutenberg editor
     * @param $sizes
     * @return array
     */
    public function addNewImgSize( $sizes )
    {
        return array_merge($sizes, array(
                'slider' => __('Main slider'),
            )
        );
    }

    /**
     * @param $sizes
     * @param $size
     * @return mixed|string
     */
    public function sizesAttr($sizes, $size, $image_src, $image_meta)
    {
        $right_sizes = '';

        $size_name = '';
        if (!empty($image_meta) && !empty($image_meta['sizes'])) {
            foreach ($image_meta['sizes'] as $cur_size=>$size_item) {
                if (strpos($image_src, $size_item['file'])) {
                    $size_name = $cur_size;
                    break;
                }
            }
        }

        switch ($size_name) {
            case 'slider':
                $right_sizes = '(max-width: 768px) calc(100vw - 40px), 1076px)';
                break;
            case 'benefits':
                $right_sizes = '(max-width: 768px) 1px, 280px)';
                break;
            case 'rate':
                $right_sizes = '(max-width: 768px) 1px, 440px)';
                break;
            default:
                $right_sizes = $sizes;
        }


        return $right_sizes;
    }

    /**
     * @param $sources
     * @param $size_array
     * @param $image_src
     * @param $image_meta
     * @param $attachment_id
     * @return mixed
     */
    public function srcsetAttr($sources, $size_array, $image_src, $image_meta, $attachment_id )
    {
        $size = '';
        if (!empty($image_meta) && !empty($image_meta['sizes'])) {
            foreach ($image_meta['sizes'] as $cur_size=>$size_item) {
                if (strpos($image_src, $size_item['file'])) {
                    $size = $cur_size;
                    break;
                }
            }
        }

        switch ($size) {
            case 'slider':
                $mobilesrc = wp_get_attachment_image_src($attachment_id, 'mobile-slider');
                if (!empty($mobilesrc)) {
                    $sources[] = [
                        'url' => $mobilesrc[0],
                        'value' => '768',
                        'descriptor' => 'w'
                    ];
                }
                break;
            case 'benefits':
            case 'rate':

            $sources[] = [
                'url' =>  ASSETSURL . '/images/blank.png',
                'value' => '1',
                'descriptor' => 'w'
            ];
                break;
            default:
            ;
        }
        return $sources;
    }



}
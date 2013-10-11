<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{

    protected $custom_theme_path;
    protected $default_theme_path;

    public function __construct()
    {
        parent::__construct();
        $this->custom_theme_path  = APP_VIEWS_PATH.THEME_CUSTOM_VIEWS_PATH.'/';
        $this->default_theme_path = APP_VIEWS_PATH.THEME_DEFAULT_VIEWS_PATH.'/';
    }

    public function model ( $model, $name = '', $db_conn = FALSE )
    {
        if ( is_array($model) )
        {
            foreach ( $model as $babe )
            {
                $this->model($babe);
            }
            return;
        }

        $custom_models_directory = APP_MODELS_PATH.THEME_CUSTOM_MODELS_PATH.'/';

        if ( file_exists($custom_models_directory.$model.EXT) )
        {
            $model = THEME_CUSTOM_MODELS_PATH.'/'.$model;
        } else {
            $model = THEME_DEFAULT_MODELS_PATH.'/'.$model;
        }

        parent::model($model, $name, $db_conn);
    }

    public function view ( $view, $vars = array(), $return = FALSE, $full = TRUE )
    {
        if ( !$return && $full )
        {
            $view_obj = new stdClass();
            $view_obj->name     = $view;
            $view_obj->type     = reset(explode('/', $view));
            $view_obj->basename = basename($view);
            $view_obj->dirname  = dirname($view);

            $header = $this->_get_segment($view_obj, 'header');
            $footer = $this->_get_segment($view_obj, 'footer');
        }

        // view template
        if ( file_exists($this->custom_theme_path) && file_exists($this->custom_theme_path.$view.EXT) )
        {
            $view = THEME_CUSTOM_VIEWS_PATH.'/'.$view;
        } else {
            $view = THEME_DEFAULT_VIEWS_PATH.'/'.$view;
        }

        if ( ! $return )
        {
            if ( $full )
            {
                parent::view($header, $vars);
                parent::view($view, $vars);
                parent::view($footer, $vars);
            } else {
                parent::view($view, $vars);
            }
        } else {
            return parent::view($view, $vars, $return);
        }
    }

    public function admin_view ( $view, $vars = array(), $return = FALSE, $full = TRUE )
    {
        if ( $return )
        {
            return $this->view('admin/'.$view, $vars, $return, $full);
        } else {
            $this->view('admin/'.$view, $vars, $return, $full);
        }
    }

    public function site_view ( $view, $vars = array(), $return = FALSE, $full = TRUE )
    {
        if ( $return )
        {
            return $this->view('site/'.$view, $vars, $return, $full);
        } else {
            $this->view('site/'.$view, $vars, $return, $full);
        }
    }

    public function widgets ()
    {
        if ( file_exists($this->custom_theme_path) && file_exists($this->custom_theme_path.WIDGETS_FILE_NAME.EXT) )
        {
            $widgets_path = $this->custom_theme_path.WIDGETS_FILE_NAME.EXT;
        } else {
            $widgets_path = $this->default_theme_path.WIDGETS_FILE_NAME.EXT;
        }

        if ( file_exists($widgets_path) )
        {
            return $widgets_path;
        }
        return FALSE;
    }

    public function widget ( $view, $data = array() )
    {
        $vars = array();
        $vars['data'] = $data;

        return $this->view('widgets/'.$view, $vars, TRUE, FALSE);
    }

    protected function _load_segment ( $theme_name = '', $theme_path = '', $view = NULL, $segment = '' )
    {
        if ( $theme_name && $theme_path && $view && $segment )
        {
            if ( file_exists($theme_path) )
            {
                /*
                    Segment (header|footer) template view loading priority

                    THEME: CUSTOM -> DEFAULT -> NO
                    /application/views/{THEME}/{TYPE}/{VIEW}/{view_segment}.php
                    /application/views/{THEME}/{TYPE}/{VIEW}/segment.php
                    /application/views/{THEME}/{TYPE}/{view_segment}.php
                    /application/views/{THEME}/{TYPE}/segment.php
                */
                if ( ($seg_path = "{$view->name}_{$segment}" ) && file_exists($theme_path.$seg_path.EXT) )
                {
                    $segment_full_path = "{$theme_name}/{$seg_path}";
                }
                elseif ( ($seg_path = "{$view->dirname}/{$segment}") && file_exists($theme_path.$seg_path.EXT) )
                {
                    $segment_full_path = "{$theme_name}/{$seg_path}";
                }
                elseif ( ($seg_path = "{$view->type}/{$view->basename}_{$segment}") && file_exists($theme_path.$seg_path.EXT) )
                {
                    $segment_full_path = "{$theme_name}/{$seg_path}";
                }
                elseif ( ($seg_path = "{$view->type}/{$segment}") && file_exists($theme_path.$seg_path.EXT) )
                {
                    $segment_full_path = "{$theme_name}/{$seg_path}";
                }
                else
                {
                    $segment_full_path = FALSE;
                }
                return $segment_full_path;
            }
        }
        return FALSE;
    }

    protected function _get_segment ( $view = NULL, $segment = '' )
    {
        // CUSTOM view template
        $result = $this->_load_segment(THEME_CUSTOM_VIEWS_PATH, $this->custom_theme_path, $view, $segment);
        if ( ! $result )
        {
            // DEFAULT view template
            $result = $this->_load_segment(THEME_DEFAULT_VIEWS_PATH, $this->default_theme_path, $view, $segment);
            if ( ! $result )
            {
                // NO view
                $result = FALSE;
                show_error("Loader: {$segment} segment view loading error.");
            }
        }
        return $result;
    }

}
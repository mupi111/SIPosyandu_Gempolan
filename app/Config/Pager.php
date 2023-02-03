<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',
        'custom_pagination' => 'App\Views\Pagers\bidan_pagination',
        'custom_pagination2' => 'App\Views\Pagers\kader_pagination',
        'custom_pagination3' => 'App\Views\Pagers\user_pagination',
        'custom_pagination4' => 'App\Views\Pagers\keluarga_pagination',
        'custom_pagination5' => 'App\Views\Pagers\bumil_pagination',
        'custom_pagination6' => 'App\Views\Pagers\anak_pagination',
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     *
     * @var int
     */
    public $perPage = 20;
}

<?php

namespace App\Helpers;

function generateBreadcrumb(): string
{
    $segments = request()->segments();
    $breadcrumb = '<ol class="breadcrumb">';
    $breadcrumb .= '<li class="breadcrumb-item"><a href="' . url('/') . '">Dashboard</a></li>';
    $url = '';
    foreach ($segments as $segment) {
        $url .= '/' . $segment;
        if ($segment == end($segments)) {
            $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . ucwords(str_replace('-', ' ', $segment)) . '</li>';
        } else {
            // check if segment is a uuid and remove the uuid segment from breadcrumb
            if (preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){3}-[a-f\d]{12}?$/i', $segment)) {
                continue;
            }
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . url($url) . '">' . ucwords(str_replace('-', ' ', $segment)) . '</a></li>';
        }
    }
    $breadcrumb .= '</ol>';
    return $breadcrumb;
}


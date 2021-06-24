<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "مجتمع بزرگ شیراز چاپ", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'مجتمع شیراز چاپ بهترین چاپخانه شیراز ، ارائه دهنده کلیه خدمات چاپی و تبلیغاتی در شیراز، خدمات شرکت شامل چاپ لارج فرمت نظیر چاپ فوری بنر در شیراز،فلکس،استیکر و ... همچنین انواع چاپ افست و چاپ دیجیتال در کوتاه ترین زمان و کمترین هزینه می باشد', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['چاپ فوری بنر در شیراز','چاپ بنر در شیراز','بهترین چادخانه شیراز','چاپ بنر','شیراز','بنر ارزان','کارت ویزیت','چاپ بنر شیراز','print visit cards in shiraz','بنر شیراز','چاپ شیراز','افست تمام رنگی','tablighat arzan shiraz','sherkat tablighati va chap dar shiraz iran fars','فروش طرح لایه باز','طرح های سه بعدی',],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => "مجتمع بزرگ شیراز چاپ", // set false to total remove
            'description' =>  'مجتمع شیراز چاپ بهترین چاپخانه شیراز ، ارائه دهنده کلیه خدمات چاپی و تبلیغاتی در شیراز، خدمات شرکت شامل چاپ لارج فرمت نظیر چاپ فوری بنر در شیراز،فلکس،استیکر و ... همچنین انواع چاپ افست و چاپ دیجیتال در کوتاه ترین زمان و کمترین هزینه می باشد', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'مجتمع بزرگ شیراز چاپ', // set false to total remove
            'description' =>  'مجتمع شیراز چاپ بهترین چاپخانه شیراز ، ارائه دهنده کلیه خدمات چاپی و تبلیغاتی در شیراز، خدمات شرکت شامل چاپ لارج فرمت نظیر چاپ فوری بنر در شیراز،فلکس،استیکر و ... همچنین انواع چاپ افست و چاپ دیجیتال در کوتاه ترین زمان و کمترین هزینه می باشد', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];

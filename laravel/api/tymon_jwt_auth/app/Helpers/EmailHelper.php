<?php
if (!function_exists('emailTemplate')) {
    function emailTemplate($emailKey='TEST_MAIL', $contentData=''){
        $emailTemplateResponse = \App\Models\Email\EmailTemplate::where('email_key', $emailKey)->first();
        if ($emailKey == 'TEST_MAIL') {
            $contentData = new stdClass();
            $contentData->user_name = '';
            $contentData->contact_number = '';
            $contentData->action_url = base_url();
            $contentData->sender_name = '';
            $contentData->website_name = '';
            $contentData->varification_link = base_url().'verification';
            $contentData->url_link = base_url().'verification';
        }
        else {
        }
        #_pre($contentData);
        if($emailTemplateResponse){
            $emailHtml = $emailTemplateResponse->email_html;
            foreach ($contentData as $key => $value) {
                $emailHtml = str_replace('{' . $key . '}', $value, $emailHtml);
                #$emailHtml = str_replace('{var_'.$key.'}', $value, $emailHtml);
            }
            $emailTemplateResponse->email_html = $emailHtml;
            return $emailTemplateResponse;
        }
        else{
            return 0;
        }
    }
}
if (!function_exists('_headerFooterEmail')) {
    function _headerFooterEmail($BODY_CONTENT = '')
    {
        $emailHtml = '';
        /* $css = <<<CSS
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Roboto', Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 5px;
                overflow: hidden;
                color: #000;
            }
            .header {
                background-color: #f47a04;
                padding: 20px;
                text-align: center;
                color: #FFF;
            }
            .body {
                padding: 20px;
                font-size: 16px;
                line-height: 1.5;
            }
            @media only screen and (max-width: 600px) {
                .body {
                    padding: 15px;
                }
            }
        CSS; */
        $css = '';
        $emailHtml = <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Example App</title>
                <style>{$css}</style>
            </head>
            <body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Roboto, Arial, sans-serif; color:#333;">
                {$BODY_CONTENT}
            </body>
            </html>
        HTML;
        return $emailHtml;
    }
}
?>
<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Classes\Users;

class RjsfController extends AbstractTwigController
{
    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args = []): Response
    {


$jsf_schema   = file_get_contents(__ROOT__.'/glued/Core/Controllers/schemas/assets.v1.schema');
$jsf_uischema = file_get_contents(__ROOT__.'/glued/Core/Controllers/schemas/assets.v1.formui');
$jsf_formdata = '{"data":{"ts_created":"'.time().'","ts_updated":"'.time().'"}}';
$jsf_onsubmit = 
'
    $.ajax({
      url: "https://example.com",
      dataType: "text",
      type: "POST",
      data: "stockdata=" + JSON.stringify(formData.formData),
      success: function(data) {
        // diky replacu nezustava puvodni adresa v historii, takze se to vice blizi redirectu
        // presmerovani na editacni stranku se vraci z toho ajaxu
        window.location.replace(data);
        /*
        ReactDOM.render((<div><h1>Thank you</h1><pre>{JSON.stringify(formData.formData, null, 2) }</pre></div>), 
                 document.getElementById("main"));
        */
      },
      error: function(xhr, status, err) {
        ReactDOM.render((<div><h1>Something goes wrong ! not saving.</h1><pre>{JSON.stringify(formData.formData, null, 2) }</pre></div>), 
                 document.getElementById("main"));
      }
    });
';

        return $this->render($response, 'Core/Views/home.twig', [
            'pageTitle' => 'Home',
            'json_schema_output' => $jsf_schema,
            'json_uischema_output' => $jsf_uischema,
            'json_formdata_output' => $jsf_formdata,
            'json_onsubmit_output' => $jsf_onsubmit
        ]);
    }
}





// Prefill data:
// 



//      url: "https://'.$this->container['settings']['glued']['hostname'].$this->container->router->pathFor('assets.api.new').'",


        //$this->container['settings']['glued']['hostname']
        //$this->container->settings->glued->hostname
        // vnitrek onsubmit funkce
        //         alert('xhr status: ' + xhr.status + ', status: ' + status + ', err: ' + err)
